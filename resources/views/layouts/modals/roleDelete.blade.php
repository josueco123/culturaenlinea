<div class="modal fade" id="modalRoleDelete" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar el rol</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p class="lead my-3">¿Está seguro de eliminar rol?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, cancelar</button>
        <form id="formDelete" action="" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="delete">
          <button type="submit" class="btn btn-danger">Si, eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
