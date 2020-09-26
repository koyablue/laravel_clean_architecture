<?php

namespace packages\Infrastructure\Memo;

use Illuminate\Support\Facades\Auth;
use packages\Domain\Domain\Memo\Memo;
use packages\UseCase\Memo\Dto\MemoDetailDto;
use packages\UseCase\Memo\Dto\MemoEditDto;
use packages\UseCase\Memo\Dto\MemoIndexDto;
use packages\UseCase\Memo\QueryService\MemoQueryServiceInterface;
use App\Models\Memo as EloqMemo;

class MemoQueryService implements MemoQueryServiceInterface
{
    public function fetchUsersMemo(): array
    {
        $userId = Auth::user()->id;
        $eloqMemoList = EloqMemo::where('user_id', $userId)->get()->all();
        $ret = [];
        if(!empty($eloqMemoList)){
            foreach ($eloqMemoList as $memo){
                $memoIndexDto = new MemoIndexDto($memo->id, $memo->content);
                $ret[] = $memoIndexDto;
            }
        }

        return $ret;
    }

    /**
     * @param int $memoId
     * @return MemoDetailDto
     */
    public function getMemoDetail(int $memoId): MemoDetailDto
    {
        $eloqMemoModel = EloqMemo::find($memoId);
        return new MemoDetailDto($eloqMemoModel->id, $eloqMemoModel->content, $eloqMemoModel->created_at);
    }

    /**
     * @param int $memoId
     * @return MemoEditDto
     */
    public function getEditTarget(int $memoId): MemoEditDto
    {
        $eloqMemoModel = EloqMemo::find($memoId);
        return new MemoEditDto($eloqMemoModel->id, $eloqMemoModel->content);
    }

    public function findById(int $memoId): Memo
    {
        $eloqMemoModel = EloqMemo::find($memoId);
        $memo = new Memo($eloqMemoModel->id, $eloqMemoModel->user_id, $eloqMemoModel->content,
            $eloqMemoModel->created_at);

        return $memo;
    }
}
