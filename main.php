<?php
session_start();
 if(isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]){
 }
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
    
        <div class="mainLogo">
            <img src="image/logo.png">
        </div>
    
        <div class="buttons">
            <button class="shapedButton hideWhenLoggedIn" onclick="location.href='register.html';"> 회원가입 </button>
            <button class="shapedButton hideWhenLoggedIn" onclick="location.href='login.html';"> 로그인 </button>
            <button class="shapedButton " onclick="location.href='profile.php';"> 프로필 </button>
            <button class="shapedButton hide" id="logout" onclick="location.href='logout.php';" > 로그아웃 </button>
        </div>
    
        <nav>
            <div class="navCard" onclick="location.href='wordle.php';">
                <h2>워들 게임하기→</h2>
                <p> 5글자의 영어 단어를 최대한 적은 시도로 유추해보세요.</p>
            </div>
            <div class="navCard" onclick="location.href='profiles.php';">
                <h2>프로필 검색</h2>
                <p> 저희 친구해요~ </p>
            </div>
            <div class="navCard">
                <h2>다른 게임 살펴보기→</h2>
                <p> 준비중입니다. </p>
            </div>
        </nav>
    
        <section>
    
        </section>
    
        <footer>
            <p> Some important messeges go here.</p>
        </footer>


        <script>
        if(isLoggedIn){
            document.getElementById("logout").classList.toggle("hide");
            let elements = document.querySelectorAll(".hideWhenLoggedIn");
            elements.forEach(element => {
                element.classList.toggle("hide");
            });
        }
        </script>

    </div>
</body>
</html>