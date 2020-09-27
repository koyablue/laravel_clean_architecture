<?php

namespace packages\UseCase\Memo\Create;

class MemoCreateRequest
{
    private int $userId;
    private string $content;

    /**
     * MemoCreateRequest constructor.
     * @param int $userId
     * @param string $content
     */
    public function __construct(int $userId, string $content)
    {
        $this->userId = $userId;
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
