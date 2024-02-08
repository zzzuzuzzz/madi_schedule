<?php

$language = 'язык';
$sessionLanguage = strval($_COOKIE['language']);

switch ($sessionLanguage) {
    case "ru":
        $language = 'Сейчас у Вас стоит Русский язык';
        break;
    case "en":
        $language = 'The English language is now available';
        break;
    case "uz":
        $language = 'Узбекский язык';
        break;
}

echo $language;