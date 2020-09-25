<?php

namespace packages\UseCase\Memo\Dto;

class MemoDetailDto
{
    private int $id;
    private string $content;
    private \DateTime $createdAt;

    public function __construct(int $id, string $content, \DateTime $createdAt)
    {
        $this->id = $id;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
