<?php

error_reporting(E_ALL); 
ini_set("display_errors", 1); 

$libDir = __DIR__ . '/lib';
$modelDir = __DIR__;
//require $libDir . '/MongoRecord/BaseMongoRecord.php';

require $libDir . '/SplClassLoader.php';

use MongoRecord\BaseMongoRecord,
    Models;

$classLoader = new SplClassLoader('MongoRecord', $libDir);
$classLoader->register();

$classLoader = new SplClassLoader('Models', $modelDir);
$classLoader->register();


BaseMongoRecord::$connection = new Mongo();
BaseMongoRecord::$database = 'mongorecord';


$person = new Models\Person();
$people = $person->find();

echo "<pre>\n";
foreach ($people as $k => $person) {
  print $person->getName() . "\n";
}
echo "</pre>\n";

?>
