<html lang="en">
  <head>
    <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>404</title>
	  <link rel="stylesheet" href="./assets/dist/app.css">
    <link rel='shortcut icon' type='image/x-icon' href="assets/img/favicon/favicon.ico">
  </head>
  <body>
	  <div class="standard-page" id="app">
  		<?php include('./app/view/html-includes/navigation.html'); ?>

        <section id="particles" class="four-oh-four-container" style="width: 100%">

            <div class="error-text">
              <div class="error-code">404 <i class="fa fa-warning"></i></div>
              <h3>Oh snap. We couldn't find the page...</h3>
              <p class="error-desc">
                  Sorry, but the page you are looking for was either not found or does not exist. <br/>
                  Try refreshing the page or click the button below to go back to the Homepage.
              </p>
              <a href="/">Go back to Homepage <i class="fa fa-arrow-right"></i></a>
            </div>


        </section>


  		<?php include('./app/view/html-includes/footer.html'); ?>

	  </div>
	  <script src="./assets/dist/app.js"></script>
  </body>
</html>
