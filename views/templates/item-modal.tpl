<!-- START BLOCK : item-modal -->
	<div id="item-modal" class="modal fade">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				      <span aria-hidden="true">&times;</span>
				    </button>
				    <h4 class="modal-title">Inventario</h4>
				</div>
				<div class="modal-body">
				    <form method="POST">
				    	<div class="form-group row">
				    		<div class="col-sm-6">
				    			<label for="item_name" class="form-control-label">Nombre</label>
				    			<input type="text" class="form-control" name="item_name">
				    		</div>
				    		<div class="col-sm-6">
				    			<label for="item_price" class="form-control-label">Precio</label>
				    			<div class="input-group">
				    				<input type="number" class="form-control" name="item_name">
				    				<div class="input-group-addon">€</div>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="form-group row">
				    		<label for="item_description" class="form-control-label">Descripción</label>
				    		<textarea class="form-control" name="item_description"></textarea>
				    	</div>
				    	<div class="form-group row">
				    		<label for="item_image" class="form-control-label">Imagen</label>
				    		<label class="custom-file">
								<input type="file" name="item_image" class="custom-file-input">
							<span class="custom-file-control"></span>
							</label>
				    	</div>
				    </form>
				</div>
				<div class="modal-footer">
				    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				    <button type="submit" name="item_accept" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>
<!-- END BLOCK : item-modal -->