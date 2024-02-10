<?php

setcookie('user', '', -1, '/');
setcookie('class', '', -1, '/');

header('Location: ../../index.php');