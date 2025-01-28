<?php
include './includes/db.php';
include './includes/header.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $user = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $stmt= $conn->prepare('insert into users(name,username,email,password) values(?,?,?,?) ');
    $stmt->bind_param('ssss',$user,$username,$email,$password);

    if($stmt->execute()){
        header('location:index.php?sucess=registerd');
    }else {
        echo "<div class='alert alert-danger'>Registration failed: " . $stmt->error . "</div>";
    }
}


?>
<h2>Register</h2>
<form method="POST" class="mt-3">
    <div class="mb-3">
        <label>name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
<?php include 'includes/footer.php'; ?>