<?php
require './api/config.php';
  if (isset($_GET["id"])) {
    $id=$_GET["id"];
    $query=mysqli_query($c,"SELECT * FROM event WHERE  id='$id'");

?>
<!DOCTYPE html>
<html class="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>iSolution</title>
    <script type="text/javascript" src="./tailwind.js"></script>
    <!-- <link rel="stylesheet" type="text/font" href="./files/poppins.ttf"> -->
    <link rel="stylesheet" href="./files//font-awesome/all.min.css" />
    <link rel="stylesheet" href="./files/aos.css" />
    <script src="./files/aos.js"></script>
    <link rel="shortcut icon" href="./files/logo.PNG" />
    <style type="text/css">
      /*@import("./files/roboto.ttf");*/
      /*@import("./files/verdana.ttf");*/
      :root {
        --primary: #ff3b0a;
        --sixty: #f0f3f2;
      }
      .trans {
        transition: all;
        transition-duration: 0.2s;
      }
      li {
        padding: 7px;
        border-radius: 5px;
      }
      html {
        scroll-behavior: smooth;
      }
      body {
        background-color: var(--sixty);
      }
      #home {
        /* background-image: url("./files/workbench.jpg"); */
        background-position: center;
        /* padding-top: calc(60px + 1rem); */
      }
      #Service,
      #about {
        /* background-image: url("./files/hotel.jpg"); */
        background-position: center;
        padding-top: calc(60px + 1rem);
      }
      li.active {
        color: var(--primary);
        position: relative;
      }
      @media screen AND (max-width: 810px) {
        .android ul a{
          padding:10px 0;
          /* background-color: #00ffff; */
        }
        .android ul a:hover{
          background-color: var(--sixty);
          border-radius: 8px;
        }
        .android ul li{
          margin: 0 auto;
          width: 140px;
          position: relative;
          border-radius: 0;
        }
        .android ul{
          padding: 5px;
          border-radius: 8px;
        }
        .close{
          width: 35px;
          height: 35px;
          border-radius: 50%;
          background-color: rgba(255, 255, 255, .4);
          display: flex;
          justify-content: center;
          align-items: center;
          cursor: pointer;
        }
      }
    </style>
  </head>
  <body>
    <div id="home" class="flex flex-col min-h-screen">
      <!-- Android -->
      <div
        class="android menu flex top-0 transition-all z-50 mt-2 w-full h-[60px] items-center px-3 min-[811px]:hidden justify-between"
      >
        <div class="logo relative">
          <img src="./files/logo.png" class="h-full max-h-[50px]" alt="" />
        </div>
        <div class="links max-[810px]:h-screen max-[810px]:left-0 max-[810px]:top-0 max-[810px]:bg-[rgba(0,0,0,.4)] max-[810px]:justify-center max-[810px]:items-center max-[810px]:w-screen  max-[810px]:flex-row max-[810px]:fixed min-[811px]:hidden hidden">
          <ul class="flex relative max-[810px]:bg-white max-[810px]:space-x-0 max-[810px]:w-[60%] max-[810px]:flex-col space-x-2">
            <a href="index.html">
              <li
                class=" font-semibold b hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-home"></i> Accueil
              </li>
            </a>
            <a href="event.html">
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-wrench"></i> Evenements
              </li>
            </a>
            <a href="programme.html">
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-calendar"></i> Programme
              </li>
            </a>
            <a href="javascript:void;" id="contact">
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-envelope"></i> Contact Nous
              </li></a
            >
            <a href="javascript:void;" id="donate"
              ><i></i>
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-donate"></i> Donate
              </li>
            </a>
          <div class="close   absolute -top-8 -right-8">
            <i class="fa fa-x text-white"></i>
          </div>
          </ul>
        </div>
        
        <div class="monster cursor-pointer hidden max-[810px]:block">
          <i onclick="" class=" fas fa-bars-staggered"></i>
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
          <ul class="flex space-x-2">
            <a href="index.html">
              <li
                class=" font-semibold b hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-home"></i> Accueil
              </li>
            </a>
            <a href="event.html">
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-wrench"></i> Evenements
              </li>
            </a>
            <a href="programme.html">
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-calendar"></i> Programme
              </li>
            </a>
            <a href="javascript:void;" id="contact">
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-envelope"></i> Contact Nous
              </li></a
            >
            <a href="javascript:void;" id="donate"
              ><i></i>
              <li
                class="font-semibold hover:text-[var(--primary)] transition-colors"
              >
                <i class="fa fa-donate"></i> Donate
              </li>
            </a>
          </ul>
        </div>
        <div>
          <a href="login_form.php"><button class="bg-[var(--primary)] py-2 rounded-2xl font-semibold text-white hover:bg-orange-600 px-5">Login</button></a></div>
      </div>
      <div class="content flex-1 min-h-full flex">
            <div class="grid  w-full justify-center mt-4 grid-cols-[600px]">
              <?php
                if ($query) {
  if (mysqli_num_rows($query)>0) {
		while ($list=mysqli_fetch_assoc($query)) {
              ?>
                <div class="item bg-white">
                    <div class="img">
                        
                <img src="./photo/<?php echo $list["img"];?>" alt="">
                    </div>
                    <div class="text p-4">
                        <div class="title">
                            <p class="font-semibold text-3xl"><?php echo $list["title"];?></p>
                        </div>
                        <div class="content mt-4">
                            <p class=""><?php echo $list["content"];?></p>
                        </div>
                        <div class="video mt-8 w-full">
                            <embed class="w-full h-80" src="<?php echo $list["youtube_url"];?>" />
                        </div>
                    <a href="javascript:void;" class="text-blue-500 back">Go Back</a>
                    </div>
                </div>
            </div>
             <?php
             
		}
	}else{
		echo "<p class='text-3xl self-center text-center font-semibold'>This Event Doesn't Exist Or Is No Longer Available.</p>";
	}
	}else{
		echo "Error Query";
	}
  }else{
    header('location:event.html');
  }
             ?>
        </div>
      </div>
      <div
        onclick=""
        class="donate hidden top-0 overflow-y-auto max-[466px]:px-2 z-[51] grid justify-center items-center fixed w-screen h-screen bg-[rgba(0,0,0,.4)]"
      >
        <div
          class="card max-[466px]:h-auto  max-[466px]:w-full trans -top-[50%] relative bg-white w-[450px] space-y-2 h-[230px] rounded-lg p-4"
        >
          <i class="fa fa-x absolute right-4 top-4 donx cursor-pointer"></i>
          <h1 class="text-center text-3xl font-bold"><i class="fa fa-donate"></i> Donate</h1>
          <p>
            If you want to support us in worshiping you can send donation using
            Lumicash on This Number : <b>+257 xx xx xx xx</b> the name is
            <b>Monster Job</b> or By Using Ihela on <b>+257 xx xx xx xx</b> the
            is <b>Monster Yobu</b>.
          </p>
          <p>Thanks For Your Donation.</p>
        </div>
      </div>
      <div
        onclick=""
        class="contact hidden top-0 overflow-y-auto max-[466px]:px-2 z-[51] grid justify-center items-center fixed w-screen h-screen bg-[rgba(0,0,0,.4)]"
      >
        <div
          class="contact-card max-[466px]:h-auto  max-[466px]:w-full trans -top-[50%] relative bg-white w-[450px] space-y-2 h-[230px] rounded-lg p-4"
        >
          <i class="fa fa-x absolute right-4 top-4 contactx cursor-pointer"></i>
          <h1 class="text-center text-3xl font-bold"><i class="fa fa-envelope"></i> Contact Nous</h1>
          <p>
            You Can find us through phone number on :
            <b>+257 xx xx xx xx</b> or Mail us on <a href="mailto:email.com" class="text-[var(--primary)]">email.com</a> or again find us on our social media accounts :
          </p>
          <p>
            <ul class="flex items-center justify-center">
              <a href="#" class="hover:text-[var(--primary)]"><li><i class="fa-brands fa-facebook"></i> Facebook</li></a>
              <a href="#" class="hover:text-[var(--primary)]"><li><i class="fa-brands fa-instagram"></i> Instagram</li></a>
              <a href="#" class="hover:text-[var(--primary)]"><li><i class="fa-brands fa-youtube"></i> Youtube</li></a>
              <a href="#" class="hover:text-[var(--primary)]"><li><i class="fa-brands fa-whatsapp"></i> Whatsapp</li></a>
            </ul>
          </p>
        </div>
      </div>
    </div>
  </body>
  <script>
    AOS.init();
    var li = document.querySelectorAll(".menu li");
    const menu = document.querySelectorAll(".menu");


    document.addEventListener("scroll", () => {
      if (window.scrollY >= 8) {
        menu.forEach(item=>item.classList.add("sticky"))
        menu.forEach(item=>item.classList.add("mt-0"))
        menu.forEach(item=>item.classList.add("bg-white"))
        // li.forEach((item) => {
        //   item.classList.remove("text-white");
        // });
      } else {
        menu.forEach(item=>item.classList.remove("sticky"))
        menu.forEach(item=>item.classList.remove("mt-0"))
        menu.forEach(item=>item.classList.remove("bg-white"))
        // li.forEach((item) => {
        //   item.classList.add("text-white");
        // });
      }
    });
    const card = document.querySelector(".donate .card");
    const donate = document.querySelector(".donate");
    var li = document.querySelectorAll(".menu li");
    var i = document.querySelector(".donx");
    const back=document.querySelector('.back');
    back.onclick=()=>{
      history.back();
    }
    i.addEventListener("click", () => {
      card.style.top = "-70%";
      setTimeout(() => {
        donate.classList.add("hidden");
        donate.style.overflowY = "";
        document.style.documentElement.overflowY = "";
      }, 200);
    });
    donate.addEventListener("click", (e) => {
      if (e.target == donate) {
        // donate.setAttribute("data-aos", "fade-down");

        card.style.top = "-70%";
        setTimeout(() => {
          donate.classList.add("hidden");
          
        donate.style.overflowY = "";
        document.documentElement.style.overflowY = "";
        }, 200);
      }
    });
    const dlink = document.querySelectorAll("#donate");
    dlink.forEach(item=>{
      item.addEventListener("click", (e) => {
      donate.classList.remove("hidden");
      document.documentElement.style.overflowY = "hidden";
      donate.style.overflowY = "auto";
      setTimeout(() => {
        card.style.top = "0px";
      }, 1);
    });
    })
    // contact 
    const contactcard = document.querySelector(".contact .contact-card");
    const contact = document.querySelector(".contact");
    var li = document.querySelectorAll(".menu li");
    var close = document.querySelector(".contactx");
    close.addEventListener("click", () => {
      contactcard.style.top = "-70%";
      setTimeout(() => {
        contact.classList.add("hidden");
        contact.style.overflow = "";
        document.documentElement.style.overflowY = "";
      }, 200);
    });

    contact.addEventListener("click", (e) => {

      if (e.target == contact) {
        // contact.setAttribute("data-aos", "fade-down");

        contactcard.style.top = "-70%";
        setTimeout(() => {
          contact.classList.add("hidden");
          contact.style.overflow = "";
          document.documentElement.style.overflowY = "";
        }, 200);
      }
    });
    const clink = document.querySelectorAll("#contact");
    clink.forEach((item)=>{
      item.addEventListener("click", (e) => {
      contact.classList.remove("hidden");
      contact.style.overflow = "";
      document.documentElement.style.overflowY = "hidden";
      console.log(contact)
      setTimeout(() => {
        contactcard.style.top = "0px";
      }, 1);
    });
    })
    // responsive
    const clo=document.querySelector('.close')
    const menua=document.querySelector(".android .links");
    const open=document.querySelector(".monster");
    open.addEventListener('click',()=>{
        menua.classList.remove('hidden')
        menua.classList.add('flex')
      })
    menua.addEventListener('click',(e)=>{
      if (e.target==menua) {
        menua.classList.add('hidden')
        menua.classList.remove('flex')
      }
      })
    const android=document.querySelectorAll('.android .links ul a');
    android.forEach((item)=>{
      item.addEventListener('click',()=>{
        menua.classList.add('hidden')
        menua.classList.remove('flex')
      })
    })
      clo.addEventListener('click',()=>{
        menua.classList.add('hidden')
        menua.classList.remove('flex')
      })
  </script>
</html>
