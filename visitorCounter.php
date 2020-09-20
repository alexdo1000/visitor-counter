<?php
    // Database connection configuration. Fill in these fields according to the database setup
    $hostname = "127.0.0.1";
    $db_user = "root";
    $db_pass = ""; // Enter the database password here
    $db_name = "visits";

    // Connecting to the database
    $connection = mysqli_connect($hostname, $db_user, $db_pass, $db_name);
    if(mysqli_connect_errno()){
        die("There is an error connecting to the database.");
    }

    // Adding a new visit to the database
    $date = date('Y-m-d h:i:s');
    $query = "INSERT INTO visitTable (date) VALUES ('$date')";
    $result = mysqli_query($connection, $query);

    // Check for a query error
    if(!$result){
        die("There is an error inserting into the database<br>".$query);
    }

    // Retrieval of the number of visits currently in the database
    $query = "SELECT * FROM visitTable";
    $result = mysqli_query($connection, $query);

    // Check for a query error
    if(!$result){
        die("There is an error retrieving from the query<br>".$query);
    }

    // The number of rows represents the number of total visits
    $totalVisits = mysqli_num_rows($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Counter</title>
    <script src="index.php"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
</head>
<body>
    <br>
    <h1 class="ui center aligned icon header">
        <i class="circular users icon"></i>
        Visitor Counter
    </h1>

    <div class="ui center aligned container">
        <div class="column">
            <h3>Number of visits: </h3>
            <p><?php echo $totalVisits;?></p>
        </div>
    </div>
</body>
</html>