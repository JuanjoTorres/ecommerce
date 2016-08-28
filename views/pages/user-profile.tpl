<!DOCTYPE html>
<html>
	<!-- INCLUDE BLOCK : head -->
	<body>
		<!-- INCLUDE BLOCK : menu -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 offset-sm-4 m-t-2">
					<div class="card">
						<div class="card-header">
							Datos personales
						</div>
						<div class="card-block">
							<form method="POST">
								<div class="form-group row">
									<div class="col-sm-6">
										<label for="user_first_name">Nombre</label>
										<input type="text" name="user_first_name" class="form-control" placeholder="Nombre" value="{user_first_name}">
									</div>
									<div class="col-sm-6">
										<label for="user_last_name">Apellidos</label>
										<input type="text" name="user_last_name" class="form-control" placeholder="Apellidos" value="{user_last_name}">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-6">
										<label for="user_email">Email</label>
										<input type="email" name="user_email" class="form-control" placeholder="Email" value="{user_email}">
									</div>
								</div>
								<div class="text-xs-right">
									<button type="submit" name="user_accept" class="btn btn-primary">Guardar</button>
									<button type="submit" name="user_cancel" class="btn btn-secondary">Cancelar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
				<div class="col-sm-4 offset-sm-4 m-t-2">
					<div class="card">
						<div class="card-header">
							Contraseña
						</div>
						<div class="card-block">
							<form method="POST">
								<div class="form-group row">
									<div class="col-sm-6">
										<label for="old_password">Contraseña antigua</label>
										<input type="password" name="old_password" class="form-control" placeholder="********">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-6">
										<label for="new_password">Contraseña nueva</label>
										<input type="password" name="new_password" class="form-control" placeholder="********">
									</div>
									<div class="col-sm-6">
										<label for="new_rpassword">Contraseña repetir</label>
										<input type="password" name="new_rpassword" class="form-control" placeholder="********">
									</div>
								</div>
								<div class="text-xs-right">
									<button type="submit" name="password_accept" class="btn btn-primary">Guardar</button>
									<button type="submit" name="user_cancel" class="btn btn-secondary">Cancelar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- INCLUDE BLOCK : alerts -->
		<!-- INCLUDE BLOCK : footer -->
	</body>
</html>