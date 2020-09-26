<?php

namespace packages\UseCase\Memo\Dto;

class UsersMemoDto
{
    private int $memoId;
    private string $content;
    private \DateTime $createdAt;

    public function __construct(int $memoId, string $content, \DateTime $createdAt)
    {
        $this->memoId = $memoId;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    public function getMemoId()
    {
        return $this->memoId;
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
