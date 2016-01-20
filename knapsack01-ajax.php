<?php
// parametros: peso, valores, quantidade de itens distintos, capacidade da mochila e os itens (nomes).
function knapsack01($p, $v, $n, $c, $x)
{
	//Gero a tabela !!

	for($i=0; $i<= $n; $i++)
	{
		for($w=0; $w <= $c; $w++)
		{
			$selected[$i][$w] = 0; // array que gera a tabela de 0 e 1
			if($i==0 || $w==0) $t[$i][$w] = 0;
			elseif($p[$i - 1] <= $w)
			{
				$t[$i][$w] = max($v[$i - 1] + $t[$i - 1][$w - $p[$i - 1]], $t[$i - 1][$w]);
				if($v[$i - 1] + $t[$i - 1][$w - $p[$i - 1]] > $t[$i - 1][$w])
					$selected[$i][$w] = 1; // se caso couber outro item, eu indico que ele está na mochila !
			}
			else{
				$t[$i][$w] = $t[$i - 1][$w]; // pego valor anterior pois o item que estamos tentando colocar não coube na mochila !
			}
		}
	}

	//pego itens selecionados
	$items[0] = array();
	$items[1] = array();
	$items[2] = array();
	$solutionWeight = 0;
	$solutionValue = 0;
	$k=$c;
	for($i=$n; $i>=0; $i--)
	{
		if($selected[$i][$k] == 1) // se tiver na mochila, BELESSA !
		{
			array_push($items[0], $x[$i - 1]); // armazeno nome
			array_push($items[1], $p[$i - 1]); // armazeno peso
			array_push($items[2], $v[$i - 1]); // armazeno valor
			$solutionWeight += $p[$i - 1]; // total do peso
			$solutionValue += $v[$i - 1]; // total do valor
			$k = $k - $p[$i - 1]; // subtraio o peso do item pelo total pra saber quanto sobrou !
		}
	}

	// Tabela Knapsack
	// Imprimindo Tabela SOMENTE se a capacidade for menor que 30 ! Para não ter quebra de layout;
	if($c <= 30){
		echo "<h4>Tabela de Knapsack</h4>";
		echo "<table class='table table-hover'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>Itens / Peso</th>";
		for($j=0; $j <= $c; $j++)
		{
			echo "<th>".$j."</th>";
		}
		echo "</tr>";
		echo "</thead>";
		for($i=1; $i<=$n; $i++)
		{
			echo "<tr>";
			echo "<td>".$x[$i-1]."</td>";
			for($j=0; $j <= $c; $j++)
			{
				echo "<td>".$t[$i][$j]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	// Tabela de 0 e 1 pra indicar se há ou não na mochila o item.
	// Imprimindo Tabela SOMENTE se a capacidade for menor que 30 ! Para não ter quebra de layout;
	if($c <= 30){
		echo "<h4>Tabela de Knapsack</h4>";
		echo "<table class='table table-hover'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>Itens / Peso</th>";
		for($j=0; $j <= $c; $j++)
		{
			echo "<th>".$j."</th>";
		}
		echo "</tr>";
		echo "</thead>";
		for($i=1; $i<=$n; $i++)
		{
			echo "<tr>";
			echo "<td>".$x[$i-1]."</td>";
			for($j=0; $j <= $c; $j++)
			{
				echo "<td>".$selected[$i][$j]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	// Imprimindo a Solução !!
	echo "<h4>Solução</h4>";
	echo "<table class='table table-hover'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Item</th>";
	echo "<th>Peso</th>";
	echo "<th>Valor</th>";
	echo "</tr>";
	echo "</thead>";
	$qtdItems = sizeof($items[0]);
	for($i=0; $i<$qtdItems; $i++)
	{
		echo "<tr>";
		echo "<td>".$items[0][$i]."</td>";
		echo "<td>".$items[1][$i]."</td>";
		echo "<td>".$items[2][$i]."</td>";
		echo "</tr>";
	}
	echo "<tr>";
	echo "<th>TOTAL</th>";
	echo "<th>".$solutionWeight."</th>";
	echo "<th>".$solutionValue."</th>";
	echo "</tr>";
	echo "</table>";

	// DEBUG
	/*echo $t[$n][$c];
	echo "<pre>";
	print_r($items);
	echo "</pre>";
	echo "<pre>";
	print_r($selected);
	echo "</pre>";*/



}

//recebo os valores via ajax
$items = $_POST['items'];
$weight = $_POST['weights'];
$values = $_POST['values'];
$capacity = $_POST['weightBag'];

knapsack01($weight, $values, sizeof($values), $capacity, $items);



?>