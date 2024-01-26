<?php
session_start();

if ($_SESSION['user'] && !$_SESSION['profileTeacher']) {
    header('Location: ../../scheduleLite/scheduleTeacher.php');
} else if (!$_SESSION['user'] && !$_SESSION['profileTeacher']) {
    header('Location: ../../../index.php');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ваш профиль</title>
    <link rel="stylesheet" href="../../../assets/css/air-datepicker.css">
    <link rel="stylesheet" href="../../../assets/css/headerWebVer.css">
    <link rel="stylesheet" href="../../../assets/css/schedulePro/profile.css">
</head>
<body>

    <div class="header">
        <button class="schedule btnHeader">
            <img src="../../../assets/img/svg/iconSchedule.svg" alt="Иконка расписания">
            <p>Расписание</p>
        </button>
        <button class="task btnHeader">
            <img src="../../../assets/img/svg/iconTask.svg" alt="Иконка заданий">
            <p>Задания</p>
        </button>
        <button class="logo btnHeader">
            <img src="../../../assets/img/svg/iconMadi.svg" alt="Логотип МАДИ" class="madiLogo">
            <p>Расписание МАДИ</p>
        </button>
        <button class="chat btnHeader">
            <img src="../../../assets/img/svg/iconChat.svg" alt="Иконка чата">
            <p>Чат и контакты</p>
        </button>
        <button class="profile btnHeader">
            <img src="../../../assets/img/svg/iconProfile.svg" alt="Иконка профиля">
            <p>Ваш профиль</p>
        </button>
    </div>

    <div class="containerWithProfileInfoAndSetting">
        <div class="profileInfo">
            <img src="../../../assets/img/svg/iconProfile.svg" alt="Автарка" class="avatar">
            <p class="lastName"><?= strval($_SESSION['profileTeacher']['lastName']) ?></p>
            <p class="firstName"><?= strval($_SESSION['profileTeacher']['firstName']) ?></p>
            <p>Ваша почта</p>
            <p class="email"><?= strval($_SESSION['profileTeacher']['email']) ?></p>
            <p>Ваш факультет</p>
            <p class="class">
                <?php
                $class = 'Вы не выбрали факультет';
                if ($_SESSION['profileTeacher']['class']) {
                    $class = strval($_SESSION['profileTeacher']['class']);
                }
                echo $class;
                ?>
            </p>
            <form>
                <label>
                    <select name="select">
                        <option name="unvalue" value="unvalue" selected disabled>Выберете нужный варинат</option>
                        <option value="9401">Автомобильный транспорт (АТФ)</option>
                        <option value="9405">Дорожно-строительный (ДСФ)</option>
                        <option value="9402">Дорожные и технологические машины (ФДМ)</option>
                        <option value="9403">Конструкторско-механический (КМФ)</option>
                        <option value="9404">Энерго-экологический (ЭЭФ)</option>
                        <option value="9405">Логистика и общетранспортные проблемы (ФЛ)</option>
                        <option value="9402">Управление (ФУ)</option>
                        <option value="9403">Экономический (ЭФ)</option>
                        <option value="9404">Заочный (ЗФ)</option>
                    </select>
                </label>
                <button class="saveClassVar">Сохранить</button>
            </form>
            <form>
                <a href="../../../vendor/schedulePro/logout.php" class="logout">Выход</a>
            </form>
        </div>
        <div class="setting">
            <p>настройки</p>
        </div>
    </div>

    <script src="../../../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../../../assets/js/schedulePro/teacher/headerTeacher.js"></script>
</body>
</html>