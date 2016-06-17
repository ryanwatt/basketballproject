<?php
$comment = $_POST['commentBox'];
$category = $_POST['category'];

session_start();
$userSession = $_SESSION['sessionUser'];
//echo $userSession;
$user = 'basketball';
$password = 'basketball';
$db = new PDO('mysql:host=localhost;dbname=basketball', $user, $password);

$query = "SELECT id FROM user WHERE name = '$userSession'";
$stmt = $db->prepare($query);
$stmt->execute();
$userNumber = $stmt->fetch(PDO::FETCH_ASSOC);
//echo $userSession;
$number = $userNumber['id'];
//echo $userNumber['id'];
//echo "\nUser Id: " . $number;

$query = "INSERT INTO comment (content, userID, category) VALUES ('$comment', $number, $category)";
$stmt = $db->prepare($query);
$stmt->execute();



header( "Location: basketballResults.php" );
?>
