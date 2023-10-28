<?php
require "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM registros";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = "";
        while ($row = $result->fetch_assoc()) {
            $data .= "Nome: " . $row["nome"] . ", Matrícula: " . $row["matricula"] . ", Macro: " . $row["macro"] . ", Hora: " . $row["hora"] . "\n";
        }

        // Gere um arquivo PDF (exemplo simples)
        file_put_contents("registro_jornada.pdf", $data);

        echo "Jornada encerrada e dados salvos em registro_jornada.pdf";
    } else {
        echo "Nenhum registro encontrado.";
    }
}
?>
