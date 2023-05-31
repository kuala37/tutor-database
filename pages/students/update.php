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

// Проверка, были ли переданы данные через POST-запрос
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['column']) && isset($_POST['value'])) {
    $id = $_POST['id'];
    $column = $_POST['column'];
    $value = $_POST['value'];

    // Запрос на обновление данных
    $updateQuery = "UPDATE comp SET `$column`='$value' WHERE id=$id";
    if (mysqli_query($connection, $updateQuery)) {
        echo 'success';
    } else {
        echo 'error';
    }
}

// Закрытие соединения с базой данных
mysqli_close($connection);
?>
