<html>
<head>
	<title>Trabalho Algoritmos Gulosos e Programação Dinâmica</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- mobile -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php">PAA</a>
						</div>

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Página Inicial <span class="sr-only">(current)</span></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Algoritmos <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="assignment.php">Assignment Problem</a></li>
										<li><a href="huffman.php">Huffman</a></li>
										<li><a href="knapsack.php">Fractional Knapsack Problem</a></li>
										<li><a href="knapsack01.php">Knapsack Problem - Mochila 0-1</a></li>
										<li><a href="subsequence.php">Longest Common Subsequence</a></li>
										<li><a href="matrix.php">Matrix Chain Multiplication</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
			<div class="col-lg-12 info">
				<h1>Projeto e Análise de Algoritmos</h1>
				<h3>Prof. Danilo Eler</h3>
				<h4>Fábio da Silva Takaki</h4>
				<h4>Thaís Rolón</h4>
				<h4>Laércio</h4>
			</div>
			<div class="col-lg-12 text-right info">
				<h4>Background: Flickr - Max Rive</h4>
			</div>
		</div>
	</div>
</header>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>KnapSack - Problema da Mochila 01</h1>
		</div>
		<div class="col-lg-6">
			<h2>Formulário de itens</h2>
			<form>
				<div class="form-group">
					<label for="Nome">Nome</label>
					<input type="text" class="form-control" id="name" placeholder="Nome do Item">
				</div>
				<div class="form-group">
					<label for="Peso">Peso</label>
					<input type="text" class="form-control" id="weight" placeholder="Peso do Item">
				</div>
				<div class="form-group">
					<label for="Valor">Valor</label>
					<input type="text" class="form-control" id="value" placeholder="Valor">
				</div>
				<button type="button" class="btn btn-default" id="add">Adicionar Item</button>
				<button type="button" class="btn btn-danger" id="reset">Resetar Tudo</button>
			</form>
		</div>
		<div class="col-lg-6">
			<h2>Tabela de Itens</h2>
			<table class="table table-hover">
				<thead>
					<th>#</th>
					<th>Nome</th>
					<th>Peso</th>
					<th>Valor</th>
				</thead>
				<tbody id="items"></tbody>
			</table>
		</div>

		<div class="col-lg-12">
			<h2>Resultado</h2>
			<form class="form-inline">
				<div class="form-group">
					<label for="PesoMochila">Mochila</label>
					<input type="text" class="form-control" id="weightBag" placeholder="Peso da Mochila">
				</div>
				<button type="button" class="btn btn-success" id="calculate">Calcular</button>
			</form>
			<div id="result"></div>
		</div>
	</div>
</div>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<p>&copy; Copyright 2016 - Projeto e Análise de Algoritmos.</p>
			</div>
		</div>
	</div>
</footer>

<script type="text/javascript" src="assets/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
	var name, weight, value, i=1, items = [], weights = [], values = [], weightBag;

	$('#add').click(function(event) {
		name 	= $('#name').val();
		weight 	= $('#weight').val();
		value 	= $('#value').val();
		$('#items').append(
					'<tr>\
						<td>'+i+'</td>\
						<td>'+name+'</td>\
						<td>'+weight+'</td>\
						<td>'+value+'</td>\
					</tr>');

		items.push(name);
		weights.push(weight);
		values.push(value);
		i++;
	});

	$('#calculate').click(function(event) {
		weightBag = $('#weightBag').val();
		$.post('knapsack01-ajax.php', {items: items, weights:weights, values:values, weightBag: weightBag}, function(data, textStatus, xhr) {
			$('#result').html(data);
		}, "html");
	});

	$('#reset').click(function(event) {
		location.reload();
	});

</script>
</body>
</html>