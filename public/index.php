<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;


//loads all dependencies we need from vendors
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/db.php';


//create an app
$app = AppFactory::create();

$app->setBasePath('/code/sample-project2');

$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
$app->addErrorMiddleware(true, true, true);

//define app roots
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello");
    return $response;
});
require __DIR__ . '/../routes/friends.php';

$app->run();