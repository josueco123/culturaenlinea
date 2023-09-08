<div class="col-12 text-center text-md-left mb-4">
  <h3>Total de aplicaciones: <span class="font-weight-bold">{{ count($applications) }}</span></h3>
</div>

<div class="col-12">

  <div class="table-responsive">

    <table id="datatable" class="table table-bordered" style="display:none">
    <thead>
        <tr>
        @foreach ($dataHeader as $index => $data)
          @if($index > 11)
            <th class="d-none">{{ $data }}</th>
          @else
            <th>{{ $data }}</th>
          @endif
          @endforeach
          
        </tr>
      </thead>
      <tbody>
        
        @foreach ($dataAplications as $application)
          <tr>
            @foreach ($application as $index => $data)
            @if($index > 11)
            <td class="align-middle d-none">{{ $data }}</td>
          @else
          <td class="align-middle">{{ $data }}</td>
          @endif
            
            @endforeach
          </tr>
        @endforeach
       
      </tbody>
    </table>

  </div>

</div>
