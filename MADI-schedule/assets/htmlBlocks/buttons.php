<div class="header">
    <button class="schedule btnHeader">
        <img src="../../../assets/img/svg/iconScheduleBlack.svg" alt="Иконка расписания">
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
        <img src="../../../assets/img/svg/iconTaskBlack.svg" alt="Иконка заданий">
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
    <button class="logo btnHeader">
        <img src="../../../assets/img/svg/iconMadiBlack.svg" alt="Логотип МАДИ" class="madiLogo">
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
        <img src="../../../assets/img/svg/iconChatBlack.svg" alt="Иконка чата">
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
        <img src="../../../assets/img/svg/iconProfileBlack.svg" alt="Иконка профиля">
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