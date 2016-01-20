<?php
	echo "<br><br>";
	$costs = $_POST['works'];
	echo "<pre>";
	print_r($costs);
	echo "</pre>";

	$numJobs = $_POST['numJobs'];
	$numPerson = $_POST['numPerson'];

	function BranchAndBound($matriz, $matrizAux, $nJobs, $nPerson){
		/*$auxCusto = 0;

		for($i=0; $i<$nPerson; $i++)
		{
			for($j=0; $j<$nJobs; $j++)
			{
				$auxCusto += $matriz[$i][$j];
				echo $matriz[$i][$j];
				echo "+";
			}
			echo "=";
			echo $auxCusto;
			echo "<br>";
		}*/
	}
	BranchAndBound($costs, $numJobs, $numPerson);
?>
