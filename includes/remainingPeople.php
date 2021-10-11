<?php
require_once "db.php";
$sql = "SELECT name from people_pool where picked = 0";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$remaining_draws = $stmt->rowCount();