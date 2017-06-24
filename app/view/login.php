<html lang="en">
  <head>
    <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Documentation</title>
	  <link rel="stylesheet" href="./assets/dist/app.css">
    <link rel='shortcut icon' type='image/x-icon' href="assets/img/favicon/favicon.ico">
  </head>
  <body>
	  <div class="standard-page" id="app">
  		<?php include('./app/view/html-includes/navigation.html'); ?>
      <section class="landing__banner-bar">
        <div class="container">
          <h1>Login</h1>
          <ol class="breadcrumb">
            <li>
              <a href="/">Home</a>
            </li>
            <li>
              <a href="#">Login</a>
            </li>
          </ol>
        </div>
      </section>

      <main>
        <div class="standard-content">
          <form id="login" method="POST">
            <div class="input-group">
              <input type="email" name="email" placeholder="test@something.com" />
              <input type="password" name="password" placeholder="*******" />
              <button class="btn">Submit</button>
            </div>
          </form>

          <p id="login-error" class="error-message"></p>
        </div>
      </main>

  		<?php include('./app/view/html-includes/footer.html'); ?>
	  </div>
	  <!-- Scripts -->
	  <script src="./assets/dist/app.js"></script>
  </body>
</html>
