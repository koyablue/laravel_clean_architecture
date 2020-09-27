<?php

namespace packages\Domain\Application\Memo;

use packages\UseCase\Memo\Index\MemoIndexRequest;
use packages\UseCase\Memo\Index\MemoIndexUseCaseInterface;
use packages\UseCase\Memo\QueryService\MemoQueryServiceInterface;

class MemoIndexInteractor implements MemoIndexUseCaseInterface
{
    private MemoQueryServiceInterface $memoQueryService;

    /**
     * MemoIndexInteractor constructor.
     * @param MemoQueryServiceInterface $memoQueryService
     */
    public function __construct(MemoQueryServiceInterface $memoQueryService)
    {
        $this->memoQueryService = $memoQueryService;
    }

    /**
     * @param MemoIndexRequest $request
     * @return array
     */
    public function getMemoList(MemoIndexRequest $request): array
    {
        return $this->memoQueryService->fetchUsersMemo($request->getUserId());
    }
}
