# Projeto e Análise de Algoritmos

Esse trabalho foi desenvolvido para a matéria de PAA, da FCT - UNESP Presidente Prudente.

Os algoritmos desenvolvidos foram:
  - Problema de Associação de Tarefas (Assignment Problem)
  - Codificação de Huffman para compressão de um texto fornecido pelo usuário
  - Problema da Mochila Fracionária (Fractional Knapsack Problem)
  - Problema da Mochila Booleana (mochila 0-1 – em inglês, Knapsack Problem)
  - Problema da Subsequência Comum Máxima (Longest Common Subsequence)
  - Problema da Multiplicação de Cadeia de Matrizes (Matrix Chain Multiplication)

# Problema de Associação de Tarefas (Assignment Problem)
No problema de Associação de Tarefas foi utilizado Programação Dinâmica. Para a solução do algoritmo, foi aplicado a técnica branch and bound, armazenando a configuração e o custo da solução ótima encontrada. O custo é definido com infinito para direcionar uma busca aos estados que apresentam menor custo LOCAL, encontrando sempre ótima soluções, nas quais se forem melhores são substituidas pela anterior para a próxima comparação. Se caso não for melhor, o algoritmo retrocede e continua a busca por melhores valores através da recursividade (branch and bound).

# Knapsack Problem - Problema da Mochila
É um problema de optimização combinatória. O nome dá-se devido ao modelo de uma situação em que é necessário preencher uma mochila com objetos de diferentes pesos e valores. O objetivo é que se preencha a mochila com o maior valor possível, não ultrapassando o peso máximo. Apesar da formulação simples, o problema é um NP-Completo.

# Problema da mochila 0-1
Um ladrão rouba uma loja que contém n itens: o item i tem peso wi e vale vi, ∈ N. Ele quer levar o maior valor possível em uma mochila de carga máxima W. (Por exemplo, ouro em barra).
	Para a resolução do problema é utilizada programação dinâmica, em que são armazenadas soluções para instâncias menores para o problema. É utilizado duas tabelas, sendo uma para armazenar as soluções ótimas para uma instância especifica do problema e a outra para identificar os objetos contidos em cada instância. A cada iteração é verificado se um novo item pode ser incluido na mochila. Ao final do problema é possível achar a instância na qual há o maior valor possível identificando quais itens estão na mochila para chegar a solução ótima.

# Problema da mochila fracionada
Mesmo formulação anterior, mas agora o ladrão pode carregar frações dos itens, ao invés da escolha binária (0-1). (Pense em ouro em pó).
O Problema da mochila fracionada tem solução gulosa porque, em cada iteração, abocanha o objeto de maior valor específico dentre os disponíveis, sem se preocupar com o que vai acontecer depois e o Problema da mochila 0-1 não; O problema da mochila booleana é uma generalização do problema subset-sum, e assim como este, o problema da mochila booleana tem estrutura recursiva e para ser resolvido utilizamos programação dinâmica.
Complexidade do Problema da Mochila Fracionária é O(n) e o Problema da mochila 0-1 pode ser resolvido em tempo O(nW).
O problema consiste em encontrar o percentual de inclusão de cada item da mochila. Inicialmente o algoritmo calcula a razão valor/peso  de todos os itens. A partir desses valores, os itens são ordenados de forma crescente e adicionados na mochila. Por fim, o último item adicionado pode ou não ser adicionado totalmente na mochila, se caso não for possível adicionar totalmente, é adicionado uma parte dele, mostrando a porcentagem do quanto cabe na mochila.