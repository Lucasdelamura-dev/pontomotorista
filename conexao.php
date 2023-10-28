
<?php
$host = "monorail.proxy.rlwy.net";
$port = 52283;
$username = "root";
$password = "ebA1gb5DAdbhc14afdbCcgdCFdg4G1gE";
$database = "railway";

// Estabeleça a conexão
$conn = new mysqli($host, $username, $password, $database, $port);


// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Defina o conjunto de caracteres para UTF-8 (opcional)
if (!$conn->set_charset("utf8")) {
    echo "Erro ao definir o conjunto de caracteres: " . $conn->error;
    exit;
}
?>
