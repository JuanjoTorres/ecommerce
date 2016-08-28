<nav class="navbar navbar-light bg-faded m-b-2">
	<a class="navbar-brand" href="showcase.php">Roser</a>
	<div class="pull-xs-right">
		<ul class="nav nav-inline m-r-2">
			<li class="nav-item">
				<p class="text-muted m-b-0">Bienvenido administrador</p>
			</li>
			<!-- START BLOCK : search_item -->
				<li class="nav-item">
					<form class="form-inline">
						<input class="form-control" type="text" id="searching-item" placeholder="Search your product!" onkeyup="find_item()"></input>
					</form>
				</li>
			<!-- END BLOCK : search_item -->

			<!-- START BLOCK : search_user -->
				<li class="nav-item">
					<form class="form-inline">
						<input class="form-control" type="text" id="searching-user" placeholder="Search your client!" onkeyup="find_user()"></input>
					</form>
				</li>
			<!-- END BLOCK : search_user -->
			<li class="nav-item">
				<div class="btn-group">
					<button type="button" class="btn btn-secondary">A</button>
					<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
				  	<div class="dropdown-menu">
				    	<a class="dropdown-item" href="shopping-list.php">Añadir item</a>
				    	<a class="dropdown-item" href="shopping-list.php">Historial de ventas</a>
				    	<div class="dropdown-divider"></div>
				    	<a class="dropdown-item" href="user-list.php">Lista de usuarios</a>
				    	<div class="dropdown-divider"></div>
				    	<a class="dropdown-item" href="sign-out.php">Cerrar sesión</a>
				  	</div>
				</div>
				<a href="#" role="button" class="btn btn-info">Añadir Item</a>
			</li>
		</ul>
	</div>
</nav>