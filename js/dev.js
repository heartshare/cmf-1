/**
 * Created with JetBrains PhpStorm.
 * User: krok
 * Date: 21.04.14
 * Time: 15:43
 */
$(window).error(function (msg, url, line) {
    jQuery.post('/site/error.html', { msg: msg, url: url, line: line });
});