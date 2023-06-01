<!DOCTYPE html>
<html>
<head>
    <title>Таблица Competition</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>/* Стилизация таблицы */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead th {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: left;
        }

        .table tbody td {
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .table tbody td.selected {
            max-width: none;
            white-space: normal;
            overflow: visible;
            text-overflow: unset;
            background-color: #c8e6c9;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-danger:hover,
        .btn-danger:focus {
            color: #fff;
            background-color: #bd2130;
            border-color: #b21f2d;
        }

        .editable-cell {
            position: relative;
        }

        .editable-cell:hover {
            background-color: #f5f5f5;
        }

        .editable-cell [contenteditable="true"] {
            outline: none;
        }

        .save-button {
            display: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('table').on('input', '.editable-cell', function() {
                var saveButton = $(this).find('.save-button');
                if (saveButton.length === 0) {
                    $(this).append('<button class="save-button btn btn-sm btn-primary">Сохранить</button>');
                }
                $(this).find('.save-button').show();
            });
            var selectedRow = null;

            $('table').on('dblclick', 'tbody td', function() {
                var clickedCell = $(this);
                var isSelected = clickedCell.hasClass('selected');

                $('table tbody tr').removeClass('selected');
                $('table tbody td').removeClass('selected');

                if (!isSelected) {
                    clickedCell.addClass('selected');
                    clickedCell.closest('tr').addClass('selected');
                }
            });

            $('table').on('click', '.save-button', function() {
                var cell = $(this).closest('.editable-cell');
                var id = cell.data('id');
                var column = cell.data('column');
                var value = cell.text().replace('Сохранить', '').trim();

                $.ajax({
                    url: 'update.php',
                    method: 'POST',
                    data: {
                        id: id,
                        column: column,
                        value: value
                    },
                    success: function(response) {
                        if (response === 'success') {var value = cell.text().replace('Сохранить', '').trim();
                            cell.find('.save-button').remove();
                        } else {
                            alert('Ошибка при сохранении данных.');
                        }
                    }
                });
            });
            // Поиск по введенному слову
            $('#search-button').click(function() {
                var searchKeyword = $('#search-input').val();
                if (searchKeyword !== '') {
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {
                            keyword: searchKeyword
                        },
                        success: function(response) {
                            $('tbody').html(response);
                        }
                    });
                }
            });
                // Сброс поиска
            $('#clear-search').click(function() {
                location.reload();
            });

            $('#add-column').click(function() {
                var columnName = prompt('Введите название нового столбца:');
                if (columnName !== null && columnName !== '') {
                    $.ajax({
                        url: 'add_column.php',
                        method: 'POST',
                        data: {
                            column: columnName
                        },
                        success: function(response) {
                            if (response === 'success') {
                                location.reload();
                            } else {
                                alert('Ошибка при добавлении столбца.');
                            }
                        }
                    });
                }
            });

            $('#add-row').click(function() {
                $.ajax({
                    url: 'add_row.php',
                    method: 'POST',
                    success: function(response) {
                        if (response === 'success') {
                            location.reload();
                        } else {
                            alert('Ошибка при добавлении строки.');
                        }
                    }
                });
            });

            $('.delete-column').click(function() {
                var columnName = $(this).data('column');
                if (confirm('Вы уверены, что хотите удалить столбец "' + columnName + '"?')) {
                    $.ajax({
                        url: 'delete_column.php',
                        method: 'POST',
                        data: {
                            column: columnName
                        },
                        success: function(response) {
                            if (response === 'success') {
                                location.reload();
                            } else {
                                alert('Ошибка при удалении столбца.');
                            }
                        }
                    });
                }
            });

            $('.delete-row').click(function() {
                console.log(123);
                var rowId = $(this).data('id');
                if (confirm('Вы уверены, что хотите удалить строку с ID ' + rowId + '?')) {
                    $.ajax({
                        url: 'delete_row.php',
                        method: 'POST',
                        data: {
                            id: rowId
                        },
                        success: function(response) {
                            if (response === 'success') {
                                location.reload();
                            } else {
                                alert('Ошибка при удалении строки.');
                            }
                        }
                    });
                }
            });
        });
    </script>
</head>
<body>

    <?php if($_COOKIE['user_admin'] == '1' && $_COOKIE['user'] !=''):?>
    <div class="container">
        <h1>Таблица Competition</h1>

        <table class="table">
        <div class="mb-2">
            <button id="add-column" class="btn btn-primary mr-2">Добавить столбец</button>
            <button id="add-row" class="btn btn-primary">Добавить строку</button>
        </div>
        <div class="mb-2">
            <input id="search-input" type="text" placeholder="Введите слово для поиска">
            <button id="search-button" class="btn btn-primary ml-2">Поиск</button>
            <button id="clear-search" class="btn btn-secondary ml-2">Сбросить</button>
        </div>
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

            // Получение списка столбцов таблицы competition
            $columnsQuery = "SHOW COLUMNS FROM comp";
            $columnsResult = mysqli_query($connection, $columnsQuery);

            $columns = array();
            while ($column = mysqli_fetch_assoc($columnsResult)) {
                $columns[] = $column['Field'];
            }

            // Запрос на получение данных из таблицы competition
            $query = "SELECT * FROM comp";
            $result = mysqli_query($connection, $query);

            // Вывод заголовков таблицы
            echo "<thead>";
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<th>";
                if ($column === 'id') {
                    // Исключаем редактирование колонки с id
                    echo $column;
                } else {
                    echo $column;
                    echo "<button class='delete-column btn btn-sm btn-danger ml-2' data-column='$column'>Удалить столбец</button>";
                }

                echo "</th>";
                
            }
            echo "<th>Действия</th>"; // Добавляем столбец для кнопок "Сохранить" и "Удалить"
            echo "</tr>";
            echo "</thead>";
            
            // Вывод данных в таблицу
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($columns as $column) {
                    if ($column === 'id') {
                        // Исключаем редактирование колонки с id
                        echo "<td>" . $row[$column] . "</td>";
                    } else {
                        echo "<td class='editable-cell' data-id='" . $row['id'] . "' data-column='$column' contenteditable='true'>" . $row[$column] . "</td>";
                    }
                }

                echo "<td>";
                echo "<button class='delete-row btn btn-sm btn-danger ml-2' data-id='" . $row['id'] . "'>Удалить строку</button>";
                echo "</td>";

                echo "</tr>";
            }

            // Закрытие соединения с базой данных
            mysqli_close($connection);
            ?>
        </table>
    </div>
    <?php endif;?>
</body>
</html>
