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
        #comments{
            height: 80px;
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
           
    <?php
        $servername = "localhost";
        $serverUserName = "root";
        $dbPassword = "";
        $dbname = "minor_gallery";

        $user = $_POST['ID'];
        $userPassword = $_POST['password'];
        $userComment = $_POST['comments'];

        $passwordHashed = password_hash($userPassword, PASSWORD_BCRYPT);
        $db = new mysqli($servername, $serverUserName, $dbPassword, $dbname) or die("Connection failed:");


        $query = "INSERT INTO users (login_id, password_hash) VALUES ('$user', '$passwordHashed')";
        mysqli_query( $db, $query ) or die(mysqli_error($db));
        $query = "SELECT user_id FROM users WHERE login_id = '$user'";
        $result= mysqli_query($db, $query) or die(mysqli_error($db));

        $UID = $result->fetch_assoc()["user_id"];

        $query = "INSERT INTO scores (user_id, game_id, score) VALUES ('$UID', '1', '0')";
        mysqli_query( $db, $query ) or die(mysqli_error($db));

        $query = "INSERT INTO profiles (user_id, description, gaechu, profile_image_path) VALUES ('$UID', '$userComment', '0', 'image/avt_default.png')";
        mysqli_query( $db, $query ) or die(mysqli_error($db));

        $db->close();
    ?>
    <h3> 회원가입 완료! </h3>
    <button class="shapedButton" onclick="location.href='login.html';">로그인 페이지로 돌아가기 </button>

    

    
        <section>
    
        </section>
    
        <footer>
            <p> Some important messeges go here.</p>
        </footer>

    </div>
</body>
</html>