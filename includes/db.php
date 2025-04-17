<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "patient_management";

$con = mysqli_connect($host, $user, $password);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($con, "CREATE DATABASE IF NOT EXISTS $database");
mysqli_select_db($con, $database);

// USERS TABLE
mysqli_query($con, "CREATE TABLE IF NOT EXISTS users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)");

$check = mysqli_query($con, "SELECT * FROM users WHERE username='patient1'");
if (mysqli_num_rows($check) == 0) {
    $hashedPassword = password_hash("password123", PASSWORD_DEFAULT);
    mysqli_query($con, "INSERT INTO users (username, password) VALUES ('patient1', '$hashedPassword')");
}

// DEPARTMENTS
mysqli_query($con, "CREATE TABLE IF NOT EXISTS departments (
    departmentID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
)");

mysqli_query($con, "INSERT IGNORE INTO departments (departmentID, name) VALUES
    (1, 'Nephrology'),
    (2, 'Cardiology'),
    (3, 'Orthopedics'),
    (4, 'Dermatology')
");

// DOCTORS
mysqli_query($con, "CREATE TABLE IF NOT EXISTS doctors (
    doctorID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    departmentID INT,
    fee DECIMAL(10,2),
    FOREIGN KEY (departmentID) REFERENCES departments(departmentID)
)");

mysqli_query($con, "INSERT IGNORE INTO doctors (doctorID, name, departmentID, fee) VALUES
    (1, 'Dr. Neha Sharma', 1, 500),
    (2, 'Dr. Vikram Singh', 2, 600),
    (3, 'Dr. Anjali Rao', 3, 450),
    (4, 'Dr. Rohit Mehta', 4, 400)
");

// APPOINTMENTS
mysqli_query($con, "CREATE TABLE IF NOT EXISTS appointments (
    appointmentID INT AUTO_INCREMENT PRIMARY KEY,
    patientID INT,
    doctorID INT,
    appointmentDate DATE,
    appointmentTime TIME,
    FOREIGN KEY (patientID) REFERENCES users(userID),
    FOREIGN KEY (doctorID) REFERENCES doctors(doctorID)
)");
?>
