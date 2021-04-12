<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <?php


    ///a function that connects to the database when called
    function OpenCon()
    {

        try {
            $dbhost = "localhost";
            $dbuser = "liuchew_liuchew";
            $dbpass = "HarryPotter2012";
            $db = "liuchew_A5";

            $dbConn = new PDO(
                "mysql:host=$dbhost;dbname-$db",
                $dbuser,
                $dbpass
            );
            $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "Connection established!<br>";

            return $dbConn;
        }
        // if there is an error
        catch (PDOException $e) {
            echo "Connection error!" . $e->getMessage();
        }
    }

    ///generate table providing data and its active column, 1 indicates the column is active, 0 indicates the column is inactive
    function display_data($data, $sportid, $name, $pcount, $indoor, $rcount, $origin)
    {
        $output = '<table>';
        $output .= '<tr>';
        if ($sportid == 1) {
            $output .= '<th>Sport ID</th>';
        }
        if ($name == 1) {
            $output .= '<th>Name</th>';
        }
        if ($pcount == 1) {
            $output .= '<th>Player Count</th>';
        }
        if ($indoor == 1) {
            $output .= '<th>Indoor</th>';
        }
        if ($rcount == 1) {
            $output .= '<th>Referee count</th>';
        }
        if ($origin == 1) {
            $output .= '<th>Origin</th>';
        }
        $output .= '</tr>';
        $sum = $sportid + $name + $pcount + $indoor + $rcount + $origin;
        foreach ($data as $key => $var) {
            $output .= '<tr>';
            for ($i = 0; $i < $sum; $i++) {
                $output .= '<td>' . $var[$i] . '</td>';
            }
            $output .= '</tr>';
        }
        $output .= '</table>';
        echo $output;
    }




    ?>


</body>

</html>