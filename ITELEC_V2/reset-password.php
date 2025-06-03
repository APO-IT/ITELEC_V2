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
    <title>Reset Password</title>
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
        .reset-card {
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

<div class="card reset-card">
    <div class="card-header py-3">
        <h4 class="mb-0">Reset Password</h4>
    </div>
    <div class="card-body p-4">
        <form action="dashboard/admin/authentication/admin-class.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
            <input type="hidden" name="token" value="<?php echo $_GET['token'] ?? ''; ?>">

            <div class="mb-3">
                <label for="newPassword" class="form-label">New Password</label>
                <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="Enter your new password" required>
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirm_new_password" placeholder="Confirm your new password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark py-2" name="btn-reset-password">
                    Reset Password
                </button>
            </div>
        </form>
    </div>

    <div class="card-footer bg-white text-center py-3">
        <small>Remember your password? <a class="text-decoration-none" href="index.php">Sign in</a></small>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
