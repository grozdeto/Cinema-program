<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
/*define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'testuser');
define('DB_PASSWORD', 'password');

 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

echo 'Administrate data base <br/>';
      // Create database
      	$query = "create database if not exists registration_db;";
	if(mysqli_query($link, $query))  
	{  
	  echo "<br/> Database created successfully <br/>";
	} else {
	  echo "<br/> Error creating database: " . $link->error;
	}
	//set schema usages
      	$query = "use registration_db;";
	if(mysqli_query($link, $query))  
	{  
	  echo "<br/> registration_db is in use <br/>";
	} else {
	  echo "<br/> Error registration_db can not be used: " . $link->error;
	}

	//create users table
	$query ="CREATE TABLE users (
	    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	    username VARCHAR(50) NOT NULL UNIQUE,
	    password VARCHAR(255) NOT NULL,
	    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
	);";

	if(mysqli_query($link, $query))  
	{  
	  echo "<br/> TABLE users is created <br/>";
	} else {
	  echo "<br/> Error TABLE users can not be create: " . $link->error;
	}

/* //set schema usages
      	$query = "use registration_db;";
	if(mysqli_query($link, $query))  
	{  
	  echo "<br/>registration_db is in use <br/>";
	} else {
	  echo "<br/>Error registration_db can not be used: " . $link->error;
	}*/

	//create images table
	$query ="CREATE TABLE images(
	    image_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	    user_id INT,
	    image_description VARCHAR(150),
	    image LONGBLOB NOT NULL,
	    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
	    FOREIGN KEY (user_id) REFERENCES users(id)

	);";

	if(mysqli_query($link, $query))  
	{  
	  echo "<br/>TABLE images is created <br/>";
	} else {
	  echo "<br/>Error TABLE images can not be create: " . $link->error;
	}

	//create likes table
	$query ="CREATE TABLE likes(
	    image_id INT NOT NULL,
	    user_id INT NOT NULL,
	    FOREIGN KEY (image_id) REFERENCES images(image_id),
	    FOREIGN KEY (user_id) REFERENCES users(id)
	);";

	if(mysqli_query($link, $query))  
	{  
	  echo "<br/>TABLE likes is created <br/>";
	} else {
	  echo "<br/>Error TABLE likes can not be create: " . $link->error;
	}

$link->close();
?>
