<?php
if (isset($_GET['id'])){
    require_once 'Config.php';
    require_once 'DatabaseConnection.php';
    require_once 'DatabaseOperation.php';
    require_once 'Model/Student.php';
    require_once 'Controller/AbstractController.php';
    require_once 'Controller/StudentController.php';

    $studentController = new StudentController();

    $studentController->deleteAction( $_GET['id']);
}else{
    echo "please provide specific data";
}
header("Location: student_list.php");
exit();
