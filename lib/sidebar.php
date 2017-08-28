<div class="col-md-4">
    <h2><font color="#d2691e">Most Viewed Question</font></h2>
    <div class="">
        <ul class="list-group">

            <?php
            foreach ($most_viewed_question as $most => $view) { ?>
                <li class="list-group-item">
                    <div class="">
                        <a href="question.php?id=<?php echo htmlspecialchars(htmlentities(stripslashes(strip_tags($view['id']))));?>"><?php echo $view['question'];?></a>

                    </div>
                </li>

            <?php }?>


        </ul>
    </div>


    <h2><font color="green">Website Status</font></h2>
    <hr>
    <div class="count">
        <font color="black" size="2"><strong>Total Question :</strong></font><?php echo $question_count['Question'];?>
        <br>
        <font color="black" size="2"><strong>Total Answer :</strong></font><?php echo $answer_count['Answer'];?>
        <br>
        <font color="black" size="2"><strong>Total User :</strong></font><?php echo $user_count['User'];?>

    </div>
</div>