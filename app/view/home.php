<html lang="en">
  <head>
    <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Homepage</title>
	  <link rel="stylesheet" href="./assets/dist/app.css">
    <link rel='shortcut icon' type='image/x-icon' href="assets/img/favicon/favicon.ico">
  </head>
  <body>
	  <div class="standard-page" id="app">
  		<?php include('./app/view/html-includes/navigation.html'); ?>
  		<hero>
        <section class="hero-container">
          <div class="hero-text">
            <h2 id="countdownTimer"></h2>
            <h1 id="hero-text">to the 20th SMU-RM Western Circuit 2017</h1>
          </div>
          <video loop muted autoplay class="fullscreen-bg__video show-md-up">
            <source src="./assets/vid/hero-video-2.mp4"/>
          </video>
          <div class="hero-img show-md-down"></div>
        </section>
      </hero>
      <section id="intro">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-sm-12">
              <div class="content align-center">
                <div class="text-wrapper">
                  <h2><a href="/documentation">Sign Up Information <i class="fa fa-arrow-right"></i></a></h2>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="block-img" >
                <div class="carousel">
                  <div class="carousel__item" style="background-image: url(./assets/img/carousel/carousel_img_2.jpg);"></div>
                  <div class="carousel__item" style="background-image: url(./assets/img/carousel/carousel_img_5.jpg);"></div>
                  <div class="carousel__item" style="background-image: url(./assets/img/carousel/carousel_img_6.jpg);"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="gallery">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-sm-12">
              <div class="block-img" id="img-smu"></div>
            </div>
            <div class="col-lg-3 col-sm-12">
              <div class="content align-center">
                <div class="text-wrapper">
                  <p>
                    Established in 2000, the Singapore Management University (SMU) is a premier university in Asia internationally recognised for its world-class research and distinguished teaching.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-12">
              <div class="block-img" id="img-rm"></div>
            </div>
            <div class="col-lg-3 col-sm-12">
              <div class="content align-center">
                <div class="text-wrapper">
                  <!-- <h2><a href="https://www.facebook.com/SMU.RM.WCSR/">Find out more about us! <i class="fa fa-arrow-right"></i></a></h2> -->
                  <p>Founded in 1994, Raffles Marina is Singapore's premiere megayacht club, and the first marina in Singapore to be awarded the 5 Gold Anchor Award.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="sec-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-sm-12">
              <div class="block-img" id="sec-img"></div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="content align-center">
                <div class="text-wrapper">
                  <h2>About us</h2>

                  <p>
                    Western Circuit Sailing Regatta is back for 2017! Jointly organized by Singapore Management University (SMU) and Raffles Marina (RM), expect exciting races, tight competition and fun-filled post race parties on the 19th, 20th and 26th of August at one of Singapore's biggest keelboat events!
                  </p>
                  <p>
                    So mark your calendars, hoist your mainsails, and prepare for three exciting days of regatta off the coast of Raffles Marina!
                  </p>
                  <p>
                    <a href="https://www.facebook.com/SMUsailingclub/">Find out more about us! <i class="fa fa-arrow-right"></i></a>
                  </p>
                  <!-- <p>
                    Want to crew for a boat at the Western Circuit Sailing Regatta?
                    Or need more sailors onboard your boat? Simply email your name,
                    contact number, email and sailing experience
                    to <a href="sailing@sa.smu.edu.sg">sailing@sa.smu.edu.sg</a>
                    to advertise your wares on this page!
                  </p> -->
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

  		<?php include('./app/view/html-includes/footer.html'); ?>

	  </div>
	  <!-- Scripts -->
	  <script src="./assets/dist/app.js"></script>
  </body>
</html>
