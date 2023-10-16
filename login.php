
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    

    $conn = new mysqli('localhost', 'root', '', 'registration');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $encPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT password FROM register WHERE email = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
      
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
        
            $stmt->bind_result($hashedPassword);
    
            if ($stmt->fetch()) {
                echo "$hashedPassword";
           
                if ($password===$hashedPassword) {
                    header("location: welcome.php");
                    exit;
                
                } else {
                  
                    echo "Incorrect password.";
                }
            } else {
                echo "User not found.";
            }
        } else {
            echo "Error.";
        }

        $stmt->close();
    } 
    $conn->close();

    
}
?>
