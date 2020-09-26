<?php
namespace packages\UseCase\Memo\Delete;

class MemoDeleteRequest
{
    private int $memoId;

    public function __construct(int $memoId)
    {
        $this->memoId = $memoId;
    }


    public function getMemoId(): int
    {
        return $this->memoId;
    }
}
