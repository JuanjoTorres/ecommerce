<!DOCTYPE html>
<html>
	<!-- INCLUDE BLOCK : head -->
	<body>
		<!-- INCLUDE BLOCK : menu -->
		<div class="container">
			<div class="row" id="table">
				<div class="">
					<form method="POST">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Fecha de la compra</th>
									<th>Cliente</th>
								</tr>
							</thead>
							<tbody>
								<!-- START BLOCK : order_row -->
									<tr>
										<th scope="row">{counter}</th>
										<td>{date_order}</td>
										<td>{customer_order}</td>
									</tr>
								<!-- END BLOCK : order_row -->
							</tbody>
						</table>
					</form>
				</div>
				<!-- INCLUDE BLOCK : alerts -->
			</div>
		</div>
		<!-- INCLUDE BLOCK : footer -->
	</body>
</html>