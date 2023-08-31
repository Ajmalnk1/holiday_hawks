<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$connection = mysql_connect('localhost', 'spajunct_spa1', 'spa2015');
//$connection = mysql_connect('localhost', 'root', '');


if (!$connection){



    die("Database Connection Failed" . mysql_error());



}



$select_db = mysql_select_db('spajunct_spa1');
//$select_db = mysql_select_db('spafeb14');


if (!$select_db){



    die("Database Selection Failed" . mysql_error());



}





?>