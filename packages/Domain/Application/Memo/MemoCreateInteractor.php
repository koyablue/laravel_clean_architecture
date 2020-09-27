<?php

namespace packages\Domain\Application\Memo;

use Carbon\Carbon;
use packages\Domain\Domain\Memo\Memo;
use packages\Domain\Domain\Memo\MemoRepositoryInterface;
use packages\UseCase\Memo\Create\MemoCreateRequest;
use packages\UseCase\Memo\Create\MemoCreateUseCaseInterface;

class MemoCreateInteractor implements MemoCreateUseCaseInterface
{
    private MemoRepositoryInterface $memoRepository;

    /**
     * MemoCreateInteractor constructor.
     * @param MemoRepositoryInterface $memoRepository
     */
    public function __construct(MemoRepositoryInterface $memoRepository)
    {
        $this->memoRepository = $memoRepository;
    }

    /**
     * @param MemoCreateRequest $request
     * @return Memo
     */
    public function create(MemoCreateRequest $request): Memo
    {
        $memo = new Memo(mt_rand(), $request->getUserId(), $request->getContent(), Carbon::now());
        return $this->memoRepository->save($memo);
    }
}
