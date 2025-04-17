<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>How It Works - AppointEase</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #4776E6, #5cdb95);
      min-height: 100vh;
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
        <a href="how-it-works.php" class="text-white hover:text-blue-100 transition font-bold">How It Works</a>
        <a href="contact.php" class="text-white hover:text-blue-100 transition">Contact</a>
      </div>
      <a href="login.php" class="bg-white text-blue-600 px-6 py-2 rounded-lg font-medium hover:bg-blue-50 transition">Login</a>
    </div>
  </nav>

  <!-- Header -->
  <div class="container mx-auto px-6 pt-16 pb-8 text-center">
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">How AppointEase Works</h1>
    <p class="text-xl text-blue-100 max-w-2xl mx-auto">Simple steps to streamline your scheduling process</p>
  </div>

  <!-- Steps Section -->
  <div class="container mx-auto px-6 pb-16">
    <div class="max-w-4xl mx-auto">
      <!-- Steps Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Step 1 -->
        <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-6">
          <div class="bg-white bg-opacity-30 rounded-full w-12 h-12 flex items-center justify-center mb-4">
            <span class="text-xl font-bold text-white">1</span>
          </div>
          <h3 class="text-2xl font-bold text-white mb-3">Create Your Account</h3>
          <p class="text-blue-100">Sign up in minutes and set up your business profile with services, working hours, and team members.</p>
        </div>

        <!-- Step 2 -->
        <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-6">
          <div class="bg-white bg-opacity-30 rounded-full w-12 h-12 flex items-center justify-center mb-4">
            <span class="text-xl font-bold text-white">2</span>
          </div>
          <h3 class="text-2xl font-bold text-white mb-3">Customize Booking Page</h3>
          <p class="text-blue-100">Personalize with your brand colors, logo, and set appointment types, durations, and pricing.</p>
        </div>

        <!-- Step 3 -->
        <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-6">
          <div class="bg-white bg-opacity-30 rounded-full w-12 h-12 flex items-center justify-center mb-4">
            <span class="text-xl font-bold text-white">3</span>
          </div>
          <h3 class="text-2xl font-bold text-white mb-3">Share Booking Link</h3>
          <p class="text-blue-100">Share your unique booking link with clients through email, social media, or embed on your website.</p>
        </div>

        <!-- Step 4 -->
        <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-6">
          <div class="bg-white bg-opacity-30 rounded-full w-12 h-12 flex items-center justify-center mb-4">
            <span class="text-xl font-bold text-white">4</span>
          </div>
          <h3 class="text-2xl font-bold text-white mb-3">Manage Your Schedule</h3>
          <p class="text-blue-100">Receive notifications for new bookings, view your schedule, and manage appointments from your dashboard.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Client Flow Visualization -->
  <div class="container mx-auto px-6 pb-20">
    <div class="max-w-4xl mx-auto bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-8">
      <h2 class="text-2xl font-bold text-white mb-6 text-center">The Client Experience</h2>
      <div class="flex flex-wrap justify-center text-center">
        <div class="w-1/4 px-2 mb-6">
          <div class="bg-white bg-opacity-30 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
          <p class="text-blue-100 text-sm">Find Services</p>
        </div>
        <div class="w-1/4 px-2 mb-6">
          <div class="bg-white bg-opacity-30 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <p class="text-blue-100 text-sm">Select Time</p>
        </div>
        <div class="w-1/4 px-2 mb-6">
          <div class="bg-white bg-opacity-30 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>
          <p class="text-blue-100 text-sm">Enter Details</p>
        </div>
        <div class="w-1/4 px-2 mb-6">
          <div class="bg-white bg-opacity-30 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          <p class="text-blue-100 text-sm">Confirm Booking</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Call to Action -->
  <div class="container mx-auto px-6 py-10 text-center">
    <a href="login.php" class="inline-block bg-white text-blue-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-blue-50 transition shadow-lg">Get Started Now</a>
  </div>
</body>
</html>