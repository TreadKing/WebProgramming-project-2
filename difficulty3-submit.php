<?php
include("header.html");

$ans1 = $_POST["q1"];
$ans2 = $_POST["q2"];
$ans3 = $_POST["q3"];
$ans4 = $_POST["q4"];

$score = 0;
if($ans1 == "d") {
    $score++;
}

if($ans2 == "a") {
    $score++;
}

if($ans3 == "a") {
    $score++;
}

if($ans4 == "a") {
    $score++;
}
// weight for diff
$score *= 3;
// change the value of $diff per difficulty
$diff = 0;


$file = "users.txt";
$user = $_COOKIE["user"];
$updated = $_COOKIE["user"];

$fileStr = file_get_contents($file);
$fileArr = explode("\n", $fileStr);

foreach($fileArr as $line) {
    $lineArr = explode(":", $line);
    $scores = explode(",", $lineArr[1]);

    if($lineArr[0] == $user){
        if($scores[$diff] < $score){
            $scores[$diff] = $score;
        }

        $updated .= ":" . implode(",", $scores);
        $replaceLine = $line;
    }
}

$fileUpdatedStr = str_replace($replaceLine, $updated, $fileStr);
file_put_contents($file, $fileUpdatedStr);

echo "<h1> you have finished Difficulty 1 with a score of " . $score . "</h1>"

?>

<p> your score on the leaderboard has been updated </p>
<p> insert links to other difficulties </p>
<p> insert link to leaderboard </p>