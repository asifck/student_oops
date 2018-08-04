<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 5/8/18
 * Time: 12:22 AM
 */

class FeeController extends AbstractController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Fee($this->pdo);
    }
}