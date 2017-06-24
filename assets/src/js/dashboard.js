let dashboard = {
  init() {

    $('.doc-toggle a').click(function(e) {
      $('.doc-toggle a').removeClass('active');
      $(this).addClass('active');
      $('#doc-upload-form .nice-select-container').toggle();
      $('#doc-upload-form input[name="documentName"]').toggle();
    });

    $('.media-toggle a').click(function(e) {
      $('.media-toggle a').removeClass('active');
      $(this).addClass('active');
      $('#media-upload-form .nice-select-container').toggle();
      $('#media-upload-form input[name="mediaName"]').toggle();
    });
  }
}

dashboard.init();
