<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $user = 'basketball';
// $password = 'basketball';
// $db = new PDO('mysql:host=localhost;dbname=basketball', $user, $password);
$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$username = $_POST['username'];
$query = "SELECT name FROM user WHERE name = '$username'";
$stmt = $db->prepare($query);
$stmt->execute();
$basketballUser = $stmt->fetchALL(PDO::FETCH_ASSOC);

session_start();
$_SESSION["sessionUser"] = $username;

if(sizeof($basketballUser) > 0){
  require 'basketballResults.php';
} else {
  $query = "INSERT INTO user (name) VALUES ('$username')";
  $stmt = $db->prepare($query);
  $stmt->execute();
  $basketballUser = $stmt->fetchALL(PDO::FETCH_ASSOC);
  echo "Welcome " . $username;

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="basketball.css">
</head>
<body>
  <div id="video" style="position: fixed; z-index: -99; width: 100%; height: 100%">
    <iframe frameborder="0" height="100%" width="100%"
      src="https://www.youtube.com/embed/nOH_IoqGCgg?rel=0&autoplay=1&controls=0&showinfo=0&autohide=1" volume="0" muted="muted" frameborder="0" allowfullscreen>
    </iframe>

  </div>
  <div id="fadeWhite" style="position: fixed; z-index: -10; width: 100%; height: 100%">
  </div>
<form action="voteCollectionBasketball.php" method="post" style="background-color: rgba(0,0,0,0.75); padding-bottom: 70px; color: white;">
<br/>
<br/>
<!-- <div id="background">
  <img src="stephCurry.jpg" alt="StephCurry" height="200" width="325">
</div> -->
<div id="mvp">
  <h2>MVP</h2>
  <!-- <img src="stephCurry.jpg" alt="StephCurry" height="200" width="325">
  <img src="russellWestbrook.jpg" alt="RussellWestbrook" height="200" width="325">
  <img src="lebronJames.jpg" alt="LebronJames"height="200" width="325">
  <img src="damianLillard.jpg" alt="DaminaLillard"height="200" width="325"><br/><br/> -->
  <input id="stephCurry" type="radio" name="mvp" value="StephenCurry">Stephen Curry</>
  <input id="mvpName" type="radio" name="mvp" value="RussellWestbrook">Russell Westbrook</>
  <input id="mvpName" type="radio" name="mvp" value="LebronJames">Lebron James</>
  <input id="mvpName" type="radio" name="mvp" value="DamianLillard">DamianLillard<br/>




</div>
<br/>
<br/>
<br/>
<div id="defense">
  <h2>Defensive Player of the Year</h2>
  <!-- <img src="kawhiLeonard.jpg" alt="KawhiLeonard" height="200" width="325">
  <img src="draymondGreen.jpg" alt="DraymondGreen" height="200" width="325">
  <img src="hassanWhiteside.jpg" alt="HassanWhiteside" height="200" width="325">
  <img src="deandreJordan.jpg" alt="DeandreJordan" height="200" width="325"><br/><br/> -->
  <input type="radio" name="defense" value="KawhiLeonard">Kawhi Leonard</>
  <input type="radio" name="defense" value="DraymondGreen">Draymond Green</>
  <input type="radio" name="defense" value="HassanWhiteside">Hassan Whiteside</>
  <input type="radio" name="defense" value="DeandreJordan">Deandre Jordan<br/>
</div>
<br/>
<br/>
<br/>
<div id="sixth">
  <h2>Sixth Man of the Year</h2>
  <!-- <img src="jamalCrawford.png" alt="JamalCrawford" height="200" width="325">
  <img src="andreIguodala.jpg" alt="AndreIguodala" height="200" width="325">
  <img src="jeremyLin.jpg" alt="JeremyLin" height="200" width="325">
  <img src="dennisSchroder.jpg" alt="DennisSchroder" height="200" width="325"><br/><br/> -->
  <input type="radio" name="sixth" value="JamalCrawford">Jamal Crawford</>
  <input type="radio" name="sixth" value="AndreIguodala">Andre Iguodala</>
  <input type="radio" name="sixth" value="JeremyLin">Jeremy Lin</>
  <input type="radio" name="sixth" value="DennisSchroder">Dennis Schroder<br/>

</div>
<br/>
<br/>
<br/>
<div id="coach">
  <h2>Coach of the Year</h2>
  <!-- <img src="steveKerr.jpg" alt="SteveKerr" height="200" width="325">
  <img src="greggPopovich.jpg" alt="GreggPopovich" height="200" width="325">
  <img src="terryStotts.jpg" alt="TerryStotts" height="200" width="325">
  <img src="tyronnLue.jpg" alt="TyronnLue" height="200" width="325"><br/><br/> -->
  <input type="radio" name="coach" value="SteveKerr">Steve Kerr</>
  <input type="radio" name="coach" value="GreggPopovich">Gregg Popovich</>
  <input type="radio" name="coach" value="TerryStotts">Terry Stotts</>
  <input type="radio" name="coach" value="TyronnLue">Tyronn Lue<br/>
</div>
  <br/>
  <br/>
  <br/>
  <input type="submit" value="submit">
  <br/>
  <br/>
  <a href="basketballResults.php">View Results</a>

</form>



</body>
</html>
<?php
}
?>
