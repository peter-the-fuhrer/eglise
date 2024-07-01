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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="./tailwind.js"></script>
    <link rel="stylesheet" href="./files/font-awesome/all.min.css" />
    <style>
      :root {
        --primary: #ff3b0a;
        --sixty: #f0f3f2;
      }
      .donx {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.4);
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        z-index: 10;
      }
      body {
        background-color: var(--sixty);
      }
      .value {
        -webkit-line-clamp: 3;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
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
    <div class="min-h-screen w-full">
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
                class="active font-semibold b hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-home"></i> Accueil
              </li>
            </a>
            <a href="addevent.php">
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-wrench"></i> Ajouter Un Evenements
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
                class="active font-semibold b hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-home"></i> Accueil
              </li>
            </a>
            <a href="addevent.php">
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
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
        class="grid grid-cols-[600px] max-[610px]:px-[10px] h-full max-[610px]:grid-cols-[1fr] justify-center"
      >
        <div class="content h-full relative">
          <div class="title mt-4 mb-4">
            <h1 class="text-4xl text-center font-semibold">List Of Events</h1>
          </div>
          <div class="loader absolute flex justify-center items-center w-full h-full">
            <img src="./files/spinner.gif" class="w-[70px]" alt="" srcset="">
          </div>
          <div class="items space-y-2">
            <!-- <div
              class="item p-2  space-x-2 bg-white w-full h-[150px] relative flex"
            >
              <div class="h-full w-[30%]">
                <img src="./files/hotel.jpg" class="w-full h-full" alt="" />
              </div>
              <div class="header flex flex-col w-[70%]">
                <h1 class="text-3xl font-semibold">Dimanche</h1>
                <p class="value">
                  This is monster faraday, This is monster faradayThis is
                  monster faradayThis is monster faradayThis is monster
                  faradayThis is monster faraday
                </p>
                <div class="flex  bottom-0 flex-1 items-end justify-between">
                  <a href="delete.php" class="text-red-600"
                    ><i class="fa fa-trash"></i> Delete</a
                  >
                  <a href="javascript:void;" class="edit text-blue-600"
                    ><i class="fa fa-edit"></i> Edit</a
                  >
                </div>
              </div>
            </div> -->
          </div>
          <div class="button hidden">
            <button class="w-full mt-3 seemore mb-3 h-[40px] cursor-pointer bg-[var(--primary)] font-bold text-white rounded-lg">See More</button>
          </div>
        </div>

      </div>
    </div>
    <!-- PopUp Edit -->
    <div
      class="content overflow-y-auto py-2 editpopup fixed top-0 left-0 bg-[rgba(0,0,0,.4)] max-[509px]:px-[10px] max-[509px]:grid-cols-[1fr] grid-cols-[500px] w-screen h-screen hidden justify-center items-center"
    >
      <div class="form relative p-2 bg-white rounded-lg w-full space-y-3">
        <div
          class="donx z-2 max-[569px]:top-4 max-[569px]:right-4 absolute -top-8 -right-8"
        >
          <i class="fa fa-x text-white"></i>
        </div>
        <div class="title">
          <h1 class="font-semibold relative text-4xl text-center">Edit Event</h1>
        </div>
        <div class="input space-y-2 p-2">
          <div class="relative">
            <input
              type="text"
              class="rounded-lg bg-[var(--sixty)] outline-none pl-4 w-full h-[45px]"
              placeholder="Enter Event Title *"
              name=""
              id=""
            />
          </div>
          <div class="relative">
            <input
              type="text"
              class="rounded-lg bg-[var(--sixty)] outline-none pl-4 w-full h-[45px]"
              placeholder="Associate Youtube Video Url ( if exist )"
              name=""
              id=""
            />
          </div>
          <div class="user relative">
            <textarea
              name=""
              class="rounded-lg w-full bg-[var(--sixty)] outline-none p-[15px] font-[16px] h-[55px] resize-none"
              placeholder="content *"
              id=""
            ></textarea>
          </div>
          <div class="flex justify-between">
            <button
              class="flex-1 h-[40px] bg-[var(--primary)] font-semibold text-white rounded-lg"
            >
              <i class="fa fa-edit"></i>
              Edit
            </button>
          </div>
          <div class="flex justify-between">
            <!-- <a href="#" id="header" class="text-blue-600">Back</a> -->
            <!-- <a href="tel:+25768684704" class="text-blue-800">Forget Password</a> -->
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
    var data;
    const editbutton = document.querySelector("a.edit");
    const editpopup = document.querySelector(".editpopup");
    var i = document.querySelector(".donx");
    const loader=document.querySelector('.loader');
    const button=document.querySelector('.button');
    i.addEventListener("click", () => {
      setTimeout(() => {
        editpopup.classList.add("hidden");
        editpopup.classList.remove("grid");
        editpopup.style.overflowY = "";
        document.style.documentElement.overflowY = "";
      }, 50);
    });
    editpopup.addEventListener("click", (e) => {
      if (e.target == editpopup) {
        // editpopup.setAttribute("data-aos", "fade-down");

        setTimeout(() => {
          editpopup.classList.add("hidden");
          editpopup.classList.remove("grid");
          editpopup.style.overflowY = "";
          document.documentElement.style.overflowY = "";
        }, 50);
      }
    });
    const textarea = document.querySelector("textarea");
    textarea.addEventListener("keyup", (e) => {
      e.target.style.height = "55px";
      e.target.style.height = e.target.scrollHeight + "px";
    });
    editbutton?.addEventListener("click", (e) => {
      setTimeout(() => {
        editpopup.classList.remove("hidden");
        editpopup.classList.add("grid");
        editpopup.style.overflowY = "";
        document.documentElement.style.overflowY = "";
      }, 50);
    });
    const card = document.querySelector(".donate .card");
    const donate = document.querySelector(".donate");
    var li = document.querySelectorAll(".menu li");
    const menu = document.querySelectorAll(".menu");
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
    // contact

    // responsive
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
    const get = new XMLHttpRequest();
    get.open("GET", "./api/list_event.php");
    get.onreadystatechange = () => {
      loader.classList.remove('hidden')
      loader.classList.add('flex')
      if (get.readyState == 4 && get.status == 200) {
        if (get.responseText != "empty" && get.responseText != "end") {
          data=JSON.parse(get.responseText);
          loader.classList.add('hidden')
          loader.classList.remove('flex')

        if(data){
          data.forEach(element => {
          document.querySelector('.items').innerHTML+=`
            <div
              class="item p-2 space-x-2 bg-white w-full h-[150px] relative flex"
              id="${element.id}"
            >
              <div class="h-full w-[30%]">
                <img src="http://localhost/eglise/photo/${element.img}" class="w-full h-full" alt="" />
              </div>
              <div class="header flex flex-col w-[70%]">
                <h1 class="text-3xl font-semibold">${element.title}</h1>
                <p class="value">
                ${element.content}
                </p>
                <div class="flex bottom-0 flex-1 items-end justify-between">
                  <a href="./api/delete_event.php?event_id=${element.id}&event_img=${element.img}" class="text-red-600"
                    ><i class="fa fa-trash"></i> Delete</a
                  >
                  <a href="javascript:void;" class="edit text-blue-600"
                    ><i class="fa fa-edit"></i> Edit</a
                  >
                </div>
              </div>`
        });
        button.classList.remove('hidden')
        }
          
        }else{
          loader.classList.add('hidden')
          loader.classList.remove('flex')
          document.querySelector('.items').innerHTML+=`<div class="mt-3 w-full mb-3"><p class="font-semibold text-center text-xl">No Event Available.</p></div>`;
        }
      }
    };
    get.send();
    // load More
    const btn=document.querySelector('.seemore');
    function loadMore(){
    var lastid=document.querySelector('.items').lastChild.getAttribute('id');
    const loadmore = new XMLHttpRequest();
    loadmore.open("GET", "./api/list_event.php?start="+lastid);
    loadmore.onreadystatechange = () => {
      // loader.classList.remove('hidden')
      // loader.classList.add('flex')
      if (loadmore.readyState == 4 && loadmore.status == 200) {
        if (loadmore.responseText != "empty" && loadmore.responseText != "end") {
          data=JSON.parse(loadmore.responseText);
          // loader.classList.add('hidden')
          // loader.classList.remove('flex')
        if(data){
          data.forEach(element => {
          document.querySelector('.items').innerHTML+=`
            <div
              class="item p-2 space-x-2 bg-white w-full h-[150px] relative flex"
              id="${element.id}"
            >
              <div class="h-full w-[30%]">
                <img src="http://localhost/eglise/photo/${element.img}" class="w-full h-full" alt="" />
              </div>
              <div class="header flex flex-col w-[70%]">
                <h1 class="text-3xl font-semibold">${element.title}</h1>
                <p class="value">
                ${element.content}
                </p>
                <div class="flex bottom-0 flex-1 items-end justify-between">
                  <a href="./api/delete_event.php?event_id=${element.id}&event_img=${element.img}" class="text-red-600"
                    ><i class="fa fa-trash"></i> Delete</a
                  >
                  <a href="javascript:void;" class="edit text-blue-600"
                    ><i class="fa fa-edit"></i> Edit</a
                  >
                </div>
              </div>`
        });
        }
          
        }else{
          btn.classList.add('hidden')
          document.querySelector('.content').innerHTML+=`<div class="mt-3 w-full mb-3"><p class="font-semibold text-center text-xl">Event Ended</p></div>`
        }
      }
    };
    loadmore.send();
    }
    btn.addEventListener('click',()=>loadMore())
  </script>
</html>
