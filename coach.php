<?php
include_once 'Header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach</title>
</head>

<body>
    <?php
    // coach can write and send a message to a user
    if (isset($_SESSION["useruid"])) {
        echo "<div class='container6'>
        <br>
        <h2>Send a message to a user</h2>
        <form action='includes/message.inc.php' method='post'>
            <input type='text' name='message' placeholder='Message...'><br>
            <input type='text' name='user' placeholder='User...'><br>
            <button type='submit' name='submit'>Send</button>
        </form>;";
    }
    ?>
</body>

</html>