<?php
$filedata= 'database/login.json';
$getdata = file_get_contents($filedata);
$data = json_decode($getdata);

$session = "database/logged-session.json";

$loginpass = [];

$mail = strtolower(trim(htmlspecialchars($_POST['email'])));
$password = trim($_POST['password']);

for($i=0; $i < count($data); $i++){
    $dbMail = $data[$i]->email;
    $dbPassword = $data[$i]->password;
    ( (password_verify($password, $dbPassword)) && ($dbMail == $mail) )?
    ((file_put_contents($session, json_encode($i))).(header("location: dashboard.php"))):
    array_push($loginpass,  strval($i));
};

count($loginpass) == count($data) ? header("location: login-error.php"):'';