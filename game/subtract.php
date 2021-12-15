<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Subtract</title>
  
</head>
<body>

  <audio id="wrongChoice">
    <source src="../audio/wrong.mp3" type="audio/mp3">
  </audio>

  <header>
    <div class="container">
      <div class="nav">
        <h2> MATH GAME</h2>
        <nav>
          <ul>
            <li><a href="add.php">Add</a></li>
            <li class="current"><a href="subtract.php">Subtract</a></li>
            <li><a href="multiply.php">Multiply</a></li>
            <li><a href="divide.php">Divide</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  
  <div class="wrapper">
    <div class="answer-options">
        <div class="options" style="background-color: black;">
          <h1 id="option1">1</h1>
        </div>
        <div class="options" style="background-color: #133b41;">
          <h1 id="option2">2</h1>
        </div>
        <div class="options" style="background-color: #772014;">
          <h1 id="option3">3</h1>
        </div>
      </div>
      <div class="equation">
        <h1 id="num1" style="color:#FE4A49"></h1>
        <h1 style="color: #2AB7CA">-</h1>
        <h1 id="num2" style="color: #FED766">1</h1>
        <h1 style="color: #F86624">=</h1>
        <h1 style="color: gray">?</h1>
    </div>
      
  </div>
  <div class="footer">
    <h2 class="title">More Games</h2>
    <script src="./api.js"></script>
  </div>
  <script src="../js/subtract.js"></script>
  
</body>
</html>