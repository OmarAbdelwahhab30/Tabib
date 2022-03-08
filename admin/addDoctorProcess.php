<?php
session_start();
require_once "../queryHandlerclass/query.php";
if (isset($_POST['submit']))
{
    $docusername = filter_input(INPUT_POST,'docUsername',FILTER_SANITIZE_STRING);
    $GET_statement_doctors = queryHandler::getData("doctors","username","");
    $GET_statement_patients = queryHandler::getData("patients","username","");
    $GET_array_doctors = $GET_statement_doctors->fetchAll(PDO::FETCH_COLUMN);
    $GET_array_patients = $GET_statement_patients->fetchAll(PDO::FETCH_COLUMN);
    $res = array_merge($GET_array_doctors,$GET_array_patients);
    if(in_array($docusername,$res)){
        $_SESSION['alert'] = "Duplicated Entry ,Choose another username";
        header("location:dashboard-add-doctor.php");
        exit();
    }
    $firstname  = filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING);
    $lastname  = filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING);
    $password  = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    $confirmPass = filter_input(INPUT_POST,'confpassword',FILTER_SANITIZE_STRING);
    if($password != $confirmPass){
        $_SESSION['alert'] = "two passwords doesn't match ";
        header("location:index.php");
        exit();
    }
    $encryptedpass = md5($password);
    $address = filter_input(INPUT_POST,'address',FILTER_SANITIZE_STRING);
    $specialization = filter_input(INPUT_POST,'specialization',FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST,'phone',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $timeOfArrival = filter_input(INPUT_POST,'timepres');
    $timeOfstay = filter_input(INPUT_POST,'staytime',FILTER_SANITIZE_NUMBER_INT);
    $add_sql = queryHandler::AddData('doctors',
        "username,phone,email,password,specialization,time_of_presense,stay_time,address,first_name,last_name"
        ,"'$docusername','$phone','$email','$password','$specialization','$timeOfArrival','$timeOfstay','$address','$firstname','$lastname'");
    if ($add_sql){
        header("location:dashboard-add-doctor.php");
        exit();
    }
}
?>

