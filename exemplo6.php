<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">📦 Relatório de Estoque</h1>

    <?php
    $produtos = [
        "Interruptor" => 3,
        "Tomada" => 12,
        "Cabo Flexível 2.5mm" => 3,
        "Disjuntor" => 7,
        "Sensor de Presença" => 12,
        "Lampada" => 10,
        "Cabo Flexível 1.5mm" => 1,
        "Sensor de Presença" => 2,
        "Botoeira" => 4,
        "QDG" => 31,
    ];

    $estoqueMinimo = 10;
    $soma = array_sum($produtos);
    $media = $soma / count($produtos);

    // Produtos que precisam ser repostos
    $produtos_repor = 0;
    foreach ($produtos as $qtd) {
        if ($qtd < $estoqueMinimo) {
            $produtos_repor++;
        }
    }
    $porcentagem_repor = ($produtos_repor / count($produtos)) * 100;
    ?>

    <!-- Tabela principal de estoque -->
    <h3 class="text-center mb-3">🧾 Situação Atual do Estoque</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Produto</th>
                <th>Estoque</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto => $quantidade): ?>
                <tr>
                    <td><?= htmlspecialchars($produto) ?></td>
                    <td><?= htmlspecialchars($quantidade) ?></td>
                    <td>
                        <?php if ($quantidade < $estoqueMinimo): 
                            $faltando = $estoqueMinimo - $quantidade;
                            $porcentagem = ($faltando / $estoqueMinimo) * 100;
                        ?>
                            <span class="text-danger fw-bold">⚠ Faltam <?= $faltando ?> unidades (<?= round($porcentagem, 1) ?>%)</span>
                        <?php else: ?>
                            <span class="text-success">✔ Estoque OK</span>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <!-- Estatísticas gerais -->
    <div class="alert alert-info text-center my-4">
        <strong>Média das quantidades:</strong> <?= round($media, 2) ?> <br>
        <strong>Reposição necessária em:</strong> <?= round($porcentagem_repor, 2) ?>% dos produtos
    </div>

    <!-- Tabela de produtos que precisam de reposição -->
    <h3 class="text-center mb-3">🔧 Tabela de produtos que precisam de reposição</h3>
    <table class="table table-bordered table-hover">
        <thead class="table-warning">
            <tr>
                <th>Produto</th>
                <th>Faltando</th>
                <th>% para completar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto => $quantidade): ?>
                <?php if ($quantidade < $estoqueMinimo): 
                    $faltando = $estoqueMinimo - $quantidade;
                    $porcentagem = ($faltando / $estoqueMinimo) * 100;
                ?>
                    <tr>
                        <td><?= htmlspecialchars($produto) ?></td>
                        <td><?= $faltando ?></td>
                        <td><?= round($porcentagem, 1) ?>%</td>
                    </tr>
                <?php endif ?>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

</body>
</html>
