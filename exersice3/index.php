<?php
// THE SESSION_ID is used to set the session id for the current session and it can be used by writting the 
// session_id('string id')<< passing a string id to the function and then starting the session or dioing what ever witht he param
$sid =1;
session_start();
session_abort();
session_id($sid);
session_start();

if(session_is_registered($sid)){
    echo 'true';
}
else{
    echo 'false';
}
$test = 'Here';
session_register('test');
echo $_SESSION[$sid];
// function session_is_registered($test)
// {
//     if (isset($_SESSION[$test]))
//     return true;
//     else
//     return false;
// }
?>s