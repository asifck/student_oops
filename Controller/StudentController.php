<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 4/8/18
 * Time: 11:39 PM
 */

require_once 'Config.php';
require_once 'DatabaseConnection.php';
require_once 'DatabaseOperation.php';
require_once 'Model/Student.php';
require_once 'AbstractController.php';

class StudentController extends AbstractController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Student($this->pdo);
    }

}