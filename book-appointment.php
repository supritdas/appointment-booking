<?php
session_start();
include("includes/db.php");

if (!isset($_SESSION['pid'])) {
    header("Location: login.php");
    exit();
}

$departments = mysqli_query($con, "SELECT * FROM departments");

if (isset($_POST['book'])) {
    $patientID = $_SESSION['pid'];
    $doctorID = $_POST['doctor'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Store only the time in appointment_time
    $appointmentTime = $time;

    // Prepare the SQL query
    $query = "INSERT INTO appointments (patientID, doctorID, appointmentTime, appointmentDate) 
              VALUES (?, ?, ?, ?)";
    
    // Prepare statement
    if ($stmt = mysqli_prepare($con, $query)) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "iiss", $patientID, $doctorID, $appointmentTime, $date);
        
        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            // Set a success message in the session
            $_SESSION['success_message'] = "✅ Appointment booked successfully!";
            // Redirect to patientpanel.php
            header("Location: patientpanel.php");
            exit();
        } else {
            $error = "❌ Failed to book appointment. Please try again.";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        $error = "❌ Error in preparing statement.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - AppointEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(90deg, #4776E6 0%, #8E54E9 100%);
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 15px 0;
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 24px;
            display: flex;
            align-items: center;
        }
        .navbar-brand svg {
            margin-right: 10px;
        }
        .nav-link {
            color: white !important;
            margin: 0 10px;
            font-weight: 500;
        }
        .appointment-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .btn-primary {
            background: linear-gradient(90deg, #4776E6 0%, #8E54E9 100%);
            border: none;
            padding: 10px 25px;
            font-weight: 600;
        }
        .btn-logout {
            background-color: transparent;
            border: 2px solid white;
            color: white;
            font-weight: 600;
        }
        .form-label {
            font-weight: 600;
            color: #555;
        }
        .appointment-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }
        .appointment-header h2 {
            color: #4776E6;
            font-weight: 700;
        }
    </style>
    <script>
    function fetchDoctors(deptId) {
        fetch("get-doctors.php?dept=" + deptId)
            .then(res => res.json())
            .then(data => {
                let doctorSelect = document.getElementById("doctor");
                doctorSelect.innerHTML = "<option value=''>Select Doctor</option>";
                data.forEach(doc => {
                    let opt = document.createElement("option");
                    opt.value = doc.doctorID;
                    opt.textContent = doc.name + " (₹" + doc.fee + ")";
                    doctorSelect.appendChild(opt);
                });
            });
    }
    </script>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
                AppointEase
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="features.php">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="works.php">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-logout" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="appointment-container">
                    <div class="appointment-header text-center">
                        <h2>Book Your Appointment</h2>
                        <p class="text-muted">Select your preferred department, doctor, date and time</p>
                    </div>

                    <!-- Error Messages -->
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <!-- Department Selection -->
                        <div class="mb-4">
                            <label class="form-label">Department</label>
                            <select name="department" class="form-select" onchange="fetchDoctors(this.value)" required>
                                <option value="">Select Department</option>
                                <?php while ($row = mysqli_fetch_assoc($departments)): ?>
                                    <option value="<?php echo $row['departmentID']; ?>"><?php echo $row['name']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <!-- Doctor Selection -->
                        <div class="mb-4">
                            <label class="form-label">Doctor</label>
                            <select name="doctor" id="doctor" class="form-select" required>
                                <option value="">Select department first</option>
                            </select>
                        </div>

                        <!-- Date and Time Selection in the same row -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Appointment Date</label>
                                <input type="date" name="date" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Appointment Time</label>
                                <input type="time" name="time" class="form-control" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" name="book" class="btn btn-primary btn-lg px-5">Book Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>