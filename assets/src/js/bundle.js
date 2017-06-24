window.$ = require('jquery');
window.jQuery = window.$;
window.debounce = require('debounce');
window.firebase = require('firebase');
window.throttle = require('./libraries/throttle');
window.niceSelect = require('./libraries/jquery-nice-select/jquery.nice-select');
require('./libraries/jquery.countdown.js');
require('./libraries/jquery.fileuploader.js');
require('./libraries/particles.js');

// Require our js files.
require('./auth.js');
require('./fileUploader');
require('./dashboard');
require('./offcanvas');
require('./accordion');
require('./countdown');
require('./stickyMenu');
require('./menuControl');
require('./callout');
require('./carousel');
require('./table-content-tab');
require('./tabs');

$('select').niceSelect();
