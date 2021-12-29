<?php

// getting the value of post parameter
$room = $_POST['room'];

// checking the string size
if(strlen($room) > 20 or strlen($room) < 2){
    $message = "Plese choose a name between 2 to 20 characters";
    echo '<script language="javascript">';
    echo 'alert("'. $message .'");';
    echo 'window.location="http://localhost/phpChatroom";';
    echo '</script>';
}

// checking whether room name is alphanumeric
else if(!ctype_alnum($room)){
    $message = "Plese choose an alphanumeric room name";
    echo '<script language="javascript">';
    echo 'alert("'. $message .'");';
    echo 'window.location="http://localhost/phpChatroom";';
    echo '</script>';
}

else{
    // connecting to the database
    include 'db_connect.php';
}

// check if room already exists
$sql = "SELECT * FROM `rooms` WHERE roomname = '$room'";
$result = mysqli_query($conn, $sql);
if($result){
    if(mysqli_num_rows($result) > 0)
    {
        $message = "Plese choose a different room name. This room is already claimed.";
        echo '<script language="javascript">';
        echo 'alert("'. $message .'");';
        echo 'window.location="http://localhost/phpChatroom";';
        echo '</script>';
    }
    
    else{
        $sql = "INSERT INTO `rooms` (`roomname`, `sdate`) VALUES ('$room', current_timestamp());";
        if(mysqli_query($conn, $sql)){
            $message = "Your room is ready and you can chat now.";
            echo '<script language="javascript">';
            echo 'alert("'. $message .'");';
            echo 'window.location="http://localhost/phpChatroom/rooms.php?roomname=' .$room. '";';
            echo '</script>';
        }
    }
}
else{
    echo "Error : ". mysqli_error($conn);
}

?>