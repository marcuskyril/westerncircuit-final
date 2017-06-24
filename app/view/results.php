<html lang="en">
  <head>
    <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Results</title>
	  <link rel="stylesheet" href="./assets/dist/app.css">
    <link rel='shortcut icon' type='image/x-icon' href="assets/img/favicon/favicon.ico">
  </head>
  <body>
	  <div class="standard-page" id="app">
  		<?php include('./app/view/html-includes/navigation.html'); ?>
      <section class="landing__banner-bar">
        <div class="container">
          <h1>Results</h1>
          <ol class="breadcrumb">
            <li>
              <a href="/">Home</a>
            </li>
            <li>
              <a href="#">Results</a>
            </li>
          </ol>
        </div>
      </section>

      <main>
        <div class="standard-content">
          <ul class="tabs">
            <li><a href="#2017">2017</a></li>
            <li class="active"><a href="#2016">2016</a></li>
            <li><a href="#2015">2015</a></li>
          </ul>

          <?php

            render_table("2017");
            render_table("2016");
            render_table("2015");

          ?>
        </div>
      </main>

  		<?php include('./app/view/html-includes/footer.html'); ?>
	  </div>
	  <!-- Scripts -->
	  <script src="./assets/dist/app.js"></script>
  </body>
</html>

<?php
  function render_table($year) {
    $json_string = file_get_contents("./assets/results-config/result-list-".$year.".json");
    $json = json_decode($json_string, true);

    if($year === "2016") {
      echo '<div id="'.$year.'" class="tabs-content result-list active">';
    }  else {
      echo '<div id="'.$year.'" class="tabs-content result-list">';
    }

    foreach ($json as $eventName => $resultList) {
      echo '<table width="100%"><tbody>';
      echo '<tr><th colspan="2">'.$eventName.'</th></tr>';
      echo '<tr><th>Result</th><th>Download</th></tr>';

      foreach($resultList as $result) {

        $name =  $result['name'];
        $location = $result['location'];
        $fileType = substr(strrchr($location,'.'),1);

        $iconArr = array(
                        "pdf" => "fa fa-file-pdf-o",
                        "doc" => "fa fa-file-word-o",
                        "docx" => "fa fa-file-word-o"
                      );

        echo '<tr><td>'.$name.'</td><td><a href="'.$location.'"><i class="'.$iconArr[$fileType].'"></i></a></td></tr>';

      }

      echo '</tbody></table>';
    }

    echo '</div>';

  }
?>
