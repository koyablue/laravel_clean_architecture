<?php
namespace packages\Domain\Application\Memo;

use packages\Domain\Domain\Memo\MemoRepositoryInterface;
use packages\UseCase\Memo\Update\MemoUpdateRequest;
use packages\UseCase\Memo\Update\MemoUpdateUseCaseInterface;

class MemoUpdateInteractor implements MemoUpdateUseCaseInterface
{
    private MemoRepositoryInterface $memoRepository;

    public function __construct(MemoRepositoryInterface $memoRepository)
    {
        $this->memoRepository = $memoRepository;
    }

    public function update(MemoUpdateRequest $memoUpdateRequest)
    {
        $this->memoRepository->update($memoUpdateRequest->getMemoId(), $memoUpdateRequest->getContent());
    }
}
