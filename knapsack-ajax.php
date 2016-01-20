<?php
// parametros da função: pesos, valores, quantidade de itens, capacidade da mochila
function knapsack($p, $v, $n, $c)
{
	for($j = 0; $j < $n; $j++) // percorro todos os itens.
	{
		if($p[$j] <= $c){ // se for menor que a capacidade então o objeto cabe por inteiro.
			$x[$j] = 1;
			$c -= $p[$j];
		}else{ // se for maior que a capacidade eu divido a capacidade pelo peso do item para saber o quanto cabe.
			$x[$j] = $c/$p[$j];
			$c = 0; // após isso mochila não cabe mais nada.
		}
	}
	return $x; // retorno o array de valores dos itens
}

$items = $_POST['items'];
$weight = $_POST['weights'];
$values = $_POST['values'];
$capacity = $_POST['weightBag'];

$result = knapsack($weight, $values, sizeof($values), $capacity);

# Exibe o Resultado
echo "<table class='table table-hover'>";
echo "<thead><tr><th>Item</th><th>Valor</th><th>Peso</th><th>Porcentagem</th></tr></thead>";
$totalVal = $totalWt = $total = 0;
echo "<tbody>";
foreach($result as $key => $f) {
	$totalVal += $values[$key];
	$totalWt += $weight[$key];
	$total  += $values[$key]*$f;
	echo "<tr><td>".$items[$key]."</td><td>".$values[$key]."</td><td>".$weight[$key]."</td><td>".($f*100)."%</td></tr>";
}
echo "<tr><td align=right><b>Total</b></td><td>".$totalVal."</td><td>".$totalWt."</td><td>".$total." ( Valor * Porcentagem )</td></tr>";
echo "</tbody>";
echo "</table><hr>";
?>