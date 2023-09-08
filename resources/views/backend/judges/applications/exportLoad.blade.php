<div class="col-12 text-center text-md-left mb-4">
  <h3>Total de aplicaciones: <span class="font-weight-bold">{{ count($applications) }}</span></h3>
</div>

<div class="col-12">

  <div class="table-responsive">

    <table id="datatable" class="table table-bordered" style="display:none">
      <thead>
        <tr>
          <th>Código</th>
          <th>Usuario</th>
          <th class="d-none">Documento</th>
          <th class="d-none">Nombre de usuario</th>
          <th class="d-none">Correo del usuario</th>
          <th class="d-none">Convocatoria</th>
          <th class="d-none">Área</th>
          <th class="d-none">Linea de acción</th>
          <th class="">Estímulo</th>
          <th>Tipo de usuario</th>
          <th class="d-none">Fecha de aplicación</th>
          <th class="d-none">Fecha de actualizacion</th>
          <th>Estado</th>
          <th class="d-none">Puntuación</th>



          @if (count($user_type_select) > 0)
              @foreach ($user_type_select[0]->forms as $form)
                  @foreach ($form->fields as $field)
                    <th class="d-none">{{$field->label}}</th>
                  @endforeach
              @endforeach
          @endif

        </tr>
      </thead>
      <tbody>
        @foreach ($applications as $application)
          <tr>
            <td class="align-middle">{{ $application->code }}</td>
            <td class="align-middle">{{ $application->identification . ' - '  . $application->user->name }}</td>
            <td class="align-middle d-none">{{ $application->identification }}</td>
            <td class="align-middle d-none">{{ $application->user->name }}</td>
            <td class="align-middle d-none">{{ $application->user->email }}</td>
            <td class="align-middle d-none">{{ $application->call->name}}</td>
            <td class="align-middle d-none">{{ $application->incentive->area->name }}</td>
            <td class="align-middle d-none">{{ $application->incentive->line_action->name }}</td>
            <td class="align-middle">{{ $application->incentive->code}} - {{ $application->incentive->name}}</td>
            <td class="align-middle ">{{ $application->user_type->name}}</td>
            <td class="align-middle d-none">{{ $application->created_at}}</td>
            <td class="align-middle d-none">{{ $application->updated_at}}</td>
            <td class="align-middle">
              <span class="badge badge-{{ $application->status->color }} py-2 px-3">{{ $application->status->name }}</span>
            </td>
            <td class="align-middle d-none">
              @php
                $score = 0;
                $grade= 0;
                if (count($application->grade_application) > 0) {
                    foreach ($application->grade_application as $key => $grade_application) {
                      $score = $score + $grade_application->score;
                      $grade = $grade + 1;
                    }

                    $score = ($score / $grade);

                }

              @endphp
              {{$score}}<br>
              @if ($grade > 0)
                Por: {{$grade}} Jurados
              @endif

            </td>

            @if (count($user_type_select) > 0)
                @php
                  $arrayRegister = null;
                  foreach ($application->register as $register){
                      $arrayRegister[$register->field_id] = $register->data;
                  }
                @endphp

                @foreach ($user_type_select[0]->forms as $form)
                    @foreach ($form->fields as $field)
                        @if (array_key_exists($field->id, $arrayRegister))
                            <td class="align-middle d-none">{{ $arrayRegister[$field->id] }}</td>
                        @else
                            <td class="align-middle d-none"></td>
                        @endif
                    @endforeach
                @endforeach
            @endif

          </tr>
        @endforeach

      </tbody>
    </table>

  </div>

</div>
