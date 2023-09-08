<div class="modal fade" id="modalLogout" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">¿Estas listo para salir?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Selecciona "Cerrar sesión" si estas seguro de finalizar la sesión actual</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form method="post" action="{{ route('logout') }}" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-primary">Cerrar sesión</button>
        </form>
      </div>
    </div>
  </div>
</div>
