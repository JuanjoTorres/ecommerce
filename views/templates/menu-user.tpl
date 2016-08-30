<nav class="navbar navbar-light bg-faded m-b-2">
	<a class="navbar-brand" href="showcase.php">Roser</a>
	<div class="pull-xs-right">
		<ul class="nav nav-inline m-r-2">
			<li class="nav-item">
				<p class="text-muted m-b-0">Bienvenido cliente</p>
			</li>
			<!-- NEW BLOCK : search_item -->
				<li class="nav-item">
					<form class="form-inline">
						<input class="form-control" type="text" id="searching-item" placeholder="Search your product!" onkeyup="find_item()"></input>
					</form>
				</li>
			<!-- END BLOCK : search_item -->
			<li class="nav-item">
				<div class="btn-group">
					<button type="button" class="btn btn-secondary">A</button>
					<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
				  	<div class="dropdown-menu">
				    	<a class="dropdown-item" href="user-profile.php">Perfil</a>
				    	<a class="dropdown-item" href="shopping-list.php">Mirar en la cesta</a>
				    	<div class="dropdown-divider"></div>
				    	<a class="dropdown-item" href="sign-out.php">Cerrar sesión</a>
				  	</div>
				</div>
				<a href="#" role="button" class="btn btn-info">Carrito</a>
			</li>
		</ul>
	</div>
</nav>