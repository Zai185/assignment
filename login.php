<?php

session_start();

include 'connection.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pwd = trim(($_POST['pwd']));
    $error = [];
    
    empty($email) ? $error[] = "Email is required" : "";
    empty($pwd) ? $error[] = "Password is required" : "";
    
    if (!$error) {
        $pwd = md5($pwd);
        $query = "SELECT * FROM users WHERE email = '$email' AND pwd='$pwd'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $user = mysqli_fetch_assoc($result);
            if ($user) {
                $_SESSION['auth'] = true;
                $_SESSION['uid'] = $user['uid'];
                $_SESSION['email'] = $user['email'];
                header("location: index.php");
            } else {
                $error[] = "Email or Password is wrong, Try Again!";
            }
        } else {
            echo mysqli_connect_error();
        }
    }

}
?>
<?php include 'layout/header.php'; ?>
<h1>Log In</h1>
<?php include 'layout/error.php'; ?>
<form action="" method="post">
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd">
        <label for="floatingPassword">Password</label>
    </div>
    <div>
        <button type="submit" name="login" class="btn btn-primary mt-3">Register</button>
    </div>
</form>

<?php include 'layout/footer.php'; ?>