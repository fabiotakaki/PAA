<?php
function encode($symb2freq) {
	$heap = new SplPriorityQueue; // Instancia fila de prioridades utilizando max heap.
	$heap->setExtractFlags(SplPriorityQueue::EXTR_BOTH); // define o modo de extração no caso extrai array com a prioridade
	foreach ($symb2freq as $sym => $wt)
		$heap->insert(array($sym => ''), -$wt);

	while ($heap->count() > 1) {
		$lo = $heap->extract(); // extraio o minimo
		$hi = $heap->extract(); // extraio o minimo
		foreach ($lo['data'] as &$x)
			$x = '0'.$x;
		foreach ($hi['data'] as &$x)
			$x = '1'.$x;
		$heap->insert($lo['data'] + $hi['data'], $lo['priority'] + $hi['priority']);
	}
	$result = $heap->extract();
	return $result['data'];
}

$txt = $_POST['text'];
$symb2freq = array_count_values(str_split($txt)); //crio o array com as letras e suas respectivas frequencias.


$huff = encode($symb2freq);

echo "<table class='table table-hover'>";
echo "<thead><tr><th>Símbolo</th><th>Quantidade</th><th>Código de Huffman</th></tr></thead>";
echo "<tbody>";
foreach ($huff as $sym => $code)
	echo "<tr><td>".$sym."</td><td>".$symb2freq[$sym]."</td><td>".$code."</td></tr>";
echo "</tbody>";
echo "</table><hr>";
?>