let auth = {

  logout() {
    firebase.auth().signOut().then(function() {
      // Sign-out successful.
      window.location = '/';
    }).catch(function(error) {
      alert(error);
    });
  },

  authenticate(email, password) {
    firebase.auth().signInWithEmailAndPassword(email, password).then(function(user){

      window.location = './dashboard';

    }).catch(function(error) {
      // Handle Errors here.

      console.log(error);
      var target = $('p#login-error');
      var errorCode = error.code;
      var errorMessage = error.message;

      if (errorCode === 'auth/wrong-password') {
        target.text('Oh snap. Wrong password.');
      } else {
        console.log(errorMessage);
        target.text(errorMessage);
      }
      target.text(error);
    });
  },

  init() {

    var config = require('../../../../firebase_config.json');

    firebase.initializeApp(config);

    $('#login').on('submit', function(e) {
      e.preventDefault();
      var credentials = $('#login').serializeArray();
      var email = credentials[0]['value'];
      var password = credentials[1]['value'];

      auth.authenticate(email, password);
    });

    $('#logout').on('click', function(e) {
      e.preventDefault();
      auth.logout();
    });
  }
}

auth.init();
