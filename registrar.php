<?php
require "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"]) && isset($_POST["matricula"]) && isset($_POST["macro"])) {
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $macro = $_POST["macro"];
    $hora = date("H:i:s");

    $sql = "INSERT INTO registros (nome, matricula, macro, hora) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $matricula, $macro, $hora);

    if ($stmt->execute()) {
        echo "Registro salvo com sucesso!";
    } else {
        echo "Erro ao salvar o registro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Campos não preenchidos corretamente.";
}
?>
