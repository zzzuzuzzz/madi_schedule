<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../../css/auth/register.css">
</head>
<body>
<div class="main_containers">
    <form action="../../vendor/register_1_step.php" method="post" class="main_containers_container">
        <div class="main_containers_container_logo">
            <div class="img_main_containers_container_logo"></div>
        </div>
        <div class="main_containers_container_text grid_box">
            <p class="main_containers_container_text_title">Регистрация</p>
        </div>
        <div class="main_containers_container_email grid_box inp_box inp_box_2">
            <input type="email" class="ipt_main_containers_container_email grid_box_inp inp" id="email" name="email" placeholder="alexander@itchief.ru">
            <label class="lb_main_containers" for="email">Email</label>
        </div>
        <div class="main_containers_container_password grid_box inp_box inp_box_2">
            <input type="password" class="ipt_main_containers_container_password grid_box_inp inp" id="password" name="password" placeholder="alexander@itchief.ru">
            <label class="lb_main_containers" for="password">Введите пароль</label>
        </div>
        <div class="main_containers_container_password grid_box inp_box inp_box_2">
            <input type="password" class="ipt_main_containers_container_password grid_box_inp inp" id="password_confirm" name="password_confirm" placeholder="alexander@itchief.ru">
            <label class="lb_main_containers" for="password_confirm">Повторите пароль</label>
        </div>
        <div class="main_containers_container_opt_one grid_box">
            <label>
                <select class="opt_main_containers_container_opt_one grid_box_inp inp" name="select">
                    <option name="unvalue" value="unvalue" selected disabled>Выберете нужный варинат</option>
                    <option name="teacher" value="teacher">Вы преподователь</option>
                    <option name="student" value="student">Вы студент</option>
                </select>
            </label>
        </div>
        <div class="main_containers_container_continue grid_box">
            <input type="submit" class="btn_main_containers_container_continue grid_box_inp" value="Продолжить">
        </div>
        <div class="main_containers_container_back grid_box">
            <input type="button" class="btn_main_containers_container_back grid_box_inp" value="Вернутся назад">
        </div>
    </form>
</div>
<script src="../../js/auth/register_1_step.js"></script>
</body>
</html>