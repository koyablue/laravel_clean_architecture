<?php
namespace packages\UseCase\Memo\Update;

class MemoUpdateRequest
{
    private int $memoId;
    private string $content;

    public function __construct(int $memoId, string $content)
    {
        $this->memoId = $memoId;
        $this->content = $content;
    }

    public function getMemoId()
    {
        return $this->memoId;
    }

    public function getContent()
    {
        return $this->content;
    }
}
