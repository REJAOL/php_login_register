<?php
session_start();
include 'includes/header.php';
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
?>

<h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
<p>This is your dashboard. You are logged in.</p>
<a href="logout.php" class="btn btn-danger">Logout</a>
<?php include 'includes/footer.php'; ?>
