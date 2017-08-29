<?php  session_start();

if(empty($_SESSION['user']))
{
    header('location:../../index.php');
    exit();
}

require_once ("../../vendor/autoload.php");
use Askme\Askme\Askme;

$userID = $_SESSION['user']['id'];

$userInfo = new Askme();
$info = $userInfo->userInfo($userID);


?>
        <?php require_once ("lib/header.php");?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php require_once ("lib/sidebar.php");?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->

            <?php
            if($info['confirmed'] == 0)
            { ?>
                <div class="col-md-8"><font color="red" size="5"> Your account isn't active.Please active your account.</font></div>
            <?php }?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php echo $_SESSION['user']['firstname']." ".$_SESSION['user']['lastname']."'s";?>
                        <small>Profile</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Question
                        </li>
                    </ol>
                </div>
            </div>

            <div class="col-md-8">
                <h4><font color="green">Add Question</font></h4>
                <?php
                if($info['confirmed'] == 1)
                { ?>
            <form method="post" action="add_question.php">
                <div class="form-group">
                    <label for="title">Question Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Question Title" required>

                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" rows="8" cols="60" id="description" class="form-control" placeholder="Write in detail about your question" required></textarea>
                </div>

                <button type="submit" id="question" class="btn btn-success">Submit Question</button>
                <input type="hidden" name="userid" value="<?php echo $_SESSION['user']['id'];?>">
            </form>
                <?php }?>
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
