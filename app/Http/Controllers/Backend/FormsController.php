<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Call;
use App\User_type;
use App\Form;

class FormsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:leer-formularios')->only(['index']);
        $this->middleware('permission:crear-formularios')->only(['create', 'storage']);
        $this->middleware('permission:actualizar-formularios')->only(['edit', 'update']);
        $this->middleware('permission:borrar-formularios')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $calls = Call::get();
        $call = 0;

        if($request->call){
            $call = $request->call;
        }

        $forms_select = DB::table('forms')
                  ->join('form_user_type', 'form_user_type.form_id', '=', 'forms.id')
                  ->join('user_types', 'user_types.id', '=', 'form_user_type.user_type_id')
                  ->join('calls', 'calls.id', '=', 'user_types.call_id')
                  ->where('calls.id', $call)
                  ->select('forms.id as form_id', 'forms.order as form_order', 'forms.description as form_description', 'forms.name as form_name', 'calls.id as call_id' , 'calls.name as call_name', 'user_types.name as user_types_name', 'user_types.id as idusertypes')
                  ->get();

        $forms = array();

        foreach ($forms_select as $key => $form) {
            if (array_key_exists($form->form_id, $forms)){
              $forms[$form->form_id]->user_types_name = $forms[$form->form_id]->user_types_name . ', <br>' . $form->user_types_name;
            }else {
              $forms[$form->form_id] = $form;
            }
        }

        return view('backend.forms.index', compact('calls', 'forms'));
    }


    public function create(Request $request)
    {
        $user_types = User_type::where('call_id', $request->call)->get();
        return view('backend.forms.create', compact('user_types'));
    }


    public function storage(Request $request)
    {

        try {
            DB::beginTransaction();


            if (empty($request->user_types)) {
                $tipo_mensaje = 'error';
                $desc_mensaje = 'por favor verfica que todos los datos esten correctos';
                return redirect()->back()->with($tipo_mensaje, $desc_mensaje);
            }
            $form = new Form;
            $form->order = $request->order;
            $form->name = $request->name;
            $form->description = $request->description;
            $form->save();

            $users_type_id = 0;

            foreach ($request->user_types as $key => $user_type) {
                DB::table('form_user_type')->insert([
                    'form_id' => $form->id,
                    'user_type_id' => $user_type,
                ]);
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

        

        return redirect()->route('backend.forms.index', compact('call'))->with($tipo_mensaje, $desc_mensaje);
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


            if (empty($request->user_types)) {
                $tipo_mensaje = 'error';
                $desc_mensaje = 'por favor verfica que todos los datos esten correctos';
                return redirect()->back()->with($tipo_mensaje, $desc_mensaje);
            }
            
                $form = Form::find($id);;
                $form->order = $request->order;
                $form->name = $request->name;
                $form->description = $request->description;
                $form->save();

                $users_type_id = 0;
                DB::table('form_user_type')->where('form_id', $form->id)->delete();

                foreach ($request->user_types as $key => $user_type) {
                    DB::table('form_user_type')->insert([
                        'form_id' => $form->id,
                        'user_type_id' => $user_type,
                    ]);
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
        return redirect()->route('backend.forms.index', compact('call'))->with($tipo_mensaje, $desc_mensaje);;

    }

    public function destroy(Request $request, $id)
    {
        $form = Form::find($id);
        $form->delete();

        $call = Call::find($request->call);

        return redirect()->route('backend.forms.index', compact('call'))->with('success', 'Se ha eliminado el tipo de usuario satisfactoriamente');
    }
}
