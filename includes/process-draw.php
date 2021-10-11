<?php

require_once "db.php";
require_once "sendEmail.php";

$drawMessage = "";
$drawName = "";
if (isset($_POST['email'])) {
    $email =
        htmlspecialchars(stripslashes(trim($_POST['email'])));
    $team =
        htmlspecialchars(stripslashes(trim($_POST['team'])));

    // check if email already exists
    $sql = "SELECT email FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        $drawMessage = "Sorry, it looks like you have already drawn a name. Check your email for your results.";
    } else {
        $sql = "INSERT INTO users VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email, $team]);
        if ($team == 1)
            $team = 2;
        else
            $team = 1;

        $sql = "SELECT * FROM people_pool where picked = 0 and team = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$team]);
        if ($stmt->rowCount() == 0) {
            $drawMessage = "Sorry, it looks like all names have already been picked from this team.";
        } else {
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $rand = rand(0, $stmt->rowCount() - 1);
            $drawName =  $res[$rand]['name'];
            $sql = "UPDATE people_pool SET picked=1 WHERE name = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$drawName]);
            $subject = "Secret Santa Draw Confirmation";
            $msg = "This email is to provide confirmation of your draw result: <br><br><h2><b>$drawName</b></h2>";
            $mailRes = sendEmail("confirm.secretsanta@gmail.com", "Secret Santa", $email, $subject, $msg);
        }
    }
}