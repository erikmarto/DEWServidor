<?php



//start session
session_start();

//set transient SID argument separator to "&amp;" for XML 
ini_set("arg_separator.output","&amp;");

//ensure validity of hidden input insertion
//this doesn't work on PHP < 4.3.4 and prevents hidden SID input from being written at all
//ini_set("url_rewriter.tags","a=href,area=href,frame=src,fieldset=");





//get task
$task = '';
if(isset($_POST['task']))
{
	$task = $_POST['task'];
}
elseif(isset($_GET['task']))
{
	$task = $_GET['task'];
}


?>