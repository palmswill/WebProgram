<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/site.css">
    </head>
    <body>

<?php
require("dbconnect.php");
//connect to db
$dbConn=OpenCon();

$sportid = $_POST["sportid"];


// the sql query
$command = "DELETE FROM liuchew_A5.sport 
WHERE sport_id='$sportid'";
// prepare the sql query
$statements = $dbConn->prepare($command);
// execute sql query
$responseOk = $statements->execute();


//if response ok show the table
if($responseOk) {
    
$command = "select * from liuchew_A5.sport";
// prepare the sql query
$statements = $dbConn->prepare($command);
// execute sql query
$responseOk = $statements->execute();

if($responseOk) {
    echo '<h1> Sport Number: '.$sportid.'   Succesfully deleted ! </h1>';
    echo '<h2>Full Table</h2>';
    $row = $statements->fetchAll();
    display_data($row,1,1,1,1,1,1);
}
}

echo '<form action="index.html">
 <input type="submit" value="Back to Main Page">
</form>'

?>






        
        <script src="" async defer></script>
    </body>
</html>