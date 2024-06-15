<?php
session_start();

if(!isset($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"]){
    header("Location: login.php");
}
else if(!isset($_SESSION["UID"])){
    header("Location: logout.php");
}

$UID = $_SESSION["UID"];
$imagePath = $_SESSION["imagePath"];
$desc = $_SESSION["description"];
$gaechu = $_SESSION["gaechu"];
$streak = $_SESSION["streak"];





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebGame Archive</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .hide{
            display: none;
        }

        .navCard{
            height: auto;
            width: auto;
        }
        .navCard img{
            max-width: 200px;
            max-height: 200px;
        }
        .navCard:hover{
            background-color: white;
        }
    </style>
    <script>
        let isLoggedIn =  <?php  echo isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]?> === 1 ? true : false;
        console.log(isLoggedIn)
    </script>
</head>
<body>
    <div class="contents">
        <header>
    
        </header>
    
        <div class="mainLogo" >
            <img src="image/logo.png" onclick="location.href='main.php';">
        </div>
    
        <div class="buttons">
            <button class="shapedButton" id="logout" onclick="location.href='logout.php';" > 로그아웃 </button>
        </div>
    
        <nav>
            <div class="navCard">
                <img src="<?php echo $imagePath;?>">
                <p>ID : [<?php echo $UID;?>] <?php echo $_SESSION['username'];?></p>
                <p>좋아요 : <?php echo $gaechu;?></p>
                <p>최대 연승 기록 : <?php echo $streak;?></p>
                <form action="UpdateProfile.PHP" method="post">
                    <p> <label for="comment">코멘트</label> </p>
                    <p> <input id="comment" type="text" name="comment" value="<?php echo $desc;?>"> </p>
                    <input type="submit" value="코멘트 수정">
                </form>
            </div>
        </nav>
    
        <footer>
            <p> Some important messeges go here.</p>
        </footer>


        <script>
        </script>

    </div>
</body>
</html>