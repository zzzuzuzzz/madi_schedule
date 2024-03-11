<div class="header">
    <button class="schedule btnHeader">
        <img
            <?php
            if (strval($_COOKIE['background']) === "white") {
                echo 'src="../../assets/img/svg/iconScheduleBlack.svg" ';
            } else if (strval($_COOKIE['background']) === "black") {
                echo 'src="../../assets/img/svg/iconScheduleWhite.svg" ';
            }
            ?>
                alt="Иконка расписания">
        <p>
            <?php
            $language = $_COOKIE['language'];
            if ($language === 'ru') {
                echo "Расписание";
            } else if ($language === 'en') {
                echo "Schedule";
            } else if ($language === 'uz') {
                echo "темная тема";
            }
            ?>
        </p>
    </button>
    <button class="task btnHeader">
        <img
            <?php
            if (strval($_COOKIE['background']) === "white") {
                echo 'src="../../assets/img/svg/iconTaskBlack.svg" ';
            } else if (strval($_COOKIE['background']) === "black") {
                echo 'src="../../assets/img/svg/iconTaskWhite.svg" ';
            }
            ?>
                alt="Иконка заданий">
        <p>
            <?php
            $language = $_COOKIE['language'];
            if ($language === 'ru') {
                echo "Задания";
            } else if ($language === 'en') {
                echo "Task";
            } else if ($language === 'uz') {
                echo "темная тема";
            }
            ?>
        </p>
    </button>
    <button class="logo">
        <img class="madiLogo"
            <?php
            if (strval($_COOKIE['background']) === "white") {
                echo 'src="../../assets/img/svg/iconMadiBlack.svg" ';
            } else if (strval($_COOKIE['background']) === "black") {
                echo 'src="../../assets/img/svg/iconMadiWhite.svg" ';
            }
            ?>
             alt="Логотип МАДИ">
        <p>
            <?php
            $language = $_COOKIE['language'];
            if ($language === 'ru') {
                echo "Расписание МАДИ";
            } else if ($language === 'en') {
                echo "MADI schedule";
            } else if ($language === 'uz') {
                echo "темная тема";
            }
            ?>
        </p>
    </button>
    <button class="chat btnHeader">
        <img
            <?php
            if (strval($_COOKIE['background']) === "white") {
                echo 'src="../../assets/img/svg/iconChatBlack.svg" ';
            } else if (strval($_COOKIE['background']) === "black") {
                echo 'src="../../assets/img/svg/iconChatWhite.svg" ';
            }
            ?>
                alt="Иконка чата">
        <p>
            <?php
            $language = $_COOKIE['language'];
            if ($language === 'ru') {
                echo "Чат и контакты";
            } else if ($language === 'en') {
                echo "Chat and contact";
            } else if ($language === 'uz') {
                echo "темная тема";
            }
            ?>
        </p>
    </button>
    <button class="profile btnHeader">
        <img
            <?php
            if (strval($_COOKIE['background']) === "white") {
                echo 'src="../../assets/img/svg/iconProfileBlack.svg" ';
            } else if (strval($_COOKIE['background']) === "black") {
                echo 'src="../../assets/img/svg/iconProfileWhite.svg" ';
            }
            ?>
                alt="Иконка профиля">
        <p>
            <?php
            $language = $_COOKIE['language'];
            if ($language === 'ru') {
                echo "Ваш профиль";
            } else if ($language === 'en') {
                echo "Your profile";
            } else if ($language === 'uz') {
                echo "темная тема";
            }
            ?>
        </p>
    </button>
</div>