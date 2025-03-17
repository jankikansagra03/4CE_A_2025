<?php
include_once("connect.php");
if (isset($_GET['uid'])) {
    $id = $_GET['uid'];
    $profile_picture = "Select photo from register where id=$id";
    $row = mysqli_fetch_assoc($con->query($profile_picture));
    $old_profile_picture = $row['photo'];
    $delete = "delete from register where id=$id";
    if ($con->query($delete)) {
        unlink("profile_pictures/" . $old_profile_picture);
        setcookie('success', "user deleted successfully", time() + 5, "/");
    } else {
        setcookie("error", "error in deleting data", time() + 5, "/");
    }
?>
    <script>
        window.location.href = "fetch_data_register.php";
    </script>
<?php
}
