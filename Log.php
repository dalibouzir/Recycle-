<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/log.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
</head>
<body>
  <div class="main">
    <div class="container a-container" id="a-container">
      <form class="form" id="a-form" method="POST">
        <h2 class="form_title title">Create Account</h2>
        <span class="form__span">Use email for registration</span>
        <label for="username"><b>UserName:</b></label>
        <input class="form__input" type="text" id="username" placeholder="Enter username" name="username" required>
        <label for="email"><b>E-Mail:</b></label>
        <input class="form__input" type="text" id="email" placeholder="Enter Email" name="email" required>
        <label for="password"><b>Password:</b></label>
        <input class="form__input" type="password" id="password" placeholder="Enter Password" name="password" required>
        <label for="psw-repeat"><b>Repeat Password:</b></label>
        <input class="form__input" type="password" placeholder="Repeat Password" name="psw-repeat" required>
        <div>
          <button class="form__button button submit" type="submit" id="signup">SIGN UP</button>
        </div>
      </form>
    </div>

    <div class="container b-container" id="b-container">
      <form class="form" id="b-form" method="POST" action="log1.php">
        <h2 class="form_title title">Sign in to Website</h2>
        <label><b>E-Mail:</b></label>
        <input class="form__input" type="text" id="email_log" placeholder="Enter email" name="email2" required>
        <label><b>Password:</b></label>
        <input class="form__input" type="password" id="password_log" placeholder="Enter password" name="password2" required>
        <div class="submitting">
          <button style="cursor: pointer;" name="Sign" type="submit" id="Sign" class="form__button button submit">LOGIN</button>
        </div>
      </form>
    </div>

    <div class="switch" id="switch-cnt">
      <div class="switch__circle"></div>
      <div class="switch__circle switch__circle--t"></div>
      <div class="switch__container" id="switch-c1">
        <h2 class="switch__title title">Welcome Back!</h2>
        <p class="switch__description description">To stay connected with us, please login with your personal info</p>
        <button class="switch__button button switch-btn">SIGN IN</button>
      </div>
      <div class="switch__container is-hidden" id="switch-c2">
        <h2 class="switch__title title">Hello Friend!</h2>
        <p class="switch__description description">Enter your personal details and start your journey with us</p>
        <button class="switch__button button switch-btn">SIGN UP</button>
      </div>
    </div>
  </div>
s
    <script >
       
       
  
///////////////////////////////DESIGN///////////////////////////////////////////////

let switchCtn = document.querySelector("#switch-cnt");
let switchC1 = document.querySelector("#switch-c1");
let switchC2 = document.querySelector("#switch-c2");
let switchCircle = document.querySelectorAll(".switch__circle");
let switchBtn = document.querySelectorAll(".switch-btn");
let aContainer = document.querySelector("#a-container");
let bContainer = document.querySelector("#b-container");
let allButtons = document.querySelectorAll(".submit");

let getButtons = (e) => e.preventDefault()

let changeForm = (e) => {

    switchCtn.classList.add("is-gx");
    setTimeout(function(){
        switchCtn.classList.remove("is-gx");
    }, 1500)

    switchCtn.classList.toggle("is-txr");
    switchCircle[0].classList.toggle("is-txr");
    switchCircle[1].classList.toggle("is-txr");

    switchC1.classList.toggle("is-hidden");
    switchC2.classList.toggle("is-hidden");
    aContainer.classList.toggle("is-txl");
    bContainer.classList.toggle("is-txl");
    bContainer.classList.toggle("is-z200");
}

let mainF = (e) => {
    for (var i = 0; i < allButtons.length; i++)
        allButtons[i].addEventListener("click", getButtons );
    for (var i = 0; i < switchBtn.length; i++)
        switchBtn[i].addEventListener("click", changeForm)
}

window.addEventListener("load", mainF);
// function redirectToForums() {
//       window.location.href = 'Forums.php';
//       alert("Connected");
//     }
    document.getElementById("signup").addEventListener("click", function() {
        var form = document.getElementById("a-form");
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "Forum_php.php");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response from the server if needed
                console.log(xhr.responseText);
            }
        };
        xhr.send(formData);
        alert("Account created ");
        
    });
    document.getElementById("Sign").addEventListener("click", function() {
    var form = document.getElementById("b-form");
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "log1.php");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response from the server if needed
            console.log(xhr.responseText);

            // Check if the response indicates a successful login
            if (xhr.responseText === "success") {
                // Redirect to the Forums.php page
                window.location.href = "Forums.php";
            }
        }
    };
    xhr.send(formData);
});
    </script>
  </body>
</html>