<?php
// Connect to the MySQL database
$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'interview';

$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$participants = $_POST['participants'];
$start_time = $_POST['start-time'];
$end_time = $_POST['end-time'];

// Validate the input fields
if (empty($participants) || empty($start_time) || empty($end_time)) {
	echo "<p>One or more fields are empty. Please try again.</p>";
} else {
	// Save the interview details to the database
	$sql = "INSERT INTO partipant (participants, start_time, end_time)
			VALUES ('$participants', '$start_time', '$end_time')";

	if ($conn->query($sql) === TRUE) {
		echo "<h2>Interview Created</h2>";
		echo "<p>Participants: $participants</p>";
		echo "<p>Start Time: $start_time</p>";
		echo "<p>End Time: $end_time</p>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

// Close the database
