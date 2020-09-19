<?php
namespace packages\Domain\Domain\Memo;

class Memo{
    private int $id;
    private int $userId;
    private string $content;
    private string $createdAt;

    public function __construct(int $id, int $userId, string $content, string $createdAt)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function getContent(){
        return $this->content;
    }
}
