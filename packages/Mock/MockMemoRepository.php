<?php

namespace packages\Mock;

use packages\Domain\Domain\Memo\Memo;
use packages\Domain\Domain\Memo\MemoRepositoryInterface;

class MockMemoRepository implements MemoRepositoryInterface
{
    private array $db = [];

    public function save(Memo $memo): Memo
    {
        $this->db[$memo->getId()] = $memo;
        return $this->db[$memo->getId()];
    }

    public function update(int $memoId, string $content): Memo
    {
        $memo = $this->db[$memoId];
        $updatedMemo = new Memo($memo->getId(), $memo->getUserId(), $content, $memo->getCreatedAt());
        $this->db[$memoId] = $updatedMemo;
        return $updatedMemo;
    }

    public function delete(int $memoId)
    {
        unset($this->db[$memoId]);
    }
}
