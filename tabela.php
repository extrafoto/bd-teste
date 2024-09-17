<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados de Clientes</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Lista de Clientes</h1>

    <?php
    // Informações de conexão
    $host = "devotedly-discrete-gator.data-1.use1.tembo.io";
    $dbname = "teste_funcionamento"; // Nome do banco de dados criado anteriormente
    $user = "postgres";
    $password = "uaZ8UZhoFgvcQ2Cd";

    // Conectar ao PostgreSQL
    $conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

    if (!$conn) {
        die("Erro na conexão com o banco de dados.");
    }

    // Consulta SQL para buscar os dados dos clientes
    $query = "SELECT * FROM clientes";
    $result = pg_query($conn, $query);

    if (!$result) {
        echo "Erro na consulta ao banco de dados.";
    } else {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Data de Criação</th></tr>";

        // Exibir os dados da tabela clientes
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['telefone'] . "</td>";
            echo "<td>" . $row['data_criacao'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    // Fechar a conexão
    pg_close($conn);
    ?>

</body>
</html>
