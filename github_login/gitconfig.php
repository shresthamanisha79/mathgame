<?php
// Start session
if(!session_id()){
    session_start();
}

// Include Github client library  
require_once 'git_oauth_client.php';
use League\OAuth2\Client\Provider\Github;


/*
 * Configuration and setup GitHub API
 */
$clientID         = "9cb81539b58c905d2ad4";
$clientSecret     = "7d83ee55786432a910fd6407d0856af6fa9e987c";
$redirectURL     = "http://127.0.0.1:81/github-login/test/";

$gitClient = new Github_OAuth_Client(array(
    'client_id' => $clientID,
    'client_secret' => $clientSecret,
    'redirect_uri' => $redirectURL,
));


// Try to get the access token
if(isset($_SESSION['access_token'])){
    $accessToken = $_SESSION['access_token'];
}