<?php

namespace App\Models;

class MemoViewModel
{
    public int $id;
    public string $content;
    public $createdAt;

    /**
     * MemoViewModel constructor.
     * @param int $id
     * @param string $content
     * @param \DateTime|null $createdAt
     */
    public function __construct(int $id, string $content, \DateTime $createdAt = null)
    {
        $this->id = $id;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }
}
