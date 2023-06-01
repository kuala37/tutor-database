<?php
    require_once 'include/db.php';

    $spec = mysqli_query($mysql, "SELECT `компетенция`, `ключевые слова`, `специальность` FROM comp");

    $specs = mysqli_fetch_all($spec,MYSQLI_ASSOC);

    $JS_specs = json_encode($specs);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Тьюториал</title>
  
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">

  <link rel="stylesheet" href="css/style.css">
  <link href="css/asd.css" rel="stylesheet">

</head>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.php"><img src="images/log_tut.png" alt="logo"/></a>
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
              <img src="images/user_an.png" alt="user_an"/>
              <span class="nav-profile-name"><?=$_COOKIE['user']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <?php
             if($_COOKIE['user'] ==''):
            ?>
              <a href="login.php" class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Вход
              </a>
              <a href="registration.php" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Регистрация
              </a>
              <?php else:?>
                <a href="form_valid/exit.php" class="dropdown-item">
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
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Личный кабинет</span>
            </a>
          </li>
          
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
            <a class="nav-link" href="pages/icons/mdi.html">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">Успеваемость</span>
            </a>
          </li>
          <?php if($_COOKIE['user_admin'] == '1' && $_COOKIE['user'] !=''):?>
            <li class="nav-item">
            <a class="nav-link" href="pages/database/database.php">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">База данных</span>
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
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-lg-3 col-md-12 col-sm-12 cl1">
                <h3 class="text-center">Выбор компетенции</h3>
                <form  action="index2.php">
                  <div class="">
                    <p><?=$_COOKIE['user']?></p>
                    <p>Курс: 2</p>
                    <p>Номер академ группы 1095</p>
                    <p>Специальность:
                    <input  style="width: 100%; font-size: 1rem;" class="form-control-lg text-center" list="datalistOptions" onchange='get_data1(this.value,<?=$JS_specs?>)' id="exampleDataList" placeholder="Выберите">
                    <datalist id="datalistOptions" >
                      <option value="09.03.01 Программирование">
                      <option value="11.03.01 Радиотехника">
                      <option value="51.04.01 Культурология">
                      <option value="40.03.01 Юриспруденция"> 
                    </datalist>
                    </p>
                    Ключевые слова
                    <input type="text"style="width: 100%; font-size: 1rem;" id="search" class="form-control-lg text-center" onchange='get_data2(this.value,<?=$JS_specs?>)' placeholder="Введите значение" >
                    <p><br>Тьютор:  Руденко К. А.</p>
                    <input type="button" value="выбрать компетенцию" style="width: 100%;margin-bottom:26%; margin-top:15%;" onclick="">
                  </div>
                </form>

            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 desc cl1">
                <h1 class="text-center">Компетенции</h1>
                
                  <div id="laging">

                  </div>

                  <div class="pagination" id="pagination-container">
                    
              <!-- Здесь будут добавляться кнопки страниц -->
                    </div>
            </div>
          </div>
          
          
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022 <a href="#" target="_blank"></a>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <script src="js/java.js"></script>
  <script src="vendors/base/vendor.bundle.base.js"></script>

  <script src="js/template.js"></script>
  <script>

    // Создаем новый объект XMLHttpRequest
var xhr = new XMLHttpRequest();

// Указываем метод запроса и URL для отправки запроса
xhr.open("GET", "count-rows.php", true);

// Определяем обработчик события загрузки
function show1(arr, currentPage, totalPages) {
  let pageSize = 10;
  var start = (currentPage - 1) * pageSize;
  var end = start + pageSize;
  var x = document.getElementById("laging");
  x.innerHTML = ""; // Очистить содержимое перед выводом новой страницы
  for (var i = start; i < Math.min(end, arr.length); i++) {
    // Ваш код для вывода компетенций
    x.innerHTML += "<input type='radio' name='check_comp'>"+   arr[i]['компетенция']+ ": " + 
    "<div id='raz'><span>подробнее</span>  <div>Студент должен знать <br><br><br><br> Студент долженть уметь<br><br><br><br> Студент владеть</div>  </div>" +
    "<br><br>" 
    ;
  }

  
    const paginationContainer = document.getElementById("pagination-container");

    var paras = document.getElementsByClassName('page-btn');
  while(paras[0]) {
        paras[0].parentNode.removeChild(paras[0]);
    }



// Определите максимальное число кнопок страниц, которые вы хотите показать на экране
const maxVisibleButtons = 3; // Здесь можно настроить количество видимых кнопок страниц


// Вычислите начальную и конечную страницы для отображения
let startPage = Math.max(currentPage - Math.floor(maxVisibleButtons / 2), 1);
let endPage = startPage + maxVisibleButtons - 1;



// Убедитесь, что конечная страница не превышает общего числа страниц
if (endPage > totalPages) {
  endPage = totalPages;
  startPage = Math.max(endPage - maxVisibleButtons + 1, 1);
}
console.log(totalPages - currentPage)

if (currentPage >= 3 ) {
      var firstPageButton = document.createElement("button");
      firstPageButton.onclick = function(){
      this.remove();
      console.log(this);
      show1(<?=$JS_specs?>,1,totalPages);
    };
    firstPageButton.textContent = String(1);
    firstPageButton.classList.add("page-btn");
    paginationContainer.appendChild(firstPageButton);
  }


// Создайте кнопки страниц и добавьте их в контейнер
for (let page = startPage; page <= endPage; page++) {
  const button = document.createElement("button");
  button.onclick = function(){
    show1(<?=$JS_specs?>,page,totalPages);
    
  };
  button.textContent = page;
  button.classList.add("page-btn");
  
  if (page === currentPage) {
    button.classList.add("active");
  }
  
  paginationContainer.appendChild(button);
}


// Добавьте кнопку "Последняя страница"
const lastPageButton = document.createElement("button");
lastPageButton.onclick = function(){
  show1(<?=$JS_specs?>,totalPages,totalPages);
};
lastPageButton.textContent = String(totalPages);
lastPageButton.classList.add("page-btn");
paginationContainer.appendChild(lastPageButton);

}
xhr.onload = function() {
  if (xhr.status === 200) {
    // Получаем ответ от сервера
    var response = xhr.responseText;
    
    // Обрабатываем полученное значение (предполагая, что сервер возвращает число строк)
    var count = parseInt(response);
    
    // Далее можно выполнить необходимые действия с полученным количеством строк
    var totalPages = Math.ceil(count/10);
    console.log("Количество строк: " + count);

    
    // Получите ссылку на контейнер кнопок страниц
  const paginationContainer = document.getElementById("pagination-container");

  var paras = document.getElementsByClassName('page-btn');
  
  show1(<?=$JS_specs?>,1,totalPages);

  var paras = document.getElementsByClassName('page-btn');
  while(paras[0]) {
      paras[0].parentNode.removeChild(paras[0]);
  }

  // Определите максимальное число кнопок страниц, которые вы хотите показать на экране
  const maxVisibleButtons = 3; // Здесь можно настроить количество видимых кнопок страниц

  // Определите текущую активную страницу (например, из URL-параметров или другого источника)
  const currentPage = 1; // Здесь предполагается, что у вас есть значение для текущей активной страницы

  // Вычислите начальную и конечную страницы для отображения
  let startPage = Math.max(currentPage - Math.floor(maxVisibleButtons / 2), 1);
  let endPage = startPage + maxVisibleButtons - 1;

  // Убедитесь, что конечная страница не превышает общего числа страниц
  if (endPage > totalPages) {
    endPage = totalPages;
    startPage = Math.max(endPage - maxVisibleButtons + 1, 1);
  }



  // Создайте кнопки страниц и добавьте их в контейнер
  for (let page = startPage; page <= endPage; page++) {
    const button = document.createElement("button");
    button.onclick = function(){
      show1(<?=$JS_specs?>,page,totalPages);
      
    };
    button.textContent = page;
    button.classList.add("page-btn");
    
    if (page === currentPage) {
      button.classList.add("active");
    }
    
    paginationContainer.appendChild(button);
  }


  // Добавьте кнопку "Последняя страница"
  var lastPageButton = document.createElement("button");
  lastPageButton.onclick = function(){
    this.remove();
    console.log(this);
    show1(<?=$JS_specs?>,totalPages,totalPages);
  };
  lastPageButton.textContent = String(totalPages);
  lastPageButton.classList.add("page-btn");
  paginationContainer.appendChild(lastPageButton);
    }
};

xhr.send();

</script>
</body>

</html>

