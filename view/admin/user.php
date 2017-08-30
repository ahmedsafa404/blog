<?php
session_start();

if(empty($_SESSION['user'])){
    header('location:../../index.php');
    exit();
}

require_once ("../../vendor/autoload.php");
use Askme\Askme\Askme;


$userID = $_SESSION['user']['id'];

if(isset($_GET))
{
    $user = new Askme();
    $search = $user->userSearch($_GET);

}

require_once ("lib/header.php");
require_once ("lib/sidebar.php");


?>
<div id="page-wrapper">

            <div class="container-fluid">
                <?php
                    if($info['confirmed'] == 0)
                    { ?>
                        <div class="col-md-8"><font color="red" size="5"> Your account isn't active.Please active your account.</font></div>
                    <?php }?>
                <div class="row">
                    <div class="col-md-6 col-lg-offset-2">
                        <h3><strong>You have search for "<?php echo $_GET['q'];?>"</strong></h3>
                        <hr>
                        <?php
                            foreach ($search as $user => $data)
                            {
                        ?>
                        <p>
                                <div style="float: right"><a href="user_profile.php?id=<?php echo htmlspecialchars(htmlentities(stripslashes(strip_tags($data['id']))));?>">View Profile</a> </div>
                            <?php
                                if($data['profile_pic'] == NULL)
                                {
                            ?>
                            <img src="profile/avater.png" class="img-thumbnail" height="70" width="60">
                            <?php }else {?>
                            <img src="<?php echo $data['profile_pic'];?>" class="img-thumbnail" height="70" width="60">
                            <?php } ?>
                            <h4><strong><?php echo $data['firstname']." ".$data['lastname']; ?></strong></h4>
                                Location :<?php echo $data['location'];?>
                                <br>
                                Phone : <?php echo $data['phone'];?>
                                <br>
                                Point : <?php echo $data['point'];?>

                        </p>
                        <hr>
                        <?php }?>
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