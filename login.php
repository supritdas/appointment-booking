<?php
session_start();
include("includes/db.php");

if (isset($_SESSION['pid'])) {
    // If the session is already set, redirect to the book-appointments page
    header("Location: book-appointment.php");
    exit();
}

// Error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];  // Get phone number from form

    // Query to fetch user data
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Database query failed: " . mysqli_error($con));
    }

    $user = mysqli_fetch_assoc($result);

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['pid'] = $user['userID'];  // Store patient ID in session

        // Check if the phone number is already stored
        if (empty($user['phone']) && !empty($phone)) {
            // If phone is not set in the database, update it with the provided phone number
            $update_query = "UPDATE users SET phone='$phone' WHERE userID='" . $user['userID'] . "'";
            $update_result = mysqli_query($con, $update_query);
            if (!$update_result) {
                die("Error updating phone number: " . mysqli_error($con));
            }
        }

        // Store phone number in session
        $_SESSION['phone'] = $phone;

        // Redirect to book-appointments page
        header("Location: patientpanel.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - AppointEase</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #4776E6, #5cdb95);
      min-height: 100vh;
    }
    .login-input {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: white;
    }
    .login-input::placeholder {
      color: rgba(255, 255, 255, 0.6);
    }
    .login-input:focus {
      outline: none;
      background: rgba(255, 255, 255, 0.3);
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg px-6 py-4">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <a href="index.php" class="text-xl font-bold text-white">AppointEase</a>
      </div>
      <div class="hidden md:flex space-x-6">
        <a href="features.php" class="text-white hover:text-blue-100 transition">Features</a>
        <a href="works.php" class="text-white hover:text-blue-100 transition">How It Works</a>
        <a href="contact.php" class="text-white hover:text-blue-100 transition">Contact</a>
      </div>
      <div class="bg-white text-blue-600 px-6 py-2 rounded-lg font-medium">Login</div>
    </div>
  </nav>

  <!-- Login Section -->
  <div class="container mx-auto px-6 py-16">
    <div class="max-w-md mx-auto">
      <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-8">
        <h2 class="text-3xl font-bold text-white mb-6 text-center">Login to Your Account</h2>
        
        <?php if (isset($error)): ?>
        <div class="bg-red-100 bg-opacity-70 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
          <p class="text-center"><?php echo $error; ?></p>
        </div>
        <?php endif; ?>
        
        <form method="POST" action="login.php">
          <div class="mb-6">
            <label for="username" class="block text-blue-100 mb-2">Username</label>
            <input type="text" class="w-full px-4 py-3 rounded-lg login-input" name="username" id="username" placeholder="Enter your username" required>
          </div>
          
          <div class="mb-6">
            <label for="password" class="block text-blue-100 mb-2">Password</label>
            <input type="password" class="w-full px-4 py-3 rounded-lg login-input" name="password" id="password" placeholder="Enter your password" required>
          </div>
          
          <div class="mb-8">
            <label for="phone" class="block text-blue-100 mb-2">Phone Number</label>
            <input type="text" class="w-full px-4 py-3 rounded-lg login-input" name="phone" id="phone" placeholder="Enter your phone number" required>
          </div>
          
          <button type="submit" name="login" class="w-full bg-white text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-blue-50 transition">
            Login
          </button>
          
          <div class="mt-6 text-center">
            <p class="text-blue-100">Don't have an account? <a href="register.php" class="text-white hover:underline">Sign up</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="container mx-auto px-6 py-8">
    <div class="text-center text-blue-100 text-sm">
      <p>&copy; <?php echo date('Y'); ?> AppointEase. All rights reserved.</p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>