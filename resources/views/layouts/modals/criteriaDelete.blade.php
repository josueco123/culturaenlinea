<div class="modal fade" id="modalDeleteCriteria" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar criterio</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p class="lead my-3">¿Está seguro de eliminar el criterio?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, cancelar</button>
        <form id="formDelete" action="" method="post">
          @csrf
          <input type="hidden" name="_method" value="delete">
          <input type="hidden" name="incentive" value="{{request('incentive')}}">
          <input type="hidden" name="call" value="{{request('call')}}">
          <button type="submit" class="btn btn-danger">Si, eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
