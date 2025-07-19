<?php
$produtos = [
    "Interruptor" => 3,
    "Tomada" => 10,
    "Cabo Flexível 2.5mm" => 3,
    "Disjuntor" => 10,
    "Sensor de Presença" => 12,
];

$estoqueMinimo = 10;

// Média dos produtos
$soma = array_sum($produtos);
$quantidade = count($produtos);
$media = $soma / $quantidade;

echo "<h2>A média das quantidades é: " . round($media, 2) . "</h2>";

// Porcentagem dos produtos abaixo do mínimo
$produtos_repor = 0;
foreach ($produtos as $qtd) {
    if ($qtd < $estoqueMinimo) {
        $produtos_repor++;
    }
}
$porcentagem_repor = ($produtos_repor / count($produtos)) * 100;
echo "<h2>É necessário repor o estoque de " . round($porcentagem_repor, 2) . "% dos produtos.</h2>";

// Tabela de produtos
echo "<table>";
echo "<thead><tr><th>Produto</th><th>Quantidade</th><th>Status</th></tr></thead>";
echo "<tbody>";

foreach ($produtos as $produto => $quantidade) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($produto) . "</td>";
    echo "<td>" . htmlspecialchars($quantidade) . "</td>";
    
    echo "<td>";
    if ($quantidade < $estoqueMinimo) {
        $faltando = $estoqueMinimo - $quantidade;
        $porcentagem = ($faltando / $estoqueMinimo) * 100;
        echo "<span class='warning'>⚠ Faltam $faltando unidades ($porcentagem%)</span>";
    } else {
        echo "Estoque completo";
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
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
</style>
