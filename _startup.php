<!--
<VirtualHost 127.0.0.3:80>
        ServerAdmin mason.mk@outlook.com
        DocumentRoot "Z:\\School Subjects\\Computing\\S6\\PHPTask"
#       <Location /*>
#               Require all granted
#       </Location>
        AliasMatch ^/((H|h)(O|o)(M|m)(E|e))|((E|e)(R|r)(R|r)(O|o)(R|r))/* "Z:/School Subjects/Computing/S6/PHPTask/_startup.php"
        <Directory "Z:\\School Subjects\\Computing\\S6\\PHPTask">
                Options Indexes FollowSymLinks Includes ExecCGI
                AllowOverride All
                Require all granted
        </Directory>
        ServerName 127.0.0.3
        ErrorLog "logs/PHPTask-error.log"
        CustomLog "logs/PHPTask-access.log" common
</VirtualHost>
-->

<?php
$crumb = explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]);
include_once('WebApp.php');
$webApp = new WebApp();
include('Views/Layout/_layout.php');
?>