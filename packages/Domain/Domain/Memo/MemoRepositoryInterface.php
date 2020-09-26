<?php
namespace packages\Domain\Domain\Memo;

interface MemoRepositoryInterface
{
    public function find();

    public function findUserMemo(int $userId);

    public function save(Memo $memo);

    public function update(int $memoId, string $content);

    public function delete(int $memoId);
}
