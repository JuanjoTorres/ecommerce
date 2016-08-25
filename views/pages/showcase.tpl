<!DOCTYPE html>
<html>
	<!-- INCLUDE BLOCK : head -->
	<body>
		<!-- INCLUDE BLOCK : menu -->
		<div class="container">
			<div class="row" id="cards">
				<!-- START BLOCK : card -->
				<div class="col-xs-4">
					<div class="card">
						<img class="card-img-top" src="{card_image}" alt="Card Image">
						<div class="card-block">
							<div class="card-title">
								<div class="pull-xs-right">
									<h4 class="text-muted">{card_price}€</h4>
								</div>
								<h4 class="card-title">{card_name}</h4>
							</div>
							<p class="card-text">{card_description}</p>
							<div class="text-xs-center">
								<a class="btn btn-success " href="#">Buy</a>
							</div>
						</div>
					</div>
				</div>
				<!-- END BLOCK : card -->
			</div>
			<div class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" data-dismiss="modal">
								<span>&times;</span>
							</button>
							<h4 class="modal-title">Auntenticación</h4>
						</div>
						<div class="modal-body">
							
						</div>
						<div class="modal-footer">
							<button class="btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- INCLUDE BLOCK : footer -->
	</body>
</html>