<?php
namespace packages\Domain\Domain\Memo;

interface MemoRepositoryInterface
{
    public function find();

    public function findUserMemo();

    public function save(Memo $memo, int $userId);

    public function delete();
}
