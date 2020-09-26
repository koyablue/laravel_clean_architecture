<?php
namespace packages\Domain\Domain\Memo;

interface MemoRepositoryInterface
{
    public function save(Memo $memo): Memo;

    public function update(int $memoId, string $content): Memo;

    public function delete(int $memoId);
}
