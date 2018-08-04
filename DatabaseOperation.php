<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 2/8/18
 * Time: 5:29 PM
 */

class DatabaseOperation
{
    public $pdo;
    private $tableName;

    public function __construct($tableName, $pdo)
    {
        $this->tableName = $tableName;
        $this->pdo = $pdo;
    }

    public function findAll($filters = array(), $page = null) {
        if(!is_null($page)) {
            //0-9, 10-19
            $limit = 10;
            //starting record index - (1*10)-10 = 0, (2*10)-10 = 10
            $offset = ($page*$limit)-$limit;

            // Add query parts as LIMIT and OFFSET to paginate

            $paginationQueryPart = ' LIMIT '.$limit. ' OFFSET '.$offset;
        }
        else {
            // if $page is null we have to fetch all records.
            $paginationQueryPart = '';
        }


        //prepare the filter query parts (WHERE condition) if we passed $filters($_GET) this code also execute

        if(!empty($filters)) {
            $addWhere = $this->addWhere($filters);
        }
        else {
            $addWhere = '';
        }


        $query = 'SELECT * FROM `'.$this->tableName.'`'.$addWhere.$paginationQueryPart;
        echo $query."<br>";
        $result = $this->pdo->query($query);
        $records = $result->fetchAll();
        return $records;
    }

    private function addWhere($filters) {
        $wherePart = ' WHERE ';
        $i = 0;
        foreach($filters as $key => $filter) {
            if(!empty($filter)) {
                $wherePart = $wherePart . '`'. $key . '` = \'' . $filter . '\' ';
                if (count($filters) > 1 && $i < (count($filters) - 1)) {
                    $wherePart = $wherePart . ' AND ';
                }
            }
            $i++;
        }

        return $wherePart;
    }

    public function findOne($id) {

        $result = $this->pdo->query('SELECT * FROM `'.$this->tableName.'` WHERE id = '.$id);
        $record = $result->fetch();
        return $record;
    }

    public function create($values) {
        $columnsString = $this->getColumns($values);
        $paramString = $this->getParameters($values);
        $statement = $this->pdo->prepare("INSERT INTO `".$this->tableName."` (".$columnsString.") values (".$paramString.")");
        $result = $statement->execute($values);

        return $result;
    }

    private function getColumns($values) {
        $columns = array_keys($values);

        $columnString = '';

        foreach($columns as $key => $column) {
            if($key < (count($columns)-1)) {
                $comma = ', ';
            }
            else {
                $comma = '';
            }
            $columnString = $columnString.'`'.$column.'`'.$comma;
            //mansilakkan = ''.`name`,.
        }

        return $columnString;
    }

    private function getParameters($values) {
        $columns = array_keys($values);

        $paramString = '';

        foreach($columns as $key => $column) {
            if($key < (count($columns)-1)) {
                $comma = ', ';
            }
            else {
                $comma = '';
            }
            $paramString = $paramString.':'.$column.$comma;
        }

        return $paramString;
    }

    public function update($id, $values) {
        $updateQueryParts = $this->getUpdateQueryParts($values);
        $statement = $this->pdo->prepare("UPDATE `".$this->tableName."` SET ".$updateQueryParts." WHERE `id` = ".$id);
        $result = $statement->execute($values);

        return $result;
    }

    private function getUpdateQueryParts($values) {
        $columns = array_keys($values);
        $updateQueryParts = '';
        foreach($columns as $key => $column) {
            if($key < (count($columns)-1)) {
                $comma = ', ';
            }
            else {
                $comma = '';
            }
            $updateQueryParts = $updateQueryParts.'`'.$column.'` = :'.$column.$comma;
        }

        return $updateQueryParts;
    }


    public function delete($id) {
        $statement = $this->pdo->prepare(" DELETE FROM `".$this->tableName."` WHERE `id` = ".$id);
        $result = $statement->execute();

        return $result;
    }

}