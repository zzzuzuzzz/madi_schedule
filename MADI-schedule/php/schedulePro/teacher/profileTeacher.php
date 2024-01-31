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

<?php
    include "../../../assets/htmlBlocks/buttons.php"
?>

<div class="containerWithProfileInfoAndSetting">

        <div class="profileInfo">


            <img src="../../../assets/img/svg/iconProfile.svg" alt="Автарка" class="avatar varInProfileInfo">
            <h2 class="lastName varInProfileInfo"><?= strval($_SESSION['profileTeacher']['lastName']) ?></h2>
            <h3 class="firstName varInProfileInfo"><?= strval($_SESSION['profileTeacher']['firstName']) ?></h3>
            <p class="pEmail varInProfileInfo">Ваша почта</p>
            <p class="email varInProfileInfo"><?= strval($_SESSION['profileTeacher']['email']) ?></p>
            <p class="pClass varInProfileInfo">Ваш факультет</p>
            <p class="class varInProfileInfo">
                <?php
                $class = 'Вы не выбрали факультет';
                if ($_SESSION['profileTeacher']['class']) {
                    $class = strval($_SESSION['profileTeacher']['class']);
                }
                echo $class;
                ?>
            </p>

            <form class="selectClassForm">
                <label class="varInProfileInfo">
                    <select name="selectClass" class="select">
                        <option name="unvalue" value="unvalue" selected disabled>Выберете нужный варинат</option>
                        <option value="ATF">Автомобильный транспорт (АТФ)</option>
                        <option value="DSF">Дорожно-строительный (ДСФ)</option>
                        <option value="FDM">Дорожные и технологические машины (ФДМ)</option>
                        <option value="KMD">Конструкторско-механический (КМФ)</option>
                        <option value="EEF">Энерго-экологический (ЭЭФ)</option>
                        <option value="FL">Логистика и общетранспортные проблемы (ФЛ)</option>
                        <option value="FU">Управление (ФУ)</option>
                        <option value="EF">Экономический (ЭФ)</option>
                        <option value="ZF">Заочный (ЗФ)</option>
                    </select>
                </label>
                <button class="saveClassVar varInProfileInfo">Сохранить</button>
            </form>


            <form class="logoutForm">
                <a href="../../../vendor/schedulePro/logout.php" class="logout varInProfileInfo">Выйти из аккаунта</a>
            </form>


        </div>
        <div class="setting">


            <form class="selectLanguageForm">
                <label for="language">Сменить язык</label>
                <label>
                    <select name="selectLanguage" id="language">
                        <option name="unvalue" value="unvalue" selected disabled>Выберете нужный варинат</option>
                        <option value="ru">Русский язык</option>
                        <option value="en">Англиский язык</option>
                        <option value="uz">Узбекский язык</option>
                    </select>
                </label>
                <button class="saveLanguageVar">Сохранить</button>
            </form>


            <form class="selectBackgroundForm">
                <label for="background">Сменить тему</label>
                <label>
                    <select name="selectBackground" id="background">
                        <option name="unvalue" value="unvalue" selected disabled>Выберете нужный варинат</option>
                        <option value="white">Светлая тема</option>
                        <option value="black">Темная тема</option>
                    </select>
                </label>
                <button class="saveBackgroundVar">Сохранить</button>
            </form>


        </div>

        <p class="msg none">Lorem ipsum dolor sit amet.</p>

    </div>

    <script src="../../../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../../../assets/js/schedulePro/teacher/headerTeacher.js"></script>
    <script src="../../../assets/js/schedulePro/teacher/saveTeacher.js"></script>
</body>
</html>