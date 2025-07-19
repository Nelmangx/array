<?php
    //Cátalogo de livros.

    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $valorL = $_POST["valor"];
    $quantidadeL = $_POST["quantidade"];
    $totalEstante = null;
    $estate = 
    [
        "Harry Potter e a pedra filosofal" => 40,
        "Harry Potter e a camera secreta" => 50,
        "Harry Potter e o prisioneiro de askaban" => 60,
        "Harry Potter e o cálice de fogo" => 70,
        "Harry Potter e a orden da fênix" => 80,
        "Harry Potter e o enigma do principe" => 90,
        "Harry Potter e as relíquias da morte" => 100
    ];

    foreach($estate as $livro => $valor) {//adicionando novo item na ESTANTE
        $estate[$titulo] = $valorL;
    }
  

    foreach ($estate as $livro => $valor) {
        echo "<ul>";
        echo "<li> $livro - $valor R$</li>";
        echo "</ul>";
        $totalEstante += $valor;
        
        
    }
    echo "<ul>";
    echo "<li>Sua estatante custou: $totalEstante R$</li>";
    echo "</ul>";



    //ORGANIZANDO OS LIVROS EM UMA TABELA.
    echo "<h2>Organizando a estante em uma tabela</h2>";

    $estoqueProdutos = 
        [
            "Harry Potter e a pedra filosofal" => 40,
            "Harry Potter e a camera secreta" => 60,
            "Harry Potter e o prisioneiro de askaban" => 15,
            "Harry Potter e o cálice de fogo" => 37,
            "Harry Potter e a orden da fênix" => 30,
            "Harry Potter e o enigma do principe" => 20,
            "Harry Potter e as relíquias da morte" => 10
        ];
    $estoqueMinimo = 10;

    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<thead><tr><th>Produto</th><th>Estoque</th><th>Status</th></tr></thead>";
    echo "<tbody>";
        foreach($estoqueProdutos as $produto => $quantidade) {//adicionando novo item na tabela
            $estoqueProdutos[$titulo] = $quantidadeL ;
        }
        foreach($estoqueProdutos as $produto => $quantidade) {//adicionando novo item na tabela
            $estoqueProdutos[$titulo] = $valorL ;
        }

    foreach ($estoqueProdutos as $produto => $quantidade) {
        $estoqueProdutos[$titulo] = $valorL ;
        echo "<tr>";
        echo "<td>" . htmlspecialchars($produto) . "</td>";
        echo "<td>" . htmlspecialchars($quantidade) . "</td>";
        
        echo "<td>";
        if ($quantidade < $estoqueMinimo) {
            echo "<span class='warning'>⚠ Repor estoque</span>";
        } else {
            echo "Estoque OK";
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    ?>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 20px;
            background-color: #f4f7f6;
            color: #333;
            line-height: 1.6;
        }
        h1, h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e9e9e9;
        }
        .warning {
            color: #e74c3c;
            font-weight: bold;
        }
        ul {
            list-style-type: disc;
            padding-left: 25px;
            margin-bottom: 20px;
        }
        hr {
            border: 0;
            height: 1px;
            background-color: #ddd;
            margin: 20px 0;
        }
    </style>