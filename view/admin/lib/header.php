<?php

require_once ("../../vendor/autoload.php");
use Askme\Askme\Askme;


$userID = $_SESSION['user']['id'];

$userInfo = new Askme();
$info = $userInfo->userInfo($userID);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AskMe</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- User Style -->

    <link rel="stylesheet" type="text/css" href="css/user.css">

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../index.php">Ask++</a>

        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="../../index.php"><strong>Go to Home</strong></a> </li>
            <li class="dropdown">
                <?php if($info['profile_pic'] == NULL ) {?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../../view/admin/profile/avater.png" class="img-circle" height="22" width="26"> <strong><?php echo strtoupper($_SESSION['user']['firstname']." ".$_SESSION['user']['lastname']);?></strong> <b class="caret"></b></a>
                <?php } else {?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $info['profile_pic']; ?>" alt="Profile Picture" class="img-circle" height="22" width="26"> <strong><?php echo strtoupper($_SESSION['user']['firstname']." ".$_SESSION['user']['lastname']);?></strong> <b class="caret"></b></a>
                <?php } ?>
                <ul class="dropdown-menu">
                    <li>
                        <?php if($info['profile_pic'] == NULL ) {?>
                        <a href="profile.php"><img src="../../view/admin/profile/avater.png" alt="Profile Picture" class="img-circle" height="22" width="26"> Profile</a>
                        <?php } else {?>
                        <a href="profile.php"><img src="<?php echo $info['profile_pic'];?>" alt="Profile Picture" class="img-circle" height="22" width="26"> Profile</a>
                        <?php } ?>
                    </li>

                    <li class="divider"></li>
                    <li>
                        <a href="../../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" action="user.php" method="get">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search" size="40">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" name="search"type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </ul>
    </nav>