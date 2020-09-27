<?php

namespace packages\UseCase\Memo\Show;

use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

class MemoDetailRequest
{
    private int $memoId;

    /**
     * MemoDetailRequest constructor.
     * @param int $memoId
     */
    public function __construct(int $memoId)
    {
        $this->memoId = $memoId;
    }

    /**
     * @return int
     */
    public function getMemoId()
    {
        return $this->memoId;
    }
}

