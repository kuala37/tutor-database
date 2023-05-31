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

// Получение ID строки для удаления
$id = $_POST['id'];

// Формирование SQL-запроса для удаления строки
$query = "DELETE FROM comp WHERE id = $id";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "success";
} else {
    echo "error";
}

// Закрытие соединения с базой данных
mysqli_close($connection);
?>
