<?php   
$filedataa= 'database/logged-session.json';
$getdataa = file_get_contents($filedataa);
$dataa = json_decode($getdataa);

if($dataa == "n"){
    header("location: deco.php");
}else{
    require_once('html/1-start.html');
    require_once('html/3-logged-page.html');
    require_once('html/end.html');
    file_put_contents("database/logged-session.json", json_encode("n"));
}



