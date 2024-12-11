<?php
// เริ่มต้น session
session_start();

// ถ้าผู้ใช้ยังไม่ได้เข้าสู่ระบบ, เปลี่ยนเส้นทางไปที่หน้า Login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('../templates/header.php');
?>

<main>
    <h1>Welcome to Home</h1>
    <p>Hello, <?php echo $_SESSION['username']; ?>! Welcome to your dashboard.</p>
    <a href="logout.php">Logout</a>
</main>

<?php include('../templates/footer.php'); ?>
