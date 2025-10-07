<?php
    $name = $_POST["name"];
    $emailmob = $_POST["emailmob"];
    $choice = $_POST["option"];
    $comments = $_POST["comments"];

    $conn = new mysqli('localhost','root','','feedback');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into feedback(name, emailmob, option, comments)
        values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $emailmob, $choice, $comments);
        $stmt->execute();
        echo "your feedback was successfully recorded.";
        $stmt->close();
        $conn->close();
    }
?>
