<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Call;
use App\User_type;
use App\Form;
use App\Incentive;
use App\Incentive_type;

class FormsEstimuloController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
       /* $this->middleware('permission:leer-formularios')->only(['index']);
        $this->middleware('permission:crear-formularios')->only(['create', 'storage']);
        $this->middleware('permission:actualizar-formularios')->only(['edit', 'update']);
        $this->middleware('permission:borrar-formularios')->only(['destroy']);*/
    }

    public function index(Request $request)
    {
        $calls = Call::get();
        $call = 0;

        $incentives = Incentive::get();
        $incentive = 0;

        if($request->incentive){
            $incentive = $request->incentive;
        }

        // dd($incentive);

        $forms_select = DB::table('forms')
                  ->join('form_incetive', 'form_incetive.form_id', '=', 'forms.id')
                  ->join('incentives', 'incentives.id', '=', 'form_incetive.incetive_id')
                  ->join('calls', 'calls.id', '=', 'incentives.call_id')
                  ->join('user_types','incentives.call_id','=','user_types.call_id')
                  // ->where('calls.id', $incentive)
                  ->where('incentives.id',$incentive)
                  ->select('forms.id as form_id', 'forms.order as form_order', 'forms.description as form_description', 'forms.name as form_name', 'calls.id as call_id' , 'calls.name as call_name', 'incentives.name as user_types_name', 'incentives.id as idusertypes')
                  ->get();
        

        $forms = array();

        foreach ($forms_select as $key => $form) {
            if (array_key_exists($form->form_id, $forms)){
              $forms[$form->form_id]->user_types_name = $forms[$form->form_id]->user_types_name . ', <br>' . $form->user_types_name;
            }else {
              $forms[$form->form_id] = $form;
            }
        }




        return view('backend.formsEstimulo.index', compact('calls', 'forms','incentives'));
    }


    public function create(Request $request)
    {
        $incentive = Incentive::where('id', $request->incentive)->first();
        $user_types = DB::table('incentive_user_type')
                    ->join('user_types','incentive_user_type.user_type_id','=','user_types.id')
                    ->where('incentive_id', $incentive->id)->get();


        return view('backend.formsEstimulo.create', compact('incentive','user_types'));
    }


    public function storage(Request $request)
    {
        // dd(count($request->user_types_field));

    	try {
            DB::beginTransaction();


            if (empty($request->user_types_field)) {
                $tipo_mensaje = 'error';
                $desc_mensaje = 'por favor verfica que todos los datos esten correctos';
                return redirect()->back()->with($tipo_mensaje, $desc_mensaje);
            }

            $arrayIdForm = array();
            $arrayIdForm = DB::table('form_user_type as fut')
                        ->join('forms as f','fut.form_id','=','f.id')
                        // ->select(DB::RAW('max(fut.form_id) as form,max(f.order) as orden'))
                        ->select(DB::RAW('max(f.order) as orden'))
                        ->whereIn('fut.user_type_id',[ $request->user_types_field])
                        ->groupBy('form_id')
                        ->orderBy('f.order','desc')
                        ->value('orden');


            $form = new Form;
            $form->order = $arrayIdForm+1;
            $form->name = $request->name;
            $form->description = $request->description;
            $form->save();

            $users_type_id_incetive = 0;

         /*   foreach ($request->user_types_field as $key => $user_type) {
                */
                DB::table('form_incetive')->insert([
                    'form_id' => $form->id,
                    'incetive_id' => $request->incentive,
                    
                ]);
                /*$users_type_id_incetive = $user_type;

            }*/


            $users_type_id = 0;

            foreach ($request->user_types_field as $key => $user_type) {
               /* DB::table('form_user_type')->insert([
                    'form_id' => $form->id,
                    'user_type_id' => $user_type,
                ]);*/
                $users_type_id = $user_type;
            }

            $user_types = User_type::find($users_type_id);
            $call = Call::find($user_types->call_id);

            DB::commit();

            $tipo_mensaje = 'success';
            $desc_mensaje = 'Se ha creado el formulario satisfactoriamente';
        } catch (Exception $e) {
            DB::rollback();
            
        }

        

        return redirect()->route('estimulos.forms.index', compact('call'))->with($tipo_mensaje, $desc_mensaje);

    }


    public function edit(Request $request)
    {	


      
         $form = Form::with('user_types')
            ->where('id', $request->id)
            ->firstOrFail();

        $user_types = User_type::where('call_id', $request->call)->get();

        return view('backend.forms.edit', compact('user_types', 'form'));

    }


    public function update(Request $request, $id)
    {

         try {
            DB::beginTransaction();


            if (empty($request->incentive)) {
                $tipo_mensaje = 'error';
                $desc_mensaje = 'por favor verfica que esta seleccionado el estimulo';
                return redirect()->back()->with($tipo_mensaje, $desc_mensaje);
            }
            
            // dd($id);

                $form 				= Form::find($id);;
                $form->order 		= $request->order;
                $form->name 		= $request->name;
                $form->description 	= $request->description;
                $form->update();

                DB::table('form_incetive')->where('form_id', $form->id)->delete();

              
                    DB::table('form_incetive')->insert([
                        'form_id' => $form->id,
                        'incetive_id' => $request->incentive,
                    ]);
                                 	
                $incetive_id = $request->incentive;

                $incentive 	= Incentive::find($incetive_id);
                $call = Call::find($incentive->call_id);

            DB::commit();

            $tipo_mensaje = 'success';
            $desc_mensaje = 'Se ha creado el formulario satisfactoriamente';
        } catch (Exception $e) {
            DB::rollback();
            
        }
        return redirect()->route('estimulos.forms.index', compact('call'))->with($tipo_mensaje, $desc_mensaje);;

    }

    public function destroy(Request $request, $id)
    {
        $form = Form::find($id);
        $form->delete();

        $form_incetive = DB::table('form_incetive')
                ->where('form_id',$id)
                ->delete();

        $call = Call::find($request->call);

        return redirect()->route('estimulos.forms.index', compact('call'))->with('success', 'Se ha eliminado el tipo de usuario satisfactoriamente');
    }
}
