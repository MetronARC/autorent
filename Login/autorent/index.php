<?php
session_start();

// Define session timeout duration
$timeout_duration = 30;

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
    // Check for session timeout
    if (isset($_SESSION["login_time"]) && (time() - $_SESSION["login_time"]) > $timeout_duration) {
        // Session has timed out, clear session data
        session_unset();
        session_destroy();
        header("Location: ../index.html");
        exit();
    } else {
        // Update session time
        $_SESSION["login_time"] = time();
        $username = $_SESSION["username"];
    }
} else {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tags
  -->
  <title>AutoRent Service</title>
  <meta name="title" content="AutoRent Service">
  <meta name="description" content="Rent your Car">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./AutoRent.png" type="image/svg+xml">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - preload images
  -->


</head>

<body id="top">

  <!-- 
    - #PRELOADER
  -->

  <div class="preload" data-preaload>
    <div class="circle"></div>
    <img src="./AutoRent.png"/>
    <p class="text">AutoRent Service</p>
  </div>





  <!-- 
    - #TOP BAR
  -->

  <div class="topbar">
    <div class="container">

      <address class="topbar-item">
        <div class="icon">
          <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">
          AutoRent Service ; Your Trusted Car Rental Provider
        </span>
      </address>

      <a href="tel:+11234567890" class="topbar-item link">
        <div class="icon">
          <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">+62 859-2554-0240</span>
      </a>

      <a href="mailto:booking@restaurant.com" class="topbar-item link">
        <div class="icon">
          <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">automotiverental.batam@gmail.com</span>
      </a>

      <span class="span">
                Hello, <?php echo htmlspecialchars($_SESSION["username"]); ?>
      </span>

    </div>
  </div>





  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="./AutoRent.png" width="200" height="90" alt="AutoRent Service - Home">
      </a>

      <nav class="navbar" data-navbar>

        <button class="close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>

        <a href="#" class="logo">
          <img src="./AutoRent.png" width="160" height="50" alt="AutoRent Service - Home">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="#reservation" class="navbar-link hover-underline active">
              <div class="separator"></div>

              <span class="span">Home</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#city" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">City</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#strength" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Testimonials</span>
            </a>
          </li>

        </ul>

        <div class="text-center">
          <p class="headline-1 navbar-title">Visit Us</p>

          <address class="body-4">
            Taman Duta Mas B 10 no. 2<br>
            Batam Centre, Batam-Indonesia 
          </address>


          <a href="mailto:booking@grilli.com" class="body-4 sidebar-link">automotiverental.batam@gmail.com</a>

          <p class="contact-label">Booking Request</p>

          <a href="tel:+88123123456" class="body-1 contact-number hover-underline">
            +62 859-2554-0240
          </a>
        </div>

      </nav>

      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->


      <!-- 
        - #SERVICE
      -->

      <!-- 
        - #ABOUT
      -->


      <!-- 
        - #SPECIAL DISH
      -->


      <!-- 
        - #MENU
      -->


      <!-- 
        - #TESTIMONIALS
      -->

      <section class="section testi text-center has-bg-image"
        style="background-image: url('./assets/images/wallpaper.png')" aria-label="testimonials">
        <div class="container">


        </div>
      </section>





      <!-- 
        - #RESERVATION
      -->

      <section class="reservation" id="reservation">
        <div class="container">

          <div class="form reservation-form bg-black-10">

            <form action="./availableCar" method="post" class="form-left" id="reservation-form">

              <h2 class="headline-1 text-center">Book Now</h2>

              <p class="form-text text-center">
                Fill out the order form and specify start and end date
              </p>

              <div class="input-wrapper">
                <div class="icon-wrapper">

                  <ion-icon name="map" aria-hidden="true"></ion-icon>

                  <select name="location" class="input-field">
                    <option value="">Select Location</option>
                    <option value="Batam">Batam</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Surabaya">Surabaya</option>
                  </select>

                  <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                </div>

                <div class="icon-wrapper">

                  <ion-icon name="person-outline" aria-hidden="true"></ion-icon>

                  <select name="driver" class="input-field">
                    <option value="">Select Driver</option>
                    <option value="Individual">Individual</option>
                    <option value="With Driver">With Driver</option>
                  </select>

                  <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                </div>
              </div>

              <div class="input-wrapper">

                <div class="icon-wrapper">
                  <ion-icon name="calendar-clear-outline" aria-hidden="true"></ion-icon>
                  <input type="date" name="start-date" class="input-field" id="start-date">
                  <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                </div>

                <div class="icon-wrapper">
                </div>

                <div class="icon-wrapper">
                  <ion-icon name="calendar-clear-outline" aria-hidden="true"></ion-icon>
                  <input type="date" name="end-date" class="input-field" id="end-date">
                  <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                </div>

              </div>

              <button type="submit" class="btn btn-secondary" id="find-car-btn">
                <span class="text text-1">Find Car</span>
                <span class="text text-2" aria-hidden="true">Find Car</span>
              </button>

            </form>

            <div class="form-right text-center" style="background-image: url('./assets/images/form-pattern.png')">

            </div>

          </div>

        </div>
      </section>

      <section class="section event bg-black-10" aria-label="event" id="city">
        <div class="container">


          <h2 class="section-title headline-1 text-center">Our Cities</h2>

          <ul class="grid-list">

            <li>
              <div class="event-card has-before hover:shine">

                <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                  <img src="./assets/images/Batam.jpg" width="350" height="450" loading="lazy"
                    alt="Flavour so good you’ll try to eat with your eyes." class="img-cover">
                </div>

                <div class="card-content">

                  <h3 class="card-title title-2 text-center">
                    Batam, Kepulauan Riau
                  </h3>
                </div>

              </div>
            </li>

            <li>
              <div class="event-card has-before hover:shine">

                <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                  <img src="./assets/images/Jakarta.jpg" width="350" height="450" loading="lazy"
                    alt="Flavour so good you’ll try to eat with your eyes." class="img-cover">

                </div>

                <div class="card-content">

                  <h3 class="card-title title-2 text-center">
                    Jakarta, DKI Jakarta
                  </h3>
                </div>

              </div>
            </li>

            <li>
              <div class="event-card has-before hover:shine">

                <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                  <img src="./assets/images/surabaya.png" width="350" height="450" loading="lazy"
                    alt="Flavour so good you’ll try to eat with your eyes." class="img-cover">

                </div>

                <div class="card-content">

                  <h3 class="card-title title-2 text-center">
                    Surabaya, Jawa Timur
                  </h3>
                </div>

              </div>
            </li>
            

          </ul>

        </div>
      </section>

      <!-- 
        - #FEATURES
      -->

      <section class="section features text-center" aria-label="features" id="strength" data-aos="zoom-out" data-aos-duration="500">
        <div class="container">

            <p class="section-subtitle label-2" id="item13">Testimonials</p>

            <ul class="grid-list">

                <li class="feature-item">
                    <div class="feature-card">

                        <div class="card-icon">
                            <img src="./assets/contentReview/ronaldK.png" width="130" height="110" loading="lazy" alt="icon">
                        </div>

                        <h3 class="title-2 card-title" id="item15">Ronald K</h3>
                        <p>Sales SPV Hyundai Batam</p>

                        <p class="label-1 card-text" id="item16">“This company rent out new, clean, great quality car, and offer excellence services. Very satisfied and will definitely endorse them.”
                        </p>

                    </div>
                </li>

                <li class="feature-item">
                    <div class="feature-card">

                        <div class="card-icon">
                            <img src="./assets/contentReview/chrisBrook.png" width="130" height="110" loading="lazy" alt="icon">
                        </div>

                        <h3 class="title-2 card-title" id="item17">Christopher Brook</h3>
                        <p>Metronarc GM</p>

                        <p class="label-1 card-text" id="item18">“The service is good and the interior is clean and doesn't smell musty, usually when I rent car next door it smells musty. This one smell good and it's comfortable to use.”</p>

                    </div>
                </li>

                <li class="feature-item">
                  <div class="feature-card">

                      <div class="card-icon">
                          <img src="./assets/contentReview/martinusAndrian.png" width="130" height="110" loading="lazy" alt="icon">
                      </div>

                      <h3 class="title-2 card-title" id="item17">Martinus Adrian</h3>
                      <p>Operation Manager SPU</p>

                      <p class="label-1 card-text" id="item18">“My recent experience with this car rental company is by far the best. Their services are amazing. The price did not change during the festive season. Car in good condition always. I am obsessed with traveling around and finding car services. And they are quick to respond.”
                      </p>

                  </div>
              </li>

            </ul>

        </div>
    </section>





      <!-- 
        - #FEATURES
      -->

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer section has-bg-image text-center"
    style="background-image: url('./assets/images/wallpaper.png')">
    <div class="container">

      <div class="footer-top grid-list">

        <div class="footer-brand has-before has-after">

          <a href="#" class="logo">
            <img src="./AutoRent.png" width="160" height="50" loading="lazy" alt="grilli home">
          </a>

          <address class="body-4">
            AutoRent Service ; Your Trusted Car Rental Provider
          </address>

          <a href="mailto:booking@grilli.com" class="body-4 contact-link">automotiverental.batam@gmail.com</a>

          <a href="tel:+88123123456" class="body-4 contact-link">Booking Request : +62 859-2554-0240</a>

        </div>

        <ul class="footer-list">

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Home</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">City</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Testimonials</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <a href="https://www.instagram.com/autorent.service?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="label-2 footer-link hover-underline" target="_blank">Instagram</a>
          </li>
        
          <li>
            <a href="https://www.youtube.com/@AutoRent.Service" class="label-2 footer-link hover-underline" target="_blank">Youtube</a>
          </li>
        
          <li>
            <a href="https://www.tiktok.com/@autorent.service" class="label-2 footer-link hover-underline" target="_blank">Tiktok</a>
          </li>
        
        </ul>

      </div>

      <div class="footer-bottom">

        <p class="copyright">
          &copy; 2024 AutoRent Service
        </p>

      </div>

    </div>
  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>
  <script>
    document.getElementById('find-car-btn').addEventListener('click', function (e) {
      e.preventDefault(); // Prevent the default form submission

      // Get form data
      const form = document.getElementById('reservation-form');
      const formData = new FormData(form);

      // Convert FormData to JSON
      const jsonData = {};
      formData.forEach((value, key) => {
        jsonData[key] = value;
      });

      // Store form data in local storage
      localStorage.setItem('formData', JSON.stringify(jsonData));

      // Simulate form submission (you may use fetch API for actual submission)
      form.submit();
    });

    // Retrieve stored form data on page load
    window.addEventListener('load', () => {
      const storedFormData = localStorage.getItem('formData');
      if (storedFormData) {
        const formData = JSON.parse(storedFormData);
        for (const key in formData) {
          if (formData.hasOwnProperty(key)) {
            const element = document.querySelector(`[name="${key}"]`);
            if (element) {
              element.value = formData[key];
            }
          }
        }
      }
    });
  </script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>