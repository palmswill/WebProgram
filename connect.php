<?php //Slide 20
    //Step 1: Create a connect.php file with the private DB connection data
    $user = "ribeircr_ribeiro";
    $passwd = "*?){NWFNi9Rb";
    $hostname = "localhost"; // OPTIONAL (not private data)

    //this char ” will cause an error
    //It's not the correct double quotes char "
    //Notice the difference it makes in the IDE
    
    /* SLIDE 20 
     * If you get the following error:
     * Connection error: SQLSTATE[HY000] [1045] Access denied for user 'ribeircr_ribeiro'@'localhost' (using password: YES)
     * This means either your username or password is incorrect
     */
?>