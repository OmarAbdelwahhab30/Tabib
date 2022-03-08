<?php
session_start();
var_dump($_SESSION);
require_once "../queryHandlerclass/query.php";
if (isset($_POST['submit']))
{
    $adminusername = filter_input(INPUT_POST,'adminusername',FILTER_SANITIZE_STRING);
    $GET_statement_doctors = queryHandler::getData("doctors","username","");
    $GET_statement_patients = queryHandler::getData("patients","username","");
    $GET_statement_admins = queryHandler::getData("admins","username","");
    $GET_array_doctors = $GET_statement_doctors->fetchAll(PDO::FETCH_COLUMN);
    $GET_array_patients = $GET_statement_patients->fetchAll(PDO::FETCH_COLUMN);
    $GET_array_admins = $GET_statement_admins->fetchAll(PDO::FETCH_COLUMN);
    $res = array_merge($GET_array_admins,$GET_array_doctors,$GET_array_patients);
    if(in_array($adminusername,$res)){
        $_SESSION['alert'] = "Duplicated Entry ,Choose another username";
        header("location:dashboard-add-admin.php");
        exit();
    }
    $firstname  = filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING);
    $lastname  = filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING);
    $password  = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    $confirmPass = filter_input(INPUT_POST,'confpassword',FILTER_SANITIZE_STRING);
    if($password != $confirmPass){
        $_SESSION['alert'] = "two passwords doesn't match ";
        header("location:dashboard-add-admin.php");
        exit();
    }
    $encryptedpass = md5($password);
    $address = filter_input(INPUT_POST,'address',FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST,'phone',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $add_sql = queryHandler::AddData("admins","username,address,phone,email,password,first_name,last_name",
        "'$adminusername','$address','$phone','$email','$password','$firstname','$lastname'");
    if ($add_sql) {
        $_SESSION['alert'] = "Admin has been added successfully";
        header("location:dashboard-add-admin.php");
        exit();
    }
}
?>

