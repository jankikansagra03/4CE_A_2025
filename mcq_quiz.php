<form action="mcq_quiz.php">
    q-1::: Waht is 1+1??
    <br>
    <input type="radio" name="q1" id="" value="a">2
    <input type="radio" name="q1" id="" value="b">0
    <input type="radio" name="q1" id="" value="c">3
    <input type="radio" name="q1" id="" value="d">-2
    <br>
    <input type="submit" value="Submit Quiz" name="btn">
</form>

<?php
$score = 0;
if (isset($_GET['btn'])) {
    if (isset($_GET['q1'])) {
        $ans1 = $_GET['q1'];
        if ($ans1 == "a") {
            $score++;
        }
    }
    echo "Score: " . $score;
}
