<?php
require_once('lib/header.php');
include_once ("vendor/autoload.php");

use Askme\Askme\Askme;

$Question = new Askme();
$allQuestion = $Question->questions();

$question = new Askme();
$question_count = $question->Question_count();

$answer = new Askme();
$answer_count = $answer->Answer_count();

$user = new Askme();
$user_count =$user->User_count();

$most_viewed_question = new Askme();
$most_viewed_question = $most_viewed_question->get_most_viewed_Question();



?>

<div class="container">
    <div class="col-md-8">


        <?php
        if(isset($_SESSION['user']))
        {


            ?>

            <li><a href="view/admin/question.php?username=<?php echo htmlspecialchars(htmlentities(stripslashes(strip_tags($_SESSION['user']['username'])))); ?>"> <span class="glyphicon glyphicon-pencil"></span>Ask Question</a></li>

        <?php } ?>


        <ul class="list-group">


            <?php

            foreach($allQuestion as $question => $item)
            { ?>
            <li class="list-group-item">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <a href=question.php?id=<?php echo $item['id'];?>><font color="#f0f8ff" size="4"><strong><?php echo $item['question'];?></strong></font></a>

                        </div>
                    <div class="panel-body">
                        <p>
                            <strong>Posted at : <?php echo $item['created_at'];?></strong>
                        </p>

                        <p>
                            <?php  $length = strlen($item['description']);
                                    echo substr($item['description'],0,$length/2);

                            ?>
                            ...
                            <br/><a href=question.php?id=<?php echo htmlspecialchars(htmlentities(stripslashes(strip_tags($item['id']))));?>>See More</a>
                        </p>
                    </div>
                </div>
            </li>
            <?php }?>




        </ul>
        <nav aria-label="Page navigation">
            <ul class="pagination pull-right">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

    <?php if(!isset($_SESSION['user']))
    { ?>
    <?php require_once ("lib/sidebar_login.php");?>
    <?php require_once ("lib/sidebar_registration.php");?>
    <?php } ?>
    <?php require_once ("lib/sidebar.php");?>
</div>


<?php require_once('lib/footer.php') ?>
