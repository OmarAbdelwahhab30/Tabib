<?php
session_start();
require_once "../queryHandlerclass/query.php";
$oldusername = $_SESSION['ADMIN_NAME'];
if (isset($_POST['submit']))
{
    $adminusername = filter_input(INPUT_POST,'adminUername',FILTER_SANITIZE_STRING);
    $GET_statement_doctors = queryHandler::getData("doctors","username","");
    $GET_statement_patients = queryHandler::getData("patients","username","");
    $GET_array_doctors = $GET_statement_doctors->fetchAll(PDO::FETCH_COLUMN);
    $GET_array_patients = $GET_statement_patients->fetchAll(PDO::FETCH_COLUMN);
    $res = array_merge($GET_array_doctors,$GET_array_patients);
    $key = array_search ($oldusername, $res);
    unset($res[$key]);
    if(in_array($adminusername,$res)){
        $_SESSION['alert'] = "Duplicated Entry ,Choose another username";
        header("location:dashboard-my-profile.php");
        exit();
    }
    $firstname  = filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING);
    $lastname  = filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING);
    $password  = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    $confirmPass = filter_input(INPUT_POST,'confpassword',FILTER_SANITIZE_STRING);
    if($password != $confirmPass){
        $_SESSION['alert'] = "two passwords doesn't match ";
        header("location:dashboard-my-profile.php");
        exit();
    }
    $encryptedpass = md5($password);
    $address = filter_input(INPUT_POST,'address',FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST,'phone',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $update_sql = queryHandler::UpdateData('admins',"username = '$adminusername',address='$address',phone='$phone',email='$email',
          password='$password',first_name='$firstname',last_name='$lastname'","id='{$_GET['adminid']}'");

    if ($update_sql) {
        $_SESSION['alert'] = "Your profile has been updated successfully" ;
        header("location:dashboard-my-profile.php");
        exit();

    }
}
?>

