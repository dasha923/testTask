<?php
session_start();

require_once 'connect.php';
$captcha_token = $_POST['smart-token'];
$server_key ='ysc2_dwpHOdMzgRLNGhenU6PBFf5ANeTBS7yD9tIjuCea1b556919';
if(!$captcha_token){
    $_SESSION['message']='Подвердите, что вы не робот';
    header('Location: ../authorization.php');
    exit;
}
$ch = curl_init('https://smartcaptcha.yandexcloud.net/validate');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'secret' => $server_key,
    'token' => $captcha_token,
    'ip' => $_SERVER['REMOTE_ADDR']
]));
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

if (!isset($result['status']) || $result['status'] !== 'ok') {
    $_SESSION['message'] = 'Проверка капчи не пройдена!';
    header('Location: /authorization.php');
    exit;
}
$login = $_POST['login'];
$password = md5($_POST['password']);
$check_query= "SELECT * FROM `users` 
WHERE (`phone`='$login' OR `email`='$login') AND `password`='$password'";
$check_user= mysqli_query($connect, $check_query);
if(mysqli_num_rows($check_user)>0){
    $user =mysqli_fetch_assoc($check_user);
    if($user['password']==$password){
    $_SESSION['user']=[
       'id'=> $user ['id'],
       'name'=> $user['name'],
       'phone'=> $user['phone'],
       'email'=> $user['email']
    ];
   header('Location: ../profile.php');
    } else{
        $_SESSION['message'] = 'Неверный пароль';
        header('Location: ../authorization.php');
        exit;
    } 
} else{
 header('Location: ../registrastion.php');
        exit;   
}

?>