<?php
//    Начало сесии
    session_start();

    include "../blocks/connect.php";

//    Получение из HTML формы данных и запись в переменные
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $select = $_POST['select'];
    $emailProof = "false";
    $language = "ru";
    $background = "white";

//    Проверка на сущетсвование пользователя
    $checkUser = mysqli_query($connect, "SELECT * FROM `madiAuth` WHERE `email` = '$email'");
    if (mysqli_num_rows($checkUser) > 0) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Такой пользаватель уже есть",
            "fields" => ['email']
        ];
        echo json_encode($response);
        die();
    }

    $errorFields = [];
    $errorPasswordLen =[];

//    Обработка ошибок при вводе данных (email)
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorFields[] = 'email';
    }

//    Обработка ошибок при вводе данных (password)
    if ($password === '') {
        $errorFields[] = 'password';
    } else if (strlen($password) < 8) {
        $errorPasswordLen[] = 'password';
    }

//    Обработка ошибок при вводе данных (passwordConfirm)
    if ($passwordConfirm === '') {
        $errorFields[] = 'passwordConfirm';
    } else if (strlen($passwordConfirm) < 8) {
        $errorPasswordLen[] = 'passwordConfirm';
    }

//    Обработка ошибок при вводе данных (firstName)
    if ($firstName === '') {
        $errorFields[] = 'firstName';
    }

//    Обработка ошибок при вводе данных (lastName)
    if ($lastName === '') {
        $errorFields[] = 'lastName';
    }

//    Обработка ошибок при вводе данных (select)
    if ($select === '') {
        $errorFields[] = 'select';
    }

//    Обработка ошибок
    if (!empty($errorFields)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Проверте правильность полей",
            "fields" => $errorFields
        ];
        echo json_encode($response);
        die();
    }

    if (!empty($errorPasswordLen)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Пароль слишком короткий",
            "fields" => $errorPasswordLen
        ];
        echo json_encode($response);
        die();
    }

    if ($password === $passwordConfirm) {
        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `madiAuth` (`email`, `password`, `work`, `firstName`, `lastName`, `class`, `emailProof`, `language`, `background`) VALUES ('$email', '$password', '$select', '$firstName', '$lastName', NULL, '$emailProof', '$language', '$background')");

        if (empty($errorFields)) {

            $_SESSION['emailProof'] = [
                'email' => $email
            ];

            $msg = '
            <!doctype html>
<html ⚡4email data-css-strict>
 <head><meta charset="utf-8"><style amp4email-boilerplate>body{visibility:hidden}</style><script async src="https://cdn.ampproject.org/v0.js"></script>
  
  <style amp-custom>
.es-desk-hidden {
	display:none;
	float:left;
	overflow:hidden;
	width:0;
	max-height:0;
	line-height:0;
}
body {
	width:100%;
	font-family:arial, "helvetica neue", helvetica, sans-serif;
}
table {
	border-collapse:collapse;
	border-spacing:0px;
}
table td, body, .es-wrapper {
	padding:0;
	Margin:0;
}
.es-content, .es-header, .es-footer {
	table-layout:fixed;
	width:100%;
}
p, hr {
	Margin:0;
}
h1, h2, h3, h4, h5 {
	Margin:0;
	line-height:120%;
	font-family:arial, "helvetica neue", helvetica, sans-serif;
}
.es-left {
	float:left;
}
.es-right {
	float:right;
}
.es-p5 {
	padding:5px;
}
.es-p5t {
	padding-top:5px;
}
.es-p5b {
	padding-bottom:5px;
}
.es-p5l {
	padding-left:5px;
}
.es-p5r {
	padding-right:5px;
}
.es-p10 {
	padding:10px;
}
.es-p10t {
	padding-top:10px;
}
.es-p10b {
	padding-bottom:10px;
}
.es-p10l {
	padding-left:10px;
}
.es-p10r {
	padding-right:10px;
}
.es-p15 {
	padding:15px;
}
.es-p15t {
	padding-top:15px;
}
.es-p15b {
	padding-bottom:15px;
}
.es-p15l {
	padding-left:15px;
}
.es-p15r {
	padding-right:15px;
}
.es-p20 {
	padding:20px;
}
.es-p20t {
	padding-top:20px;
}
.es-p20b {
	padding-bottom:20px;
}
.es-p20l {
	padding-left:20px;
}
.es-p20r {
	padding-right:20px;
}
.es-p25 {
	padding:25px;
}
.es-p25t {
	padding-top:25px;
}
.es-p25b {
	padding-bottom:25px;
}
.es-p25l {
	padding-left:25px;
}
.es-p25r {
	padding-right:25px;
}
.es-p30 {
	padding:30px;
}
.es-p30t {
	padding-top:30px;
}
.es-p30b {
	padding-bottom:30px;
}
.es-p30l {
	padding-left:30px;
}
.es-p30r {
	padding-right:30px;
}
.es-p35 {
	padding:35px;
}
.es-p35t {
	padding-top:35px;
}
.es-p35b {
	padding-bottom:35px;
}
.es-p35l {
	padding-left:35px;
}
.es-p35r {
	padding-right:35px;
}
.es-p40 {
	padding:40px;
}
.es-p40t {
	padding-top:40px;
}
.es-p40b {
	padding-bottom:40px;
}
.es-p40l {
	padding-left:40px;
}
.es-p40r {
	padding-right:40px;
}
.es-menu td {
	border:0;
}
s {
	text-decoration:line-through;
}
p, ul li, ol li {
	font-family:arial, "helvetica neue", helvetica, sans-serif;
	line-height:150%;
}
ul li, ol li {
	Margin-bottom:15px;
	margin-left:0;
}
a {
	text-decoration:underline;
}
.es-menu td a {
	text-decoration:none;
	display:block;
	font-family:arial, "helvetica neue", helvetica, sans-serif;
}
.es-wrapper {
	width:100%;
	height:100%;
}
.es-wrapper-color, .es-wrapper {
	background-color:#FAFAFA;
}
.es-header {
	background-color:transparent;
}
.es-header-body {
	background-color:transparent;
}
.es-header-body p, .es-header-body ul li, .es-header-body ol li {
	color:#333333;
	font-size:14px;
}
.es-header-body a {
	color:#666666;
	font-size:14px;
}
.es-content-body {
	background-color:#FFFFFF;
}
.es-content-body p, .es-content-body ul li, .es-content-body ol li {
	color:#333333;
	font-size:14px;
}
.es-content-body a {
	color:#5C68E2;
	font-size:14px;
}
.es-footer {
	background-color:transparent;
}
.es-footer-body {
	background-color:#FFFFFF;
}
.es-footer-body p, .es-footer-body ul li, .es-footer-body ol li {
	color:#333333;
	font-size:12px;
}
.es-footer-body a {
	color:#333333;
	font-size:12px;
}
.es-infoblock, .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li {
	line-height:120%;
	font-size:12px;
	color:#CCCCCC;
}
.es-infoblock a {
	font-size:12px;
	color:#CCCCCC;
}
h1 {
	font-size:46px;
	font-style:normal;
	font-weight:bold;
	color:#333333;
}
h2 {
	font-size:26px;
	font-style:normal;
	font-weight:bold;
	color:#333333;
}
h3 {
	font-size:20px;
	font-style:normal;
	font-weight:bold;
	color:#333333;
}
.es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a {
	font-size:46px;
}
.es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a {
	font-size:26px;
}
.es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a {
	font-size:20px;
}
a.es-button, button.es-button {
	padding:10px 30px 10px 30px;
	display:inline-block;
	background:#5C68E2;
	border-radius:5px;
	font-size:20px;
	font-family:arial, "helvetica neue", helvetica, sans-serif;
	font-weight:normal;
	font-style:normal;
	line-height:120%;
	color:#FFFFFF;
	text-decoration:none;
	width:auto;
	text-align:center;
}
.es-button-border {
	border-style:solid solid solid solid;
	border-color:#2CB543 #2CB543 #2CB543 #2CB543;
	background:#5C68E2;
	border-width:0px 0px 0px 0px;
	display:inline-block;
	border-radius:5px;
	width:auto;
}
.es-menu amp-img, .es-button amp-img {
	vertical-align:middle;
}
@media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150% } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% } h1 { font-size:36px; text-align:left } h2 { font-size:26px; text-align:left } h3 { font-size:20px; text-align:left } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:36px; text-align:left } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px; text-align:left } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px; text-align:left } .es-menu td a { font-size:12px } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:14px } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px } *[class="gmail-fix"] { display:none } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left } .es-m-txt-r amp-img { float:right } .es-m-txt-c amp-img { margin:0 auto } .es-m-txt-l amp-img { float:left } .es-button-border { display:inline-block } a.es-button, button.es-button { font-size:20px; display:inline-block } .es-adaptive table, .es-left, .es-right { width:100% } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%; max-width:600px } .es-adapt-td { display:block; width:100% } .adapt-img { width:100%; height:auto } td.es-m-p0 { padding:0 } td.es-m-p0r { padding-right:0 } td.es-m-p0l { padding-left:0 } td.es-m-p0t { padding-top:0 } td.es-m-p0b { padding-bottom:0 } td.es-m-p20b { padding-bottom:20px } .es-mobile-hidden, .es-hidden { display:none } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto; overflow:visible; float:none; max-height:inherit; line-height:inherit } tr.es-desk-hidden { display:table-row } table.es-desk-hidden { display:table } td.es-desk-menu-hidden { display:table-cell } .es-menu td { width:1% } table.es-table-not-adapt, .esd-block-html table { width:auto } table.es-social { display:inline-block } table.es-social td { display:inline-block } td.es-m-p5 { padding:5px } td.es-m-p5t { padding-top:5px } td.es-m-p5b { padding-bottom:5px } td.es-m-p5r { padding-right:5px } td.es-m-p5l { padding-left:5px } td.es-m-p10 { padding:10px } td.es-m-p10t { padding-top:10px } td.es-m-p10b { padding-bottom:10px } td.es-m-p10r { padding-right:10px } td.es-m-p10l { padding-left:10px } td.es-m-p15 { padding:15px } td.es-m-p15t { padding-top:15px } td.es-m-p15b { padding-bottom:15px } td.es-m-p15r { padding-right:15px } td.es-m-p15l { padding-left:15px } td.es-m-p20 { padding:20px } td.es-m-p20t { padding-top:20px } td.es-m-p20r { padding-right:20px } td.es-m-p20l { padding-left:20px } td.es-m-p25 { padding:25px } td.es-m-p25t { padding-top:25px } td.es-m-p25b { padding-bottom:25px } td.es-m-p25r { padding-right:25px } td.es-m-p25l { padding-left:25px } td.es-m-p30 { padding:30px } td.es-m-p30t { padding-top:30px } td.es-m-p30b { padding-bottom:30px } td.es-m-p30r { padding-right:30px } td.es-m-p30l { padding-left:30px } td.es-m-p35 { padding:35px } td.es-m-p35t { padding-top:35px } td.es-m-p35b { padding-bottom:35px } td.es-m-p35r { padding-right:35px } td.es-m-p35l { padding-left:35px } td.es-m-p40 { padding:40px } td.es-m-p40t { padding-top:40px } td.es-m-p40b { padding-bottom:40px } td.es-m-p40r { padding-right:40px } td.es-m-p40l { padding-left:40px } .es-desk-hidden { display:table-row; width:auto; overflow:visible; max-height:inherit } }
</style>
 </head>
 <body>
  <div dir="ltr" class="es-wrapper-color" lang="ru">
   <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#fafafa"></v:fill>
			</v:background>
		<![endif]-->
   <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
     <tr>
      <td valign="top">
       <table cellpadding="0" cellspacing="0" class="es-header" align="center">
         <tr>
          <td align="center">
           <table class="es-header-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: #1071b5" bgcolor="#1071B5">
             <tr>
              <td class="es-p10t es-p10b es-p20r es-p20l" align="left">
               <table cellpadding="0" cellspacing="0" width="100%">
                 <tr>
                  <td width="560" class="es-m-p0r" valign="top" align="center">
                   <table cellpadding="0" cellspacing="0" width="100%">
                     <tr>
                      <td align="center" class="es-p10t es-p10b" style="font-size: 0px"><amp-img class="adapt-img" src="https://fefuvvc.stripocdn.email/content/guids/CABINET_7b42eed3ac6b613615cccf91ddd5749168d18b5b9499c394e7ae580cb4aa34ae/images/madi.png" alt style="display: block" width="300" height="249" layout="responsive"></amp-img></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table>
       <table cellpadding="0" cellspacing="0" class="es-content" align="center">
         <tr>
          <td align="center">
           <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
             <tr>
              <td class="es-p20t es-p10b es-p20r es-p20l" align="left">
               <table cellpadding="0" cellspacing="0" width="100%">
                 <tr>
                  <td width="560" align="center" valign="top">
                   <table cellpadding="0" cellspacing="0" width="100%">
                     <tr>
                      <td align="center" class="es-p20t es-p10b es-m-txt-c"><h3 style="line-height: 100%">Благодарим Вас за регистрацию!</h3></td>
                     </tr>
                     <tr>
                      <td align="center" class="es-p5t es-p5b"><p style="font-size: 17px">Для продолжения Вам необходимо подтвердить свою почту.</p></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
             <tr>
              <td class="es-p10b es-p20r es-p20l" align="left">
               <table cellpadding="0" cellspacing="0" width="100%">
                 <tr>
                  <td width="560" align="center" valign="top">
                   <table cellpadding="0" cellspacing="0" width="100%" style="border-radius: 5px;border-collapse: separate">
                     <tr>
                      <td align="center" class="es-p10t es-p10b"><span class="es-button-border" style="border-radius: 6px;background: #1071b5"><a href="http://192.168.1.74/php/auth/emailProof.php" class="es-button" target="_blank" style="padding-left: 30px;padding-right: 30px;border-radius: 6px;background: #1071b5">Подтвердить почту !</a></span></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table>
       <table cellpadding="0" cellspacing="0" class="es-content" align="center">
         <tr>
          <td align="center">
           <table bgcolor="#1071B5" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: #1071b5">
             <tr>
              <td class="es-p20t es-p10b es-p20r es-p20l" align="left">
               <table cellpadding="0" cellspacing="0" width="100%">
                 <tr>
                  <td width="560" align="center" valign="top">
                   <table cellpadding="0" cellspacing="0" width="100%">
                     <tr>
                      <td align="center" class="es-p20t es-p10b es-m-txt-c"><h3 style="line-height: 100%;color: #ffffff">Возникли проблемы или остались вопросы?</h3></td>
                     </tr>
                     <tr>
                      <td align="center" class="es-p5t es-p5b"><p style="font-size: 17px;color: #ffffff">Напишите нам на почту! madi.schedule@mail.ru</p></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table></td>
     </tr>
   </table>
  </div>
 </body>
</html>
            ';

            mail($email, 'Подтверждение почты', $msg);

            $response = [
                "status" => true,
                "message" => "Вы успешно зарегестрировались",
            ];
            echo json_encode($response);
        }

    } else {
        if (empty($errorFields)) {
            $response = [
                "status" => false,
                "message" => "Пароли не совпадают",
            ];
            echo json_encode($response);
        }
    }