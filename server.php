<?php
session_start();

/** initializing variables*/ 
$username = "";
$email    = "";
$errors = array(); 

/** connect to the database*/ 
$db = mysqli_connect('localhost', 'root', '', 'registeruser');

/** REGISTER USER*/ 
if (isset($_POST['reg_user'])) {
  /** receive all input values from the form*/ 
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $github = mysqli_real_escape_string($db, $_POST['github']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
 
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  /** first check the database to make sure a user does not already exist with the same username and/or email*/ 
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { /** if user exists*/ 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  /** Finally, register user if there are no errors in the form*/ 
  if (count($errors) == 0) {
  	$password = md5($password_1);/**encrypt the password before saving in the database*/

  	$query = "INSERT INTO users (username,github, email, password) 
  			  VALUES('$username', '$github', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

/** LOGIN USER*/ 
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
/**Github login */
// class User {
//   private $dbHost     = "localhost";
//   private $dbName     = "registeruser";
//   private $userTbl    = 'gitusers';
  
//   function __construct(){
//       if(!isset($this->db)){
//           // Connect to the database
//           $conn = new mysqli($this->dbHost, $this->dbName);
//           if($conn->connect_error){
//               die("Failed to connect with MySQL: " . $conn->connect_error);
//           }else{
//               $this->db = $conn;
//           }
//       }
//   }
  
//   function checkUser($userData = array()){
//       if(!empty($userData)){
//           // Check whether user data already exists in database
//           $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
//           $prevResult = $this->db->query($prevQuery);
//           if($prevResult->num_rows > 0){
//               // Update user data if already exists
//               $query = "UPDATE ".$this->userTbl." SET name = '".$userData['name']."', username = '".$userData['username']."', email = '".$userData['email']."', location = '".$userData['location']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = NOW() WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
//               $update = $this->db->query($query);
//           }else{
//               // Insert user data
//               $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', name = '".$userData['name']."', username = '".$userData['username']."', email = '".$userData['email']."', location = '".$userData['location']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = NOW(), modified = NOW()";
//               $insert = $this->db->query($query);
//           }
          
//           // Get the user data from the database
//           $result = $this->db->query($prevQuery);
//           $userData = $result->fetch_assoc();
//       }
      
//       // Return the user data
//       return $userData;
//   }
// }

  
  ?>