<?php
session_start();
include './includes/db.php';
include './includes/header.php';


if($_SERVER['REQUEST_METHOD']==='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $conn->prepare('select id, password from users where email = ? ');
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->store_result();


    if($stmt->num_rows>0){
        $stmt->bind_result($password, $hashed_password);
        $stmt->fetch();

        if(password_verify($password,$hashed_password)){
            $_SESSION['user_id']= $id;
            header('Location:dashboard.php');
            exit();
        }
    }

    echo "<div class='alert alert-danger'>Invalid email or password.</div>";
}

?>

<h2>Login</h2>
<form method="POST" class="mt-3">
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <p class="mt-3">Don't have an account? <a href="register.php">Register here</a>.</p>
</form>
<?php include 'includes/footer.php'; ?>




















include './includes/footer.php';
?>