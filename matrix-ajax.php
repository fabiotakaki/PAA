<?php

	function recursiveMatrixChain($p, $i, $j)
	{
		if($i == $j) return 0;
		$m[$i][$j] = PHP_INT_MAX; //infinito
		for($k=$i; $k<=$j-1;){
			$q = recursiveMatrixChain($p, $i, $k) + recursiveMatrixChain($p, $k+1, $j) + $p[$i-1]*$p[$k]*$p[$j];
			if($q < $m[$i][$j]){
				$m[$i][$j] = $q;
			}
		}
		return $m[$i][$j];
	}

	// Matriz tem dimensão p[i-1] por p[i] de i até n
	function MatrixChainOrder($p)
	{
	 	$n = count($p);

	    /*
	       m[i][j] é o número mínimo de multiplicações escalares para computar a matriz
	       A[i]A[i+1]...A[j] = A[i..j] onde a dimensão de A[i] é p[i-1] x p[i]
	    */

	    // o custo é zero quando multiplicamos 1 matriz
	    for ($i = 1; $i < $n; $i++) $m[$i][$i] = 0;

	    // L é o tamanho da cadeia
	    for ($L=2; $L<$n; $L++)
	    {
	        for ($i=1; $i<=$n-$L+1; $i++)
	        {
	            $j = $i+$L-1;
	            $m[$i][$j] = PHP_INT_MAX;
	            for ($k=$i; $k<=$j-1; $k++)
	            {
	                // q = custo/multiplicações escalares
	                $q = $m[$i][$k] + $m[$k+1][$j] + $p[$i-1]*$p[$k]*$p[$j];
	                if ($q < $m[$i][$j]) $m[$i][$j] = $q;
	            }
	        }
	    }
	    return $m[1][$n-1];
	}


	$p = $_POST['p'];
	$items = $_POST['items'];
	$m = MatrixChainOrder($p);
	echo "O mínimo de multiplicações necessárias para chegar a solução é: <b>".$m."</b>";
?>