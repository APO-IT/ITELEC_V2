<?php
require_once 'authentication/admin-class.php';

$admin = new ADMIN();
if (!isset($_SESSION['adminSession'])) {
    echo "<script>alert('Please log in!'); window.location.href='../../';</script>";
    exit;
}

$stmt = $admin->runQuery("SELECT * FROM user WHERE id = :id");
$stmt->execute(array(":id" => $_SESSION['adminSession']));
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            flex-shrink: 0;
        }
        .sidebar a {
            color: white;
            padding: 15px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            flex-grow: 1;
            padding: 2rem;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar d-flex flex-column p-3">
    <h4 class="text-center mb-4">Admin Panel</h4>
    <a href="#">Dashboard</a>
    <a href="#">Users</a>
    <a href="#">Settings</a>
    <a href="authentication/admin-class.php?admin_signout" class="mt-auto btn btn-danger mx-3">Sign Out</a>
</div>

<!-- Main Content -->
<div class="main-content">
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Welcome Admin</span>
        </div>
    </nav>

    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h3 class="card-title">Hello, <?php echo htmlspecialchars($user_data['email']); ?>!</h3>
            <p class="card-text">You have successfully logged into the admin dashboard.</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
