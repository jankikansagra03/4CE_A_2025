<form action="upload_multiple.php" method="post" enctype="multipart/form-data">
    Select a file to upload:
    <input type="file" name="f1[]" multiple>
    <br>
    <input type="submit" value="Upload File" name="upld_btn">
</form>

<?php
if (isset($_POST['upld_btn'])) {
    $files = $_FILES['f1']['name'];
    if (!empty($files)) { 
        $count = count($files);
        // echo $count . " files selected";
        for ($i = 0; $i < $count; $i++) {
            if ($_FILES['f1']['type'][$i] == "image/png" || $_FILES['f1']['type'][$i] == "image/jpeg" || $_FILES['f1']['type'][$i] == "image/jpg") {
                if ($_FILES['f1']['size'][$i] <= 100 * 1024) {
                    if (!is_dir("multiple_uploads")) {
                        mkdir("multiple_uploads");
                    }
                    $filename = uniqid() . $_FILES['f1']['name'][$i];
                    if (move_uploaded_file($_FILES['f1']['tmp_name'][$i], "multiple_uploads/" . $filename)) {
                        echo "<span style='color:green'>" . $_FILES['f1']['name'][$i] . " uploaded successfully.</span><br>";
?>
<img src="multiple_uploads/<?php echo $filename; ?>" alt="">
<?php
                    } else {
                        echo "<span style='color:red'>" . $_FILES['f1']['name'][$i] . " Error in uploading file.</span><br>";
                    }
                } else {
                    echo "<span style='color:red'>File size must not be greater than 100KB." . $_FILES['f1']['name'][$i] . " size is greater than 100KB.</span><br>";
                }
            } else {
                echo "<span style='color:red'>Select a image file." . $_FILES['f1']['name'][$i] . " is not an image file.</span><br>";
            }
        }
    } else {
        echo "<span style='color:red'>Select a file.</span><br>";
    }
}