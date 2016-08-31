<nav class="navbar navbar-light bg-faded m-b-2">
	<a class="navbar-brand" href="showcase.php">Roser</a>
	<div class="pull-xs-right">
		<ul class="nav nav-inline m-r-2">
			<li class="nav-item">
				<p class="text-muted m-b-0">Bienvenido cliente</p>
			</li>
			<!-- START BLOCK : search_item -->
				<li class="nav-item">
					<form class="form-inline">
						<input class="form-control" type="text" id="searching-item" placeholder="Search your product!" onkeyup="find_item(1)">
					</form>
				</li>
			<!-- END BLOCK : search_item -->
			<li class="nav-item">
				<div class="btn-group">
					<button type="button" class="btn btn-secondary"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i></button>
					<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
				  	<div class="dropdown-menu">
				  		<a class="dropdown-item" href="showcase.php">Expositor</a>
				    	<a class="dropdown-item" href="user-profile.php">Perfil</a>
				    	<a class="dropdown-item" href="shopping-list.php">Mirar en la cesta</a>
				    	<div class="dropdown-divider"></div>
				    	<a class="dropdown-item" href="sign-out.php">Cerrar sesión</a>
				  	</div>
				</div>
				<!-- START BLOCK : btn_car -->
				<a href="shopping-list.php" role="button" class="btn btn-info">Carrito</a>
				<!-- END BLOCK : btn_car -->
				<!-- START BLOCK : btn_buy -->
				<form id="inline" method="POST">
					<button type="submit" name="buy_order" class="btn btn-info">Comprar</button>
				</form>
				<!-- END BLOCK : btn_buy -->
			</li>
		</ul>
	</div>
</nav>