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
			<h1>Assignment Problem - Associação de Tarefas</h1>
		</div>
		<div class="col-lg-12">
			<h2>Formulário de itens</h2>
			<form class="form-inline">
				<div class="form-group">
					<label for="Funcionários">Número de Funcionários</label>
					<input type="text" class="form-control" id="numPerson" placeholder="Número de Funcionários">
				</div>
				<div class="form-group">
					<label for="Tarefas">Número de Tarefas</label>
					<input type="text" class="form-control" id="numJobs" placeholder="Número de Tarefas">
				</div>
			  <button type="button" class="btn btn-default" id="generateForm">Gerar Formulário</button>  <button type="button" class="btn btn-danger" id="reset">Resetar Tudo</button>
			</form>
		</div>
	</div>
</div>

<div class="container">
	<div class="row" id="appendForm">

	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-12" id="result-div"></div>
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
	var block = 0;

	$('#reset').click(function(event) {
		location.reload();
	});
	$('#generateForm').click(function(event) {
		var numJobs, numPerson;
		numJobs 	= $('#numJobs').val();
		numPerson 	= $('#numPerson').val();

		if(numPerson != numJobs){
			alert('Os valores devem ser iguais');
			return;
		}

		if(block == 0){
			if(numJobs != '' || numPerson != ''){
				for(var i=0; i<numPerson; i++){
					var col = $('<div class="col-lg-2">').appendTo('#appendForm');
					col.append('<h4>Funcionário '+i+'</h4>');
					for(var j=0; j<numJobs; j++){
						var x = document.createElement("input");
						x.setAttribute("type", "text");
						x.setAttribute("class", "form-control");
						x.setAttribute("id", "job"+i+j);
						x.setAttribute("placeholder", "Custo da Tarefa - "+j);
						col.append('<div class="form-group">');
						col.append('<label for="Tarefa">Custo da Tarefa '+j+'</label>');
						col.append(x);
						col.append('</div>');
					}
					$('#appendForm').append('</div>');
				}
				var col = $('<div class="col-lg-12">').appendTo('#appendForm');
				col.append('<br><br>');
				var result = document.createElement("button");
				result.setAttribute("type", "button");
				result.setAttribute("class", "btn btn-default");
				result.setAttribute("id", "result");
				result.onclick = function() {
					var works = [];
					for(var i=0; i<numPerson; i++)
					{
						works.push([]);

						for(var j=0; j<numJobs; j++)
						{
							works[i].push($('#job'+i+j).val());
						}
					}
					console.log(works);
					$.post('assignment-ajax.php', {works: works, numJobs:numJobs, numPerson:numPerson}, function(data, textStatus, xhr) {
						$('#result-div').html(data);
					}, "html");
				};
				var t = document.createTextNode("Gerar Resultado");
				result.appendChild(t);
				col.append(result);
				col.append('</div>');
				block = 1;
			}
		}else{
			alert("Para gerar um novo formulário, resete o atual antes.");
		}
	});


</script>
</body>
</html>