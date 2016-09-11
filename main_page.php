<?php
include "rouse.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Rouse </title>
    </head>
<body>
    <h2>Welcome, <?php if(isset($_GET['first_name'])){echo $_GET["first_name"];} ?>! </h2> <!-- the stuff inside the $_GET[] is just parameter names-->
    <h3> <?php if(isset($_GET['phonenumber'])){echo $_GET["phonenumber"];} ?> </h3>
    <h3> <?php if(isset($_GET['interests'])){echo $_GET["interests"];} ?> </h3>
    <h3> <?php if(isset($_GET['personalgoals'])){echo $_GET["personalgoals"];} ?> </h3>
    <h3>What time would you like to <?php if(isset($_GET['personalgoals'])){
            if(strcmp($_GET['personalgoals'], "") === 0) {
                echo "wake up";
                $usertype = "caller";
            } else {
                echo "be woken up";
                $usertype = "receiver";
            }
        } ?>?</h3>
    <form method="post" action="match.php">
        Select a time:
        <input type="time" name="usr_time">
        <input type="text" name="usr_email" value=<?php echo '"' . $_GET['email'] . '"';?>>
        <input type="text" name="usr_type" value=<?php echo '"' . $usertype . '"';?>>
        <input type="submit">
    </form>
</body>
</html>