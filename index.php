<?php
/* Php LATEx Cache Holder v. 1.0
* the clsipy php cacher
*
*|||||||||||||||||   TERMS of USE   |||||||||||||||||
*
*This php script is free and comes without any warrany.
*Use at your own risk.
*Copyright MIT licence Alberto [DOT] Anzellotti [AT] gmail [DOT] com - http://anze.mit-license.org/
*Citation would be appreciated! ;)
*
*
*|||||||||||||||||       HOW TO     |||||||||||||||||
*
*Set up the few script options:
*           -  $clsiserver is the LaTeX compiler server url (find the 'display' enabled source @ https://github.com/Anze-/clsipy)
*           -  $min_limit is the minimum image resolution measured in dpi allowed (and the standard when '&d=' is not set) # default 0, supposed to be changed
*           -  $max_limit is the maximum image resolution measured in dpi allowed (by default is 3000 on the server) #default 3000, if set over 3000 remember to change it also in the python clsi script!
*           -  $abs true means the link redirects to the picture using an absolute path like: 'http://yourdom.ain/script_folder/cache_folder/image_unique_id.png' #default true, for normal usage
*                   false means the script doesn't redirect to the image, but displays the relative path from the script to the picture #useful for advanced uses (eg. rescripting/script embedding)
*           -  $debug when true instead of redirecting gives some outputs at different stages of the script, to understand what's going wrong #default false
*
*To html embed the famous \LaTeX picture with 300 dpi quality (recommended) use <img src="http://yourdom.ain/scriptfolder?l=\LaTeX&d=300">
*
*/

$cachedir= "cached"."/"; //name of the subfolder you made to store the cache
$clsiserver='http://your.latex.compiler.com/'; //latex compiler server
$min_limit=0; //min quality
$max_limit=3000; //max quality
$abs= true; //absolute or relative path to picture
$debug= false; //debug mode on/off

//set the paths and _GET attributes
$path=substr($_SERVER['PHP_SELF'], 0, strrpos( $_SERVER['PHP_SELF'], '/')) . "/";

$latex = str_replace(" ", '%20', stripslashes($_GET["l"]));
$density = $_GET["d"];
if (intval($density)>intval($min_limit)){

  if (intval($density<intval($max_limit))){
  $denslimit = intval($_GET["d"]);
  } else { $denslimit = intval($max_limit);}

}
else{
$denslimit=intval($min_limit);
}

//generate unique name

$Lsha = sha1($latex);
$Dsha = sha1($density);
$unique = $Lsha . "_" . $Dsha;
if ($debug){echo $Lsha . "<br>" . $latex . "<br>" . $denslimit. "<br>" . $unique . "<br>" . $_SERVER["HTTP_HOST"] . "<br>" . substr($_SERVER['PHP_SELF'], 0, strrpos( $_SERVER['PHP_SELF'], '/')) . "<br>";}


//find if picture is already cached

$iscached=0;

foreach(glob("./".$cachedir."*.png") as $file){
if (basename($file, ".png")=="$unique"){$iscached=1;}
 if ($debug){echo $file ." - ". $iscached ."<br>";}
}

//set more variables

$relpath="/".$cachedir . $unique . ".png";
$abspath="http://" . $_SERVER["HTTP_HOST"] . $path . $cachedir . $unique . ".png";


if ($iscached==1){ //return the cached file url
if ($abs){if ($debug){echo "<img src='".$abspath."'>";} else {header('Location:'.$abspath);} } else {if ($debug){echo "<img src='".$relpath."'>";} else {echo $relpath;}} //give output when cached
} else { //cache the file and return the value

$query= $clsiserver . "display?reqid=" . $_SERVER["HTTP_HOST"] . "&latex=" . $latex . "&density=" . $density;

$ch = curl_init($query);
$fp = fopen($cachedir.$unique.".png", 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);

if ($abs){if ($debug){echo "<img src='".$abspath."'>";} else {header('Location:'.$abspath);} } else {if ($debug){echo "<img src='".$relpath."'>";} else {echo $relpath;}} //give output after caching

}


?>