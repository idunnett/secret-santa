<?php
// This file attempts to establish a connection to a database from
// the information stored in the initial variables.

// Written by Isaac Dunnett B00800378
// Saturday, October 9, 2021

// Local 
// $host = "127.0.0.1";
// $user = "root";
// $password = "root";
// $dbname = "secretsanta";

// Dal
$host = 'db.cs.dal.ca';
$user = "dunnett";
$password = getenv("DB_PASS");
$dbname = "dunnett";

$dsn = "mysql:host=$host;dbname=$dbname";
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
} catch (PDOException $e) {
    $db_feedback = "Unable to establish a connection to the database server.<br>" . $e->getMessage();
    echo $db_feedback;
    exit();
}