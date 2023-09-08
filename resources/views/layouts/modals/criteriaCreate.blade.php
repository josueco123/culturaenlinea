<div class="modal fade" id="modalCreateCriteria" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear criterio</h4>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
				<form class="" action="{{ route('backend.criteria.create') }} " method="post">
				  @csrf
				  <input type="hidden" name="incentive" value="{{request('incentive')}}">
				  <input type="hidden" name="call" value="{{request('call')}}">
            <div class="row">
  					  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
  						  <div class="form-group m-0">
  							  <label for="name">Nombre <span class="text-danger">*</span> </label>
  							  <input type="text" class="form-control ml-3 mr-3" name="name" placeholder="Nombre" required="" />
  						  </div>
  					  </div>
  					  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
  						  <div class="form-group m-0">
  							  <label for="description">Descripción <span class="text-danger">*</span> </label>
                  <textarea class="form-control ml-3 mr-3" rows="5" name="description" id="comment" placeholder="Descripción" required=""></textarea>
  						  </div>
  					  </div>

  					  <div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field">
  						  <div class="form-group m-0">
  							  <label for="value">Puntos <span class="text-danger">*</span> </label>
  							  <input type="number" min="0" max="100" class="form-control ml-3 mr-3" name="value" placeholder="Puntos" required="" />
  						  </div>
  					  </div>

  						<div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 form-field modal-footer text-right">
  							  <button type="submit" class="btn btn-primary float-right"> Crear criterio </button>
  						</div>
            </div>
				</form>

		  </div>
		</div>
    </div>
</div>
