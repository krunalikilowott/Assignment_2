<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffff99;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .welcome-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 300px;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: black;
            font-size: 24px;
        }
        p {
            color: #333;
            font-size: 16px;
            margin-top: 10px;
        }
       
        .button-container {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }
        select, button {
            margin: 5px;
            padding: 10px 20px;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }
        select {
            background-color: #fff;
            color: #333;
            font-size: 14px;
        }
        button {
            background-color: black;
            color: #fff;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome, User!</h1>
        <p>You have successfully logged in.</p>

        <form action="fetch.php" method="POST" class="button-container">
            <button type="submit">Fetch Data</button>
        </form>

        <form action="fetch11.php" method="POST" class="button-container">
            <label for="column">Select a Column:</label>
            <select id="column" name="column">
                <option value="name">Name</option>
                <option value="address">Address</option>
                
                <option value="number">Number</option>
                <option value="email">Email</option>
            </select>
            <button type="submit">Fetch Column</button>
        </form>
    </div>
</body>
</html>
