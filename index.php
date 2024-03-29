<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//include all your model files here
require_once 'Model/Article.php';
require_once 'Model/Author.php';
require_once 'core/config.php';
//include all your controllers here
require_once 'Core/DatabaseManager.php';
require_once 'Controller/HomepageController.php';
require_once 'Controller/ArticleController.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

// Get the current page to load
// If nothing is specified, it will remain empty (home should be loaded)
$page = $_GET['page'] ?? null;
$id = $_GET['id'] ?? null;

// Load the controller
// It will *control* the rest of the work to load the page
switch ($page) {
    case 'articles':
        // This is shorthand for:
        // $articleController = new ArticleController;
        // $articleController->index();
        (new ArticleController($databaseManager))->index();
        break;
    case 'show-article':
        // TODO: detail page
        (new ArticleController($databaseManager))->show($id);
        break;
    default:
        (new HomepageController())->index();
        break;
}
