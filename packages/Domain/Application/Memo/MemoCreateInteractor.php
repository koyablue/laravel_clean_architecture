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

    public function __construct(MemoRepositoryInterface $memoRepository)
    {
        $this->memoRepository = $memoRepository;
    }

    public function create(MemoCreateRequest $request)
    {
        $memo = new Memo(mt_rand(), $request->getUserId(), $request->getContent(), Carbon::now());
        $createdMemo = $this->memoRepository->save($memo);
    }
}
