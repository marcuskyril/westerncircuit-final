<?php
  // include('class.fileuploader.php');
  $currentYear = '2017';
  $documentName = '';
  $uploadType = '';

  if(isset($_POST['fileuploader-list-files'])) {
    $fileName = $_POST['fileuploader-list-files'];
    $ext = substr(pathinfo($fileName, PATHINFO_EXTENSION), 0, -2);
  }

  if(isset($_POST['documentation'])) {
    $uploadType = 'documentation';

    if(strlen($_POST['documentName']) > 0) {
      $documentName = $_POST['documentName'];
    }

    if(strlen($_POST['existingDocumentName']) > 0) {
      $documentName = $_POST['existingDocumentName'];
    }

    $docName = $documentName;
    $documentName = str_replace(" ", "_", $documentName);

    writeToJSON($uploadType, $docName, $documentName, $ext);

  } else if(isset($_POST['media'])) {
    $uploadType = 'media';

    if(strlen($_POST['mediaName']) > 0) {
      $documentName = $_POST['mediaName'];
    }

    if(strlen($_POST['existingMediaName']) > 0) {
      $documentName = $_POST['existingMediaName'];
    }

    $docName = $documentName;
    echo $docName;
    $documentName = str_replace(" ", "_", $documentName);
    echo $documentName;

    writeToJSON($uploadType, $docName, $documentName, $ext);

  } else if((isset($_POST['documentName']) && isset($_POST['class']))) {
    // for results
    $uploadType = "results";
    $className = $_POST['class'];
    $documentName = $_POST['documentName'];
    $eventName = $documentName;

    // replace all spaces with _
    $documentName = str_replace(" ", "_", $documentName);

    // write to json (for results only)
    $path = "./assets/results-config/result-list-".$currentYear.".json";
    $result_list_string = file_get_contents($path);
    $result_list_json = json_decode($result_list_string, true);
    $result_details = array(array('name' => $eventName, 'location' => './assets/results/results_'.$currentYear.'/'.$documentName.'.'.$ext));
    $toEncode = array($className => $result_details);

    if(!empty($result_list_json)) {
      // class/category does not exist in result list
      if(!isset($result_list_json[$className])) {
        $edited_json = array_merge($result_list_json, array($className => $result_details));
        file_put_contents($path, json_encode($edited_json));
      } else {
        // add entry to existing class/category
        array_push($result_list_json[$className], array('name' => $eventName, 'location' => './assets/results/results_'.$currentYear.'/'.$documentName.'.pdf'));
        file_put_contents($path, json_encode($result_list_json));
      }
    } else {
      file_put_contents($path, json_encode($toEncode));
    }
  }

  // route the file to the correct location
  $uploadDirArr = array(
                  "media" => "./assets/media/",
                  "documentation" => "./assets/documentation/",
                  "results" => "./assets/results/results_".$currentYear."/"
                );

  if(isset($uploadDirArr[$uploadType])) {
    $uploadDir = $uploadDirArr[$uploadType];
  } else {
    $uploadDir = '';
  }

	// initialize FileUploader
  $FileUploader = new FileUploader('files', array(
    'limit' => 1,
    'maxSize' => null,
    'fileMaxSize' => null,
    'extensions' => ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx'],
    'required' => false,
    'uploadDir' => $uploadDir,
    'title' => $documentName,
    'replace' => true,
    'listInput' => true,
    'files' => null
  ));

	// call to upload the files
  $data = $FileUploader->upload();
	if($data['hasWarnings']) {
    $warnings = $data['warnings'];

 		echo '<pre>';
    print_r($warnings);
		echo '</pre>';
  }

	if($data['isSuccess'] && count($data['files']) > 0) {
		$file = $data['files'][0]['file'];
		$filename = $data['files'][0]['name'];
    echo '<p class="success-message">Covfefe. '.$filename.' successfully added!</p>';
	}

  function writeToJSON($uploadType, $docName, $documentName, $ext) {
    $path = "./assets/".$uploadType."-list.json";
    $string = file_get_contents($path);
    $json = json_decode($string, true);

    $arr = array('./assets/documentation/'.$documentName.'.'.$ext);
    $document_details = array('filePaths' => $arr);
    $toEncode = array($docName => $document_details);

    if(!empty($json)) {
      // class/category does not exist in result list
      if(!isset($json[$docName])) {
        $edited_json = array_merge($json, $toEncode);
        file_put_contents($path, json_encode($edited_json));
      } else {
        // add entry to existing class/category
        array_push($json[$docName]['filePaths'], './assets/'.$uploadType.'/'.$documentName.'.'.$ext);
        file_put_contents($path, json_encode($json));
      }
    } else {
      file_put_contents($path, json_encode($toEncode));
    }
  }
