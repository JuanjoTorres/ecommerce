<!DOCTYPE html>
<html>
	<!-- INCLUDE BLOCK : head -->
	<body>
		<!-- INCLUDE BLOCK : menu -->
		<div class="container-fluid">
			<div class="row" id="table">
				<div class="col-xs-8 offset-xs-2">
					<form method="POST">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nickname</th>
									<th>Contraseña</th>
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>Email</th>
									<th>Permisos</th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody id="users-rows">
								<!-- START BLOCK : user_row -->
									<tr>
										<th scope="row">{counter}</th>
										<td>{id_user}</td>
										<td>{password_user}</td>
										<td>{first_name_user}</td>
										<td>{last_name_user}</td>
										<td>{email_user}</td>
										<td>{permission_user}</td>
										<td><button type="submit" name="{id_user}_change" class="btn btn-secondary">Cambiar rol</button></td>
										<td><button type="submit" name="{id_user}_modify" class="btn btn-secondary">Editar</button></td>
										<td><button type="submit" name="{id_user}_delete" class="btn btn-warning">Banear</button></td>
									</tr>
								<!-- END BLOCK : user_row -->
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
		<!-- INCLUDE BLOCK : alerts -->
		<!-- INCLUDE BLOCK : footer -->
	</body>
</html>