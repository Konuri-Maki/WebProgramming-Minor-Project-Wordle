<?php
session_start();

$servername = "localhost";
$serverUserName = "root";
$dbPassword = "";
$dbname = "minor_gallery";

$db = new mysqli($servername, $serverUserName, $dbPassword, $dbname) or die("Connection failed:");



$searchCommand = "";
if(isset($_SESSION["searchCommand"])){
    $searchCommand = $_SESSION["searchCommand"];
} 

$query = "SELECT * FROM profiles " ;
$result = mysqli_query($db, $query) or die(mysqli_error($db));

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
        function FilterProfiles() {
            console.log("테스트");
            let input = document.getElementById('searchString').value.toLowerCase();
            let profiles = document.querySelectorAll('.navCard');
            profiles.forEach(profile => {
                let description = profile.querySelector('.desc').innerText.toLowerCase();
                if (description.includes(input)) {
                    profile.classList.remove('hide');
                } else {
                    profile.classList.add('hide');
                }
            });
        }

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
        
        <div>
            <input type="text" id="searchString" placeholder="내용을 입력해주세요!">
            <button class="shapedButton" onclick="FilterProfiles()">검색하기</button>
        </div>

        <nav>
            <?php
                while($row = $result->fetch_assoc()){
                    ?>
                <div class="navCard">
                    <img src="<?php echo $row["profile_image_path"];?>">
                    <p>ID : [<?php echo $row["profile_id"];?>]</p>
                    <p>좋아요 : <?php echo $row["gaechu"];?></p>
                    <p>최대 연승 기록 : 0</p>
                    <p>코멘트</p>
                    <p class = "desc"><?php echo $row["description"];?></p>               
                </div>
                <?php
                }?>
        </nav>
    
        <footer>
            <p> Some important messeges go here.</p>
        </footer>




    </div>
</body>
</html>