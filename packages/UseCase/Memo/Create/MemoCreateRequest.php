<?php

namespace packages\UseCase\Memo\Create;

class MemoCreateRequest
{
    private int $userId;
    private string $content;

    public function __construct(int $userId, string $content)
    {
        $this->userId = $userId;
        $this->content = $content;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
