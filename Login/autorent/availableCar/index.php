<?php
session_start();

// Define session timeout duration
$timeout_duration = 9999999;

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
    // Check for session timeout
    if (isset($_SESSION["login_time"]) && (time() - $_SESSION["login_time"]) > $timeout_duration) {
        // Session has timed out, clear session data
        session_unset();
        session_destroy();
        header("Location: ../../index.html");
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
  <title>Auto Rent Batam</title>
  <meta name="title" content="Auto Rent Batam">
  <meta name="description" content="Rent your car at Auto Rent Batam">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./autorentbatam.png" type="image/svg+xml">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="assets/css/style.css">
 


</head>

<body id="top">

  <!-- 
    - #PRELOADER
  -->

  <div class="preload" data-preaload data-aos="zoom-out" data-aos-duration="500">
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

  <header class="header" data-header data-aos="zoom-out" data-aos-duration="500">
    <div class="container">

      <a href="#" class="logo">
        <img src="./autorentbatam.png" width="160" height="50" alt="Grilli - Home">
      </a>

      <nav class="navbar" data-navbar>

        <button class="close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>

        <a href="#" class="logo">
          <img src="./autorentbatam.png" width="160" height="50" alt="Grilli - Home">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="#home" class="navbar-link hover-underline active">
              <div class="separator"></div>

              <span class="span" style="color: white;">Home</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#menu" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span" style="color: white;">Available Car</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#strength" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span" style="color: white;">Our Strength</span>
            </a>
          </li>

        </ul>

        <div class="text-center">
          <p class="headline-1 navbar-title">Rent With Us</p>

          <address class="body-4">
            Taman Duta Mas B 10 no. 2, Batam Centre, <br>
            Batam-Indonesia
          </address>

          <a href="mailto:booking@grilli.com" class="body-4 sidebar-link">automotiverental.batam@gmail.com</a>

          <div class="separator"></div>


          <a href="Login/index.html" class="body-1 contact-number hover-underline">
                Rent Now
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

      <section class="section testi text-center has-bg-image"
      style="background-image: url('./assets/images/wallpaper.png')" aria-label="testimonials">
      <div class="container">


      </div>
    </section>

      <!-- 
        - #MENU
      -->

      <section class="section menu" aria-label="menu-label" id="menu">
        <div class="container">

          <h2 class="headline-1 section-title text-center">Available Car</h2>

          <ul class="grid-list">

            <li>
  <div class="menu-card hover:card">
    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
      <img src="./assets/carImage/Hyundai-Stargazer.webp" width="100" height="100" loading="lazy" alt="Hyundai"
        class="img-cover" style="width: 100px; height: 100px;">
    </figure>

    <div>
      <div class="title-wrapper">
        <h3 class="title-3">
          <a href="#" class="card-title">Hyundai Stargazer</a>
        </h3>
        <span class="badge label-1">NEW</span>
        <a class="book-button" data-car-name="Hyundai Stargazer" style="cursor: pointer;"><span class="badge label-1">Book</span></a>
      </div>
      <p class="card-text label-1">
        • MPV • 7 Seated • Petrol • Automatic
      </p>
    </div>
  </div>
</li>


            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/carImage/Veloz.png" width="100" height="100" loading="lazy" alt="Toyota"
                    class="img-cover" style="width: 100px; height: 100px;">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">Toyota Veloz</a>
                    </h3>

                    <span class="badge label-1">NEW</span>

                    <a class="book-button" data-car-name="Toyota Veloz" style="cursor: pointer;"><span class="badge label-1">Book</span></a>
                  </div>

                  <p class="card-text label-1">
                    •	MPV •	7 Seated •	Petrol •	Manual
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/carImage/Honda-HRV.png" width="100" height="100" loading="lazy" alt="Honda"
                    class="img-cover" style="width: 100px; height: 100px;">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">Honda HRV</a>
                    </h3>

                    <span class="badge label-1">NEW</span>

                    <a class="book-button" data-car-name="Honda HRV" style="cursor: pointer;"><span class="badge label-1">Book</span></a>
                  </div>

                  <p class="card-text label-1">
                    •	CVT •	5 Seated •	Petrol •	Crossover
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/carImage/Toyota-Zenix.png" width="100" height="100" loading="lazy" alt="Toyota"
                    class="img-cover" style="width: 100px; height: 100px;">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">Toyota Zenix</a>
                    </h3>

                    <span class="badge label-1">NEW</span>

                    <a class="book-button" data-car-name="Toyota Zenix" style="cursor: pointer;"><span class="badge label-1">Book</span></a>
                  </div>

                  <p class="card-text label-1">
                    •	MPV •	7 Seated •	Petrol •	CVT
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/carImage/Toyota-Fortuner.png" width="100" height="100" loading="lazy" alt="Toyota"
                    class="img-cover" style="width: 100px; height: 100px;">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">Toyota Fortuner</a>
                    </h3>

                    <span class="badge label-1">NEW</span>

                    <a class="book-button" data-car-name="Toyota Fortuner" style="cursor: pointer;"><span class="badge label-1">Book</span></a>
                  </div>

                  <p class="card-text label-1">
                    •	SUV •	7 Seated •	Petrol •	Automatic 
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/carImage/Toyota-Alphard.png" width="100" height="100" loading="lazy" alt="Toyota"
                    class="img-cover" style="width: 100px; height: 100px;">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">Toyota Alphard</a>
                    </h3>

                    <span class="badge label-1">NEW</span>

                    <a class="book-button" data-car-name="Toyota Alphard" style="cursor: pointer;"><span class="badge label-1">Book</span></a>
                  </div>

                  <p class="card-text label-1">
                    •	MPV •	6 Seated •	Petrol •	CVT
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/carImage/Hyundai-Ioniq-5.png" width="100" height="100" loading="lazy" alt="Hyundai"
                    class="img-cover" style="width: 100px; height: 100px;">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">Hyundai Ioniq 5</a>
                    </h3>

                    <span class="badge label-1">NEW</span>

                    <a class="book-button" data-car-name="Hyundai Ioniq 5" style="cursor: pointer;"><span class="badge label-1">Book</span></a>
                  </div>

                  <p class="card-text label-1">
                    •	Hatchback •	5 Seated •	Electric •	Automatic
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/carImage/Hyundai-Palisade.png" width="100" height="100" loading="lazy" alt="Hyundai"
                    class="img-cover" style="width: 100px; height: 100px;">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">Hyundai Palisade</a>
                    </h3>

                    <span class="badge label-1">NEW</span>

                    <a class="book-button" data-car-name="Hyundai Palisade" style="cursor: pointer;"><span class="badge label-1">Book</span></a>
                  </div>

                  <p class="card-text label-1">
                    •	SUV •	7 Seated •	Diesel •	Automatic 
                  </p>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>

      <section class="section features text-center" aria-label="features" id="strength" data-aos="zoom-out" data-aos-duration="500">
        <div class="container">

            <p class="section-subtitle label-2" id="item13">Why Choose Us</p>

            <h2 class="headline-1 section-title" id="item14">Our Strength</h2>

            <ul class="grid-list">

                <li class="feature-item">
                    <div class="feature-card">

                        <div class="card-icon">
                            <img src="./assets/images/features-icon-1.png" width="100" height="80" loading="lazy" alt="icon">
                        </div>

                        <h3 class="title-2 card-title" id="item15">Responsiveness</h3>

                        <p class="label-1 card-text" id="item16">Our maintenance services exhibit a high level of responsiveness, ensuring swift and effective solutions to meet your needs promptly</p>

                    </div>
                </li>

                <li class="feature-item">
                    <div class="feature-card">

                        <div class="card-icon">
                            <img src="./assets/images/features-icon-2.png" width="100" height="80" loading="lazy" alt="icon">
                        </div>

                        <h3 class="title-2 card-title" id="item17">High Standard</h3>

                        <p class="label-1 card-text" id="item18">Our cars stand out as exemplars of excellence, setting the highest standard</p>

                    </div>
                </li>

                <li class="feature-item">
                    <div class="feature-card">

                        <div class="card-icon">
                            <img src="./assets/images/features-icon-3.png" width="100" height="80" loading="lazy" alt="icon">
                        </div>

                        <h3 class="title-2 card-title" id="item19">Finest Service</h3>

                        <p class="label-1 card-text" id="item20">We take pride in offering a service that is unparalleled, ensuring an experience that surpasses all expectations.</p>

                    </div>
                </li>

                <li class="feature-item">
                    <div class="feature-card">

                        <div class="card-icon">
                            <img src="./assets/images/features-icon-4.png" width="100" height="80" loading="lazy" alt="icon">
                        </div>

                        <h3 class="title-2 card-title" id="item21">Agile Support</h3>

                        <p class="label-1 card-text" id="item22">We provide unwavering support with utmost dedication, giving our all to ensure your needs are met and exceeded.</p>

                    </div>
                </li>

            </ul>

        </div>
    </section>


<!-- #FOOTER -->

<footer class="footer section has-bg-image text-center"
    style="background-image: url('./assets/images/image-2.png')" data-aos="zoom-out" data-aos-duration="500">
    <div class="container">

        <div class="footer-top grid-list">

            <div class="footer-brand has-before has-after">

                <a href="#" class="logo">
                    <img src="./autorentbatam.png" width="160" height="50" loading="lazy" alt="grilli home">
                </a>

                <address class="body-4">
                    Taman Duta Mas B 10 no. 2, Batam Centre, Batam-Indonesia
                </address>

                <a href="mailto:booking@grilli.com" class="body-4 contact-link">automotiverental.batam@gmail.com</a>

                <a href="tel:+6285925540240" class="body-4 contact-link">Contact : +62 859-2554-0240</a>

            </div>

            <ul class="footer-list">

                <li>
                    <a href="#home" class="label-2 footer-link hover-underline">Home</a>
                </li>

                <li>
                    <a href="#about" class="label-2 footer-link hover-underline">About us</a>
                </li>

                <li>
                    <a href="#recent" class="label-2 footer-link hover-underline">Recent Cars</a>
                </li>

                <li>
                    <a href="#strength" class="label-2 footer-link hover-underline">Our Strength</a>
                </li>
                
                <li>
                  <a href="admin/index.html" class="label-2 footer-link hover-underline">Admin</a>
              </li>

            </ul>

            <ul class="footer-list">

                <li>
                    <a href="https://www.facebook.com/profile.php?id=61551860174945" target="_blank"
                        class="label-2 footer-link hover-underline">Facebook</a>
                </li>

                <li>
                    <a href="https://www.instagram.com/autorent.batam/" target="_blank"
                        class="label-2 footer-link hover-underline">Instagram</a>
                </li>

                <li>
                    <a href="https://www.tiktok.com/@autorent.batam" target="_blank"
                        class="label-2 footer-link hover-underline">Tiktok</a>
                </li>

                <li>
                    <a href="https://www.youtube.com/@AutoRentBatam" target="_blank"
                        class="label-2 footer-link hover-underline">Youtube</a>
                </li>

                <li>
                    <a href="https://maps.app.goo.gl/bFeSS44UsyqwsNhm8" target="_blank"
                        class="label-2 footer-link hover-underline">Google Map</a>
                </li>

            </ul>

        </div>

        <div class="footer-bottom">

            <p class="copyright">
                &copy; 2024 Auto Rent Batam. All Rights Reserved
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

  <div id="whatsapp-logo">
    <a href="https://wa.me/6285925540240" target="_blank">
        <img src="assets/images/whatsapp.png" alt="WhatsApp Logo">
    </a>
</div>

  <!-- 
    - custom js link
  -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script>
  // Function to show a popup notification
  function showPopupNotification() {
    alert("This Feature is Under Maintenance");
  }

  // Function to handle the click event on the "Book" button
  function handleBookButtonClick(event) {
    // Prevent default link behavior
    event.preventDefault();

    // Show the popup notification
    showPopupNotification();

    // Retrieve saved form data from local storage
    const storedFormData = localStorage.getItem('formData');
    const formData = storedFormData ? JSON.parse(storedFormData) : {};

    // Get the closest parent <a> element with the data-car-name attribute
    const button = event.target.closest('.book-button');

    // Get the car name from the data attribute
    const carName = button.getAttribute('data-car-name');

    // Log the form data and car name
    console.log('Saved form data:', formData);
    console.log('Car name:', carName);
  }

  // Attach event listeners to all "Book" buttons
  document.querySelectorAll('.book-button').forEach(button => {
    button.addEventListener('click', handleBookButtonClick);
  });
</script>





</body>

</html>