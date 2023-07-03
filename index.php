<?php echo file_get_contents('registration.html'); ?>
<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'timepass', 'registration');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn ->prepare("insert into registration(firstname, lastname, email, password) values(?, ?, ?, ?)");
        $stmt -> bind_param("ssssssi", $firstname, $lastname, $email, $password);
        $stmt->execute();
        echo "Registration Completed Succesfully";
        $stmt -> close();
        $conn -> close();
    }