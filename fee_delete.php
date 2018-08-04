<?php
if (isset($_GET['id'])){

    require_once 'Config.php';
    require_once 'DatabaseConnection.php';
    require_once 'DatabaseOperation.php';
    require_once 'Model/Fee.php';
    require_once 'Controller/AbstractController.php';
    require_once 'Controller/FeeController.php';

    $feeController = new FeeController();

    $feeController->deleteAction( $_GET['id']);

}else{
    echo "please give proper information";
}

header("Location: fee_list.php");
exit();