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
    $dbConn = OpenCon();

    $sportid = $_POST["sportid"];
    $name = $_POST["name"];
    $pcount = $_POST["pcount"];
    $indoor = $_POST["indoor"];
    $rcount = $_POST["rcount"];
    $origin = $_POST["origin"];


    // the sql query
    $command = "UPDATE liuchew_A5.sport 
SET name='$name',player_count='$pcount',indoor='$indoor',referee_count='$rcount',origin='$origin'
WHERE sport_id='$sportid'";
    // prepare the sql query
    $statements = $dbConn->prepare($command);
    // execute sql query
    $responseOk = $statements->execute();



    ///if sucessfull, show entire table
    if ($responseOk) {

        $command = "select * from liuchew_A5.sport";
        // prepare the sql query
        $statements = $dbConn->prepare($command);
        // execute sql query
        $responseOk = $statements->execute();

        if ($responseOk) {
            echo '<h1>' . $name. '   Succesfully Updated ! </h1>';
            echo '<h2>Full Table</h2>';
            $row = $statements->fetchAll();
            display_data($row, 1, 1, 1, 1, 1, 1);
        }
    }

    echo '<form action="index.html">
 <input type="submit" value="Back to Main Page">
</form>'

    ?>



</body>

</html>