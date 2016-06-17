<?php

$myfile = fopen("basketballResults.txt", "r") or die("Unable to open file!");

if (filesize("basketballResults.txt") == 0) {
  fclose($myfile);
  $myfile = fopen("basketballResults.txt", "w");
  for ($i=0; $i < 16; $i++) {
    fwrite($myfile, "0\n");
  }
  fclose($myfile);
}

$cooLines = file('basketballResults.txt', FILE_IGNORE_NEW_LINES);

$curryCount = $cooLines[0];
$westbrookCount = $cooLines[1];
$jamesCount = $cooLines[2];
$lillardCount = $cooLines[3];
$leonardCount = $cooLines[4];
$greenCount = $cooLines[5];
$whitesideCount = $cooLines[6];
$jordanCount = $cooLines[7];
$crawfordCount = $cooLines[8];
$iguodalaCount = $cooLines[9];
$linCount = $cooLines[10];
$schroderCount = $cooLines[11];
$kerrCount = $cooLines[12];
$popovichCount = $cooLines[13];
$stottsCount = $cooLines[14];
$lueCount = $cooLines[15];

fclose($myfile);

// $user = 'basketball';
// $password = 'basketball';
// $db = new PDO('mysql:host=localhost;dbname=basketball', $user, $password);
require("dbConnector.php");
$db = loadDatabase();

$query = "SELECT u.name, c.content FROM user u INNER JOIN comment c ON u.id=c.userID WHERE c.category=1";
$stmt = $db->prepare($query);
$stmt->execute();
$mvpComments = $stmt->fetchALL(PDO::FETCH_ASSOC);

$query = "SELECT u.name, c.content FROM user u INNER JOIN comment c ON u.id=c.userID WHERE c.category=2";
$stmt = $db->prepare($query);
$stmt->execute();
$defenseComments = $stmt->fetchALL(PDO::FETCH_ASSOC);

$query = "SELECT u.name, c.content FROM user u INNER JOIN comment c ON u.id=c.userID WHERE c.category=3";
$stmt = $db->prepare($query);
$stmt->execute();
$sixthComments = $stmt->fetchALL(PDO::FETCH_ASSOC);

$query = "SELECT u.name, c.content FROM user u INNER JOIN comment c ON u.id=c.userID WHERE c.category=4";
$stmt = $db->prepare($query);
$stmt->execute();
$coachComments = $stmt->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="basketball.css">
</head>
<body>
  <img id="banner" src="nba_playoffs.jpg" alt="banner">
<br/>
<h1>MVP</h1>
<img id="playerPic" src="stephCurry.jpg" alt="StephCurry" height="200" width="325">
<img id="playerPic" src="russellWestbrook.jpg" alt="RussellWestbrook" height="200" width="325">
<img id="playerPic" src="lebronJames.jpg" alt="LebronJames"height="200" width="325">
<img id="playerPic" src="damianLillard.jpg" alt="DaminaLillard"height="200" width="325"><br/><br/>
<ul>
  <li><h4> Stephen Curry: <?php echo $curryCount;?> </h4></li>
  <li><h4> Russell Westbrook: <?php echo $westbrookCount;?> </h4></li>
  <li><h4> Lebron James: <?php echo $jamesCount;?> </h4></li>
  <li><h4> Damian Lillard: <?php echo $lillardCount;?> </h4></li>
</ul>
<br/>
<br/>
<?php
foreach ($mvpComments as $row) {
  echo $row['name'] . ": " . $row['content'] . '<br/>';
}
?>
<br/>
<form action="commentSubmission.php" method="POST">
<textarea name="commentBox" placeholder="Comment" maxlength="1000"></textarea>
<input type="hidden" value="1" name="category">
<br/>
<button type="submit">Enter</button>
</form>
<br/>
<br/>
<h1>Defensive Player of the Year</h1>
<img id="playerPic" src="kawhiLeonard.jpg" alt="KawhiLeonard" height="200" width="325">
<img id="playerPic" src="draymondGreen.jpg" alt="DraymondGreen" height="200" width="325">
<img id="playerPic" src="hassanWhiteside.jpg" alt="HassanWhiteside" height="200" width="325">
<img id="playerPic" src="deandreJordan.jpg" alt="DeandreJordan" height="200" width="325"><br/><br/>

<ul>
  <li><h4> Kawhi Leonard: <?php echo $leonardCount;?> </h4></li>
<li><h4> Draymond Green: <?php echo $greenCount;?> </h4></li>
<li><h4> Hassan Whiteside: <?php echo $whitesideCount;?> </h4></li>
<li><h4> Deandre Jordan: <?php echo $jordanCount;?> </h4></li>
</ul>
<br/>
<br/>
<?php
foreach ($defenseComments as $row) {
  echo $row['name'] . ": " . $row['content'] . '<br/>';
}
?>
<br/>
<form action="commentSubmission.php" method="POST">
<textarea name="commentBox" placeholder="Comment" maxlength="1000"></textarea>
<input type="hidden" value="2" name="category">
<br/>
<button type="submit">Enter</button>
</form>
<br/>
<br/>
<h1>Sixth Man of the Year: </h1>
<img id="playerPic" src="jamalCrawford.png" alt="JamalCrawford" height="200" width="325">
<img id="playerPic" src="andreIguodala.jpg" alt="AndreIguodala" height="200" width="325">
<img id="playerPic" src="jeremyLin.jpg" alt="JeremyLin" height="200" width="325">
<img id="playerPic" src="dennisSchroder.jpg" alt="DennisSchroder" height="200" width="325"><br/><br/>

<ul>
<li><h4> Jamal Crawford: <?php echo $crawfordCount;?> </h4></li>
<li><h4> Andre Iguodala: <?php echo $iguodalaCount;?> </h4></li>
<li><h4> Jeremy Lin: <?php echo $linCount;?> </h4></li>
<li><h4> Dennis Schroder: <?php echo $schroderCount;?> </h4></li>
</ul>
<br/>
<br/>
<?php

foreach ($sixthComments as $row) {
  echo $row['name'] . ": " . $row['content'] . '<br/>';
}
?>
<br/>
<form action="commentSubmission.php" method="POST">
<textarea name="commentBox" placeholder="Comment" maxlength="1000"></textarea>
<input type="hidden" value="3" name="category">
<br/>
<button type="submit">Enter</button>
</form>
<br/>
<br/>
<h1>Coach of the Year: </h1>
<img id="playerPic" src="steveKerr.jpg" alt="SteveKerr" height="200" width="325">
<img id="playerPic" src="greggPopovich.jpg" alt="GreggPopovich" height="200" width="325">
<img id="playerPic" src="terryStotts.jpg" alt="TerryStotts" height="200" width="325">
<img id="playerPic" src="tyronnLue.jpg" alt="TyronnLue" height="200" width="325"><br/><br/>
<ul>
<li><h4> Steve Kerr: <?php echo $kerrCount;?> </h4></li>
<li><h4> Gregg Popovich: <?php echo $popovichCount;?> </h4></li>
<li><h4> Terry Stotts: <?php echo $stottsCount;?> </h4></li>
<li><h4> Tyron Lue: <?php echo $lueCount;?> </h4></li>
</ul>
<br/>
<br/>
<?php

foreach ($coachComments as $row) {
  echo $row['name'] . ": " . $row['content'] . '<br/>';
}
?>
<br/>
<form action="commentSubmission.php" method="POST">
<textarea name="commentBox" placeholder="Comment" maxlength="1000"></textarea>
<input type="hidden" value="4" name="category">
<br/>
<button type="submit">Enter</button>
</form><br/>
<br/>
</body>
</html>
