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
echo '<hr> <br>';

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
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  echo "You have selected a file to upload <br>";
  echo 'file name:', $_FILES["file"]["name"],'<br>';
  echo 'tmp name:', $_FILES["file"]["tmp_name"],'<br>';
  echo 'file size:', $_FILES["file"]["size"],'<br>'; 
  echo 'file extension: ', strtolower(pathinfo($target_file,PATHINFO_EXTENSION)),'<br>';
  }
}
######################################################################endregion
echo '<hr> <br>';
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
    echo 'you are in the right bath <hr> ';
}
//each one then do what is propose for
######################################################################
//$_REQUEST it used for collecting data after submitting and it contains the data of $_post ,$_get and $_COOKIE
//see the example below
echo '<br>';
echo '$_REQUEST';
echo '<br>';
echo '
<form name="contact" method="post" action="index.php">
<input size=25 name="name">
</form>';
if(isset($_REQUEST['name'])){
$name=$_REQUEST['name'];
echo 'REQUEST value is :', $name;
}
######################################################
//post gets the data after submitting it through a form and used to pass vars
echo '<hr> <br>';
echo '$_POST';
echo '<br>';
if(isset($_POST['name'])){
    $name=$_POST['name'];
echo '<br>';
echo 'POST value is :', $name;

}
echo '<hr> <br>';

###############################################################
// used to get data from the link 
echo '$GET';
echo '<br>';
echo '
</html><a href="index.php?data=this-is-the-data-from-get">This is to send data</a>';
echo '<br>';
if(isset($_GET['data'])){
echo 'GET value is :',$_GET['data'];
}
echo '<hr> <br>';

##########################################################################
//session is used to pass varaible and the best thing about session is that when u set a session var you can access it from anywhere in the project 
echo '$_SESSION';
echo '<br>';
session_start();
$_SESSION['newsession']='this isa new session';
echo $_SESSION['newsession'];
##########################################################
echo '<hr> <br>';

echo '$_COOKIE';
echo '<br>';
echo '<br>';
setcookie('cookie_name', 'cookie_value',  time()+ 60, '/', $_SERVER['SERVER_NAME'], false, false);
setcookie('cookie_name2', 'cookie_value2',  time()+ 60, '/', $_SERVER['SERVER_NAME'], false, false);
echo '<br>';
print_r($_COOKIE);
#################################################################################
echo '<hr> <br>';
echo '$_ENV';
echo '<br>';
var_dump(getenv('os'));
$_ENV['NEWENV'] = 'HI';
echo $_ENV['NEWENV']
##############################################################################

?>