<!-- ini adalah halaman login -->
<!DOCTYPE html>
<html>

<head>
    <title>Membuat Login Dengan CodeIgniter | www.malasngoding.com</title>
</head>

<body>
    <h1>Membuat Login Dengan CodeIgniter <br /> www.malasngoding.com</h1>
    <!-- ini adaldah baris kode form login dan username dan password yang dimasukkan akan diarahkan ke controller login, method aksi_login. Dikirim melalui method post -->
    <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
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
</body>

</html>