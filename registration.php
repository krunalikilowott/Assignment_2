
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $number=$_POST["number"];
    $Address=$_POST["address"];

    $conn = new mysqli("localhost", "root", "", "registration");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $checkSql = "SELECT email FROM register WHERE email = ?";
    $checkStmt = $conn->prepare($checkSql);

    if ($checkStmt) {
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            echo "Email address is already registered. Please use a different email.";
            $checkStmt->close();
        } else {
          
            $checkStmt->close();

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO register (name,number,email, password,verification,Address) VALUES (?,?,?, ?,'verified',?)";

            $stmt = $conn->prepare($sql);

            if ($stmt) {
            
                $stmt->bind_param("sssss", $name, $number, $email, $password, $Address);

                if ($stmt->execute()) {
                    echo'<div style="text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 300px; padding: 20px; background-color: #48ff68; color: green; border-radius: 20px; font-size: 32px;">"Successfully Registered.";</div>';
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } 
        }
        $conn->close();
    }
}
?>
