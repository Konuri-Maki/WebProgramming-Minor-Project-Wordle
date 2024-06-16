<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wordle</title>
    <link rel="stylesheet" href="style.css">
    <style>
        *{
            font-family: "경기천년제목";
        }
        .tile{  
            height: 50px;
            width: 50px;
            font-size: 40px;
            text-align: center;
            margin: 2.5px;
            padding: 0px;
        }
    </style>
    <script>
        let count = 0;
    </script>
</head>
<body>
    <div class="contents">
        <div class="mainLogo">
            <img src="image/logo.png" onclick="location.href='main.php';">
        </div>
        <div class="gameBoard">
            <div class="row">
                <input class="tile active">
                <input class="tile active">
                <input class="tile active">
                <input class="tile active">
                <input class="tile active">
            </div>
        </div>
    
    
        <p id="isWinner"></p>
        <button id="submitButton" onclick="CheckAnswer()" class="shapedButton"> 제출 </button>
    </div>
    <script>

        const result = {
            CORRECT : "0", CLOSE : "1", WRONG : "2"
         }

        let answer = "weary"; // <--- your answer goes here

        function CheckAnswer(){
            count++;
            let input = document.querySelectorAll(".row .active");

            const template = `
            <div class="row">
            <input class="tile active">
            <input class="tile active">
            <input class="tile active">
            <input class="tile active">
            <input class="tile active">
        </div>
    `
            let correctCharCount = 0;
            for(let i =0; i<5; i++){
                if(input[i].value == answer[i]){
                    input[i].style.background = "green";
                    correctCharCount++;
                }
                else if(answer.includes(input[i].value)){
                    input[i].style.background = "yellow";
                }
                else{
                    input[i].style.background = "grey";
                }
                input[i].classList.remove("active");

            }

            if(correctCharCount === 5){
                document.getElementById("isWinner").innerHTML = "성공! 시도 횟수: " + count;
                document.getElementById("submitButton").style.display = "none";
            }
            else{
                document.querySelector(".gameBoard").insertAdjacentHTML("beforeend", template);
            }
        }
        
        

    </script>
</body>
</html>