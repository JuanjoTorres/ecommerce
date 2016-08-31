<!DOCTYPE html>
<html>
	<!-- INCLUDE BLOCK : head -->
	<body>
		<!-- INCLUDE BLOCK : menu -->
		<div class="container">
			<div id="table" class="row">
				<div class="col-xs-8 offset-xs-2">
					<table class="table table-hover">
						<thead>
							<tr>
								<th></th>
								<th>#</th>
								<th>Nombre</th>
								<th>Precio</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<!-- START BLOCK : item_row -->
								<tr>
									<td scope="row">
										<img src="{image_item}" alt="Imagen del item" style="width:50px;height:50px;">
									</td>
									<th>{code_item}</th>
									<td>{name_item}</td>
									<td class="price-item">{price_item}</td>
									<td>
										<button type="button" class="close delete-item" aria-label="Close">
  											<span aria-hidden="true">&times;</span>
										</button>
									</td>
								</tr>
							<!-- END BLOCK : item_row -->
						</tbody>
					</table>
				</div>	
			</div>
			<div class="row">
				<div class="col-xs-4 offset-xs-6">
					<ul class="list-group">
					  	<li class="list-group-item list-group-item-action">
					    	<span class="tag tag-default tag-pill pull-xs-right total-price"></span>
					    	Total:
					  	</li>
					</ul>
				</div>
			</div>
			<!-- INCLUDE BLOCK : alerts -->
		</div>
		<!-- INCLUDE BLOCK : footer -->
	</body>
</html>