<?php
if(!empty($_POST)) {

    if (!empty($_POST)) {
        require_once 'Config.php';
        require_once 'DatabaseConnection.php';
        require_once 'DatabaseOperation.php';
        require_once 'Model/Student.php';
        require_once 'Controller/AbstractController.php';
        require_once 'Controller/FeeController.php';

        $feeController = new FeeController();


        if (!empty($_POST)) {
            //if id is empty we need to create new record
            if (empty($_POST['id'])) {
                $created = $feeController->createAction($_POST);
                //return $created;
            } else {

                $updated = $feeController->updateAction($_POST);
            }

        } else {
            echo 'Data must be entered';
            exit;
        }

    }
    header("Location: fee_list.php");
    exit();
//ivide $_POST id undenkil updatum illenkil new creatum cheyyanulla conditions aanu mukalil ullath


}

?>