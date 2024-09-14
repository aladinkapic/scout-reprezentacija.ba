/*
 *  Import base libraries
 *
 *      1. Bootstrap
 *      2. jQuery
 *      3. jQuery-UI
 */

require('../bootstrap');
window.$ = window.jQuery = require('jquery'); // Include jQuery
require('../layout/snippets/jquery-ui');

window.validator = require('../layout/snippets/validation');
window.notify = require('../layout/snippets/notify');

// Select 2

require('../layout/snippets/jquery-ui');
require('../layout/snippets/select-2');
require('./snippets/classes');
require('../layout/snippets/classes');

require('../layout/image-cropper');

// Homepage

require('./snippets/partners');

// JS Form submit

require('../layout/snippets/submit');

require('../app/users');

require('./homepage/slider');
/*
 *  Players data
 */
require('./players/preview');
require('./players/search');
require('./players/post-like');
require('./players/player-rating');

require('./core/cookie');
require('./pages/contact-us');
