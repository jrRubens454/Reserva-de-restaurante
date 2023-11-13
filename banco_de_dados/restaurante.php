<<?php 
<?php
$servername = "Login";
$username = "scarlet";
$password = "122523";
$dbname = "MYsql://localhost3000";


$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sqlCreateDB) === TRUE) {
    echo "Banco de dados criado com sucesso!";
} else {
    echo "Erro ao criar o banco de dados: " . $conn->error;
}

$conn->select_db($dbname);

$sqlCreateTableUsuario = "CREATE TABLE IF NOT EXISTS usuario (
    id_usuario INT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(20),
    senha VARCHAR(20)
)";
if ($conn->query($sqlCreateTableUsuario) === TRUE) {
    echo "Tabela 'usuario' criada com sucesso!";
} else {
    echo "Erro ao criar a tabela 'usuario': " . $conn->error;
}

$sqlCreateTableReserva = "CREATE TABLE IF NOT EXISTS reserva (
    id_reserva INT PRIMARY KEY,
    id_usuario INT,
    mesa INT,
    data_hora DATETIME,
    numero_pessoas INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
)";
if ($conn->query($sqlCreateTableReserva) === TRUE) {
    echo "Tabela 'reserva' criada com sucesso!";
} else {
    echo "Erro ao criar a tabela 'reserva': " . $conn->error;
}

$conn->close();
?>
<?php
include 'conexao.php';

$sql = "SELECT * FROM reserva";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID Reserva</th>
                <th>ID Usuário</th>
                <th>Mesa</th>
                <th>Data e Hora</th>
                <th>Número de Pessoas</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_reserva"] . "</td>
                <td>" . $row["id_usuario"] . "</td>
                <td>" . $row["mesa"] . "</td>
                <td>" . $row["data_hora"] . "</td>
                <td>" . $row["numero_pessoas"] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Nenhuma reserva encontrada.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>


?>