<?php
require_once ("lib/header.php");
require_once ("vendor/autoload.php");
use Askme\Askme\Askme;

error_reporting(0);


if(isset($_GET['id']))
{


    $id = (int)htmlspecialchars(htmlentities(stripslashes(strip_tags($_GET['id']))));

    $question = new Askme();
    $question->setQuestionID($id);
    $ask = $question->Question();


}

    $userID = $_SESSION['user']['id'];

    $answer = new Askme();
    $answer->setQuestionID($id);
    $getAnswer = $answer->getAnswer();

    $question_answer_count = new Askme();
    $question_answer_count->setQuestionID($id);
    $question_answer_count = $question_answer_count->question_answer_count();

    $most_view_question = new Askme();
    $most_view_question->setQuestionID($id);
    $most_view_question->most_viewed_Question();

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

        <li class="list-group-item">
            <a href="index.php">Back to Home</a>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <font color="#f0f8ff" size="4"><strong><?php echo $ask['question'];?></strong></font></div>
                <div class="panel-body">
                    <p>
                        <strong>Posted at : <?php echo $ask['created_at'];?></strong>
                    </p>
                    <p><?php echo $ask['description'];?></p>
                </div>
            </div>

            <?php

            if(isset($_SESSION['user']))
            { ?>

                <form method="post" id="answer" action="view/admin/answer.php">
                    <div class="form-group">
                        <span class="glyphicon glyphicon-comment"></span> <label for="answer"><font size="4" color="#ff2b1a">Answer this question</font></label>

                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="answer" name="answer" cols="50" rows="5"></textarea>
                    </div>
                    <div>
                        <button type="submit" id="submit" class="form-control btn-danger" style="float: right;height: 35px;width: 150px;text-align: center">Post Your Answer</button>
                    </div>

                    <input type="hidden" name="questionID" value="<?php echo $ask['id'];?>">
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user']['id'];?>">


                </form>
                <div class="success"></div>
            <?php }?>
                <hr>

        <font color="#d2691e" size="4" style="text-align: left">Answers</font>
            <p style="text-align: right"> <?php echo $question_answer_count['Answer_count'];?> Answers</p>
                <hr>





                <?php
                    foreach ($getAnswer as $answer => $value)
                    {


                ?>
                <div class="panel panel-primary">
                    <div class="panel-body" id="user_reply">
                        <span class="pull-right">
                            <a class="btn btn-sm btn-success" href="#" data-original-title="Edit Comment" data-toggle="modal" data-target="#edit" type="button" ><i class="glyphicon glyphicon-edit"></i></a>
                             <a class="btn btn-sm btn-danger" href="#" data-original-title="Delete Comment" data-toggle="modal" data-target="#delete" type="button" ><i class="glyphicon glyphicon-trash"></i></a>
                        </span>
                        <h5><strong>
                        <?php
                            if(!$value['profile_pic'] == NULL)
                            {
                        ?>
                        <img src=/askme/view/admin/<?php echo $value['profile_pic'];?> height="50" class="img-circle" width="50">
                                <?php
                            }
                            else{
                                ?>
                                <img src='/askme/view/admin/profile/avater.png' height="50" class="img-circle" width="50">
                                <?php } ?>

                                <?php  echo $value['firstname']." ".$value['lastname'];?></strong></h5>

                        <p><?php echo $value['answer'];?></p>
                    </div>

                </div>
                <?php }?>



        </li>

    </div>

        <?php require_once ("lib/sidebar.php");?>



    </div>

</div>




<div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Edit Answer</b></h4>
            </div>
            <div class="col-md-8">
                <form action="answer-update.php" method="post" id="edit">
                    <div class="form-group" id="update-reply">
                        <label for="edit-answer">Edit Answer</label>
                        <textarea class="form-control" id="edit" rows="5" cols="50"></textarea>
                    </div>
                    <button type="submit" class="btn-success" id="update">Edit</button>
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

	
<script>
    $(document).ready(function(){

    });

    $('#submit').click(function(event){
        event.preventDefault();
        var reply = $('#answer').serializeArray();
        $.post(
            $('#answer').attr('action'),
            reply,

            function(data)
            {
                $('.success').html(data);
                $('.success').fadeOut(5000);
                $('textarea').val("");

            }

        );
    });


</script>


<?php require_once('lib/footer.php') ?>












