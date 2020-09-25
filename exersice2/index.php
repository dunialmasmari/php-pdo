<?php

###########################################################################
//the global var is all the variables available in the global scoop not in the 
//in the test $foo is  in the globle scoop so it will be known
//but the other is not so it wornt be cuz its inside a function 
//$GLOBALS
echo '$GLOBALS';
echo '<br>';
$foo= "ok";

if (isset($GLOBALS["foo"])) {
    echo "Foo is in global scope.\n";
} else {
    echo "Foo is NOT in global scope.\n";
}
unset($foo);


function test() {
    $foo = "ok";
}
test();

if (isset($GLOBALS["foo"])) {
    echo "Foo is in global scope.\n";
} else {
    echo "Foo is NOT in global scope.\n";
}
echo '<br>';

###########################################################
echo '$_FILES';
echo '<br>';
echo '<html>
<body>
<form action="index.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>';
if(isset($_FILES["file"])){
if ($_FILES["file"] > 0)
  {
  echo "You have selected a file to upload ";
  }
}
######################################################################endregion
echo '<br>';
echo '$_SERVER';
echo '<br>';
//server array is holds  info of the server ,here you are some examples

echo $_SERVER['PHP_SELF'];//will print us the current url
echo '<br>';
echo $_SERVER['SERVER_NAME'];//server name which is loclhost
echo '<br>';
echo $_SERVER['SERVER_PROTOCOL'];//the protocol http or https
echo '<br>';
echo $_SERVER['REQUEST_METHOD'];// get ,post,put/delete
echo '<br>';
echo $_SERVER['HTTP_HOST'];//the host
echo '<br>';
//and other things  for example if we want to check if we are in the right path 
if($_SERVER['PHP_SELF']==='/php-pdo/exersice2/index.php'){
    echo 'you are in the right bath';
}
//each one then do what is propose for
######################################################################
//$_REQUEST it used for collecting data after submitting and it contains the data of $_post ,$_get and $_COOKIE
//see the example below
echo '$_REQUEST';
echo '<br>';
echo '
<form name="contact" method="post" action="index.php">
<input size=25 name="name">
</form>';
if(isset($_REQUEST['name'])){
$name=$_REQUEST['name'];
echo $name;
}
######################################################
//post gets the data after submitting it through a form and used to pass vars
echo '$_POST';
echo '<br>';
if(isset($_POST['name'])){
    $name=$_POST['name'];
echo '<br>';
echo $name;
}
###############################################################
// used to get data from the link 
echo '$GET';
echo '<br>';
echo '
</html><a href="index.php?data=this-is-the-data-from-get">This is to send data</a>';
echo '<br>';
if(isset($_GET['data'])){
echo $_GET['data'];
echo '<br>';
}
##########################################################################
//session is used to pass varaible and the best thing about session is that when u set a session var you can access it from anywhere in the project 
echo '$_SESSION';
echo '<br>';
session_start();
$_SESSION['newsession']='this isa new session';
echo $_SESSION['newsession'];
##########################################################
echo '$_COOKIE';
echo '<br>';
echo '<br>';
setrawcookie($_SERVER['PHP_SELF']);
echo '<br>';
print_r($_COOKIE);
echo '$_ENV';
echo '<br>';
// (new Dotenv())->load(__DIR__.'/.env');
//  echo getenv('USER');

//  echo 'My username is ' .$_ENV["USER"] . '!';

#################################################################################

// THE SESSION_ID is used to set the session id for the current session and it can be used by writting the 
// session_id('string id')<< passing a string id to the function and then starting the session or dioing what ever witht he param
$sid =1;
session_abort();
session_id($sid);
session_start();

$test = 'Here';
session_register('test');
echo session_register('test');
function session_is_registered($test)
{
    if (isset($_SESSION[$test]))
    return true;
    else
    return false;
}
?>