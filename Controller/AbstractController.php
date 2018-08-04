<?php
/**
 * Created by PhpStorm.
 * User: asif
 * Date: 4/8/18
 * Time: 11:42 PM
 */

class AbstractController
{
    public $pdo;
    public $model;

    public function __construct()
    {
        $databaseConnection = new DatabaseConnection(
            DATABASE_HOST,
            DATABASE_NAME,
            DATABASE_USER,
            DATABASE_PASSWORD
        );

        $this->pdo = $databaseConnection->connectDb();
    }

    public function listAction($request) {

// pagination condition  pagination btn click cheyyumbo kittuna $_get nte ullli data udel
        if(isset($request['page'])) {
            // ivide get il nmukk kittuna page parameter value vech data edukkanam athinu thzhe get all fucntionil arguiment aay kodukkunu
            $page = $request['page'];
        }
        else {
            $page = 1;
        }
        unset($request['page']);

        $records = $this->model->findAll($request,  $page);
// No need to pass $page argument for fetching all records, It is made as null (default argument) in getAll function.
// So it is $page argument is optional
        $allRecords = $this->model->findAll($_GET);
        $totalRecords = count($allRecords);
        $numberOfPages = ceil($totalRecords/10);

        return array (
            'records' => $records,
            'totalRecords' => $totalRecords,
            'numberOfPages' => $numberOfPages,
            'page' => $page
        );
    }


    public function editAction($request) {
        if(isset($request['id'])) {
            $record = $this->model->findOne($request['id']);
        }
        else {
            $record = null;
        }

        return $record;
    }

    public function createAction($request) {
        return $this->model->create($request);
    }

    public function updateAction($request) {
        // id $id enna variblil assign cheyyunu ennit id unset cheyyunnu coz namukk already id und ath change cheyyanda aavsyam illa
        $id = $request['id'];
        unset($request['id']);
        return $this->model->update($id, $request);
    }

    public function deleteAction($id) {
        return $this->model->delete($id);
    }

}