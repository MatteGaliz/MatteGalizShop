<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        table {
            border: 2px solid;
        }

        th {
            border-bottom: 1px solid;
            background-color: #ddd;
        }

        input {
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <form action="home.php" method="post">
        <table>
            <tr>
                <th colspan="2">Login</th>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="login" value="login">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>