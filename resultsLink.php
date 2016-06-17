<?php

$myfile = fopen("basketballResults.txt", "r") or die("Unable to open file!");

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
?>
<!DOCTYPE html>
<html>
<body>
<br/>
<h1>MVP</h1>
<h4> Stephen Curry: <?php echo $curryCount;?> </h4>
<h4> Russell Westbrook: <?php echo $westbrookCount;?> </h4>
<h4> Lebron James: <?php echo $jamesCount;?> </h4>
<h4> Damian Lillard: <?php echo $lillardCount;?> </h4>
<br/>
<h1>Defensive Player of the Year</h1>
<h4> Kawhi Leonard: <?php echo $leonardCount;?> </h4>
<h4> Draymond Green: <?php echo $greenCount;?> </h4>
<h4> Hassan Whiteside: <?php echo $whitesideCount;?> </h4>
<h4> Deandre Jordan: <?php echo $jordanCount;?> </h4>
<br/>
<h1>Sixth Man of the Year: </h1>
<h4> Jamal Crawford: <?php echo $crawfordCount;?> </h4>
<h4> Andre Iguodala: <?php echo $iguodalaCount;?> </h4>
<h4> Jeremy Lin: <?php echo $linCount;?> </h4>
<h4> Dennis Schroder: <?php echo $schroderCount;?> </h4>
<br/>
<h1>Coach of the Year: </h1>
<h4> Steve Kerr: <?php echo $kerrCount;?> </h4>
<h4> Gregg Popovich: <?php echo $popovichCount;?> </h4>
<h4> Terry Stotts: <?php echo $stottsCount;?> </h4>
<h4> Tyron Lue: <?php echo $lueCount;?> </h4>

</body>
</html>
