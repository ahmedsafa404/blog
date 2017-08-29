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

$askedQuestion = new Askme();
$getAsked_Question = $askedQuestion->user_asked_Question($userID);

$answeredQuestion = new Askme();
$getAnswered_Question = $answeredQuestion->user_answered();


$Question = new Askme();
$myQuestion = $Question->myAskedQuestion($userID);


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

            <div class="col-md-12" style="font-family: "Arial Black", arial-black">
                <font color="#008b8b" size="6"><strong>User Activity</strong></font>
            </div>
            <div class="col-md-12">
                <hr>
            </div>


<!--         User Activity       -->

                <div class="row">

                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-question-circle fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-left">
                                        <div class="huge"><?php echo $getAsked_Question['Ask'];?></div>
                                        <div>Total Asked Question!</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-left">
                                        <div class="huge"><?php echo $getAnswered_Question['Answer'];?></div>
                                        <div>Total Answered!</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-trophy fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-left">
                                        <div class="huge"><?php echo $info['point'];?></div>
                                        <div>Total Point!</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-md-12">

                    <div class="col-md-12">
                        <h3><strong>My Asked Question</strong></h3>
                        <hr>
                        <div class="col-md-8">

                            <?php

                            foreach ($myQuestion as $question => $item)
                            { ?>

                                <h4><strong><?php echo $item['question'];?></strong></h4>
                                <p><?php $length = strlen($item['description']); echo substr($item['description'],0,$length/2);?></p>
                                <a href=../../question.php?id=<?php echo htmlspecialchars(htmlentities(stripslashes(strip_tags($item['id']))));?>>See More</a>
                                <hr>
                            <?php } ?>
                        </div>
                    </div>
                </div>
<!--        End User Activity -->

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
