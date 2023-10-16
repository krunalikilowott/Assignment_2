<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedColumn = $_POST['column'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "registration";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT $selectedColumn FROM register";

    $result = $conn->query($sql);
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Fetch Data</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            h1 {
                margin-bottom: 20px;
            }
            #result {
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
                text-align: center;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div id="result">
            <h1>Column: <?php echo $selectedColumn; ?></h1>

            <?php
           
            if ($result) {
                echo "<table>";
                echo "<tr><th>Sr. No.</th><th>Data</th></tr>";

                $serialNo = 1;

                while ($row = $result->fetch_assoc()) {
                    $columnValue = $row[$selectedColumn];
                    echo "<tr><td>$serialNo<br><br></td><td>$columnValue</td></tr>";
                    $serialNo++;
                }

                echo "</table>";

                $result->close();
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
            ?>
        </div>
    </body>
    </html>

<?php
}
?>
