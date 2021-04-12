<?php //SLIDE 21
    //Step 2: Connect the DB connection data file to index.php file
    require("connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Database Connection Example</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php 
            //SLIDE 19
            // Step 3: Connect to database
            try { 
                $dbConn = new PDO("mysql:host=localhost;dbname=MYID",     
                "ribeircr_ribeiro", "*?){NWFNi9Rb"); 
            } 
            catch (PDOException $e) { 
                echo ‘Connection error: ‘ . $e->getMessage(); 
            }


            //SLIDE 22
            // Step 3: Connect to database SECURELY
            try { 
                $dbConn = new PDO("mysql:host=$hostname;dbname=ribeircr_SYST10199", $user, $passwd); 
                echo 'Successfully connected to database <br><br>';
            } catch (PDOException $e) { 
                echo 'Connection error: ' . $e->getMessage() . "<br>"; 
            }

            //SLIDE 24 - SELECT MSQL Query
            $command = "SELECT * FROM inventory"; 
            //put query in var $command
            $stmt = $dbConn->prepare($command); 
            //prepare SQL query
            $execOk = $stmt->execute(); 
            //execute SQL query
            //execute() returns boolean
            //Returns true (1) for successful execution
           
            if($execOk){ //if query executed successfully
                echo "<b> Records in Database </b><br>";
                while($row = $stmt->fetch())
                //set value of $row to $stmt->fetch()
                //echo "stmt->fetch() = " . $stmt->fetch() . "<br>"; 
                //$stmt->fetch() returns an Array of the query results
                    echo 'Item: ' . $row[name] . '    Price: ' . $row[price] . '<br>';
                    //name & price are the column names in the DB
            }
            else //Query did not execute successfully
                //test by changing query to an invalid query
                echo 'Error executing query';
        ?>
    </body>
</html>