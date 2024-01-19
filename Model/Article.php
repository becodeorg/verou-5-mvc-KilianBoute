<?php

declare(strict_types=1);

class Article
{
    private int $id;
    public string $title;
    public ?string $description;
    public ?string $publishDate;

    public ?string $image;

    public function __construct(int $id, string $title, ?string $description, ?string $publishDate, ?string $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
        $this->image = $image;
    }

    public function formatPublishDate($format = "d-m-Y")
    {
        return date($format, strtotime($this->publishDate));
    }

    public function getId(): int
    {
        return $this->id;
    }
}
