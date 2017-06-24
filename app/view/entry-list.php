<html lang="en">
  <head>
    <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Entry List</title>
	  <link rel="stylesheet" href="./assets/dist/app.css">
    <link rel='shortcut icon' type='image/x-icon' href="assets/img/favicon/favicon.ico">
  </head>
  <body>
	  <div class="standard-page" id="app">
  		<?php include('./app/view/html-includes/navigation.html'); ?>
      <section class="landing__banner-bar">
        <div class="container">
          <h1>Entry List</h1>
          <ol class="breadcrumb">
            <li>
              <a href="/">Home</a>
            </li>
            <li>
              <a href="#">Entry List</a>
            </li>
          </ol>
        </div>
      </section>

      <section>
        <div class="standard-content">

          <ul class="tabs">
            <li class="active"><a href="#2017">2017</a></li>
            <li><a href="#2016">2016</a></li>
            <li><a href="#2016">2015</a></li>
          </ul>

          <?php
            render_table("2017");
            render_table("2016");
          ?>
        </div>
      </section>

  		<?php include('./app/view/html-includes/footer.html'); ?>
	  </div>
	  <!-- Scripts -->
	  <script src="./assets/dist/app.js"></script>
  </body>
</html>

<?php
  function render_table($year) {
    $json_string = file_get_contents("./assets/entry-list-config/entry-list-".$year.".json");
    $json = json_decode($json_string, true);

    if($year === "2017") {
      echo '<div id="'.$year.'" class="tabs-content entry-list active">';
    }  else {
      echo '<div id="'.$year.'" class="tabs-content entry-list">';
    }

    foreach ($json as $class => $entries) {
      echo '<div class="entry">';
      echo '<h2>'.$class.'</h2>';
      echo '<table width="100%"><tbody>';
      echo '<tr><th>Sail ID</th><th>Yacht Name</th><th>Skipper Name</th></tr>';
      foreach ($entries as $entry) {
        echo '<tr><td>'.$entry['sailID'].'</td><td>'.$entry['yachtName'].'</td><td>'.$entry['skipperName'].'</td></tr>';
      }
      echo '</tbody></table>';
      echo '</div>';
    }

    echo '</div>';

  }
?>
