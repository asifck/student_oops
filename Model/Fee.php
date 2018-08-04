<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 4/8/18
 * Time: 12:53 AM
 */

class Fee extends DatabaseOperation
{
    const TABLE = 'fees';

    public function __construct($pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }
}