<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student = $_POST['studentName'];
    $assignment = $_POST['assignment'];
    $comments = $_POST['comments'];
    $timestamp = date("Y-m-d H:i:s");

    // File info
    $fileName = $_FILES['fileUpload']['name'];
    
    // Data to log
    $logEntry = "[$timestamp] Student: $student | Assignment: $assignment | File: $fileName | Notes: $comments\n";

    // Save metadata to a text file (ensure the directory has write permissions)
    file_put_contents('submissions_log.txt', $logEntry, FILE_APPEND);

    // Basic success message
    echo "<h1>Submission Successful!</h1>";
    echo "<p>Your file <strong>$fileName</strong> for $assignment has been received.</p>";
    echo "<a href='index.html'>Return to Dashboard</a>";
} else {
    echo "Invalid Request.";
}
?>
