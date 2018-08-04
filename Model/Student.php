<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 4/8/18
 * Time: 12:43 AM
 */



class Student extends DatabaseOperation
{
    const TABLE = 'student';

    public function __construct($pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }
}