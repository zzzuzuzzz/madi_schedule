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
    <title>
        <?php
        $language = strval($_SESSION['profileTeacher']['language']);
        if ($language === 'ru') {
            echo "Ваш профиль";
        } else if ($language === 'en') {
            echo "Your profile";
        } else if ($language === 'uz') {
            echo "темная тема";
        }
        ?>
    </title>
    <link rel="stylesheet" href="../../../assets/css/air-datepicker.css">
    <link rel="stylesheet" href="../../../assets/css/headerWebVer.css">
    <link rel="stylesheet" href="../../../assets/css/schedulePro/profile.css">
    <?php
    if (strval($_SESSION['profileTeacher']['background']) === "white") {
        include "../../../assets/htmlBlocks/whiteCSS.html";
    } else if (strval($_SESSION['profileTeacher']['background']) === "black") {
        include "../../../assets/htmlBlocks/blackCSS.html";
    }
    ?>
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
            <p class="pEmail varInProfileInfo">
                <?php
                $language = strval($_SESSION['profileTeacher']['language']);
                if ($language === 'ru') {
                    echo "Ваша почта";
                } else if ($language === 'en') {
                    echo "Your email";
                } else if ($language === 'uz') {
                    echo "темная тема";
                }
                ?>
            </p>
            <p class="email varInProfileInfo"><?= strval($_SESSION['profileTeacher']['email']) ?></p>
            <p class="pClass varInProfileInfo">
                <?php
                $language = strval($_SESSION['profileTeacher']['language']);
                if ($language === 'ru') {
                    echo "Ваш факультет";
                } else if ($language === 'en') {
                    echo "Your faculty";
                } else if ($language === 'uz') {
                    echo "темная тема";
                }
                ?>
            </p>
            <p class="class varInProfileInfo">
                <?php
                $class = 'Вы не выбрали факультет';
                $language = strval($_SESSION['profileTeacher']['language']);
                if ($language === 'ru') {
                    $class = "Вы не выбрали факультет";
                } else if ($language === 'en') {
                    $class = "You have not chosen a faculty";
                } else if ($language === 'uz') {
                    $class = "темная тема";
                }
                if ($_SESSION['profileTeacher']['class']) {
                    $class = strval($_SESSION['profileTeacher']['class']);
                }
                echo $class;
                ?>
            </p>

            <form class="selectClassForm">
                <label class="varInProfileInfo">
                    <select name="selectClass" class="select">
                        <option name="unvalue" value="unvalue" selected disabled>
                            <?php
                            $language = strval($_SESSION['profileTeacher']['language']);
                            if ($language === 'ru') {
                                echo "Выберете нужный варинат";
                            } else if ($language === 'en') {
                                echo "Select the desired option";
                            } else if ($language === 'uz') {
                                echo "темная тема";
                            }
                            ?>
                        </option>
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
                <button class="saveClassVar varInProfileInfo">
                    <?php
                    $language = strval($_SESSION['profileTeacher']['language']);
                    if ($language === 'ru') {
                        echo "Сохранить";
                    } else if ($language === 'en') {
                        echo "Save";
                    } else if ($language === 'uz') {
                        echo "темная тема";
                    }
                    ?>
                </button>
            </form>


            <form class="logoutForm">
                <a href="../../../vendor/schedulePro/logout.php" class="logout varInProfileInfo">
                    <?php
                    $language = strval($_SESSION['profileTeacher']['language']);
                    if ($language === 'ru') {
                        echo "Выйти из аккаунта";
                    } else if ($language === 'en') {
                        echo "log out of your account";
                    } else if ($language === 'uz') {
                        echo "темная тема";
                    }
                    ?>
                </a>
            </form>


        </div>
        <div class="setting">


            <div class="language">

                <p class="languageInfo">
                    <?php
                        include "../../../vendor/blocks/switchLanguageTeacher.php"
                    ?>
                </p>

                <form class="selectLanguageForm">
                    <label for="language">
                        <?php
                        $language = strval($_SESSION['profileTeacher']['language']);
                        if ($language === 'ru') {
                            echo "Сменить язык";
                        } else if ($language === 'en') {
                            echo "Change the language";
                        } else if ($language === 'uz') {
                            echo "темная тема";
                        }
                        ?>
                    </label>
                    <label>
                        <select name="selectLanguage" id="language">
                            <option name="unvalue" value="unvalue" selected disabled>
                                <?php
                                $language = strval($_SESSION['profileTeacher']['language']);
                                if ($language === 'ru') {
                                    echo "Выберете нужный варинат";
                                } else if ($language === 'en') {
                                    echo "Select the desired option";
                                } else if ($language === 'uz') {
                                    echo "темная тема";
                                }
                                ?>
                            </option>
                            <option value="ru">Русский</option>
                            <option value="en">English</option>
                            <option value="uz">Узбекский язык</option>
                        </select>
                    </label>
                    <button class="saveLanguageVar">
                        <?php
                        $language = strval($_SESSION['profileTeacher']['language']);
                        if ($language === 'ru') {
                            echo "Сохранить";
                        } else if ($language === 'en') {
                            echo "Save";
                        } else if ($language === 'uz') {
                            echo "темная тема";
                        }
                        ?>
                    </button>
                </form>

            </div>

            <div class="background">

                <p class="backgroundInfo">
                    <?php
                        $language = strval($_SESSION['profileTeacher']['language']);
                        $background = strval($_SESSION['profileTeacher']['background']);
                        if ($language === 'ru') {
                            if ($background === 'white') {
                                echo "Сейчас у Вас стоит светлая тема";
                            } else if ($background === 'black') {
                                echo "Сейчас у Вас стоит темная тема";
                            }
                        } else if ($language === 'en') {
                            if ($background === 'white') {
                                echo "Now you have a bright theme";
                            } else if ($background === 'black') {
                                echo "You have a dark theme right now";
                            }
                        } else if ($language === 'uz') {
                            if ($background === 'white') {
                                echo "Now you have a bright theme";
                            } else if ($background === 'black') {
                                echo "You have a dark theme right now";
                            }
                        }
                    ?>
                </p>

                <form class="selectBackgroundForm">
                    <label for="background">
                        <?php
                        $language = strval($_SESSION['profileTeacher']['language']);
                        if ($language === 'ru') {
                            echo "Сменить тему";
                        } else if ($language === 'en') {
                            echo "Change the theme";
                        } else if ($language === 'uz') {
                            echo "темная тема";
                        }
                        ?>
                    </label>
                    <label>
                        <select name="selectBackground" id="background">
                            <option name="unvalue" value="unvalue" selected disabled>
                                <?php
                                $language = strval($_SESSION['profileTeacher']['language']);
                                if ($language === 'ru') {
                                    echo "Выберете нужный варинат";
                                } else if ($language === 'en') {
                                    echo "Select the desired option";
                                } else if ($language === 'uz') {
                                    echo "темная тема";
                                }
                                ?>
                            </option>
                            <option value="white">
                                <?php
                                $language = strval($_SESSION['profileTeacher']['language']);
                                if ($language === 'ru') {
                                    echo "Светлая тема";
                                } else if ($language === 'en') {
                                    echo "Light theme";
                                } else if ($language === 'uz') {
                                    echo "темная тема";
                                }
                                ?>
                            </option>
                            <option value="black">
                                <?php
                                $language = strval($_SESSION['profileTeacher']['language']);
                                if ($language === 'ru') {
                                    echo "Темная тема";
                                } else if ($language === 'en') {
                                    echo "Dark theme";
                                } else if ($language === 'uz') {
                                    echo "темная тема";
                                }
                                ?>
                            </option>
                        </select>
                    </label>
                    <button class="saveBackgroundVar">
                        <?php
                        $language = strval($_SESSION['profileTeacher']['language']);
                        if ($language === 'ru') {
                            echo "Сохранить";
                        } else if ($language === 'en') {
                            echo "Save";
                        } else if ($language === 'uz') {
                            echo "темная тема";
                        }
                        ?>
                    </button>
                </form>

            </div>
        </div>

        <p class="msg none">Lorem ipsum dolor sit amet.</p>

    </div>

    <script src="../../../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../../../assets/js/schedulePro/teacher/headerTeacher.js"></script>
    <script src="../../../assets/js/schedulePro/teacher/saveTeacher.js"></script>
</body>
</html>