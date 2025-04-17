<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['pid'])) {
    header("Location: login.php");
    exit();
}

// Display success message if the appointment was booked successfully
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    $successMessage = "✅ Appointment booked successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Panel - AppointEase</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-gradient-custom {
            background: linear-gradient(135deg, #4b87ea 0%, #2ec9b3 100%);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-custom">
    <!-- Navbar -->
    <nav class="py-4">
        <div class="container mx-auto px-8 flex justify-between items-center">
            <a class="font-bold text-xl flex items-center text-white" href="index.php">
                <span class="mr-2 text-2xl">📅</span>AppointEase
            </a>
            <div class="flex space-x-8 items-center">
                <a href="features.php" class="text-white hover:text-blue-100">Features</a>
                <a href="works.php" class="text-white hover:text-blue-100">How It Works</a>
                <a href="contact.php" class="text-white hover:text-blue-100">Contact</a>
                <a href="logout.php" class="bg-white text-blue-600 hover:bg-blue-50 font-bold py-2 px-8 rounded-full transition duration-300 ease-in-out">
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container mx-auto px-8 py-16">
        <!-- Top Section -->
        <div class="flex flex-col lg:flex-row justify-between items-start mb-24">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <h1 class="text-5xl font-bold text-white mb-6">Welcome to Your Patient Panel</h1>
                <p class="text-xl text-white opacity-90 mb-8 max-w-lg">
                    Streamline your booking process and manage your schedule efficiently with our intuitive appointment booking system.
                </p>
                
                <!-- Success Message -->
                <?php if (isset($successMessage)): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <?php echo $successMessage; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- <div class="lg:w-1/2 flex justify-end">
                <div class="bg-white p-6 rounded-3xl shadow-xl w-full max-w-md">
                    <div class="bg-teal-100 p-6 rounded-2xl mb-4">
                        <h2 class="text-2xl font-bold text-teal-700">BOOK YOUR APPOINTMENT</h2>
                        <p class="text-teal-700 mb-4">ONLINE</p>
                        
                        <div class="flex justify-center">
                            <img src="/api/placeholder/400/200" alt="Medical appointment illustration" class="max-w-full" />
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

        <!-- Panel Options - Two cards centered -->
        <div class="flex flex-col lg:flex-row justify-center gap-8 mt-8">
            <!-- Book Appointment Card -->
            <a href="book-appointment.php" class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md text-center">
                <div class="flex justify-center mb-4">
                    <div class="text-teal-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11v4M9 14h6" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-blue-500 mb-3">Book Appointment</h3>
                <p class="text-gray-600">Schedule a new appointment with your healthcare provider</p>
            </a>
            
            <!-- View Appointments Card -->
            <a href="view-appointments.php" class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md text-center">
                <div class="flex justify-center mb-4">
                    <div class="text-teal-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-blue-500 mb-3">View Appointments</h3>
                <p class="text-gray-600">Check your upcoming and past appointments in one place</p>
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-6 text-center text-white">
        <p>&copy; 2025 AppointEase. All Rights Reserved.</p>
    </footer>
</body>
</html>