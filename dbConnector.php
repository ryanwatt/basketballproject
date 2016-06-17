
<?php

function loadDatabase()
{

  // $dbHost = "";
  // $dbPort = "";
  // $dbUser = "adminavGGRVZ";
  // $dbPassword = "uan79BAVksBA";

     $dbName = "basketballproject";

     $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');
     $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
     $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
     $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
     $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

     $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

     return $db;

}

?>
