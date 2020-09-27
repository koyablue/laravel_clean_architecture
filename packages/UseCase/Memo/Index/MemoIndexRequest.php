<?php

namespace packages\UseCase\Memo\Index;

class MemoIndexRequest
{
    private int $userId;

    /**
     * MemoIndexRequest constructor.
     * @param int $userId
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }
}
