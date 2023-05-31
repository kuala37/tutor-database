
<?php
    require_once '../../../include/db.php';

  header("Access-Control-Allow-Orign: *");

    $student =mysqli_query($mysql,"SELECT
    users.`name` AS 'name',
    users.`admin` AS 'admin',
    users.`id` AS 'id'
    FROM `users`");

    $students = mysqli_fetch_all($student,MYSQLI_ASSOC);
    $JS_students = json_encode($students);
    
?>


<!DOCTYPE html>
<html lang="en"> 

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../../vendors/base/vendor.bundle.base.css">
  <link href="../../../css/bootstrap.min.css" rel="stylesheet">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../css/style.css">
  <link href="../../../css/asd.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- endinject -->
  <style>
.add{
  background-color: #93ff93;

}

.remove{
  background-color: #fa8072;
}
table {
  border-collapse: collapse;
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
  table-layout: fixed;
  
}

.hed{
  resize:horizontal;
}
.fot{
  resize:none;
}

table td,
table th {
  border: 1px solid #ddd;
  padding: 8px;
  
  word-break: break-all;
  direction: ltr;
  resize: both;
  overflow: auto;
  min-width: 10%;
  min-height: 10%;

}

table th {
  text-align: left;
  direction: ltr;
  background-color: #f2f2f2;
}

table td:hover {
  background-color: #f2f2f2;
}

.table-controls {
  margin: 16px 0;
  display: flex;
  justify-content: space-between;
}

.table-controls button {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  cursor: pointer;
  border-radius: 4px;
}

.table-controls button:hover {
  background-color: #3e8e41;
}


.table-input {
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 8px;
  width: 100%;
  max-width: 100px;
  box-sizing: border-box;
}

.table-input:focus {
  outline: none;
  border-color: #4CAF50;
}
    </style>
</head>

<body >
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="../../../index.php"><img src="../../../images/log_tut.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Поиск" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown mr-1">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-message-text mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Сообщение</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="images/user_an.png" alt="images/user_an.png" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">Руденко Ксения
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Передайте в группу...
                  </p>
                </div>
              </a>

              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="images/user_an.png" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal"> Фекличев Егор
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Привет можешь сд...
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Уведомление</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="mdi mdi-information mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Ваш дневник одобрили</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    кликните что бы перейти
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="mdi mdi-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Ошибка заполнения</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                  кликните что бы перейти
                  </p>
                </div>
              </a>
              
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../../images/user_an.png" alt="user_an"/>
              <span class="nav-profile-name"><?=$_COOKIE['user']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <?php
             if($_COOKIE['user'] ==''):
            ?>
              <a href="../../../login.php" class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Вход
              </a>
              <a href="../../../registration.php" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Регистрация
              </a>
              <?php else:?>
                <a href="../../../form_valid/exit.php." class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Выход
              </a>
              <?php endif;?>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div style="padding-top: 5px;" class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Личный кабинет</span>
            </a>
          </li>
          <?php if($_COOKIE['user_admin'] == '0'):?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-spellcheck menu-icon"></i>
              <span class="menu-title">активности</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Курсы</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Мероприятия</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/activities/act.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Дневник</span>
            </a>
          </li>



          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Таблицы</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/tables/src/tables.php">Создание</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#edit-table">Редактирование</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">Успеваемость</span>
            </a>
          </li>
          <?php else:?>
            <li class="nav-item">
            <a class="nav-link" href="pages/students/student.php">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Студенты</span>
            </a>
          </li>
          <?php endif;?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-magnify menu-icon"></i>
              <span class="menu-title">Прочее</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> текст </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> текст </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> текст </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> текст  </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> текст </a></li>
              </ul>
            </div>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
              <i class="mdi mdi-help-circle menu-icon"></i>
              <span class="menu-title">Частые вопросы</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="container">
      <textarea style="margin-top: 10px" placeholder="Название таблицы"></textarea>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            <div style="width: 1000px;" class="container">
            
                 <table id="myTable">
      <thead>
        <tr>
          <th></th>
          <th class="add" onclick="addColumn()">+</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="add" onclick="addRow()">+</td>
          <td contenteditable="true">
            Ячейка 1
            <div class="resize" onmousedown="startResize(event)"></div>
          </td>
        </tr>
      </tbody>
    </table>
    
            </div>
            </div>
          </div>
        </div>
        <button>Сохранить</button>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script>
      var table = document.getElementById('myTable');
      var resizeCell = null;
      var originalX = null;

      function addRow() {
        var numRows = table.rows.length;
        var numCols = table.rows[0].cells.length;
        var newRow = table.insertRow(1);
        for (var i = 0; i < numCols; i++) {
          var newCell = newRow.insertCell(i);
          if (i == 0) {
            newCell.innerHTML = '<td class="remove" onclick="removeRow(this)">-</td>';
          } else {
            newCell.innerHTML = 'Новая ячейка';
            newCell.contentEditable = true;
            newCell.addEventListener('mousedown', function (e) {
              resizeCell = this;
              originalX = e.pageX;
            });
          }
        }
      }

      function removeRow(cell) {
        var rowIndex = cell.parentNode.rowIndex;
        table.deleteRow(rowIndex);
      }

      function addColumn() {
        var numRows = table.rows.length;
        for (var i = 0; i < numRows; i++) {
          var newCell = table.rows[i].insertCell(-1);
          if (i == 0) {
            newCell.innerHTML = '<th class="remove" onclick="removeColumn(this)">-</th>';
          } else {
            newCell.innerHTML = 'Новая ячейка';
            newCell.contentEditable = true;
            newCell.addEventListener('mousedown', function (e) {
              resizeCell = this;
              originalX = e.pageX;
            });
          }
        }
      }

      function removeColumn(cell) {
        var colIndex = cell.cellIndex;
        var numRows = table.rows.length;
        for (var i = 0; i < numRows; i++) {
          table.rows[i].deleteCell(colIndex);
        }
      }

      function startResize(e) {
        e.preventDefault();
        resizeCell = e.target.parentNode;
        originalX = e.pageX;
        window.addEventListener('mousemove', doResize);
        window.addEventListener('mouseup', stopResize);
      }

      function doResize(e) {
        var width = resizeCell.offsetWidth;
        var newX = e.pageX;
        var delta = newX - originalX;
        var newWidth = width + delta;
        resizeCell.style.width = newWidth + 'px';
        originalX = newX;
      }

      function stopResize(e) {
        window.removeEventListener('mousemove', doResize);
        window.removeEventListener('mouseup', stopResize);
      }
    </script>
  <script src="../../../js/tables.js"></script>
  <script src="../../../js/java.js"></script>
  <script src="../../../vendors/base/vendor.bundle.base.js"></script>

  <script src="../../../js/template.js"></script>
</body>

</html>

