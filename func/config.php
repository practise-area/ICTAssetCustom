<?php
ob_start();
session_start();

// //database credentials
// define('DBHOST','localhost');
// define('DBUSER','id739294_skyridertk1');
// define('DBPASS','W1W^([${X93TfaW>');
// define('DBNAME','id739294_skyridertk_12');

// console.log("test");
// $db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// console.log("test3");
// <?php
$host = "localhost";
$db_name = "id739294_news";
$username = "id739294_skyridertk";
$password = "Tanaka@20000";
 
$db = "";
try {
    $db = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $exception){ //to handle connection error
    echo "Connection error: " . $exception->getMessage();
}

//set timezone
date_default_timezone_set('Africa/Harare');

//load classes as needed
function __autoload($class) {

   $class = strtolower($class);

	//if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}

	//if call from within admin adjust the path
   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}

	//if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}

}

$user = new User($db);

$asset = new Assets($db);
?>
