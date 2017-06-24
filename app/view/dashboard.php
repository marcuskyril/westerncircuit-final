<html lang="en">
  <head>
    <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Dashboard</title>
	  <link rel="stylesheet" href="./assets/dist/app.css">
    <link rel='shortcut icon' type='image/x-icon' href="assets/img/favicon/favicon.ico">
  </head>
  <body>
    <?php
      // read json files
      include('../app/view/upload_config/class.fileuploader.php');
      $class_list_string = file_get_contents("./assets/class-list.json");
      $entry_list_string = file_get_contents("./assets/entry-list-config/entry-list-2017.json");
    ?>

	  <div class="standard-page" id="app">
  		<?php include('./app/view/html-includes/navigation.html'); ?>
      <section class="landing__banner-bar">
        <div class="container">
          <h1>Dashboard</h1>
          <ol class="breadcrumb">
            <li>
              <a href="/">Home</a>
            </li>
            <li>
              <a href="#">Dashboard</a>
            </li>
          </ol>
        </div>
      </section>

      <main>
        <div class="standard-content">

          <?php include('../app/view/upload_config/upload.php'); ?>

          <section>
            <h2>Create Category</h2>
    				<form id="classForm" action="#" method="get" >
              <div class="input-group">
                <input type="text" placeholder="Class" name="class" />
                <button class="btn" type="submit">Submit</button>
              </div>
              <div id="createClassResult"></div>
            </form>
          </section>

          <?php
            $json = json_decode($class_list_string, true);
            if(isset($_GET['class'])) {
              $className = $_GET['class'];
              $obj = array('name' => $className);

              if(!empty($json)) {
                array_push($json, $obj);
                $edited_json = json_encode($json);
              } else {
                $edited_json = json_encode(array($obj));
              }

              file_put_contents('./assets/class-list.json', $edited_json);
              echo '<p class="success-message">Covfefe. '.$className.' successfully added!</p>';
            }
          ?>

          <hr />
          <section>
            <h2>Create Entry</h2>

    				<form id="entryForm" action="#" method="post">
              <div class="input-group">

                <?php
                  renderClassList();
                ?>

                <input type="text" placeholder="Sail ID" name="sailID" required />
                <input type="text" placeholder="Yacht Name" name="yachtName" required />
                <input type="text" placeholder="Skipper Name" name="skipperName" required />
                <button class="btn" type="submit">Submit</button>
              </div>
              <div id="createEntryResult"></div>
            </form>
          </section>

          <?php
            $entry_list_json = json_decode($entry_list_string, true);
            $path = './assets/entry-list-config/entry-list-2017.json';

            if(isset($_POST['sailID']) && isset($_POST['yachtName']) && isset($_POST['skipperName'])) {
              $className = $_POST['class'];
              $sailID = $_POST['sailID'];
              $yachtName = $_POST['yachtName'];
              $skipperName = $_POST['skipperName'];

              $entry_details = array(array('sailID' => $sailID, 'yachtName' => $yachtName, 'skipperName' => $skipperName));
              $toEncode = array($className => $entry_details);
              //
              if(!empty($entry_list_json)) {
                // class/category does not exist in entry list
                if(!isset($entry_list_json[$className])) {
                  $edited_json = array_merge($entry_list_json, array($className => $entry_details));
                  file_put_contents($path, json_encode($edited_json));
                } else {
                  // add entry to existing class/category
                  array_push($entry_list_json[$className], array('sailID' => $sailID, 'yachtName' => $yachtName, 'skipperName' => $skipperName));
                  file_put_contents($path, json_encode($entry_list_json));
                }
              } else {
                echo "empty";
                file_put_contents($path, json_encode($toEncode));
              }

              echo '<p class="success-message">Covfefe. Entry successfully added!</p>';
            }
          ?>

          <hr />
          <section>
            <h2>Upload Documentation</h2>

            <form id="doc-upload-form" action="#" method="post" enctype="multipart/form-data">
              <div class="input-group">
                <input type="hidden" name="documentation" value="documentation"/>
                <div class="doc-toggle">
                  <a class="active" id="new-doc" href="javascript:void(0)">Add to new folder</a> | <a id="existing-doc" href="javascript:void(0)">Add to existing folder</a>
                </div>
                <input type="text" class="active" name="documentName" placeholder="Document name" />
                <?php
                  renderDocumentationList();
                ?>
                <input type="file" name="files[]" required>
                <button class="btn" type="submit">Submit</button>
              </div>
        		</form>
          </section>

          <hr />

          <section>
            <h2>Upload Media</h2>

            <form id="media-upload-form" action="#" method="post" enctype="multipart/form-data">
              <div class="input-group">
                <input type="hidden" name="media" value="media"/>
                <div class="media-toggle">
                  <a class="active" id="new-media" href="javascript:void(0)">Add to new folder</a> | <a id="existing-media" href="javascript:void(0)">Add to existing folder</a>
                </div>
                <input type="text" class="active" name="mediaName" placeholder="Media name" />
                <?php
                  renderMediaList();
                ?>
                <input type="file" name="files[]" required>
                <button class="btn" type="submit">Submit</button>
              </div>
        		</form>
          </section>

          <hr />

          <section>
            <h2>Upload Results</h2>

            <form action="#" method="post" enctype="multipart/form-data">
              <div class="input-group">
                <input type="text" name="documentName" placeholder="Document name" required />
                <?php
                  renderClassList();
                ?>
          			<input type="file" name="files[]" required>
                <button class="btn" type="submit">Submit</button>
              </div>
        		</form>

          </section>

          <hr />

          <section>
            <div class="input-group">
              <button id="logout" class="btn">Logout</button>
            </div>
          </section

        </div>
      </main>

		  <?php include('./app/view/html-includes/footer.html'); ?>
	  </div>
	  <script src="./assets/dist/app.js"></script>
    <?php include('../app/view/html-includes/auth.html'); ?>

  </body>
</html>

<?php

  function renderDocumentationList() {
    $documentation_list_string = file_get_contents("./assets/documentation-list.json");
    $documentation_list_json = json_decode($documentation_list_string, true);

    echo '<div class="nice-select-container"><select id="documentation-list" name="existingDocumentName"><option name="default" value="">Select document</option>';

    foreach ($documentation_list_json as $key => $value) {
      echo '<option value="'.$key.'">'.$key.'</option>';
    }
    echo '</select></div>';
  }

  function renderMediaList() {
    $media_list_string = file_get_contents("./assets/media-list.json");
    $media_list_json = json_decode($media_list_string, true);

    echo '<div class="nice-select-container"><select id="media-list" name="existingMediaName"><option name="default" value="">Select media</option>';

    foreach ($media_list_json as $key => $value) {
      echo '<option value="'.$key.'">'.$key.'</option>';
    }
    echo '</select></div>';
  }

  function renderClassList() {
    $class_list_string = file_get_contents("./assets/class-list.json");
    $json = json_decode($class_list_string, true);

    echo '<select name="class"><option name="default" value="">Select class</option>';

    foreach($json as $key => $value) {
      echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
    }

    echo '</select>';
  }

?>
