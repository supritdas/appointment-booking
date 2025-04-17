<?php
// Add session start at the beginning of the file
session_start();

// Check if user is logged in
$isLoggedIn = isset($_SESSION['pid']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome - Modern Appointment Booking System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 to-green-400 min-h-screen font-sans">
  <!-- Navigation -->
  <nav class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg px-6 py-4">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <span class="text-xl font-bold text-white">AppointEase</span>
      </div>
      <div class="hidden md:flex space-x-6">
        <?php if ($isLoggedIn): ?>
        <a href="patientpanel.php" class="text-white hover:text-blue-100 transition">My Dashboard</a>
        <a href="book-appointment.php" class="text-white hover:text-blue-100 transition">Book Appointment</a>
        <?php endif; ?>
        <a href="features.php" class="text-white hover:text-blue-100 transition">Features</a>
        <a href="works.php" class="text-white hover:text-blue-100 transition">How It Works</a>
        <a href="contact.php" class="text-white hover:text-blue-100 transition">Contact</a>
      </div>
      <?php if ($isLoggedIn): ?>
      <div class="flex items-center">
        <a href="patientpanel.php" class="bg-white text-blue-600 px-4 py-2 rounded-lg font-medium hover:bg-blue-50 transition mr-3">Dashboard</a>
        <a href="logout.php" class="bg-transparent border-2 border-white text-white px-4 py-2 rounded-lg font-medium hover:bg-white hover:bg-opacity-10 transition">Logout</a>
      </div>
      <?php else: ?>
      <a href="login.php" class="bg-white text-blue-600 px-4 py-2 rounded-lg font-medium hover:bg-blue-50 transition">Login</a>
      <?php endif; ?>
    </div>
  </nav>

  <?php if (!$isLoggedIn): ?>
  <!-- Hero Section (Only show to non-logged in users) -->
  <div class="container mx-auto px-6 py-16 flex flex-col md:flex-row items-center">
    <div class="md:w-1/2 flex flex-col items-start">
      <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">Schedule Appointments with Ease</h1>
      <p class="text-xl text-blue-100 mb-8">Streamline your booking process and manage your schedule efficiently with our intuitive appointment booking system.</p>
      <div class="flex space-x-4">
        <a href="login.php" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-bold hover:bg-blue-50 transition shadow-lg">Get Started</a>
        <a href="#demo" class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg font-bold hover:bg-white hover:bg-opacity-10 transition">Watch Demo</a>
      </div>
    </div>
    <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
      <img src="image.png" alt="Appointment booking illustration" class="w-full max-w-md rounded-xl shadow-2xl">
    </div>
  </div>
  <?php else: ?>
  <!-- Welcome section for logged in users -->
  <div class="container mx-auto px-6 py-16">
    <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg rounded-xl p-8 max-w-3xl mx-auto">
      <h1 class="text-3xl font-bold text-center text-white mb-6">Welcome Back!</h1>
      <p class="text-xl text-center text-blue-100 mb-8">Thank you for using AppointEase. Manage your appointments and profile from your dashboard.</p>
      <div class="flex justify-center space-x-4">
        <a href="patientpanel.php" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-bold hover:bg-blue-50 transition shadow-lg">Go to Dashboard</a>
        <a href="book-appointment.php" class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg font-bold hover:bg-white hover:bg-opacity-10 transition">Book Appointment</a>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php if (!$isLoggedIn): ?>
  <!-- Features Section (Only show to non-logged in users) -->
  <div id="features" class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg py-16">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center text-white mb-12">Why Choose Our System</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white bg-opacity-20 p-6 rounded-xl backdrop-filter backdrop-blur-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <h3 class="text-xl font-bold text-white mb-2">24/7 Availability</h3>
          <p class="text-blue-100">Allow clients to book appointments anytime, even outside business hours.</p>
        </div>
        <div class="bg-white bg-opacity-20 p-6 rounded-xl backdrop-filter backdrop-blur-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <h3 class="text-xl font-bold text-white mb-2">Smart Reminders</h3>
          <p class="text-blue-100">Automated notifications to reduce no-shows and keep everyone on schedule.</p>
        </div>
        <div class="bg-white bg-opacity-20 p-6 rounded-xl backdrop-filter backdrop-blur-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
          <h3 class="text-xl font-bold text-white mb-2">Easy Management</h3>
          <p class="text-blue-100">Intuitive dashboard to manage your appointments and client information.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Call to Action -->
  <div class="container mx-auto px-6 py-16 text-center">
    <h2 class="text-3xl font-bold text-white mb-6">Ready to streamline your booking process?</h2>
    <a href="login.php" class="inline-block bg-white text-blue-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-blue-50 transition shadow-lg">Get Started Now</a>
  </div>
  <?php endif; ?>

  <script>
    // Simple animation for the hero section
    document.addEventListener('DOMContentLoaded', () => {
      const heroElements = document.querySelectorAll('.container > div > h1, .container > div > p, .container > div > div');
      heroElements.forEach((el, index) => {
        setTimeout(() => {
          el.style.opacity = '0';
          el.style.transform = 'translateY(20px)';
          el.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
          
          setTimeout(() => {
            el.style.opacity = '1';
            el.style.transform = 'translateY(0)';
          }, 100);
        }, index * 200);
      });
    });
  </script>
</body>
</html>