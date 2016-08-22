<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Tienda de productos cosméticos</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../public/css/style.css">
	</head>
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
		</div>
		<footer>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
			<script type="text/javascript" src="../public/js/functions.js"></script>
		</footer>
	</body>
</html>