<div class="modal fade" id="modalApplicationUpdate" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Actualizar aplicación</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-row">
          <div class="col-12 mb-2 mb-lg-0">
            <div class="form-group">
              <label>Estado</label>
              <select class="form-control" name="app_status">
                @foreach ($statuses as $status)
                  <option value="{{ $status->id }}" {{ $status->id == $application->status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-12 mb-2 mb-lg-0">
            <div class="form-group">
              <label for="type">Título del mensaje</label>
              <input type="text" class="form-control" name="title" placeholder="Título del mensaje">
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-12 mb-2 mb-lg-0">
            <div class="form-group">
              <label>Mensaje</label>
              <textarea id="summernote" class="form-control" name="msg" placeholder="Mensaje para el usuario"></textarea>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-warning">Actualizar</button>
      </div>
    </div>
  </div>
</div>
