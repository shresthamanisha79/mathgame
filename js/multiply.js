const opt1 = document.getElementById("option1"),
      opt2 = document.getElementById("option2"),
      opt3 = document.getElementById("option3"),
      audio = document.getElementById("wrongChoice");  
var answer = 0;

function generate_equation(){ 
  var num1 = Math.floor(Math.random() * 5),
      num2 = Math.floor(Math.random() * 5),
      dummyAnswer1 = Math.floor(Math.random() * 50),
      dummyAnswer2 = Math.floor(Math.random() * 50),
      allAnswers = [],
      switchAnswers = [];

  answer = eval(num1 * num2);
  
  document.getElementById("num1").innerHTML = num1; 
  document.getElementById("num2").innerHTML = num2; 

  allAnswers = [answer, dummyAnswer1, dummyAnswer2];

  for (i = allAnswers.length; i--;){
    switchAnswers.push(allAnswers.splice(Math.floor(Math.random() * (i + 1)), 1)[0]);
  };

  opt1.innerHTML = switchAnswers[0];
  opt2.innerHTML = switchAnswers[1];
  opt3.innerHTML = switchAnswers[2]; 

};

opt1.addEventListener("click", function(){
    if(opt1.innerHTML == answer){
      generate_equation();
    }
    else{
      audio.play();
    }
});

opt2.addEventListener("click", function(){
    if(opt2.innerHTML == answer){
      generate_equation();
    }
    else{
      audio.play();
    }
});

opt3.addEventListener("click", function(){
    if(opt3.innerHTML == answer){
     generate_equation();
    }
    else{
      audio.play();
    }
});

generate_equation()