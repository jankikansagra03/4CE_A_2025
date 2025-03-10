<form action="multiple_array.php">
    <!-- Enter comma seperated values =<input type="text" name="abc" id=""> -->
    <br>
    <input type="text" name="values[]" id="">
    <br>
    <input type="text" name="values[]" id="">
    <br>
    <input type="text" name="values[]" id="">
    <br>
    <input type="text" name="values[]" id="">
    <br>
    <input type="text" name="values[]" id="">
    <br>
    <input type="text" name="values[]" id="">
    <br>
    <input type="text" name="values[]" id="">
    <br>
    <input type="text" name="values[]" id="">
    <br>
    <input type="submit" value="Submit" name="btn">
</form>
<?php
if (isset($_GET['btn'])) {
    // $arr = explode(',', $_GET['abc']);

    // print_r($arr);
    // $merged_array = implode('-', $arr);
    // echo "<br>" . $merged_array;

    $arr = $_GET['values'];
    print_r($arr);
}
