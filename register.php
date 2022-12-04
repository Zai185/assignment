<?php
include 'connection.php';

if (isset($_POST['register'])) {
    $uid = trim(addslashes($_POST['uid']));
    $email = $_POST['email'];
    $pwd = trim(($_POST['pwd']));
    $error = [];

    empty($uid) ? $error[] = "Username is required" : "";
    empty($email) ? $error[] = "Email is required" : "";
    empty($pwd) ? $error[] = "Password is required" : "";
    if (!$error) {
        $existQuery = "SELECT * FROM users WHERE email='$email'";
        $existResult = mysqli_query($conn, $existQuery);
        if (mysqli_num_rows($existResult) > 0) {
            $error[] = "Email is already existed";
        } else {
            $query = "INSERT INTO users(uid, email, pwd) VALUES ('$uid', '$email','$pwd'); SET @a = 0; UPDATE users SET id = @a := @a +1 ORDER BY id";
            $result = mysqli_multi_query($conn, $query);
            if($result){
                header("location: index.php");
            } else{
                echo mysqli_connect_error();
            }
        }
    } else{
        echo mysqli_connect_error();
    }
}

?>

<?php include 'layout/header.php' ?>
<h1>Registeration</h1>
<?php include 'layout/error.php' ?>
<form action="" method="post">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="uid">
        <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd">
        <label for="floatingPassword">Password</label>
    </div>
    <div>
        <button type="submit" name="register" class="btn btn-primary mt-3">Register</button>
    </div>
</form>
<?php include 'layout/footer.php' ?>