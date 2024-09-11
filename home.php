<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "loginpage";
    $conn = new mysqli($host, $user, $password, $database);
    if($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    $email = $_POST["email"];
    $passkey = $_POST["password"];
    $stmt = $conn->prepare("SELECT * FROM user1 WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $passkey);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 1) {
        $_SESSION['email'] = $email;
    } else {
        header("Location:index.php");
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kisaan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Moderustic:wght@300..800&display=swap" rel="stylesheet">
<style>
    #app{
        width:150px;
        border:none;
    }
    #app button{
        width:150px;
        height:40px;
        background:#201E43;
        color:white;
        font-family:Moderustic;
        font-size:18px;
        border:2px solid #201E43;
        outline: none;
        position:absolute;
        top:70px;
        right:100px;
        color:white;
        display:hidden;
        cursor: pointer;
    }
</style>
</head>
<body>
    <nav>
        <img src="./planting.png" alt="">
        <div class="nav-a">
        <form id="app" action="./myapplications.php" method="post" target="_blank">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8'); ?>">
    <button type="submit">My Applications</button>
</form>
            <a href=""><?php echo htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8'); ?></a>
            <a id="app1" href="./form.php" target="_blank">Application</a>
            <a href="#disschemes">Disaster Management</a>
            <a href="http://localhost:5000" target="_blank">Crop</a>
            <a href="#Govt-Schemes">Govt-Schemes</a>
            <a href="#About-Us">About-Us</a>
            <a href="#Home">Home</a>
        </div>
    </nav>
    <div class="bg-img-attachment">
        <p class="Home" id="Home">KISAAN</p>
    </div>
    <div class="heading">
        <h1 class="heading" id="About-Us"><span>About-Us</span></h1>
    </div>
    <div class="About-Us1">
        <img src="./rice-field-7890204_1280.jpg" alt="">
        <div class="advert">
            <p>Kisaan is a platform for farmers to get all the information about their crops,
                government schemes, disaster management and much more. It is a platform for farmers to get all the
                information about their crops, government schemes, disaster management and much more. It is a platform for
                farmers to get all the information about their crops, government schemes, disaster management and much more.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima atque amet, quis nesciunt ratione velit architecto dolorum doloribus provident distinctio voluptatibus. Reiciendis quo, corporis tempora ducimus perferendis dolor debitis omnis!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam aut nulla blanditiis quas enim nesciunt, aspernatur unde beatae tempora velit atque odio quidem. Animi molestiae earum inventore autem debitis libero?
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                </p>
        </div>
    </div>
    <div class="heading">
        <h1 class="heading" id="Govt-Schemes"><span>Govt-Schemes</span></h1>
    </div>
    <div class="Govt-Schemes-con" id="Govt-Schemes-con">
    </div>
    <div class="loadmore"><a href="./schemes.html" target="_BLANK">Load More >>></a></div>
    <div class="heading">
        <h1 class="heading" id="Govt-Schemes"><span>Disaster Management</span></h1>
    </div>
    <div class="disschemes" id="disschemes">
    </div>
    <div class="loadmore"><a href="./disastermanagement.html" target="_BLANK">Load More >>></a></div>


<footer>
    <br>
    <h3>Kisaan-All India Government Schemes</h3>
    <p>CopyRight@2024</p>
    <p>Contact: <a href=""><strong style="color: green;text-decoration: none
    ;">sathyagajula369@gmail.com</strong></a></p>
</footer>
    <script src="script.js"></script>
</body>
</html>