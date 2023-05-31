
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <link href="../../css/asd.css" rel="stylesheet">
  <!-- endinject -->
</head>

<body onload=''>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="../../index.php"><img src="../../images/log_tut.png" alt="logo"/></a>
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
              <img src="../../images/user_an.png" alt="user_an"/>
              <span class="nav-profile-name"><?=$_COOKIE['user']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <?php
             if($_COOKIE['user'] ==''):
            ?>
              <a href="../../login.php" class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Вход
              </a>
              <a href="../../registration.php" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Регистрация
              </a>
              <?php else:?>
                <a href="../../form_valid/exit.php." class="dropdown-item">
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
            <a class="nav-link" href="../../index.php">
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
            <a class="nav-link" href="../activities/act.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Дневник</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="icons/mdi.html">
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
            <a class="nav-link" href="">
              <i class="mdi mdi-help-circle menu-icon"></i>
              <span class="menu-title">Частые вопросы</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <form action="act.php">
            <table>
                <tbody>
                    <tr>
                        <td rowspan="2" width="">
                            <p><strong>&nbsp;</strong></p>
                        </td>
                        <td rowspan="2" width="">
                            <p><strong>Показатель</strong></p>
                        </td>
                        <td colspan="2" width="">
                            <p><strong>Обязательные компетенции</strong></p>
                        </td>
                        <td width="">
                            <p><strong>Дополнительные компетенции (не менее одной за семестр)</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="">
                            <p></p>
                            <p>УК-2</p>
                            <p></p>
                        </td>
                        <td width="123">
                            <p></p>
                            <p>УК-3</p>
                            <p></p>
                        </td>
                        <td width="">
                        <textarea class="comp" name="log" cols="40" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="">
                            <p>1</p>
                        </td>
                        <td width="">
                            <p>Актуальный уровень развития компетенции (в баллах)**</p>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="">
                            <p>2</p>
                        </td>
                        <td width="">
                            <p>Актуальный уровень компетенций (в формулировке паспорта компетенции)</p>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="">
                            <p>3</p>
                        </td>
                        <td width="">
                            <p>Обоснование актуального уровня (описание совершенных действий)</p>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="">
                            <p>4</p>
                        </td>
                        <td width="">
                            <p>Планируемый уровень развития компетенции (в баллах)</p>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="">
                            <p>5</p>
                        </td>
                        <td width="">
                            <p>Планируемый уровень компетенций (в формулировке паспорта компетенции)</p>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="">
                            <p>6</p>
                        </td>
                        <td width="">
                            <p>Прирост компетенций в баллах</p>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="">
                            <p>7</p>
                        </td>
                        <td width="">
                            <p>Планируемые действия по достижению планируемого уровня компетенций</p>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="">
                            <p>8</p>
                        </td>
                        <td width="">
                            <p>Планируемый результат, подтверждающий совершенные действия</p>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="">
                            <p>9</p>
                        </td>
                        <td width="">
                            <p>Ресурсы, планируемые для освоения компетенции</p>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                        <td width="">
                        <textarea name="comment" cols="40" ></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="button" onclick="readLocal(log)" value="Сохранить">
        </form>
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
  <!-- container-scroller -->

  <script src="../../js/java.js"></script>
  <script src="../../vendors/base/vendor.bundle.base.js"></script>

  <script src="../../js/template.js"></script>
</body>

</html>

