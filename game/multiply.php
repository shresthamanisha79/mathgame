<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Multiply</title>
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
            <li><a href="subtract.php">Subtract</a></li>
            <li class="current"><a href="multiply.php">Multiply</a></li>
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
        <h1  id="num1" style="color:rgb(100, 100, 161)">1</h1>
        <h1 style="color: #cf5487;">*</h1>
        <h1  id="num2" style="color: #2b230a">1</h1>
        <h1  style="color: #a35632">=</h1>
        <h1  style="color: rgb(102, 17, 17)">?</h1>
    </div>
    
  </div>
  <div class="footer">
    <h2 class="title">..</h2>
    <script src="fetchapi.js"></script>
  </div>

  <script src="../js/multiply.js"></script>
</body>

</html>