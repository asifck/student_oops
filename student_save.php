<?php
   if(!empty($_POST)) {

       if (!empty($_POST)) {
           require_once 'Config.php';
           require_once 'DatabaseConnection.php';
           require_once 'DatabaseOperation.php';
           require_once 'Model/Student.php';
           require_once 'Controller/AbstractController.php';
           require_once 'Controller/StudentController.php';

           $studentController = new StudentController();


           if (!empty($_POST)) {
               //if id is empty we need to create new record
               if (empty($_POST['id'])) {
                   $created = $studentController->createAction($_POST);
                   //return $created;
               } else {

                   $updated = $studentController->updateAction($_POST);
               }

           } else {
               echo 'Please enter data';
               exit;
           }

       }
       header("Location: student_list.php");
       exit();
//ivide $_POST id undenkil updatum illenkil new creatum cheyyanulla conditions aanu mukalil ullath


   }
