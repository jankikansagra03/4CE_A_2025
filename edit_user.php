<?php
include_once "connect.php";
if (isset($_GET['uid'])) {
    $id = $_GET['uid'];

    $q = "select * from register where id=$id";
    $result = $con->query($q);
    $row = mysqli_fetch_assoc($result);
    $h = explode(",", $row['hobbies']);
    $s = explode(",", $row['state']);
?>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <div class="container">
        <form action="edit_user.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="uid" value="<?php echo $row['id']; ?>">
            <div class="mb-3 mt-3">
                <label for="fullname" class="form-label">Fullname:</label>
                <input type="text" class="form-control" id="fullname" placeholder="Enter Name" name="fullname" value="<?php echo $row['name']; ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $row['email']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" value="<?php echo $row['password']; ?>">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile:</label>
                <input type="number" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile" value="<?php echo $row['mobile']; ?>">
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State:</label>
                <select name="state[]" id="state" class="form-control" multiple>
                    <option value="gujarat"
                        <?php
                        if (in_array("gujarat", $s)) {
                            echo "selected";
                        } ?>>Gujarat
                    </option>
                    <option value="maharashtra" <?php
                                                if (in_array("maharashtra", $s)) {
                                                    echo "selected";
                                                } ?>>Maharashtra</option>
                    <option value="rajasthan" <?php
                                                if (in_array("rajasthan", $s)) {
                                                    echo "selected";
                                                } ?>>Rajasthan</option>
                    <option value="punjab" <?php
                                            if (in_array("punjab", $s)) {
                                                echo "selected";
                                            } ?>>Punjab</option>
                    <option value="kerala" <?php
                                            if (in_array("kerala", $s)) {
                                                echo "selected";
                                            } ?>>Kerala</option>
                    <option value="tamilnadu" <?php
                                                if (in_array("tamilnadu", $s)) {
                                                    echo "selected";
                                                } ?>>Tamilnadu</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gender">Select Gender</label>
                <br>
                <input type="radio" name="gender" id="" value="Male"
                    <?php echo $row['gender'] == "Male" ? "checked" : ""; ?>>Male
                <input type="radio" name="gender" id="" value="Female" <?php echo $row['gender'] == "Female" ? "checked" : ""; ?>>Female
            </div>
            <div class="mb-3 mt-3">
                <label for="address" class="form-label">Address:</label>
                <textarea name="address" id="address" class="form-control">
                   <?php echo $row['address']; ?>
                </textarea>
            </div>
            <div class="mb-3">
                <label for="hobbies">Select Hobbies</label>
                <br>
                <input type="checkbox" name="hobbies[]" id="" value="Reading"
                    <?php
                    if (in_array("Reading", $h)) {
                        echo "checked";
                    } ?>>Reading
                <input type="checkbox" name="hobbies[]" id="" value="Writing" <?php
                                                                                if (in_array("Writing", $h)) {
                                                                                    echo "checked";
                                                                                } ?>>Writing
                <input type="checkbox" name="hobbies[]" id="" value="Playing" <?php
                                                                                if (in_array("Playing", $h)) {
                                                                                    echo "checked";
                                                                                } ?>>Playing
                <input type="checkbox" name="hobbies[]" id="" value="Singing" <?php
                                                                                if (in_array("Singing", $h)) {
                                                                                    echo "checked";
                                                                                } ?>>Singing
                <input type="checkbox" name="hobbies[]" id="" value="Dancing" <?php
                                                                                if (in_array("Dancing", $h)) {
                                                                                    echo "checked";
                                                                                } ?>>Dancing
            </div>
            <div>
                <img src="profile_pictures/<?php echo $row['photo']; ?> " alt="" width="100px">
            </div>
            <div class="mb-3">
                <label for="profile_pic" class="form-label">Profile Picture:</label>
                <input type="file" class="form-control" id="profile_pic" name="profile_pic">
            </div>
            <button type="submit" class="btn btn-primary" name="edit_btn">Submit</button>
        </form>
    </div>
    <?php
}

if (isset($_POST['edit_btn'])) {


    $id = $_POST['uid'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['pswd'];
    $mobile = $_POST['mobile'];
    $state = $_POST['state'];
    $state = implode(',', $state);
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $h = $_POST['hobbies'];
    $hobbies = implode(",", $h);
    if ($_FILES['profile_pic']['name'] != "") {
        $profile_pic = uniqid() . $_FILES['profile_pic']['name'];
        $profile_picture = "Select photo from register where id=$id";
        
        $row = mysqli_fetch_assoc($con->query($profile_picture));
        $old_profile_picture = $row['photo'];
    }
    $updt = "UPDATE `register` SET `name`='$fullname',`password`='$password',`state`='$state',`mobile`=$mobile,`gender`='$gender',`hobbies`='$hobbies',`address`='$address'";

    if ($_FILES['profile_pic']['name'] != "") {
        $updt = $updt . ", photo='$profile_pic' ";
    }
    $updt = $updt . " where id=$id";

    if ($con->query($updt)) {
        if ($_FILES['profile_pic']['name'] != ""); {
            move_uploaded_file($_FILES['profile_pic']['tmp_name'], "profile_pictures/" . $profile_pic);
            unlink("profile_pictures/" . $old_profile_picture);
    ?>
            <script>
                window.location.href = "fetch_data_register.php"
            </script>
<?php
        }
    } else {
        setcookie('error', "error in updating data", time() + 5, "/");
    }
}
