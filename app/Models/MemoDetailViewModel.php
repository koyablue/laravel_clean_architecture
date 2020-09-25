<?php
namespace App\Models;

class MemoDetailViewModel
{
    public int $id;
    public string $content;
    public \DateTime $createdAt;

    public function __construct(int $id, string $content, \DateTime $createdAt)
    {
        $this->id = $id;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }
}
