<!DOCTYPE html>
<html>
	<!-- INCLUDE BLOCK : head -->
	<body>
		<!-- INCLUDE BLOCK : menu -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 offset-sm-4 m-t-2">
					<div class="card card-block">
						<form method="POST">
							<div class="form-group row">
								<div class="col-sm-6">
									<label for="nickname">Nickname</label>
									<input type="text" name="nickname" class="form-control" placeholder="Nickname">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label for="password">Contraseña</label>
									<input type="password" name="password" class="form-control" placeholder="Contraseña">
								</div>
								<div class="col-sm-6">
									<label for="rpassword">Repita la contraseña</label>
									<input type="password" name="rpassword" class="form-control" placeholder="**********">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label for="first-name">Nombre</label>
									<input type="text" name="first_name" class="form-control" placeholder="Nombre">
								</div>
								<div class="col-sm-6">
									<label for="last-name">Apellidos</label>
									<input type="text" name="last_name" class="form-control" placeholder="Apellidos">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label for="email">Email</label>
									<input type="email" name="email" class="form-control" placeholder="Email">
								</div>
							</div>
							<div class="text-xs-right">
								<button type="submit" name="sign-up" class="btn btn-primary">Aceptar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- INCLUDE BLOCK : alerts -->
			<!-- INCLUDE BLOCK : footer -->
		</div>
	</body>
</html>