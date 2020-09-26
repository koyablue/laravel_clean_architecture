<?php
namespace packages\Domain\Application\Memo;

use packages\Domain\Domain\Memo\MemoRepositoryInterface;
use packages\UseCase\Memo\Delete\MemoDeleteRequest;
use packages\UseCase\Memo\Delete\MemoDeleteUseCaseInterface;

class MemoDeleteInteractor implements MemoDeleteUseCaseInterface
{
    private MemoRepositoryInterface $memoRepository;

    public function __construct(MemoRepositoryInterface $memoRepository)
    {
        $this->memoRepository = $memoRepository;
    }

    public function delete(MemoDeleteRequest $memoDeleteRequest)
    {

    }
}
