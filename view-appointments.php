<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("includes/db.php");

session_start();

if (!isset($_SESSION['pid'])) {
    header("Location: login.php");
    exit();
}

$patientID = $_SESSION['pid'];

// Cancel appointment logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancel_id'])) {
    $cancelID = $_POST['cancel_id'];
    $cancelQuery = "DELETE FROM appointments WHERE appointmentID = ? AND patientID = ?";
    if ($stmt = mysqli_prepare($con, $cancelQuery)) {
        mysqli_stmt_bind_param($stmt, "ii", $cancelID, $patientID);
        mysqli_stmt_execute($stmt);
        $success = "Appointment ID $cancelID has been canceled.";
    } else {
        $error = "Failed to cancel appointment.";
    }
}

// Fetch appointments
$query = "SELECT a.appointmentID, d.name AS doctor_name, a.appointmentDate, a.appointmentTime, 
          dep.name AS department_name
          FROM appointments a
          JOIN doctors d ON a.doctorID = d.doctorID
          JOIN departments dep ON d.departmentID = dep.departmentID
          WHERE a.patientID = ?
          ORDER BY a.appointmentDate ASC, a.appointmentTime ASC";

if ($stmt = mysqli_prepare($con, $query)) {
    mysqli_stmt_bind_param($stmt, "i", $patientID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $error = "Failed to retrieve appointments.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments - AppointEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(90deg, #4776E6 0%, #8E54E9 100%);
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
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
        .appointment-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .appointment-header h2 {
            color: #4776E6;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .appointment-header p {
            color: #666;
        }
        .btn-logout {
            background-color: transparent;
            border: 2px solid white;
            color: white;
            font-weight: 600;
        }
        .btn-cancel {
            background-color: #ff4757;
            border: none;
            color: white;
            font-weight: 500;
            padding: 6px 15px;
            border-radius: 50px;
        }
        .btn-book {
            background: linear-gradient(90deg, #4776E6 0%, #8E54E9 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 50px;
        }
        .appointment-table th {
            background-color: #f8f9fa;
            color: #4776E6;
            font-weight: 600;
            border-top: none;
        }
        .appointment-table td {
            vertical-align: middle;
        }
        .no-appointments {
            text-align: center;
            padding: 40px 0;
            color: #666;
        }
        .no-appointments svg {
            display: block;
            margin: 0 auto 20px;
            color: #ccc;
        }
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
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
            <div class="col-lg-10">
                <div class="appointment-container">
                    <div class="appointment-header">
                        <h2>Your Appointments</h2>
                        <p>View and manage all your scheduled appointments</p>
                    </div>

                    <!-- Success or Error Messages -->
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $error; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($success)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $success; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover appointment-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Department</th>
                                        <th>Doctor</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <tr>
                                            <td><?= $row['appointmentID'] ?></td>
                                            <td><?= $row['department_name'] ?></td>
                                            <td><?= $row['doctor_name'] ?></td>
                                            <td><?= date("d M Y", strtotime($row['appointmentDate'])) ?></td>
                                            <td><?= date("h:i A", strtotime($row['appointmentTime'])) ?></td>
                                            <td>
                                                <form method="POST" onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                                                    <input type="hidden" name="cancel_id" value="<?= $row['appointmentID'] ?>">
                                                    <button type="submit" class="btn btn-cancel">Cancel</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="no-appointments">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-calendar-x" viewBox="0 0 16 16">
                                <path d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                            <h4>No Appointments Found</h4>
                            <p>You don't have any scheduled appointments at the moment.</p>
                        </div>
                    <?php endif; ?>

                    <div class="text-center mt-4">
                        <a href="book-appointment.php" class="btn btn-book">Book New Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
