<?php 
session_start();
if (isset($_SESSION["id"])) {

}else{
  header('Location:login_form.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <script src="./tailwind.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Event</title>
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
      li.active {
        color: var(--primary);
        position: relative;
      }
      @media screen AND (max-width: 810px) {
        .android ul a {
          padding: 10px 0;
          /* background-color: #00ffff; */
        }
        .android ul a:hover {
          background-color: var(--sixty);
          border-radius: 8px;
        }
        .android ul li {
          margin: 0 auto;
          width: 160px;
          position: relative;
          border-radius: 0;
        }
        .android ul {
          padding: 5px;
          border-radius: 8px;
        }
        .close {
          width: 35px;
          height: 35px;
          border-radius: 50%;
          background-color: rgba(255, 255, 255, 0.4);
          display: flex;
          justify-content: center;
          align-items: center;
          cursor: pointer;
        }
      }
    </style>
  </head>
  <body>
    <div class="content flex flex-col w-full min-h-screen">
      <!-- Android -->
      <div
        class="android menu flex top-0 transition-all z-[100] mt-2 w-full h-[60px] items-center px-3 min-[811px]:hidden justify-between"
      >
        <div class="logo relative">
          <img src="./files/logo.png" class="h-full max-h-[50px]" alt="" />
        </div>
        <div
          class="links fixed z-[100] max-[810px]:h-screen max-[479px]:px-2 max-[810px]:left-0 max-[810px]:top-0 max-[810px]:bg-[rgba(0,0,0,.4)] max-[810px]:justify-center max-[810px]:items-center max-[810px]:w-screen max-[810px]:flex-row max-[810px]:fixed min-[811px]:hidden hidden"
        >
          <ul
            class="flex max-[479px]:w-full relative max-[810px]:bg-white max-[810px]:space-x-0 max-[810px]:w-[400px] max-[810px]:flex-col space-x-2"
          >
            <a href="dashboard.php">
              <li
                class=" font-semibold b hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-home"></i> Accueil
              </li>
            </a>
            <a href="addevent.php">
              <li
                class="active font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-wrench"></i> Ajouter Un Evenement
              </li>
            </a>
            <a href="password.php">
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-lock"></i> Change Password
              </li>
            </a>
            <a href="logout.php">
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-sign-out"></i> Logout
              </li>
            </a>

            <div
              class="close absolute -top-8 max-[479px]:-top-9 max-[479px]:right-0 -right-8"
            >
              <i class="fa fa-x text-white"></i>
            </div>
          </ul>
        </div>

        <div class="monster cursor-pointer hidden max-[810px]:block">
          <i onclick="" class="fas fa-bars-staggered"></i>
        </div>
      </div>
      <!-- Pc -->
      <div
        class="menu max-[810px]:hidden top-0 transition-all z-50 mt-2 w-full h-[60px] items-center px-3 flex justify-between"
      >
        <div class="logo relative">
          <img src="./files/logo.png" class="h-full max-h-[50px]" alt="" />
        </div>
        <div class="links">
          <ul class="flex space-x-4">
            <a href="dashboard.php">
              <li
                class="font-semibold b hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-home"></i> Accueil
              </li>
            </a>
            <a href="addevent.php">
              <li
                class="active font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-wrench"></i> Ajouter Un Evenement
              </li>
            </a>
            <a href="password.php">
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-lock"></i> Change Password
              </li>
            </a>
          </ul>
        </div>
        <div>
          <a href="logout.php">
          <button
            class="bg-[var(--primary)] py-2 rounded-2xl font-semibold text-white hover:bg-orange-600 px-5"
          >
            Logout
          </button></a>
        </div>
      </div>
      <div
        class="grid flex-1 justify-center max-[509px]:px-[10px] py-4 max-[509px]:grid-cols-[1fr] grid-cols-[500px] items-center"
      >
        <form action="" id="form">
          <div class="form relative p-2 bg-white rounded-lg w-full space-y-3">
            <div class="title">
              <h1 class="font-semibold relative text-4xl text-center">
                Add Event
              </h1>
            </div>
            <div class="input space-y-2 p-2">
              <div class="relative">
                <input
                  type="text"
                  class="rounded-lg bg-[var(--sixty)] outline-none pl-4 w-full h-[45px]"
                  placeholder="Enter Event Title *"
                  name="title"
                  id="title"
                />
              </div>
              <div class="relative">
                <label for="" class="font-semibold">Thumbnail * :</label>
                <input
                  type="file"
                  class="rounded-lg bg-[var(--sixty)] outline-none pl-4 w-full h-[45px]"
                  name="file"
                  id="file"
                />
              </div>
              <div class="relative">
                <input
                  type="text"
                  class="rounded-lg bg-[var(--sixty)] outline-none pl-4 w-full h-[45px]"
                  placeholder="Associate Youtube Video Url ( if exist )"
                  name="url"
                  id="url"
                />
              </div>
              <div class="user relative">
                <textarea
                  name="content"
                  class="rounded-lg w-full bg-[var(--sixty)] outline-none p-[15px] font-[16px] h-[55px] resize-none"
                  placeholder="content *"
                  id="content"
                ></textarea>
              </div>
              <div class="flex justify-between">
                <button
                  class="flex-1 h-[40px] bg-[var(--primary)] font-semibold text-white rounded-lg"
                >
                  Add
                </button>
              </div>
              <div class="flex justify-between">
                <a href="#" id="header" class="text-blue-600">Back</a>
                <!-- <a href="tel:+25768684704" class="text-blue-800">Forget Password</a> -->
              </div>
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
    const textarea = document.querySelector("textarea");
    textarea.addEventListener("keyup", (e) => {
      e.target.style.height = "55px";
      e.target.style.height = e.target.scrollHeight + "px";
    });
    var li = document.querySelectorAll(".menu li");
    const menu = document.querySelectorAll(".menu");
    const form = document.querySelector("#form");
    var i = document.querySelector(".donx");

    document.addEventListener("scroll", () => {
      if (window.scrollY >= 8) {
        menu.forEach((item) => item.classList.add("sticky"));
        menu.forEach((item) => item.classList.add("mt-0"));
        menu.forEach((item) => item.classList.add("bg-white"));
        // li.forEach((item) => {
        //   item.classList.remove("text-white");
        // });
      } else {
        menu.forEach((item) => item.classList.remove("sticky"));
        menu.forEach((item) => item.classList.remove("mt-0"));
        menu.forEach((item) => item.classList.remove("bg-white"));
        // li.forEach((item) => {
        //   item.classList.add("text-white");
        // });
      }
    });
    const clo = document.querySelector(".close");
    const menua = document.querySelector(".android .links");
    const open = document.querySelector(".monster");
    open.addEventListener("click", () => {
      menua.classList.remove("hidden");
      menua.classList.add("flex");
    });
    menua.addEventListener("click", (e) => {
      if (e.target == menua) {
        menua.classList.add("hidden");
        menua.classList.remove("flex");
      }
    });
    const android = document.querySelectorAll(".android .links ul a");
    android.forEach((item) => {
      item.addEventListener("click", () => {
        menua.classList.add("hidden");
        menua.classList.remove("flex");
      });
    });
    clo.addEventListener("click", () => {
      menua.classList.add("hidden");
      menua.classList.remove("flex");
    });

    form.addEventListener("submit", (e) => {
      const ajax = new XMLHttpRequest();
      e.preventDefault();
      var title = document.querySelector("#title").value;
      var content = document.querySelector("#content").value;
      var file = document.querySelector("#file").value;
      var url = document.querySelector("#url").value;
      let formData = new FormData(form);
      if (
        title != "" &&
        title != undefined &&
        file != "" &&
        file != undefined &&
        content != "" &&
        content != undefined &&
        url != "" &&
        url != undefined
      ) {
        ajax.open("POST", "./api/add_event.php");
        ajax.onreadystatechange = () => {
          if (ajax.readyState == 4 && ajax.status == 200) {
            if (ajax.responseText=="succeed") {
              
            new swal("", "Upload Complete", "success");
            document.location="dashboard.php"
              
            }else{
              
            new swal("", ajax.responseText, "error");
            }
          }
        };
        ajax.send(formData);
      } else {
        new swal("", "Please Complete All Charts", "warning");
      }
    });
  </script>
</html>
