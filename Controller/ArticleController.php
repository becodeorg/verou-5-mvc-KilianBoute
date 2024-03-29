<?php

declare(strict_types=1);


class ArticleController
{
    private $databaseManager;
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }
    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();
        // Load the view
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles(): array
    {
        // TODO: prepare the database connection
        // Note: you might want to use a re-usable databaseManager class - the choice is yours
        // TODO: fetch all articles as $rawArticles (as a simple array)

        try {
            $authors = $this->getAuthors();
            $articles = [];
            $query = "SELECT * FROM articles";
            $statement = $this->databaseManager->connection->query($query);
            $rawData = $statement->fetchAll(); // Fetches as array
            foreach ($rawData as $rawArticle) {
                $author = $authors[$rawArticle['author_id'] - 1];
                $articles[] = new Article($rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date'], $rawArticle['image'], $author);
            }

            return $articles;
        } catch (PDOException $err) {
            throw new RuntimeException($err->getMessage());
        }
    }

    public function show($id)
    {
        // TODO: this can be used for a detail page
        $articles = $this->getArticles();
        $article = $articles[$id - 1];

        require 'View/articles/show.php';
    }

    public function getAuthors()
    {
        try {
            $authors = [];
            $query = "SELECT * FROM authors";
            $statement = $this->databaseManager->connection->query($query);
            $rawData = $statement->fetchAll(); // Fetches as array
            foreach ($rawData as $rawAuthor) {
                $authors[] = new Author($rawAuthor['id'], $rawAuthor['name']);
            }
            return $authors;
        } catch (PDOException $err) {
            throw new RuntimeException($err->getMessage());
        }
    }
}
