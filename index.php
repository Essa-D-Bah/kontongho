<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Anch</title>
    <!-- StyleSheets -->
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/main.css">
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
     <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto|Karla"
    />
  </head>
  <body>
    <!-- Preloader -->
    <div class="preloader">
      <img src="images/preloader.gif" alt="" />
    </div>

    <header class="header">
      <a href="#" class="logo mlogo">Anch</span></a>

      <nav class="navbar mlogo">
        <a href="#home">Home</a>
        <a href="#services">Services</a>
        <a href="#about">About Us</a>
        <a href="#contact">Contact Us</a>
      </nav>

      <div class="col">
        <div><a href="login.php" class="linkBtn">Sign In</a></div>
        <style>

        </style>
        <div class="dropdown linkBtn">
          <span>Register</span>
          <div class="dropdown-content">
             <div class="dropEl"><a href="restaurantSignup.php" class="linkBtn">Restaurant</a></div>
             <div  class="dropEl"><a href="companySignUp.php" class="linkBtn">Company</a></div>
          </div>
        </div>
      </div>

      <!-- Hamburger -->
      <div class="hamburger">
        <img src="./images/grid-outline.svg" alt="" />
      </div>
    </header>

    <!-- Home -->
    <section class="home" id="home">
      <div class="content">
        <h1 class="mheadings">Order Your Food <span class="mlogo">Easier & Faster.</span></h1>
        <p>
          Anch is aimed at bridging the gap between companies and restaurant. Any company can register and partner with restaurants
          around your vicinity and get your lunch delivered at your office.
          Register above as a company or restaurant and get connected.
        </p>
      </div>
      <div class="image">
        <img src="images/sammy-online-delivery-1.png" alt="" />
      </div>
    </section>
    <!-- Services -->
    <section class="services" id="services">
      <div class="top">
        <h2 class="mheadings"><span class="mlogo">Why</span> We are the Best</h2>
        <p>
          No need to go around the office to know what employees want to order just register and we will 
          process your orders in real time.
        </p>
      </div>

      <div class="bottom">
        <div class="box">
          <img src="images/delivery-man.svg" alt="" />
          <h4 class="mheadings">Delivery To Your Company</h4>
          <p>
           Make an order from any restaurant and it will be delivered at your desk. 
           As easy as ABC just register and relax.
          </p>
        </div>
        <div class="box">
          <img src="./images/fast-food.svg" alt="" />
          <h4 class="mheadings">Healthy Foods</h4>
          <p>
            All Restaurants are vetted and approved to have the highest level of hygiene sit at your
            office let us serve your with healthy lunch.
          </p>
        </div>
        <div class="box">
          <img src="./images/order-food.svg" alt="" />
          <h4 class="mheadings">Online Ordering</h4>
          <p>
            Everything is through your computer with the click of your mouse.
          </p>
        </div>
      </div>
    </section>

    <!-- About #1 -->
    <section class="about" id="about">
      <div class="image">
        <img src="./images/deli.png" alt="" />
      </div>
      <div class="content">
        <h3 class="mheadings"><span class="mlogo">Order</span> anytime and anywhere</h3>
        <p>
          Order at anytime and anywhere during the day. Your lunch will be delivered at your at the speed of 
          a light.
        </p>
      </div>
    </section>

    <!-- About #2 -->
    <section class="about about-2">
      <div class="content">
        <h3 class="mheadings">
          <span class="mlogo">Deliver</span> the products with best safety
        </h3>
        <p>
          Your Lunch will be delivered to you with the best of hygiene from the Restaurant down to your company.
        </p>
      </div>

      <div class="image">
        <img src="images/safety.webp" alt="" />
      </div>
    </section>

    
    <!-- Footer -->
    <footer class="footer " id="contact">
      <div class="top ">
        <div class="content">
          <a href="" class="logo"><span class="mlogo">Anch</span></a>
          <p>
            Register and connect with restarants or companies.
          </p>
          <p>Kay Anch, Naa Kontongo, Arr Mbotoh</p>
        </div>

        <div class="links">
          <div class="link">
            <h4 class="mheadings">Contact Information</h4>
            <div>
              <img src="./images/location-cross.svg" alt="" />
              <span>122,Mall Of Gambia, Bakoteh</span>
            </div>
            <div>
              <img src="./images/sms-tracking.svg" alt="" />
              <span>Anch@gmail.com</span>
            </div>
          </div>



          <div class="link">
            <h4 class="mheadings">Connect with Us</h4>
            <div>
              <img src="./images/instagram.svg" alt="" />
              <span>Instagram</span>
            </div>
            <div>
              <img src="./images/twitter.svg" alt="" />
              <span>Twitter</span>
            </div>
            <div>
              <img src="./images/facebook.svg" alt="" />
              <span>Facebook</span>
            </div>
          </div>
        </div>
      </div>
      <div class="mbottom">
        <p>Copyright © 2010-2021 Anch Company S.L. All rights reserved.</p>
      </div>
    </footer>

    <!-- Go To Top -->
    <div class="scroll-top">
      <img src="./images/arrow-up-outline.svg" alt="" />
    </div>
    <!-- Scripts -->
    <script src="js/main.js"></script>
  </body>
</html>
