<?php
session_start();
if(empty($_SESSION['user'])){
    header('location:../../index.php');
    exit();
}
require_once ("lib/header.php");
require_once ("lib/sidebar.php");
require_once ("../../vendor/autoload.php");
use Askme\Askme\Askme;

if(isset($_GET))
{
    $id = (int)htmlspecialchars(htmlentities(stripslashes(strip_tags($_GET['id']))));

    $userProfile = new Askme();
    $userProfile = $userProfile->FriendsProfile($id);

}

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <?php
                    if($userProfile['profile_pic'] == NULL)
                    { ?>
                        <img src="profile/avater.png" class="img-circle" height="200" width="200">
                    <?php } else {?>
                    <img src="<?php echo $userProfile['profile_pic']; ?>" alt="Profile Picture" class="img-circle" height="200" width="200">
                    <?php } ?>
                    <br>
                </div>

                <div class=" col-md-4">
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Name:</td>
                            <td><?php echo $userProfile['firstname']." ".$userProfile['lastname'];?></td>
                        </tr>

                        <tr>
                            <td>Location</td>

                            <td><?php echo $userProfile['location'];?></td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td><?php echo $userProfile['phone'];?></td>
                        </tr>

                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn-primary">Add as Friend</button>
                    <button type="submit" class="btn-success">Send Message</button>
                </div>

            </div>
        </div>

    </div>
</div>












<script src="js/jquery.min.js"></script>
<script src="js/chatbox.js"></script>

