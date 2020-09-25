<?php

namespace App\Models;

class MemoIndexViewModel
{
    public array $memos;

    /**
     * MemoIndexViewModel constructor.
     * @param MemoViewModel[] $memos
     */
    public function __construct(array $memos)
    {
        $this->memos = $memos;
    }

}
