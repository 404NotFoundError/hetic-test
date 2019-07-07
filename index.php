<?php 

require_once './vendor/autoload.php';

echo "<pre>";

$app = \Singleton\Singleton::getInstance();

$app->name = 'first instance';

$app2 = $app;
// $app3 = clone $app;

print_r($app);
print_r($app2);
// print_r($app3);

$app2->name = 'second instance';
// $app3->name = 'Trid instance';

print_r($app);
print_r($app2);
// print_r($app3);