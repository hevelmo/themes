<br />
<b>Fatal error</b>: Uncaught TwitterPhp\RestApiException: Error while getting access token in /var/www/html/themes/html/canvas/include/rs-plugin/php/twitter/connection/Application.php:75
Stack trace:
#0 /var/www/html/themes/html/canvas/include/rs-plugin/php/twitter/connection/Application.php(42): TwitterPhp\Connection\Application-&gt;_getBearerToken()
#1 /var/www/html/themes/html/canvas/include/rs-plugin/php/twitter/connection/ConnectionAbstract.php(62): TwitterPhp\Connection\Application-&gt;_buildHeaders('https://api.twi...', Array, 'GET')
#2 /var/www/html/themes/html/canvas/include/rs-plugin/php/twitter/class-twitter.php(82): TwitterPhp\Connection\Base-&gt;get('/statuses/user_...', Array)
#3 /var/www/html/themes/html/canvas/rs-demo-streams-twitter.php(17): TP_twitter-&gt;get_public_photos('verycoolplaces')
#4 {main}
thrown in <b>/var/www/html/themes/html/canvas/include/rs-plugin/php/twitter/connection/Application.php</b> on line <b>75</b><br />
