<?php

if (!empty($_POST["out_sum"])) {

    $out_sum = trim(htmlspecialchars(strip_tags($_POST["out_sum"])));

    $mrh_login = "udentifier"; // идентификатор магазина
    $mrh_pass1 = "password_1"; // пароль #1

    $inv_id = ""; // номер счета

    $items = array(
        'items' =>
            array(
                0 =>
                    array(
                        'name' => 'консультация',
                        'quantity' => 1,
                        'sum' => trim(htmlspecialchars(strip_tags($_POST["out_sum"]))),
                        'payment_method' => 'full_payment',
                        'payment_object' => 'commodity',
                        'tax' => 'none',
                    ),
            ),
    );

    $arr_encode = json_encode($items); // Преобразовываем JSON в строку

    $receipt = urlencode($arr_encode);
    $receipt_urlencode = urlencode($receipt);

    $inv_desc = "description"; // описание заказа
    $crc = md5("$mrh_login:$out_sum:$inv_id:$receipt:$mrh_pass1"); // формирование подписи
    // Перенаправляем пользователя на страницу оплаты
    Header("Location: https://auth.robokassa.ru/Merchant/Index.aspx?MrchLogin=$mrh_login&OutSum=$out_sum&InvId=$inv_id&Receipt=$receipt_urlencode&Desc=$inv_desc&SignatureValue=$crc");
}