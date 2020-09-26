<?php

namespace App\Models;

class MemoEditViewModel
{
    public int $id;
    public string $content;

    public function __construct(int $memoId, string $content)
    {
        $this->id = $memoId;
        $this->content = $content;
    }
}
