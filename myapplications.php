<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginpage";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted and email is set
if (isset($_POST['email'])) {
    $email = $conn->real_escape_string($_POST['email']);
    
    // SQL query to fetch applications related to the user's email
    $sql = "SELECT * FROM application WHERE email='$email'";
    $result = $conn->query($sql);

    $schemes = array(); // Array to hold fetched data

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Add each row to the schemes array
            $schemes[] = $row;
        }
    }
    $conn->close();

    // Convert PHP array to JSON format
    $schemesJson = json_encode($schemes);
} else {
    $schemesJson = json_encode(array()); // Empty array if no data
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Applications</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Moderustic:wght@300..800&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <img src="./planting.png" alt="">
        <div class="nav-a">
            <a href="./disastermanagement.html">Disaster Management</a>
            <a href="./schemes.html">Govt-Schemes</a>
            <a href="./home.php#About-Us">About-Us</a>
            <a href="./home.php">Home</a>
        </div>
    </nav>
    <div id="govtschemes"></div>

    <script>
        // Parse JSON data from PHP
        const schemes = <?php echo $schemesJson; ?>;

        const govtschemes = document.getElementById('govtschemes');

        // Iterate over schemes and create HTML structure
        schemes.forEach(scheme => {
            const schemeDiv = document.createElement('div');
            schemeDiv.classList.add('scheme');
            schemeDiv.innerHTML = `
                <img src="https://pmkisan.gov.in/new_images/SabkaSathSabkaVikasSabkaViswas.jpg" alt="${scheme.applicantName}">
                <a style="text-transform:capatilized" href="#" target="_blank">${scheme.applicantName}</a>
                <p><strong>Email Address:</strong> ${scheme.email}</p>
                <p><strong>Phone Number:</strong> ${scheme.phoneNumber}</p>
                <p><strong>State:</strong> ${scheme.state}</p>
                <p><strong>Aadhar Number:</strong> ${scheme.aadharNumber}</p>
                <p><strong>Bank Account Number:</strong> ${scheme.bankAccountNumber}</p>
                <p><strong>Reason:</strong> ${scheme.reason}</p>
                <p><strong>crop Type:</strong> ${scheme.cropType}</p>
                <p><strong>Plot Number:</strong> ${scheme.plotNumber}</p>
                <p><strong>Survey Number:</strong> ${scheme.surveyNumber}</p>
                <p><strong>Address:</strong> ${scheme.address}</p>`;
                
            govtschemes.appendChild(schemeDiv);
        });

        if (schemes.length === 0) {
            govtschemes.innerHTML = '<p>No applications found.</p>';
        }
    </script>
    <script src="./script.js"></script>
</body>
</html>
