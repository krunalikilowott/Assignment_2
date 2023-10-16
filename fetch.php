<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
        }

        table, th, td {
            border: 3px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #CE4082;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
<body style="background-image: url('background.jpg'); background-size: cover; background-attachment: fixed;">

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, Address, number, email FROM register";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Name</th><th>Address</th><th>Contact</th><th>Email</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["number"] . "</td><td>" . $row["email"] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "No records found";
    }

    $conn->close();
    ?>
</body>
</html>
