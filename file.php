<form action="file.php" method="post" enctype="multipart/form-data">
    Select a file to upload:
    <input type="file" name="f1">
    <br>
    <input type="submit" value="Upload File" name="upld_btn">
</form>

<?php
if (isset($_POST['upld_btn'])) {
    if ($_FILES['f1']['name'] == "") {
        echo "<span style='color:red'>Please Select a File to upload.</span>";
    } else {
        if ($_FILES['f1']['type'] == "image/jpeg" || $_FILES['f1']['type'] == "image/jpg" || $_FILES['f1']['type'] == "image/png") {
            if ($_FILES['f1']['size'] <= 100 * 1024) {
                if (!is_dir("uploads")) {
                    mkdir("uploads");
                }
                $filename = uniqid() . "_" . $_FILES['f1']['name'];
                if (move_uploaded_file($_FILES['f1']['tmp_name'], "uploads/" . $filename)) {
                    echo "<span style='color:green'>File uploaded successfully.</span>";
                    echo "<br>";
                    echo "<img src='uploads/" . $_FILES['f1']['name'] . "' alt='uploaded file'>";
                } else {
                    echo "<span style='color:red'>Failed to upload file.</span>";
                }
            } else {
                echo "<span style='color:red'>File size should be less than 100 KB.</span>";
            }
        } else {
            echo "<span style='color:red'>Only JPEG, JPG and PNG files are allowed.</span>";
        }
    }
}
