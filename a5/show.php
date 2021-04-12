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

    <form id="mainform" action="show.php" method="POST">
        <h2>Current Database</h2>
        <h3>What column do you want to see: </h3>
        <h4>
            <input type="checkbox" name="filsid" value=1 checked>
            <label for="name">Sport ID</label><br>
            <input type="checkbox" name="filnam" value=1 checked>
            <label for="name">Name</label><br>
            <input type="checkbox" name="filpct" value=1 checked>
            <label for="name">Player Count</label><br>
            <input type="checkbox" name="filind" value=1 checked>
            <label for="name">Indoor</label><br>
            <input type="checkbox" name="filrct" value=1 checked>
            <label for="name">Referee Count</label><br>
            <input type="checkbox" name="filori" value=1 checked>
            <label for="name">Origin</label><br>

        </h4>
        <h4><label>filter condition? </label>
            <select class="filter" name="filter">
                <option value="none">none</option>
                <option value="sport_id">Sport ID</option>
                <option value="name">name</option>
                <option value="player_count">Player count</option>
                <option value="Indoor">indoor</option>
                <option value="referee_count">Referee Count</option>
                <option value="origin">Origin</option>


            </select>
            =
            <input class="inp" name="filterItem" type="textbox" size="50" min=0 />
        </h4>

        <h4><label>show multi or single results?: </label>
            <select class="rows" name="rows">
                <option value="multi">multi</option>
                <option value="single">single</option>
            </select>
        </h4>
        <input name="mySubmit" type="submit" value="search" />
    </form>


    <?php
    require("dbconnect.php");
    $dbConn = OpenCon();
    
    $filterItem = "";
    $filter = "";
    $filsid = "";
    $filnam = "";
    $filpct = "";
    $filind = "";
    $filrct = "";
    $filori = "";
    $rows = "";

    $filterItem = $_POST["filterItem"];
    $filter = $_POST["filter"];
    $filsid = $_POST["filsid"];
    $filnam = $_POST["filnam"];
    $filpct = $_POST["filpct"];
    $filind = $_POST["filind"];
    $filrct = $_POST["filrct"];
    $filori = $_POST["filori"];
    $rows = $_POST["rows"];

   
    // the sql query
    $command = "SELECT ";
    ///if no rows variable given from form (only happens when first loading the page)
    ///select * to display all item;
    if ($rows == "") {
        $command .= "* ";
    }
    ///the following list check if the column desired is selected, if selected then add the sql
    if ($filsid == "1") {
        $command .= "sport_id,";
    }
    if ($filnam == "1") {
        $command .= "Name,";
    }
    if ($filpct == "1") {
        $command .= "player_count,";
    }
    if ($filind == "1") {
        $command .= "indoor,";
    }
    if ($filrct == "1") {
        $command .= "referee_count,";
    }
    if ($filori == "1") {
        $command .= "origin,";
    }
    ///remove the , or space at the end of the command
    $command = substr($command, 0, -1);
    $command .= " FROM liuchew_A5.sport";
    ///if filter column is not none and filter item is not empty, add the filter condition
    if ($filter != "none" && $filterItem != "") {
        $command .= " WHERE " . $filter . "=" . "'$filterItem'";
    }
    /// if view only single row, add limit 1 to display the first row;
    if ($rows == "single") {
        $command .= " LIMIT 1";
    }


    // prepare the sql query
    try{
    $statements = $dbConn->prepare($command);
    // execute sql query
    $responseOk = $statements->execute();
    }
    catch(Exception $e){
        echo " error!" . $e->getMessage();

    }



    if ($responseOk) {
        echo '<h2>Full Table</h2>';
        $row = $statements->fetchAll();
        if ($rows == "") {
            ///if rows is empty (only when first entered the page, show entire table);
            display_data($row, 1, 1, 1, 1, 1, 1);
        } else {
            display_data($row, $filsid, $filnam, $filpct, $filind, $filrct, $filori);
        }
    }
    else{
        
        echo "SQLstatement error:".$statements->errorCode();
    }


    echo '<form action="index.html">
 <input type="submit" value="Back to Main Page" >
</form>'

    ?>


</body>

</html>