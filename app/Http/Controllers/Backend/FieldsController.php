<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Call;
use App\User_type;
use App\Form;
use App\Field;

class FieldsController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('permission:leer-campos')->only(['index']);
      $this->middleware('permission:crear-campos')->only(['create', 'storage']);
      $this->middleware('permission:actualizar-campos')->only(['edit', 'update']);
      $this->middleware('permission:borrar-campos')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $fields = Field::where('form_id', $request->id)->get();
        $form = $request->id;

        $idusertypes = $request->idusertypes;


        return view('backend.fields.index', compact('form', 'fields','idusertypes'));
    }


    public function create(Request $request)
    {
        
        $form = Form::with('user_types')
          ->where('id', $request->form)
          ->firstOrFail();

        $call = $request->call;
        $idusertypes = $request->usertypes_id;
        return view('backend.fields.create', compact('form', 'call','idusertypes'));
    }


    public function storage(Request $request)
    {

        /**
         * Se realiza validacion para el tamaño del campo que se mostrara en el frontend
         */
        $size = 0;
        
        if (!empty($request->size)) {
            $size = $request->size;
        }

        if (!empty($request->sizetext)) {
            $size = $request->sizetext;
        }

        if (!empty($request->sizetextarea))  {
            $size = $request->sizetextarea;
        }


        if ($request->type == 'participantes') {
            

            try {
                DB::beginTransaction();

                $val = Form::where('id',$request->form)->count();

                if ($val >= 0) {
                    $consultarNumIdForm = Form::where('id',$request->form)->max('order');
                }

                // dd($request->idusertypes );
                
                $form = new Form;
                $form->order = ($consultarNumIdForm == 0 )  ? 1 : ($consultarNumIdForm + 1) ;
                $form->name = 'Formulario de participantes';
                $form->description = 'Formulario de participantes';
                $form->save();

                $users_type_id = 0;

               
                    DB::table('form_user_type')->insert([
                        'form_id' => $form->id,
                        'user_type_id' => $request->idusertypes,
                    ]);
               
              

                $field = new Field;
                $field->form_id = $form->id;
                $field->order = $request->order;
                $field->label = $request->label;
                $field->slug = Str::slug($request->label, '-');
                $field->name = $request->label;
                $field->type = $request->type;
                $field->description = ($request->description != null) ? $request->description : "";
                $field->placeholder = $request->label;
                $field->options = ($request->options != null) ? $request->options : "";
                $field->identification = $request->identification;
                $field->accept = ($request->accept != null) ? $request->accept : 0;
                $field->size = $size;
                $field->required = ($request->required != null) ? $request->required : 0;
                $field->save();

                $fields = Field::where('form_id',$request->form)->get();
                $id = $request->form;
                $call = $request->call;

                DB::commit();

                return redirect()->route('backend.fields.index', compact('call', 'id', 'fields'))->with('success', 'Se ha creado el campo satisfactoriamente');

            } catch (Exception $e) {
                DB::rollback();
                
            }
        }else{

            try {
                DB::beginTransaction();
                    
                    $field = new Field;
                    $field->form_id = $request->form;
                    $field->order = $request->order;
                    $field->label = $request->label;
                    $field->slug = Str::slug($request->label, '-');
                    $field->name = $request->label;
                    $field->type = $request->type;
                    $field->description = ($request->description != null) ? $request->description : "";
                    $field->placeholder = $request->label;
                    $field->options = ($request->options != null) ? $request->options : "";
                    $field->identification = $request->identification;
                    $field->accept = ($request->accept != null) ? $request->accept : 0;
                    $field->size = $size;
                    $field->required = ($request->required != null) ? $request->required : 0;
                    $field->save();

                    $fields = Field::where('form_id',$request->form)->get();
                    $id = $request->form;
                    $call = $request->call;

                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
            

            return redirect()->route('backend.fields.index', compact('call', 'id', 'fields'))->with('success', 'Se ha creado el campo satisfactoriamente');
        }

       
    }


    public function edit(Request $request, $id)
    {

        $field = Field::where('id', $id)->firstOrFail();
       
        $form = Form::with('user_types')
          ->where('id', $request->form)
          ->firstOrFail();

        return view('backend.fields.edit', compact('form', 'field'));
    }


    public function update(Request $request, $id)
    {
        $size = 0;

        if (!empty($request->size)) {
            $size = $request->size;
        }

        if (!empty($request->sizetext)) {
            $size = $request->sizetext;
        }

        if (!empty($request->sizetextarea))  {
            $size = $request->sizetextarea;
        }

        $field = Field::where('id', $id)->firstOrFail();
        $field->order = $request->order;
        $field->label = $request->label;
        $field->slug = Str::slug($request->label, '-');
        $field->name = $request->label;
        $field->type = $request->type;
        $field->description = ($request->description != null) ? $request->description : "";
        $field->placeholder = $request->label;
        $field->options = ($request->options != null) ? $request->options : "";
        $field->identification = $request->identification;
        $field->accept = ($request->accept != null) ? $request->accept : 0;
        $field->size = $size;
        $field->required = ($request->required != null) ? $request->required : 0;
        $field->save();

        $fields = Field::where('form_id',$request->form)->get();
        $id = $request->form;
        $call = $request->call;

        return redirect()->route('backend.fields.index', compact('call', 'id', 'fields'))->with('success', 'Se ha actualizado el formulario satisfactoriamente');

    }

    public function destroy(Request $request, $id)
    {   

        try {
            DB::beginTransaction();
            $field = Field::where('id', $id)->firstOrFail();
            $field->delete();


            $fields = Field::where('form_id',$request->form)->get();
            $id = $request->form;
            $call = $request->call;
        
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }

        return redirect()->route('backend.fields.index', compact('call', 'id', 'fields'))->with('success', 'Se ha eliminado el campo satisfactoriamente');

    }
}
