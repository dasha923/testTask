<?php
session_start();

require_once 'connect.php';
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password =$_POST['password'];
$password_confirm=$_POST['password_con'];


if($password!==$password_confirm){
    $_SESSION['message']='Пароли не совпадают';
    header('Location: ../registrastion.php');
    exit;

} 
$check_query ="
SELECT name, phone, email
FROM users
WHERE name= '$name' OR phone = '$phone' OR email = '$email'";
$result = mysqli_query($connect,$check_query);
if(mysqli_num_rows($result)>0){
    while($user =mysqli_fetch_assoc($result)){
        if($user['name']==$name){
            $_SESSION['message'] ='Пользователь с таким именем уже существует';
            header('Location: ../registrastion.php');
            exit;

        }
        if($user['phone']==$phone){
           $_SESSION['message']='Пользователь с таким телефоном уже существует';
           header('Location: ../registrastion.php');
           exit;
           
        }
        if($user['email']==$email){
          $_SESSION['message']='Пользователь с таким адресом электронной почты уже существует';
          header('Location: ../registrastion.php');
          exit;
        }
    }

}
$password=md5($password);

mysqli_query($connect,"INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`) VALUES (NULL, '$name', '$phone', '$email', '$password')");
$_SESSION['message']="Регистрация прошла успешно";
header('Location: ../authorization.php');
exit;

?>