<?php
class TaskAssignment{
	private $minAssign; // pessoas associadas as tarefas
	private $minCost;	// menor custo

	// executa algoritmo
	public function start($matrix)
	{
		$this->minCost = PHP_INT_MAX;
		for($i=0; $i<count($matrix); $i++){
			$this->minAssign[$i] = PHP_INT_MAX;
		}
		$assoc = array();
		$this->branchAndBound($matrix, $assoc, 0);

		return $this->minAssign;
	}

	// calculo as soluções utilizando branch and bound
	public function branchAndBound($matrix, $assoc, $relCost)
	{
		if( (count($this->minAssign) == count($assoc)) && ($relCost < $this->minCost))
		{
			for($b=0; $b<count($this->minAssign); $b++){
				$this->minAssign[$b] = $assoc[$b];
			}
			$this->minCost = $relCost;
		}
		else{
			for($c = 0; $c < count($matrix); $c++)
			{
				if( ($this->verify($assoc, $c)) && ($relCost + $matrix[count($assoc)][$c] < $this->minCost))
				{
					$index = count($assoc);
					array_push($assoc, $c);
					$this->branchAndBound($matrix, $assoc, ($relCost+$matrix[$index][$c]));
					unset($assoc[$index]);
					$assoc = array_values($assoc);
				}
			}
		}
	}

	//  verifico se a pessoa já existe no array
	public function verify($assoc, $col)
	{
		foreach($assoc as $a)
		{
			if($a == $col) return false;
		}
		return true;
	}

	public function getBestSolution(){
		return $this->minCost;
	}

	public function getBestState()
	{
		return $this->minAssign;
	}
}

echo "<br><br>";
$costs = $_POST['works'];

$obj = new TaskAssignment;
$obj->start($costs);

echo "A melhor solução para o problema é:<br>";
foreach($obj->getBestState() as $key => $item):
	echo "Funcionário ".$key." fará a <b>Tarefa ".$item."</b><br>";
endforeach;
echo "O custo total será de: <b>".$obj->getBestSolution()."</b>";
?>
