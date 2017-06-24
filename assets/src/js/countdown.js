var countdown = {
  init() {
    $("#countdownTimer")
    .countdown("2017/08/19", function(event) {
      $(this).text(
        event.strftime('%D DAYS %H HRS %M MINS %S SECS')
      );
    });

  }
}

countdown.init();
