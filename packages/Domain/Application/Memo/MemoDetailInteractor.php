<?php

namespace packages\Domain\Application\Memo;

use packages\UseCase\Memo\Dto\MemoDetailDto;
use packages\UseCase\Memo\QueryService\MemoQueryServiceInterface;
use packages\UseCase\Memo\Show\MemoDetailRequest;
use packages\UseCase\Memo\Show\MemoDetailUseCaseInterface;

class MemoDetailInteractor implements MemoDetailUseCaseInterface
{
    private MemoQueryServiceInterface $memoQueryService;

    public function __construct(MemoQueryServiceInterface $memoQueryService)
    {
        $this->memoQueryService = $memoQueryService;
    }

    public function getMemoDetail(MemoDetailRequest $request): MemoDetailDto
    {
        return $this->memoQueryService->getMemoDetail($request->getMemoId());
    }
}
