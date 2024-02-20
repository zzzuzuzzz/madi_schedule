<?php

switch ($select) {
    case 'ATF':
        $select = 'Автомобильный транспорт (АТФ)';
        break;
    case 'DSF':
        $select = 'Дорожно-строительный (ДСФ)';
        break;
    case 'FDM':
        $select = 'Дорожные и технологические машины (ФДМ)';
        break;
    case 'KMD':
        $select = 'Конструкторско-механический (КМФ)';
        break;
    case 'EEF':
        $select = 'Энерго-экологический (ЭЭФ)';
        break;
    case 'FL':
        $select = 'Логистика и общетранспортные проблемы (ФЛ)';
        break;
    case 'FU':
        $select = 'Управление (ФУ)';
        break;
    case 'EF':
        $select = 'Экономический (ЭФ)';
        break;
    case 'ZF':
        $select = 'Заочный (ЗФ)';
        break;
}