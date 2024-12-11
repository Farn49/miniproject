<?php
// เชื่อมต่อกับฐานข้อมูล
include('../functions/db_connect.php');

// ตรวจสอบว่าเมื่อผู้ใช้ทำการส่งข้อมูล (Login) มา
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบข้อมูลผู้ใช้ในฐานข้อมูล
    $query = "SELECT * FROM employees WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        // ตั้งค่าตัวแปร session เพื่อเก็บข้อมูลผู้ใช้
        session_start();
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error = "Username or Password is incorrect.";
    }
}
?>

<?php include('../templates/header.php'); ?>

<main>
    <h1>Login</h1>

    <form method="POST" action="login.php">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <!-- แสดงข้อความข้อผิดพลาดหากมี -->
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
</main>

<?php include('../templates/footer.php'); ?>
