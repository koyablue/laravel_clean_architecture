<?php

namespace packages\UseCase\Memo\QueryService;

interface MemoQueryServiceInterface
{
    public function fetchUsersMemo(int $userId): array;

    public function findById(int $memoId);
}
