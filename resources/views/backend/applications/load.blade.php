<div class="col-12 text-center text-md-left mb-4">
  <h3>Total de aplicaciones: <span class="font-weight-bold">{{ count($applications) }}</span></h3>
</div>




<div class="col-12">

  <div class="table-responsive">

    <table id="datatable" class="table table-bordered">
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
          <th>Fecha de aplicación</th>
          <th>Estado</th>
          <th>Puntuación</th>
          <th width="130px">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($applications as $application)
          <tr>


            <td class="align-middle">{{ $application->code }}</td>
            
@if (isset($application->user))
<td class="align-middle">{{ $application->identification . ' - '  . $application->user->name }}</td>
<td class="align-middle d-none">{{ $application->identification }}</td>
<td class="align-middle d-none">{{ $application->user->name }}</td>
<td class="align-middle d-none">{{ $application->user->email }}</td>
@else
<td class="align-middle">{{ $application->identification . ' - '   }}</td>
<td class="align-middle d-none">{{ $application->identification }}</td>
<td class="align-middle d-none"></td>
<td class="align-middle d-none"></td>
@endif


            <td class="align-middle d-none">{{ $application->call->name}}</td>
            <td class="align-middle d-none">{{ $application->incentive->area->name }}</td>
            <td class="align-middle d-none">{{ $application->incentive->line_action->name }}</td>
            <td class="align-middle">{{ $application->incentive->code}} - {{ $application->incentive->name}}</td>
            <td class="align-middle">{{ $application->user_type->name}}</td>
            <td class="align-middle">{{ $application->created_at}}</td>
            <td class="align-middle">
              <span class="badge badge-{{ $application->status->color }} py-2 px-3">{{ $application->status->name }}</span>
            </td>
            <td class="align-middle">
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
            <td class="align-middle">
              <a href="{{ route('backend.applications.show', ['id' => $application->id]) }}" class="btn btn-info btn-sm mb-1 mb-lg-0"><i class="far fa-eye"></i></a>

              @if ($grade > 0)
                <a href="{{ route('backend.applications.grade', ['id' => $application->id]) }}" class="btn btn-sended btn-sm mb-1 mb-lg-0"><i class="far fa-clipboard"></i></a>
              @endif

              @permission('actualizar-aplicaciones')
                <a href="{{ route('backend.applications.edit', ['id' => $application->id]) }}" class="btn btn-warning btn-sm mb-1 mb-lg-0"><i class="fas fa-pencil-alt"></i></a>
              @endpermission
              @permission('borrar-aplicaciones')
                <a href="#" class="btn btn-danger btn-sm mb-1 mb-lg-0 deleteApplication" data-toggle="modal" data-target="#modalApplicationDelete" data-url="{{ route('backend.applications.destroy', ['id' => $application->id]) }}"><i class="fas fa-trash-alt"></i></a>
              @endpermission
            </td>
          </tr>
        @endforeach



      </tbody>
    </table>

  </div>

</div>
