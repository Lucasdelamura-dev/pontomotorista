<!DOCTYPE html>
<html>
<head>
    <title>Registro de Hora</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/c:\xampp\htdocs\PontoMB\package.json"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="text"] {
            width: 80%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        label[for="matricula"] {
            margin-top: 20px;
        }

        .macro-options {
            margin-top: 20px;
        }

        .macro-options label {
            display: inline-block;
            margin-right: 15px;
            cursor: pointer;
        }

        .macro-options label:hover {
            background-color: #007bff;
            color: #fff;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #0056b3;
        }

        #registro-status {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Registro de Hora</h1>
    <form id="registro-form">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula" required><br><br>
        <div>
            <label>Selecione a Macro:</label>
            <input type="radio" id="macro1" name="macro" value="Macro 1">
            <label for="macro1">Macro 1</label>
            <input type="radio" id="macro2" name="macro" value="Macro 2">
            <label for="macro2">Macro 2</label>
            <!-- Adicione mais opções de macro conforme necessário -->
        </div>
        <br>
        <button type="button" id="registrar-btn">Registrar Hora</button>
    </form>
    <br><br>
    <button type="button" id="encerrar-jornada-btn">Encerrar Jornada</button>
    <div id="registro-status"></div>
    <script>
        $(document).ready(function () {
            $("#registrar-btn").on("click", function () {
                var nome = $("#nome").val();
                var matricula = $("#matricula").val();
                var macro = $("input[name='macro']:checked").val();

                $.ajax({
                    url: "registrar.php",
                    method: "POST",
                    data: { nome: nome, matricula: matricula, macro: macro },
                    success: function (response) {
                        $("#registro-status").html(response);
                    },
                });
            });

            $("#encerrar-jornada-btn").on("click", function () {
                $.ajax({
                    url: "encerrar_jornada.php",
                    method: "POST",
                    success: function (response) {
                        $("#registro-status").html(response);
                    },
                });
            });
        });
    </script>
</body>
</html>
