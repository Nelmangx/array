<?php




$produtos = [
    "Interruptor" => 3,
    "Tomada" => 12,
    "Cabo Flexível 2.5mm" => 3,
    "Disjuntor" => 7,
    "Sensor de Presença" => 12,
];

$estoqueMinimo = 10;

$soma = array_sum($produtos);
$quantidade = count($produtos);
$media = $soma / $quantidade;


$produtos_repor = 0;
foreach ($produtos as $qtd) {
    if ($qtd < $estoqueMinimo) {
        $produtos_repor++;
    }
}
$porcentagem_repor = ($produtos_repor / count($produtos)) * 100;


echo <<<CSS
<style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #444;
        padding: 10px 15px;
        text-align: left;
    }
    thead th {
        background-color: #333;
        color: #fff;
    }
    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tbody tr:hover {
        background-color: #d0e7ff;
    }
    .warning {
        color: #b33;
        font-weight: bold;
    }
    h2 {
        text-align: center;
        font-family: Arial, sans-serif;
        margin-top: 30px;
    }
</style>
CSS;

echo "<table>";
echo "<thead><tr><th>Produto</th><th>Estoque</th><th>Status</th></tr></thead>";
echo "<tbody>";

foreach ($produtos as $produto => $quantidade) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($produto) . "</td>";
    echo "<td>" . htmlspecialchars($quantidade) . "</td>";

    echo "<td>";
    if ($quantidade < $estoqueMinimo) {
        $faltando = $estoqueMinimo - $quantidade;
        $porcentagem = ($faltando / $estoqueMinimo) * 100;
        echo "<span class='warning'>⚠ Faltam $faltando unidades (" . round($porcentagem, 1) . "%)</span>";
    } else {
        echo "Estoque OK";
    }
    echo "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

echo "<h2>A média das quantidades é: " . round($media, 2) . "</h2>";
echo "<h2>É necessário repor o estoque de " . round($porcentagem_repor, 2) . "% dos produtos.</h2>";


/*  */

echo "<table>";
echo "<thead><tr><th>Repor estoque</th><th>Estoque</th><th>Status</th></tr></thead>";
echo "<tbody>";

foreach ($produtos as $produto => $quantidade) {
     if($quantidade<= $estoqueMinimo){
    echo "<tr>";
    echo "<td>" . htmlspecialchars($produto) . "</td>";
    echo "<td>" . htmlspecialchars($quantidade) . "</td>";

    echo "<td>";
    if ($quantidade < $estoqueMinimo) {
        $faltando = $estoqueMinimo - $quantidade;
        $porcentagem = ($faltando / $estoqueMinimo) * 100;
        echo "<span class='warning'>⚠ Faltam $faltando unidades (" . round($porcentagem, 1) . "%)</span>";
    } else {
        echo "Estoque OK";
    }
    echo "</td>";
    echo "</tr>";
}
}

echo "</tbody>";
echo "</table>";