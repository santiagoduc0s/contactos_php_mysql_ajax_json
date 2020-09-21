<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="UTF-8">
	<title>Contactos</title>
</head>

<body>
	<section class="container">
		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-dark bg-dark">
					<a class="navbar-brand">Lista de contactos</a>
					<div class="form-inline">
						<input 
							id="texSearch" 
							class="form-control mr-sm-2" 
							type="text" 
							placeholder="Buscar" 
                            aria-label="Search"
                        >
					</div>
				</nav>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col col-md-12">
				<div>
					<table id="tblContact" class="table table-sm">
						<thead>
							<tr>
								<th scope="col" class="table-success">#</th>
								<th scope="col" class="table-success">Nombre</th>
								<th scope="col" class="table-success">Apellido</th>
								<th scope="col" class="table-success">Teléfono</th>
								<th scope="col" class="table-success">Email</th>
							</tr>
						</thead>
						<tbody id="rowsContact">
							<!-- data -->
						</tbody>
					</table>
					<div id="respuesta"></div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
	<script type="text/javascript" src="js/buscarPorTexto.js"></script>
</body>

</html>