<?php
    include_once 'config/settings-configuration.php';

    if (isset($_SESSION['adminSession'])) {
        header("Location: dashboard/admin/");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 400px;
            width: 100%;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #343a40;
            color: white;
            text-align: center;
        }
        .form-links {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="card login-card">
    <div class="card-header py-3">
        <h4 class="mb-0">Admin Sign In</h4>
    </div>
    <div class="card-body p-4">
        <form action="dashboard/admin/authentication/admin-class.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
            </div>

            <div class="d-flex justify-content-end mb-3">
                <a href="forgot-password.php" class="text-decoration-none form-links">Forgot password?</a>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark py-2" name="btn-signin">Sign In</button>
            </div>
        </form>
    </div>
    <div class="card-footer bg-white text-center py-3">
        <small>Don't have an account? <a href="signup.php" class="text-decoration-none">Sign up</a></small>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
