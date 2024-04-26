<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <style>
form {
    max-width: 400px;
    margin: 0 auto;
}
table {
    width: 100%;
    border-collapse: collapse;
}
td {
    padding: 8px;
}
input[type="text"],
input[type="password"] {
    width: calc(100% - 16px); 
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: red;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type="submit"]:hover {
    background-color: #45a049;
}
h1 {
    text-align: center;
    margin-top: 50px;
}
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    padding: 20px;
}
    </style>
    <h1>Halaman Login</h1>
    <form action="proses_login.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
    <center><p>sudah punya akun?<a href="register.php">Register</a></p></center>
</body>
</html>