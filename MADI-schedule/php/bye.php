<?php
setcookie('work', '', -1, '/');
setcookie('class', '', -1, '/');
setcookie('firstName', '', -1, '/');
setcookie('lastName', '', -1, '/');
setcookie('email', '', -1, '/');
setcookie('language', '', -1, '/');
setcookie('background', '', -1, '/');
setcookie('id', '', -1, '/');
setcookie('profile', '', -1, '/');
setcookie('avatar', '', -1, '/');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Почему вы ушли?</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>

<div class="container">
    <form>
        <label>Нам очень жаль что Вы решили оставить нас. Пожалуйста напишите что вам не понравилось. Для нас это очень важно</label>
        <input type="text" name="text" placeholder="То, что вам не понравилось">
        <button type="submit" class="btnBye">Отправить отзыв</button>
        <p>
            <a href="../index.php">Перейти на главный экран</a>
        </p>
    </form>
</div>


<script src="../assets/js/jquery-3.7.1.min.js"></script>
<script src="../assets/js/bye.js"></script>
</body>
</html>