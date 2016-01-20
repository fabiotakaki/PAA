<?php

	$x = str_split($_POST['x']);
	$y = str_split($_POST['y']);

	function subsequence($x, $y)
	{
		// pego quantidade de letras de cada array
		$m = count($x);
		$n = count($y);

		//inicializo os arrays de resultado
		$c = array();
		$b = array();

		// incializo o array C
		for($i=1; $i<=$m; $i++) $c[$i][0] = 0;
		for($j=1; $j<=$n; $j++) $c[0][$j] = 0;

		for($i=1; $i<=$m; $i++)
		{
			for($j=1; $j<=$n; $j++)
			{
				if($x[$i] == $y[$j]){
					$c[$i][$j] = $c[$i-1][$j-1] + 1;
					$b[$i][$j] = "\\";
				}
				elseif($c[$i-1][$j] >= $c[$i][$j-1]){
					$c[$i][$j] = $c[$i-1][$j];
					$b[$i][$j] = "|";
				}
				else{
					$c[$i][$j] = $c[$i][$j-1];
					$b[$i][$j] = "<-";
				}
			}
		}

		$result = array();
		array_push($result, $c);
		array_push($result, $b);

		# Exibe tabela de setas
		/*echo "<table class='table table-hover'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>&nbsp;</th>";
		echo "<th>y[j]</th>";
		for($i=0; $i<=count($y); $i++){
			echo "<th>";
			echo $y[$i];
			echo "</th>";
		}
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		for($f=0; $f<=count($x); $f++){

			echo "<tr>";
			if($f == 0) echo "<th>x[i]</th>";
			else{
				echo "<th>";
				echo $x[$f - 1];
				echo "</th>";
			}
			for($j=0; $j<count($b[$i]); $j++)
			{
				echo "<th>";
				echo $c[$f][$j]." ".$b[$f][$j];
				echo "</th>";
			}
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table><hr>";*/

		return $result;
	}

	function printLCS($b, $x, $i, $j)
	{
		if($i == 0 || $j == 0) return;
		if($b[$i][$j] == "\\"){
			printLCS($b, $x, $i-1, $j-1);
			echo $x[$i];
		}
		elseif($b[$i][$j] == "|") printLCS($b, $x, $i-1, $j);
		else printLCS($b, $x, $i, $j-1);
	}

	$result = subsequence($x, $y);

	echo "A maior sequência comum encontrada é: <b>";
	printLCS($result[1], $x, count($x), count($y)); echo "</b>";


?>