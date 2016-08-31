<!DOCTYPE html>
<html>
	<!-- INCLUDE BLOCK : head -->
	<body id="sign-in">
		<!-- INCLUDE BLOCK : menu -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 offset-sm-9 m-t-2">
					<div class="card card-block">
						<form method="POST">
							<div class="form-group row">
								<div class="col-sm-12">
									<label for="nickname">Nickname</label>
									<input type="text" name="nickname" class="form-control" placeholder="Nickname">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<label for="password">Contraseña</label>
									<input type="password" name="password" class="form-control" placeholder="Contraseña">
								</div>
							</div>
							<div class="text-xs-right">
								<button type="submit" name="sign-in" class="btn btn-primary">Aceptar</button>
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