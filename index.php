<form action="index.php">
    Enter number : <input type="text" name="n1">
    <br>
    <select name="st[]" id="" multiple>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
        <option value="4">Four</option>
        <option value="5">Five</option>
    </select>
    <br>
    select hobby:
    
 
    <input type="checkbox" name="h[]" id="" value="singing">Singing Songs
    <input type="checkbox" name="h[]" id="" value="games">Playing Games
    <input type="checkbox" name="h[]" id="" value="reading">Reading Books
    <input type="checkbox" name="h[]" id="" value="travel">Travelling
    <br>
    <input type="submit" value="REgister" name="btn">
</form>
<?php
if (isset($_GET['btn'])) {
    $a = $_GET['n1'];

    if (isset($_GET['st'])) {
        $state = $_GET['st'];
        echo "You selected the states as given below::";
        foreach ($state as $s1 => $s2) { {
                echo $s1 . "==" . $s2 . "<br/>";
            }
        }
    }
    if (isset($_GET['h'])) {
        $hobby = $_GET['h'];
        echo "Your hobbies are:" . "<br/>";
        foreach ($hobby as $h1) {
            echo $h1 . "<br/>";
        }
    }
    echo "number is " . $a . "<br/>";
} else {
    echo "submit the ofrm to display data";
}
