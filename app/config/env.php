<?php

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

define('URL', $_ENV['URL']);
define("USER", $_ENV["DB_USER"]); 
define("PASS", $_ENV["DB_PASS"]);
define("DSN", $_ENV["DSN"]);

define("CLOUD_NAME", $_ENV["CLOUD_NAME"]);
define("API_KEY", $_ENV["API_KEY"]);
define("API_SECRET", $_ENV["API_SECRET"]);