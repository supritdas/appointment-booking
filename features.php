<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Features - AppointEase</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>  
  <style>
    body {
      background: linear-gradient(135deg, #4776E6, #5cdb95);
      min-height: 100vh;
    }
    .feature-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
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
        <a href="features.php" class="text-white hover:text-blue-100 transition font-bold">Features</a>
        <a href="works.php" class="text-white hover:text-blue-100 transition">How It Works</a>
        <a href="contact.php" class="text-white hover:text-blue-100 transition">Contact</a>
      </div>
      <a href="login.php" class="bg-white text-blue-600 px-6 py-2 rounded-lg font-medium hover:bg-blue-50 transition">Login</a>
    </div>
  </nav>

  <!-- Header -->
  <div class="container mx-auto px-6 pt-20 pb-12 text-center">
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Powerful Features</h1>
    <p class="text-xl text-blue-100 max-w-2xl mx-auto">Discover how our appointment booking system simplifies your schedule management with these powerful tools.</p>
  </div>

  <!-- Features Grid -->
  <div class="container mx-auto px-6 pb-20">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Feature 1 -->
      <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-8 feature-card">
        <div class="bg-white bg-opacity-30 rounded-full w-16 h-16 flex items-center justify-center mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-white mb-3">Smart Calendar</h3>
        <p class="text-blue-100 mb-4">Intelligent scheduling that prevents double-bookings and optimizes your availability.</p>
        <ul class="text-blue-100 space-y-2">
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Customizable business hours
          </li>
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Buffer time between appointments
          </li>
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Sync with Google Calendar
          </li>
        </ul>
      </div>

      <!-- Feature 2 -->
      <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-8 feature-card">
        <div class="bg-white bg-opacity-30 rounded-full w-16 h-16 flex items-center justify-center mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-white mb-3">Smart Notifications</h3>
        <p class="text-blue-100 mb-4">Automated reminders that reduce no-shows and keep everyone on schedule.</p>
        <ul class="text-blue-100 space-y-2">
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Email confirmations
          </li>
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            SMS reminders
          </li>
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Customizable timing
          </li>
        </ul>
      </div>

      <!-- Feature 3 -->
      <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-8 feature-card">
        <div class="bg-white bg-opacity-30 rounded-full w-16 h-16 flex items-center justify-center mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-white mb-3">Secure System</h3>
        <p class="text-blue-100 mb-4">Enterprise-grade security to protect your data and your clients' information.</p>
        <ul class="text-blue-100 space-y-2">
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            GDPR compliant
          </li>
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            End-to-end encryption
          </li>
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Regular security audits
          </li>
        </ul>
      </div>

      <!-- Feature 4 -->
      <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-8 feature-card">
        <div class="bg-white bg-opacity-30 rounded-full w-16 h-16 flex items-center justify-center mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-white mb-3">Client Management</h3>
        <p class="text-blue-100 mb-4">Organize all your client information in one secure, easily accessible place.</p>
        <ul class="text-blue-100 space-y-2">
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Client profiles
          </li>
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Appointment history
          </li>
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Custom notes
          </li>
        </ul>
      </div>

      <!-- Feature 5 -->
      <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-8 feature-card">
        <div class="bg-white bg-opacity-30 rounded-full w-16 h-16 flex items-center justify-center mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-white mb-3">Analytics Dashboard</h3>
        <p class="text-blue-100 mb-4">Track key metrics and gain insights to optimize your business performance.</p>
        <ul class="text-blue-100 space-y-2">
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Booking statistics
          </li>
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Revenue reports
          </li>
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Client trends
          </li>
        </ul>
      </div>

      <!-- Feature 6 -->
      <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-8 feature-card">
        <div class="bg-white bg-opacity-30 rounded-full w-16 h-16 flex items-center justify-center mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-white mb-3">Online Payments</h3>
        <p class="text-blue-100 mb-4">Accept payments and deposits directly through your booking system.</p>
        <ul class="text-blue-100 space-y-2">
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Multiple payment options
          </li>
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Automatic invoicing
          </li>
          <li class="flex items-center">
            <svg class="h-5 w-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Secure transactions
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Call to Action -->
  <div class="container mx-auto px-6 py-16 text-center">
    <h2 class="text-3xl font-bold text-white mb-6">Ready to experience these features?</h2>
    <a href="login.php" class="inline-block bg-white text-blue-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-blue-50 transition shadow-lg">Get Started Now</a>
  </div>
</body>
</html>