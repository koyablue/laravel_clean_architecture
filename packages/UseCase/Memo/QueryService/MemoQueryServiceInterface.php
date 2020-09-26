<?php

namespace packages\UseCase\Memo\QueryService;

use packages\Domain\Domain\Memo\Memo;
use packages\UseCase\Memo\Dto\MemoDetailDto;
use packages\UseCase\Memo\Dto\MemoEditDto;

interface MemoQueryServiceInterface
{
    public function fetchUsersMemo(int $userId): array;

    public function getMemoDetail(int $memoId): MemoDetailDto;

    public function getEditTarget(int $memoId): MemoEditDto;

    public function findById(int $memoId): Memo;
}
