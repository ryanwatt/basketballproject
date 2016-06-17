<?php
// session_start();
// $_SESSION["basketballSesh"] = "openPark";

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
// foreach ($lines as $value) {
//   echo "Here is the value: $value<br>";
// }

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

// $curryCount = 0;
// $westbrookCount = 0;
// $jamesCount = 0;
// $lillardCount = 0;
// $leonardCount = 0;
// $greenCount = 0;
// $whitesideCount = 0;
// $jordanCount = 0;
// $crawfordCount = 0;
// $iguodalaCount = 0;
// $linCount = 0;
// $schroderCount = 0;
// $kerrCount = 0;
// $popovichCount = 0;
// $stottsCount = 0;
// $lueCount = 0;

$mvp = $_POST["mvp"];

switch ($mvp) {
  case 'StephenCurry':
    $curryCount++;
    break;
  case 'RussellWestbrook':
    $westbrookCount++;
    break;
  case 'LebronJames':
    $jamesCount++;
    break;

  default:
    $lillardCount++;
    break;
}

$defense = $_POST["defense"];
switch ($defense) {
  case 'KawhiLeonard':
    $leonardCount++;
    break;
  case 'DraymondGreen':
    $greenCount++;
    break;
  case 'HassanWhiteside':
    $whitesideCount++;
    break;

  default:
    $jordanCount++;
    break;
}

$sixth = $_POST["sixth"];
switch ($sixth) {
  case 'JamalCrawford':
    $crawfordCount++;
    break;
  case 'AndreIguodala':
    $iguodalaCount++;
    break;
  case 'JeremyLin':
    $linCount++;
    break;

  default:
    $schroderCount++;
    break;
}

$coach = $_POST["coach"];
switch ($coach) {
  case 'SteveKerr':
    $kerrCount++;
    break;
  case 'GreggPopovich':
    $popovichCount++;
    break;
  case 'TerryStotts':
    $stottsCount++;
    break;

  default:
    $lueCount++;
    break;
}

// echo "Curry $curryCount\n";
// echo "Westbrook $westbrookCount\n";
// echo "James $jamesCount\n";
// echo "Lillard $lillardCount\n";
// echo "Leonard $leonardCount\n";
// echo "Green $greenCount\n";
// echo "Whiteside $whitesideCount\n";
// echo "Jordan $jordanCount\n";
// echo "Crawford $crawfordCount\n";
// echo "Iguodala $iguodalaCount\n";
// echo "Lin $linCount\n";
// echo "Schroder $schroderCount\n";
// echo "Kerr $kerrCount\n";
// echo "Popovich $popovichCount\n";
// echo "Stotts $stottsCount\n";
// echo "Lue $lueCount\n";

$myfile = fopen("basketballResults.txt", "w");
fwrite($myfile, "$curryCount\n");
fwrite($myfile, "$westbrookCount\n");
fwrite($myfile, "$jamesCount\n");
fwrite($myfile, "$lillardCount\n");
fwrite($myfile, "$leonardCount\n");
fwrite($myfile, "$greenCount\n");
fwrite($myfile, "$whitesideCount\n");
fwrite($myfile, "$jordanCount\n");
fwrite($myfile, "$crawfordCount\n");
fwrite($myfile, "$iguodalaCount\n");
fwrite($myfile, "$linCount\n");
fwrite($myfile, "$schroderCount\n");
fwrite($myfile, "$kerrCount\n");
fwrite($myfile, "$popovichCount\n");
fwrite($myfile, "$stottsCount\n");
fwrite($myfile, "$lueCount\n");

fclose($myfile);
//
//
// echo $curryCount;
// echo $greenCount;
// echo $iguodalaCount;
// echo $kerrCount;
require 'basketballResults.php';
?>
