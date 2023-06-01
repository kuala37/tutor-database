<?php
// Подключение к базе данных и другие необходимые настройки
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'myfirstdb';

$connection = mysqli_connect($host, $username, $password, $database);
// Получение ключевого слова для поиска из POST-запроса
$keyword = $_POST['keyword'];

// Формирование SQL-запроса для поиска строк по ключевому слову
$query = "SELECT * FROM comp";

if (!empty($keyword)) {
    $escapedKeyword = mysqli_real_escape_string($connection, $keyword);
    $query .= " WHERE ";

    // Получение информации о столбцах таблицы
    $result = mysqli_query($connection, "SELECT * FROM comp LIMIT 1");
    $fields = mysqli_fetch_fields($result);
    $columnNames = array();

    foreach ($fields as $field) {
        $fieldName = $field->name;
        $columnNames[] = $fieldName;
    }

    $conditions = array();
    foreach ($columnNames as $columnName) {
        $conditions[] = "`$columnName` LIKE '%$escapedKeyword%'";
    }

    $query .= implode(" OR ", $conditions);
}

$result = mysqli_query($connection, $query);

if ($result) {

    // Вывод данных в таблицу
   
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $fieldName => $value) {
            if ($fieldName === 'id') {
                echo "<td>$value</td>"; // Исключаем редактирование колонки с id
            } else {
                echo "<td class='editable-cell' data-id='" . $row['id'] . "' data-column='$fieldName' contenteditable='true'>$value</td>";
            }
        }
        echo "<td>";
        echo "<button class='delete-row btn btn-sm btn-danger ml-2' data-id='" . $row['id'] . "'>Удалить строку</button>";
        echo "</td>";
        echo "</tr>";
    }
   
} else {
    echo "error";
}
?>