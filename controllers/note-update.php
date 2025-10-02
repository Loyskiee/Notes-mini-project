<?
require ("../Database.php");
require ("../functions.php");
require ("../Validator.php");

$config = require("../config.php");
$db = new Database($config['database']);


$heading = "Update";    

require ("../views/update.php");