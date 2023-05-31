<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение параметров страницы и размера
$page = $_GET['page'];
$pageSize = $_GET['size'];

// Рассчитываем смещение для выборки компетенций
$offset = ($page - 1) * $pageSize;

// Запрос к базе данных для получения компетенций соответствующей страницы
$sql = "SELECT * FROM компетенции LIMIT $offset, $pageSize";
$result = $conn->query($sql);

// Создание массива для хранения компетенций
$competencies = array();

// Проверка и обработка результата запроса
if ($result->num_rows > 0) {
    // Цикл по каждой строке результата
    while ($row = $result->fetch_assoc()) {
        // Добавляем компетенцию в массив
        $competency = array(
            'код компетенции' => $row['код_компетенции'],
            'расшифровка' => $row['расшифровка']
            // Добавьте другие поля компетенции, если необходимо
        );
        $competencies[] = $competency;
    }
}

// Формируем массив данных для отправки в формате JSON
$response = array(
    'competencies' => $competencies
);

// Отправка данных в формате JSON
header('Content-Type: application/json');
echo json_encode($response);

// Закрытие соединения с базой данных
$conn->close();
?>
