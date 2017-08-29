<?php  session_start();

if(empty($_SESSION['user'])){
    header('location:../../index.php');
    exit();
}

require_once ("../../vendor/autoload.php");
use Askme\Askme\Askme;


?>

<?php

$userID = $_SESSION['user']['id'];

$userInfo = new Askme();
$info = $userInfo->userInfo($userID);


?>
        <?php require_once ("lib/header.php");?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php require_once ("lib/sidebar.php");?>
        <!-- /.navbar-collapse -->


    <div id="page-wrapper">

        <div class="container-fluid">

            <?php
            if($info['confirmed'] == 0)
            { ?>
                <div class="col-md-8"><font color="red" size="5"> Your account isn't active.Please active your account.</font></div>
            <?php }?>

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php echo $_SESSION['user']['firstname']." ".$_SESSION['user']['lastname']."'s";?>
                        <small>Profile</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-info-circle"></i>  <strong>Welcome <?php echo $_SESSION['user']['firstname']." ".$_SESSION['user']['lastname'];?></strong>
                    </div>
                </div>
            </div>

            <!--User Profile-->

            <div class="row">
                <div class="col-lg-12">

                    <div class="col-lg-12 " >


                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title"></h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 " align="center">
                                        <?php
                                            if($info['profile_pic'] == NULL)
                                            { ?>
                                        <img src="profile/avater.png" class="img-circle" alt="Profile Picture" height="200" width="200">
                                        <?php }?>
                                        <img src="<?php echo $info['profile_pic']; ?>" alt="Profile Picture" class="img-circle" height="200" width="200">
                                        <br>
                                        <a class="cd-upload" href="#" data-toggle="modal" data-target="#upload">Upload Photo</a>
                                    </div>

                                    <div class=" col-md-9 col-lg-9 ">
                                        <table class="table table-user-information">
                                            <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td><?php echo $info['firstname']." ".$info['lastname'];?></td>
                                            </tr>

                                            <tr>
                                                <td>Location</td>

                                                <td><?php echo $info['location'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone Number</td>
                                                <td><?php echo $info['phone'];?></td>
                                            </tr>

                                            </tr>

                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>

                            <div class="panel-footer">

                                            <span class="pull-right">
                                                <a class="btn btn-sm btn-warning" href="#" data-original-title="Edit this user" data-toggle="modal" data-target="#edit" type="button" ><i class="glyphicon glyphicon-edit"></i></a>

                                            </span>

                                <!--Modal for Edit User-->

                                <div class="modal fade" id="edit" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><b>Update Profile</b></h4>
                                            </div>
                                            <div class="col-md-8">
                                                <form action="edit.php" method="post" id="edit">
                                                    <div class="form-group">
                                                        <label for="firstname">Firstname</label>
                                                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $info['firstname'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lastname">Lastname</label>
                                                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $info['lastname'];?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="location">Location</label>
                                                        <input type="text" class="form-control" id="location" name="location" value="<?php echo $info['location'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $info['email'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone No.</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $info['phone'];?>">
                                                    </div>

                                                    <button type="submit" class="btn-success" id="update">Update</button>
                                                    <input type="hidden" name="csrf" value="<?php ?>">
                                                    <input type="hidden" name="userid" value="<?php echo $_SESSION['user']['id'];?>">
                                                </form>
                                            </div>

                                            <div class="modal-footer">

                                            </div>
                                        </div>

                                    </div>
                                </div>





                            </div>

                            <div class="modal fade" id="upload" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><b>Upload Profile Picture</b></h4>
                                        </div>
                                        <div class="col-md-8">
                                            <form action="upload.php" method="post" id="loginForm" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <label for="image">Select Image</label>
                                                    <input type="file" class="form-control" id="image" name="image"/>
                                                </div>
                                                <button type="submit" class="btn-primary" id="upload">Upload</button>
                                                <input type="hidden" name="userid" value="<?php echo $_SESSION['user']['id'];?>">
                                                <input type="hidden" name="csrf" value="<?php ?>">
                                            </form>
                                        </div>

                                        <div class="modal-footer">

                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>


</div>




</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>
<script src="js/user.js"></script>

</body>

</html>
