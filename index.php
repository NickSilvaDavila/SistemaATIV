<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de salário</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Calculadora de Salário de Vendedor</h2>

<form method="post">
    <label for="nome">Nome do Vendedor:</label>
    <input type="text" id="nome" name="nome" required>
    
    <label for="meta_semanal">Meta Semanal (R$):</label>
    <input type="text" id="meta_semanal" name="meta_semanal" required>
    
    <label for="meta_mensal">Meta Mensal (R$):</label>
    <input type="text" id="meta_mensal" name="meta_mensal" required>
    
    <input type="submit" value="Calcular Salário">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $meta_semanal = floatval($_POST["meta_semanal"]);
    $meta_mensal = floatval($_POST["meta_mensal"]);
    $salario_minimo = 1100; // Exemplo de salário mínimo (pode ser ajustado)

    $valor_sobre_meta_semanal = $meta_semanal * 0.01;
    $valor_excedente_meta_semanal = max(0, $meta_semanal - 20000) * 0.05;
    $valor_excedente_meta_mensal = max(0, $meta_mensal - 80000) * 0.10;

    $salario_final = $salario_minimo + $valor_sobre_meta_semanal + $valor_excedente_meta_semanal + $valor_excedente_meta_mensal;

    echo "<h3>Resultado para $nome:</h3>";
    echo "<p>Salário Final: R$ " . number_format($salario_final, 2, ',', '.') . "</p>";
}
?>
</body>
</html>
