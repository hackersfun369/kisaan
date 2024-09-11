<?php
session_start();

// Function to send email using EmailJS
function sendEmail($formData) {
    $serviceID = 'default_service';
    $templateID = 'template_p7irrwm';
    $userID = 'GbVlQSOtlkfPzZJbG'; // Replace with your User ID

    $emailjs_url = 'https://api.emailjs.com/api/v1.0/email/send-form';

    $response = file_get_contents($emailjs_url, false, stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\n",
            'content' => json_encode([
                'service_id' => $serviceID,
                'template_id' => $templateID,
                'user_id' => $userID,
                'template_params' => $formData
            ]),
        ],
    ]));

    return $response;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "loginpage";

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $applicantName = $conn->real_escape_string($_POST["applicantName"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phoneNumber = $conn->real_escape_string($_POST["phoneNumber"]);
    $state = $conn->real_escape_string($_POST["state"]);
    $aadharNumber = $conn->real_escape_string($_POST["aadharNumber"]);
    $bankAccountNumber = $conn->real_escape_string($_POST["bankAccountNumber"]);
    $apptype = $conn->real_escape_string($_POST["apptype"]);
    $reason = $conn->real_escape_string($_POST["Reason"]);
    $cropType = $conn->real_escape_string($_POST["cropType"]);
    $plotNumber = $conn->real_escape_string($_POST["plotNumber"]);
    $surveyNumber = $conn->real_escape_string($_POST["surveyNumber"]);
    $address = $conn->real_escape_string($_POST["address"]);

    // Insert data into the database
    $insertquery = $conn->prepare("INSERT INTO application (applicantName, email, phoneNumber, state, aadharNumber, bankAccountNumber, apptype, reason, cropType, plotNumber, surveyNumber, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insertquery->bind_param("ssssssssssss", $applicantName, $email, $phoneNumber, $state, $aadharNumber, $bankAccountNumber, $apptype, $reason, $cropType, $plotNumber, $surveyNumber, $address);

    if ($insertquery->execute()) {
        // Prepare data for EmailJS
        $formData = [
            'applicantName' => $applicantName,
            'email' => $email,
            'phoneNumber' => $phoneNumber,
            'state' => $state,
            'aadharNumber' => $aadharNumber,
            'bankAccountNumber' => $bankAccountNumber,
            'apptype' => $apptype,
            'reason' => $reason,
            'cropType' => $cropType,
            'plotNumber' => $plotNumber,
            'surveyNumber' => $surveyNumber,
            'address' => $address
        ];

        echo "<script>alert('Form submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error inserting data into the database: " . $insertquery->error . "');</script>";
    }

    $insertquery->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Moderustic:wght@300..800&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            background-color: rgb(240, 236, 236);
            font-family: 'Moderustic', sans-serif;
        }
        form button {
            width: 200px;
            height: 40px;
            font-size: 18px;
            background: white;
            border-radius: 10px;
            border: 2px solid green;
            color: green;
            margin-top: 10px;
        }
        #email_button{
            background-color: white;
            color: green;
            width: 150px;
            height: 40px;
            position: absolute;
            top:1300px;
            z-index: 3;
            margin-bottom: 20px;    
            margin-bottom: 20px;
            font-size: 18px;
            border: 2px solid green;
            outline: none;
            border-radius: 10px;
        }
        #email_button:hover,#submit_button:hover{
            background-color: green;
            color: white;
        }
        form{
            background-color: white;
        }
        #submit_button{
            background-color: white;
            color: green;
            width: 150px;
            height: 40px;
            margin-bottom: 20px;
            margin: 20px;
            font-size: 18px;
            border: 2px solid green;
            outline: none;
            border-radius: 10px;
        }
        #test{
            width: 100%;
            height:fit-content;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        form{
    position: absolute;
    top: 150px;
    display: flex;
    width: 80%;
    justify-content: center;
    align-items: center;
    height: fit-content;
    flex-direction: column;
    align-items: center;
    border: 2px solid lightblue;
    padding-top: 20px;
    padding-bottom: 20px;
}
form input{
    width: 80%;
    height: 40px;
    margin-bottom: 20px;
    border: 2px solid lightgray;
    border-radius: 10px;
    outline: none;
    font-size: 16px;
    text-align: center;
    text-transform: capitalize;
}
    </style>
</head>
<body>
    <nav>
        <img src="./planting.png" alt="Planting logo">
        <div class="nav-a">
            <a href="./disastermanagement.html">Disaster Management</a>
            <a href="./schemes.html">Govt-Schemes</a>
            <a href="http://localhost/kisaan/home.php#About-Us">About-Us</a>
            <a href="./home.php">Home</a>
        </div>
    </nav>
    <div class="test" id="test">
        <!-- Form for user inputs -->
    <form id="form" action="form.php" method="post" style="border-radius: 20px;">
        <label id="cropdetails">Applicant Details</label>
        <input type="text" name="applicantName" placeholder="Enter the Applicant Name" required>
        <input type="email" name="email" placeholder="Enter the Email Address" required>
        <input type="tel" name="phoneNumber" placeholder="Phone Number" pattern="[0-9]{10}">
        <select name="state" id="state" class="form-control" required>
            <option value="" disabled selected>Select State</option>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
    <option value="Assam">Assam</option>
    <option value="Bihar">Bihar</option>
    <option value="Chandigarh">Chandigarh</option>
    <option value="Chhattisgarh">Chhattisgarh</option>
    <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
    <option value="Delhi">Delhi</option>
    <option value="Goa">Goa</option>
    <option value="Gujarat">Gujarat</option>
    <option value="Haryana">Haryana</option>
    <option value="Himachal Pradesh">Himachal Pradesh</option>
    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
    <option value="Jharkhand">Jharkhand</option>
    <option value="Karnataka">Karnataka</option>
    <option value="Kerala">Kerala</option>
    <option value="Madhya Pradesh">Madhya Pradesh</option>
    <option value="Maharashtra">Maharashtra</option>
    <option value="Manipur">Manipur</option>
    <option value="Meghalaya">Meghalaya</option>
    <option value="Mizoram">Mizoram</option>
    <option value="Nagaland">Nagaland</option>
    <option value="Odisha">Odisha</option>
    <option value="Punjab">Punjab</option>
    <option value="Rajasthan">Rajasthan</option>
    <option value="Sikkim">Sikkim</option>
    <option value="Tamil Nadu">Tamil Nadu</option>
    <option value="Telangana">Telangana</option>
    <option value="Tripura">Tripura</option>
    <option value="Uttar Pradesh">Uttar Pradesh</option>
    <option value="Uttarakhand">Uttarakhand</option>
    <option value="West Bengal">West Bengal</option>
    <option value="Lakshadweep">Lakshadweep</option>
    <option value="Puducherry">Puducherry</option>
        </select>
        <input type="text" name="aadharNumber" placeholder="Aadhar Card Number" required pattern="[0-9]{12}">
        <input type="text" name="bankAccountNumber" placeholder="Bank Account Number" required>
        
        <label id="cropdetails">Crop Details</label>
        <select name="cropType" id="crop_type" class="form-control" required>
            <option value="" disabled selected>Select Crop Type</option>
            <optgroup label="Kharif Crops">
                <option value="Rice">Rice</option>
                <option value="Maize">Maize</option>
                <option value="Bajra">Bajra</option>
                <option value="Jowar">Jowar</option>
                <option value="Cotton">Cotton</option>
                <option value="Groundnut">Groundnut</option>
                <option value="Tur">Tur</option>
                <option value="Moong">Moong</option>
                <option value="Urad">Urad</option>
                <option value="Soybean">Soybean</option>
                <option value="Jute">Jute</option>
            </optgroup>
            <optgroup label="Rabi Crops">
                <option value="Wheat">Wheat</option>
                <option value="Barley">Barley</option>
                <option value="Gram">Gram</option>
                <option value="Mustard">Mustard</option>
                <option value="Peas">Peas</option>
                <option value="Lentils">Lentils</option>
            </optgroup>
            <optgroup label="Zaid Crops">
                <option value="Watermelon">Watermelon</option>
                <option value="Cucumber">Cucumber</option>
                <option value="Pumpkin">Pumpkin</option>
                <option value="Bitter Gourd">Bitter Gourd</option>
                <option value="Muskmelon">Muskmelon</option>
            </optgroup>
            <optgroup label="Food Crops">
                <option value="Rice">Rice</option>
                <option value="Wheat">Wheat</option>
                <option value="Millets">Millets</option>
                <option value="Pulses">Pulses</option>
                <option value="Vegetables">Vegetables</option>
                <option value="Fruits">Fruits</option>
            </optgroup>
            <optgroup label="Cash Crops">
                <option value="Sugarcane">Sugarcane</option>
                <option value="Cotton">Cotton</option>
                <option value="Tea">Tea</option>
                <option value="Coffee">Coffee</option>
                <option value="Rubber">Rubber</option>
                <option value="Spices">Spices</option>
            </optgroup>
            <optgroup label="Fiber Crops">
                <option value="Cotton">Cotton</option>
                <option value="Jute">Jute</option>
                <option value="Coir">Coir</option>
            </optgroup>
            <optgroup label="Oilseed Crops">
                <option value="Groundnut">Groundnut</option>
                <option value="Mustard">Mustard</option>
                <option value="Sunflower">Sunflower</option>
                <option value="Soybean">Soybean</option>
            </optgroup>
            <optgroup label="Ornamental Crops">
                <option value="Flowers">Flowers</option>
                <option value="Shrubs">Shrubs</option>
                <option value="Foliage plants">Foliage plants</option>
            </optgroup>
            <optgroup label="Industrial Crops">
                <option value="Rubber">Rubber</option>
                <option value="Sugarcane">Sugarcane</option>
                <option value="Cotton">Cotton</option>
            </optgroup>
            </select>
        <input name="Reason" type="text" placeholder="Reason for the Application">
        <select name="cropType" id="crop_type" class="form-control" required>
            <option value="" disabled selected>Select Crop Type</option>
            <option value="Subcidies">Subcidies</option>
            <option value="Crop Failure">Crop Failure</option>
        </select>
        <input type="text" name="plotNumber" placeholder="Plot Number" required>
        <input type="text" name="surveyNumber" placeholder="Survey Number" required>
        <input type="text" name="address" placeholder="Address of the Village / Town" required>

        <label class="error">Verify The Details Before Submitting.</label>
        <input type="submit" id="submit_button" value="Submit">
        <label class="error">Make Sure You Send The Email Even If The Fiels Are Empty.</label>
        <label class="error">The Field Items Are Saved Locally.</label>
    </form>
    <button id="email_button" type="button">Send Email</button>
    </div>

    <script src="./script.js"></script>
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
</script>
    <script type="text/javascript">
        // Initialize EmailJS
        (function() {
            emailjs.init("GbVlQSOtlkfPzZJbG"); // Replace with your EmailJS User ID
        })();

        // Handle form submission
        const form = document.getElementById('form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Get form data and store in localStorage
            const formData = new FormData(form);
            formData.forEach((value, key) => {
                localStorage.setItem(key, value);
            });

            // Submit the form (actually submit to the server)
            form.submit();
        });

        // Email button functionality
        const emailButton = document.getElementById('email_button');
        emailButton.addEventListener('click', function() {
            emailButton.textContent = 'Sending...';

            // Create an object from localStorage data
            const formData = {};
            Object.keys(localStorage).forEach((key) => {
                formData[key] = localStorage.getItem(key);
            });

            // Send email with EmailJS
            emailjs.send("default_service", "template_p7irrwm", formData)
                .then(() => {
                    emailButton.textContent = 'Send Email';
                    alert('Email sent successfully!');
                })
                .catch((err) => {
                    emailButton.textContent = 'Send Email';
                    alert('Failed to send email. Error: ' + JSON.stringify(err));
                });
        });
    </script>

</body>
</html>
