<?php

namespace packages\Mock;

use packages\Domain\Domain\Memo\Memo;
use packages\UseCase\Memo\Dto\MemoDetailDto;
use packages\UseCase\Memo\Dto\MemoEditDto;
use packages\UseCase\Memo\QueryService\MemoQueryServiceInterface;

class MockMemoQueryService implements MemoQueryServiceInterface
{
    private array $db;
    public function __construct(array $db)
    {
        $this->db = $db;
    }

    public function fetchUsersMemo(int $userId): array
    {
        // TODO: Implement fetchUsersMemo() method.
    }

    public function getMemoDetail(int $memoId): MemoDetailDto
    {
        // TODO: Implement getMemoDetail() method.
    }

    public function getEditTarget(int $memoId): MemoEditDto
    {
        // TODO: Implement getEditTarget() method.
    }

    public function findById(int $memoId): Memo
    {
        // TODO: Implement findById() method.
    }

}
