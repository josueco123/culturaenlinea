<?php

use Illuminate\Database\Seeder;

use App\Application;
use App\User_type;
use App\Form;
use App\Field;
use App\Register;

class RegistersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i=1; $i <= Application::count(); $i++) {
            $application = Application::find($i);

            $user_type = User_type::where('id', $application->user_type_id)->first();

            $forms = $user_type->forms;

            foreach ($forms as $form) {
                foreach ($form->fields as $field) {
                    $register = new Register;
                    $register->application_id = $i;
                    $register->form_id = $form->id;
                    $register->field_id = $field->id;

                    if ($field->type == 'text') {
                        $register->data = 'Texto: Campo ' . $field->id . ' - Formulario ' . $form->id;
                    }

                    if ($field->type == 'radio') {
                        $register->data = 'Radio: Campo ' . $field->id . ' - Formulario ' . $form->id;
                    }

                    if ($field->type == 'email') {
                        $register->data = 'Correo: Campo ' . $field->id . ' - Formulario ' . $form->id;
                    }

                    if ($field->type == 'select') {
                        $register->data = 'Selección: Campo ' . $field->id . ' - Formulario ' . $form->id;
                    }

                    if ($field->type == 'number') {
                        $register->data = 'Número: Campo ' . $field->id . ' - Formulario ' . $form->id;
                    }

                    if ($field->type == 'date') {
                        $register->data = 'Fecha: Campo ' . $field->id . ' - Formulario ' . $form->id;
                    }

                    if ($field->type == 'file') {
                        $register->data = 'Archivo: Campo ' . $field->id . ' - Formulario ' . $form->id;
                    }

                    $register->state = 1;
                    $register->save();
                }
            }
        }
    }
}
