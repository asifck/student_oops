<?php

require_once 'Config.php';
require_once 'DatabaseConnection.php';
require_once 'DatabaseOperation.php';
require_once 'Model/Student.php';
require_once 'Model/Fee.php';
require_once 'Controller/AbstractController.php';
require_once 'Controller/FeeController.php';

$feeController = new FeeController();
$fee = $feeController->editAction($_GET);
$studentModel =  new Student($feeController->pdo);
$students = $studentModel->findAll();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <title>STUDENTS MANAGER</title>
    <style>
        /* Stackoverflow preview fix, please ignore */
        .navbar-nav {
            flex-direction: row;
        }

        .nav-link {
            padding-right: .5rem !important;
            padding-left: .5rem !important;
            color: #fff!important;
        }

        /* Fixes dropdown menus placed on the right side */
        .ml-auto .dropdown-menu {
            left: auto !important;
            right: 0px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark rounded" style="background: #b366ff;">
    <a class="navbar-brand" href="index.png"><img src="images/log.png" class="img-responsive" ></a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
            <a href="student_list.php" class="nav-link">Student</a>
        </li>
        <li class="nav-item">
            <a href="fee_list.php" class="nav-link">Fees</a>
        </li>

    </ul>
</nav>
<section style="padding: 5%;">
    <div class="container">
        <div class="row">
            <form method="POST" action="fee_save.php">
                <div class="form-group">

                    <label for="exampleInputPassword1">Student</label>
                    <select class="form-control" name="student_id">
                        <option value="">Select One</option>
                        <?php foreach($students as $student): ?>
                            <?php // ivide namukku venfdath student tablil ninnu ulla oru student ne select aaknam?>
                            <option value="<?php echo $student['id']; ?>" <?php echo $student['id'] == $fee['student_id'] ? 'selected' : '' ?> >
                                <?php echo $student['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="form-group">

                    <input type="text" class="form-control" name="semester" placeholder="semester" value="<?php echo isset($fee) ? $fee['semester'] : ''?>">

                </div>
                <div class="form-group">

                    <input type="date" class="form-control" placeholder="payment Date" name="payment_date" id="exampleFormControlTextarea1" rows="3" value="<?php echo isset($fee) ? $fee['payment_date'] : '' ?>" />
                </div>
                <div class="form-group">

                    <input type="text" class="form-control" name="fee_amount" placeholder="fee Amount" value="<?php echo isset($fee) ? $fee['fee_amount'] : ''?>">

                </div>
                <div class="form-group">

                    <input type="text" class="form-control" name="fine_amount" placeholder="fine Amount" value="<?php echo isset($fee) ? $fee['fine_amount'] : ''?>">

                </div>
                <input type="hidden"  name="id" value="<?php echo isset($fee) ? $fee['id'] : ''?>" >

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>
