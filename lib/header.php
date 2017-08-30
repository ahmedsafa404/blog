<?php
require_once ("vendor/autoload.php");
use Askme\Askme\Askme;

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ask Question Get Answer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../askme/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../../askme/assets/js/bootstrap.min.js"></script>

</head>
<body>


<div class="container-fluid">

    <div class="container">

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo" href="index.php">AskMe</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Documentation<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href=" ">Questions</a></li>
                            <li><a href=" ">Jobs</a></li>
                            <li><a href=" ">Documentation</a></li>
                        </ul>
                    </li>



                        <li class="btn-md btn-info"><a href="#">Questions</a></li>



                </ul>
                <ul class="nav navbar-nav ">
                    <form class="navbar-form navbar-left" action="search.php" method="get">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search" size="40">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" name="search"type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <?php
                        if(isset($_SESSION['user']))
                        {


                    ?>

                    <li><a href="../../askme/view/admin/index.php?username=<?php echo htmlspecialchars(htmlentities($_SESSION['user']['username'])); ?>"> <span class="glyphicon glyphicon-log-out"></span>Dashboard</a></li>

                    <?php } ?>

                </ul>
            </div>

        </nav>

    </div>

</div>
