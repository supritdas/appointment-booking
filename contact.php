<?php
// Initialize variables for form status messages
$message_sent = false;
$error_message = '';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Please provide a valid email address.';
    } 
    // Check if all fields are filled
    elseif (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error_message = 'Please fill in all fields.';
    } 
    else {
        // Set recipient email address
        $to = "swapnonilmitra04@gmail.com";
        
        // Create email headers to make it appear from the user's email
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        // Create email body
        $email_body = "
            <html>
            <head>
                <title>Contact Form Submission</title>
            </head>
            <body>
                <h2>Contact Form Message</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Subject:</strong> $subject</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>
            </body>
            </html>
        ";
        
        // Attempt to send email
        if (mail($to, "Contact Form: $subject", $email_body, $headers)) {
            $message_sent = true;
        } else {
            $error_message = 'Failed to send message. Please try again later.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact - AppointEase</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #4776E6, #5cdb95);
      min-height: 100vh;
    }
    .contact-input {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: white;
    }
    .contact-input::placeholder {
      color: rgba(255, 255, 255, 0.6);
    }
    .contact-input:focus {
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
        <a href="contact.php" class="text-white hover:text-blue-100 transition font-bold">Contact</a>
      </div>
      <a href="login.php" class="bg-white text-blue-600 px-6 py-2 rounded-lg font-medium hover:bg-blue-50 transition">Login</a>
    </div>
  </nav>

  <!-- Contact Section -->
  <div class="container mx-auto px-6 py-16">
    <div class="max-w-4xl mx-auto">
      <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Get in Touch</h1>
        <p class="text-xl text-blue-100">We'd love to hear from you. Our team is always here to help.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Contact Information -->
        <div class="col-span-1">
          <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-6 h-full">
            <h3 class="text-2xl font-bold text-white mb-6">Contact Info</h3>
            
            <!-- Email -->
            <div class="flex items-start mb-6">
              <div class="bg-white bg-opacity-30 rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
              <div class="ml-4">
                <h4 class="text-white font-medium">Email</h4>
                <p class="text-blue-100">support@appointease.com</p>
              </div>
            </div>

            <!-- Phone -->
            <div class="flex items-start mb-6">
              <div class="bg-white bg-opacity-30 rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
              </div>
              <div class="ml-4">
                <h4 class="text-white font-medium">Phone</h4>
                <p class="text-blue-100">+1 (555) 123-4567</p>
              </div>
            </div>

            <!-- Hours -->
            <div class="flex items-start">
              <div class="bg-white bg-opacity-30 rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div class="ml-4">
                <h4 class="text-white font-medium">Hours</h4>
                <p class="text-blue-100">Mon - Fri: 9AM - 5PM</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="col-span-2">
          <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-6">
            <h3 class="text-2xl font-bold text-white mb-6">Send us a Message</h3>
            
            <?php if ($message_sent): ?>
            <!-- Success Message -->
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
              <p>Your message has been sent successfully. We'll get back to you soon!</p>
            </div>
            <?php endif; ?>
            
            <?php if ($error_message): ?>
            <!-- Error Message -->
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
              <p><?php echo $error_message; ?></p>
            </div>
            <?php endif; ?>
            
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                  <label for="name" class="block text-blue-100 mb-2">Your Name</label>
                  <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg contact-input" placeholder="John Doe">
                </div>
                <div>
                  <label for="email" class="block text-blue-100 mb-2">Email Address</label>
                  <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg contact-input" placeholder="john@example.com">
                </div>
              </div>
              <div class="mb-6">
                <label for="subject" class="block text-blue-100 mb-2">Subject</label>
                <input type="text" id="subject" name="subject" class="w-full px-4 py-3 rounded-lg contact-input" placeholder="How can we help?">
              </div>
              <div class="mb-6">
                <label for="message" class="block text-blue-100 mb-2">Message</label>
                <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 rounded-lg contact-input" placeholder="Your message..."></textarea>
              </div>
              <button type="submit" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-blue-50 transition w-full md:w-auto">Send Message</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FAQ Section -->
  <div class="container mx-auto px-6 py-16">
    <h2 class="text-3xl font-bold text-white mb-8 text-center">Frequently Asked Questions</h2>
    <div class="max-w-3xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-6">
        <h3 class="text-xl font-bold text-white mb-2">Is there a free trial?</h3>
        <p class="text-blue-100">Yes, we offer a 14-day free trial with full access to all features.</p>
      </div>
      <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md rounded-xl p-6">
        <h3 class="text-xl font-bold text-white mb-2">Do I need a credit card to sign up?</h3>
        <p class="text-blue-100">No, you can start your free trial without entering payment information.</p>
      </div>
    </div>
  </div>
</body>
</html>