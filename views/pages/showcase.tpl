<!DOCTYPE html>
<html>
	<!-- INCLUDE BLOCK : head -->
	<body id="showcase">
		<!-- INCLUDE BLOCK : menu -->
		<div class="container">
			<div class="row" id="cards">
				<!-- START BLOCK : card -->
				<div class="col-xs-4">
					<div class="card">
						<img class="card-img-top card_image" src="{card_image}" alt="Card Image">
						<div class="card-block">
							<div class="card-title">
								<div class="pull-xs-right">
									<h4 class="text-muted card_price">{card_price}€</h4>
								</div>
								<h4 class="card-title card_name">{card_name}</h4>
							</div>
							<p class="card-text card_description">{card_description}</p>
							<!-- START BLOCK : item_accept -->
								<div class="text-xs-center">
									<button id="{card_code}" class="btn btn-success to-car">Buy</button>
								</div>
							<!-- START BLOCK : item_accept -->
							<!-- START BLOCK : item_options -->
								<div class="text-xs-right">
									<button class="btn btn-secondary edit_item" name="{id_item}_modify" data-toggle="modal" data-target="#item-modal">Editar</button>
									<form method="POST">
										<button class="btn btn-warning" name="{id_item}_delete">Eliminar</button>
									</form>
								</div>
							<!-- START BLOCK : item_options -->
						</div>
					</div>
				</div>
				<!-- END BLOCK : card -->
			</div>
			<div id="item-modal" class="modal fade">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						      <span aria-hidden="true">&times;</span>
						    </button>
						    <h4 class="modal-title">Inventario</h4>
						</div>
						<form method="POST" enctype="multipart/form-data">
							<div class="modal-body">
						    	<div class="container-fluid">
						    		<div class="form-group row">
							    		<div class="col-sm-6">
							    			<label for="item_name" class="form-control-label">Nombre</label>
							    			<input type="text" class="form-control" name="item_name" id="item-name" required>
							    		</div>
							    		<div class="col-sm-6">
							    			<label for="item_price" class="form-control-label">Precio</label>
							    			<div class="input-group">
							    				<input type="text" class="form-control" name="item_price" id="item-price" required>
							    				<div class="input-group-addon">€</div>
							    			</div>
							    		</div>
							    	</div>
							    	<div class="form-group row">
							    		<div class="col-xs-12">
							    			<label for="item_description" class="form-control-label">Descripción</label>
								    		<textarea class="form-control" name="item_description" id="item-description" required></textarea>
								    	</div>
							    	</div>
							    	<div class="form-group row">
							    		<div class="col-xs-6">
								    		<label class="custom-file">
												<input type="file" name="item_image" class="custom-file-input" id="item-image">
												<span class="custom-file-control"></span>
											</label>
										</div>
										<div class="col-xs-6">
											<div id="item-thumbnail" style="width:70px;height:70px;background-size:100% 100%;">		
											</div>
										</div>
							    	</div>
							    	<input type="hidden" name="is-in-there" id="item-check">
						    	</div>
							</div>
							<div class="modal-footer">
							    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							    <button type="submit" name="item_accept" class="btn btn-primary">Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- INCLUDE BLOCK : alerts -->
		</div>
		<!-- INCLUDE BLOCK : footer -->
	</body>
</html>