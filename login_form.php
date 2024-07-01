<?php 
session_start();
if (isset($_SESSION["id"])) {
  header('Location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <script src="./tailwind.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="./files//font-awesome/all.min.css" />
    <script src="./files/sweetalert2.all.js"></script>
    <style>
      :root {
        --primary: #ff3b0a;
        --sixty: #f0f3f2;
      }
      body {
        background-color: var(--sixty);
      }
    </style>
  </head>
  <body>
    <div
      class="content w-screen min-h-screen grid justify-center max-[409px]:px-[10px] py-4 max-[409px]:grid-cols-[1fr] grid-cols-[400px] items-center"
    >
      <div
        class="form mt-[75px] relative p-4 bg-white rounded-lg w-full space-y-3"
      >
        <div class="img">
          <img
            src="./files/avatar3.png"
            class="w-[150px] border-[7px] border-[var(--sixty)] rounded-full absolute left-[50%] translate-x-[-50%] -top-[25%]"
            alt=""
          />
        </div>
        <div class="title">
          <h1 class="font-semibold relative mt-10 text-4xl text-center">
            Login
          </h1>
        </div>
        <form action="" onsubmit="" id="form">
          <div class="input space-y-2 p-2">
            <div class="user relative">
              <i
                class="fa fa-user absolute top-[50%] translate-y-[-50%] text-gray-500 left-3"
              ></i>
              <input
                type="text"
                class="bg-[var(--sixty)] rounded-lg outline-none pl-8 w-full h-[45px]"
                placeholder="Enter Your Username"
                name="username"
                id="username"
              />
            </div>
            <div class="pass relative">
              <i
                class="fa fa-lock absolute text-gray-500 top-[50%] translate-y-[-50%] left-3"
              ></i>
              <input
                type="password"
                class="bg-[var(--sixty)] rounded-lg outline-none pl-8 w-full h-[45px]"
                placeholder="Enter Your Password"
                name="password"
                id="password"
              />
            </div>
            <div>
              <input
                type="checkbox"
                class="bg-[var(--sixty)] outline-none"
                placeholder="Enter Your Password"
                name=""
                id="show"
              />
              <label class="" for="show">Show Password</label>
            </div>
            <button
              class="bg-[var(--primary)] mt-2 font-semibold rounded-lg text-white outline-none w-full h-[45px]"
            >
              Login
            </button>
            <div class="flex justify-between">
              <a href="#" id="header" class="text-blue-600">Back</a>
              <a href="tel:+25768684704" class="text-blue-600"
                >Forget Password</a
              >
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
  <script>
    document.querySelector("#header").addEventListener("click", () => {
      history.back();
    });
    const form = document.querySelector("#form");
    const show = document.querySelector("#show");
    show.addEventListener("click", () => {
      if (password.getAttribute("type") == "password") {
        password.setAttribute("type", "text");
      } else {
        password.setAttribute("type", "password");
      }
    });
    form.addEventListener("submit", (e) => {
      var password = document.querySelector("#password").value;
      var username = document.querySelector("#username").value;
      e.preventDefault();
      if (
        (username != "") &
        (username != undefined) &
        (password != "") &
        (password != undefined)
      ) {
        var ajax = new XMLHttpRequest();
        var formData = new FormData(form);
        ajax.open("POST", "http://localhost/eglise/api/login.php");
        // document.querySelector("#login").innerHTML =
        // '<img width="40px" height="40px" src="./img/spinner.gif">';
        ajax.onreadystatechange = () => {
          if ((ajax.readyState == 4) & (ajax.status == 200)) {
            var result = JSON.parse(ajax.responseText);
            if (result.status == "Connected") {
              msg = ajax.responseText;
              new swal("", result.status, "success");
              document.location="dashboard.php"
            } else {
              msg = result.status;
              new swal("", msg, "error");
            }
          } else {
          }
        };
        ajax.send(formData);
      } else {
        msg = "Please Complete All Fields";
        new swal("", msg, "warning");
      }
    });
  </script>
</html>
