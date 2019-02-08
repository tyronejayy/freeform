<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>freeform recap php</title>
</head>
<body>

<?php

    $myName = "Tyrone";

    $age = 21;

    $foods = array('lasagne', 'macaroni', 'roti&curry');

    echo " My name is " . $myName . " and my age is " . $age .  ". Currently my favourite foods are " . $foods[0]. ", " . $foods[1], " and " .$foods[2]. ".";

    //function call .. referencing the value that we declared at the top
    echo "</br>". 'The variable $myName is a datatype known as a '. gettype($myName) . '.';


?>

</body>
</html>


<!---------------------- FOLLOW-THROUGH OF THE MYSQL/PHP LECTURE ------------------------>

<?php

    //index.php file
    include_once 'connect.php';

    //query to create table
    $sql = "CREATE TABLE film(
        id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(64) NOT NULL,
        director VARCHAR(64) NOT NULL,
        year INT(4)
        )"

    //accept link to the database and the query to create the table
    if (mysqli_query($conn, $sql)) {
        echo '<br>Table film created successfully. You may now proceed to <a href="add.php">add</a> data to the table';
    } else {
        echo "<br>Error creating table: " . mysqli_error($conn);
    }

    //delete the table manually for testing purposes eg. DROP table publications

?>

    
<?php
    //user.php file variables declared ... 
    $servername = "localhost";
    $username = "jan";
    $password = "janspass";
    $database = "publications";
?>

<?php
    //connect.php file
    include_once 'user.php';

    //create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    //check connection
    //if it is true then conection failed, if not then it is successfully
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connected successfully";
    }
?>

<?php 

    //connect to database disp.php file ... include file .. 'require' if data mustnt work without it
    include_once 'connect.php';

    $sql = "SELECT * FROM film"; //resource, more than one column ... more like an associative array
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of selection
        $display = mysqli_fetch_assoc($result); //call data
        echo "<br>Title: " . $display["title"]; //tell php which element to access (title, director etc.)
    } else {
        echo "0 results";
    }

    mysqli_close($conn)
    
?>

<?php

    include_once 'connect.php';

    $sql = "INSERT INTO film (title, director, year)
    VALUES ('Escape from New York', 'John Carpenter', '1981')";

    if (mysqli_query($conn, $sql)) {
    echo '<br>New record for table, film, created successfully. You may now select an entry for <a href="disp.php">display</a>.';
    } else {
    echo "Error: " . $sql . $sql . <br> . mysqli_error($conn);
    }

?>

<?php

    //NB path
    require_once 'connect.php';

    if (isset($_POST['add'])) {
        $listText = $_POST['add'];
        $sql = "INSERT INTO list_items (ListText)
        VALUES ('$listText')";

        //Execute query and validate success
        if ($db_server->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $db_server->error;
        }
    }

    //while works similar to for loop but you only need a conditional that evaluates to true as its looped through resource

?>

require_once and connect to the database


if ($db_server->connect_error) {
    die("Connection failed")
}

db_server or conn aiya !!!