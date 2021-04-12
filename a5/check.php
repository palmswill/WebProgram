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

// connect to server
try {
    $dbhost = "127.0.0.1";
            $dbuser = "liuchew_liuchew";
            $dbpass = "HarryPotter2012";
            $db = "liuchew_A5";


    $dbConn = new PDO("mysql:host=".$dbhost.";dbname=".$db,
        $dbuser,
        $dbpass
    );

    echo "Connection established!<br>";
}
// if there is an error
catch (PDOException $e) {
    echo "Connection error!" . $e->getMessage();
}





// the sql query
$command = "SELECT name, price FROM inventory";
// prepare the sql query
$statements = $dbConn->prepare($command);
// execute sql query
$responseOk = $statements->execute();

if($responseOk) {
    // "fetch" the response
    $row = $statements->fetch();
    echo $row["name"] . " costs \$" . $row["price"];
}
else {
    echo "There was an error with your command";
}
?>





        <!-- <?php

        phpinfo();
        // include 'dbconnect.php';
        // $conn=OpenCon();
        // echo "Connected Sucessfully";

        // CloseCon($conn);



        ?> -->
        
        <script src="" async defer></script>
    </body>
</html>