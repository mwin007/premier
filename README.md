# premier
<h2>PHP/MySQL Task</h2>

Author: <a href="http://agran.info">Alexander Agranov</a></br>
Email: agranov.paka@gmail.com</br>

<p>The task is based on PHP Codeigniter framework, with the assistance of Smarty Templating Engine,
it's available on  http://premier.agran.info</p>

<h3>Login information:</h3>
<b>username:</b> admin</br>
<b>password:</b> admin12345</br>

<p>All needed php files in application/controllers, models and views.</br>
JS and CSS in public/css and js.</p>
SQL files in 'db' directory (premier.sql or premier_new.sql).

**If you need install the project on localhost:**
+ rename directory of the project to 'premier'
+ in .htaccess change RewriteBase // to RewriteBase /premier/
+ in applications/config/development/config.php change $config['base_url'] = 'http://localhost/premier/' to different URL if it is necessary (for example http://localhost:81/premier/)
+ install new database with the name 'premier' and import one of sql files in 'db' directory
  - if need, change connection settings in applications/config/development/database.php

Thank you for reading



