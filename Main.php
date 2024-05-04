<?php

use vBulletin\Search\RequestHandler;
use vBulletin\Search\PDOAdapter;
use vBulletin\Search\SearchService;

require_once 'request_handler.php';
require_once 'database_interface.php';
require_once 'pdo_adapter.php';
require_once 'search_service.php';

$requestHandler = new RequestHandler($_REQUEST);
$pdo = new \PDO('mysql:dbname=vbforum;host=127.0.0.1', 'forum', '123456');
$database = new PDOAdapter($pdo);
$searchService = new SearchService($requestHandler, $database);

$searchService->executeSearch();
