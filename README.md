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