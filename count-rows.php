<?php
// Подключение к базе данных
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'myfirstdb';

$connection = mysqli_connect($host, $username, $password, $database);

// Проверка подключения
if (mysqli_connect_errno()) {
    echo "Ошибка подключения к базе данных: " . mysqli_connect_error();
    exit();
}

// Запрос на подсчет количества строк
$query = "SELECT COUNT(*) as count FROM comp";
$result = mysqli_query($connection, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    echo $count;
} else {
    echo "error";
}

// Закрытие соединения с базой данных
mysqli_close($connection);
?>
