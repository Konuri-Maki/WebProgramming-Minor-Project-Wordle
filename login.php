


<?php

session_start();

$servername = "localhost";
$serverUserName = "root";
$dbPassword = "";
$dbname = "minor_gallery";

$user = $_POST['ID'];
$userPassword = $_POST['password'];


$passwordHashed = password_hash($userPassword, PASSWORD_BCRYPT);
$db = new mysqli($servername, $serverUserName, $dbPassword, $dbname) or die("Connection failed:");


$query = "SELECT password_hash FROM users WHERE login_id = '$user'";
$result = mysqli_query( $db, $query ) or die(mysqli_error($db));
//$db->close();
if(!$result || mysqli_num_rows($result) == 0) {
    
}
else if ( password_verify($userPassword, mysqli_fetch_assoc($result)["password_hash"])){
    $_SESSION['username'] = $user;
    $_SESSION['isLoggedIn'] = true;

    $query = "SELECT user_id FROM users WHERE login_id = '$user'";
    $_SESSION["UID"] = mysqli_query( $db, $query )->fetch_assoc()["user_id"];
    $UID = $_SESSION["UID"];
    $target = "profile_image_path";
    $query = "SELECT $target FROM profiles WHERE user_id = '$UID'";
    $_SESSION["imagePath"] = mysqli_query( $db, $query )->fetch_assoc()["$target"];

    //$target = "description";
    $query = "SELECT description FROM profiles WHERE user_id = '$UID'";
    $_SESSION["description"] = mysqli_query( $db, $query )->fetch_assoc()["description"];
    $query = "SELECT gaechu FROM profiles WHERE user_id = '$UID'";
    $_SESSION["gaechu"] = mysqli_query( $db, $query )->fetch_assoc()["gaechu"];

    $query = "SELECT score FROM scores WHERE user_id = '$UID'";
    $_SESSION["streak"] = mysqli_query( $db, $query )->fetch_assoc()["score"];






    header("Location: main.php");
    exit();
}

$_SESSION["failedLogin"] = true;
//header("Location: login.php");

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebGame Archive</title>
    <link rel="stylesheet" href="style.css">
    <style>
        input{
            font-family: 경기천년제목;
        }
        form{
            display: flex;
            flex: 1 1;
            flex-direction: column;   
        }
        form *{
            margin: 2px;
        }
        #loginError{
            color: red;
        }
    </style>
</head>
<body>
    <div class="contents">
        <header>
    
        </header>
    
        <div class="mainLogo">
            <img src="image/logo.png">
        </div>
        <p id="loginError"> </p>
            <form action="login.php" method="post">
                <label for="username">ID:</label>
                <input type="text" id="username" name="ID" required>
                <br>
                <label for="password">비밀번호: </label>
                <input type="password" id="password" name="password" required>
                <br>
                <input class="shapedButton" type="submit" value="로그인">
            </form>

        <div class="buttons">
            <button class="shapedButton" onclick="location.href='register.html';"> 회원이 아니신가요? </button>
        </div>
    

    
        <section>
    
        </section>
    
        <footer>
            <p> Some important messeges go here.</p>
        </footer>
        <script>
        let failedLogin = <?php echo isset($_SESSION['failedLogin']) ?>;
        console.log(failedLogin);
        if(failedLogin === 1){
            document.getElementById("loginError").innerHTML = "회원 정보를 찾을 수 없거나, 잘못된 정보를 입력했습니다.";
        }
    </script>
    </div>
</body>
</html>