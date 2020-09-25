<?php

namespace packages\Infrastracture\Memo;

use packages\UseCase\Memo\Dto\MemoDetailDto;
use packages\UseCase\Memo\Dto\MemoIndexDto;
use packages\UseCase\Memo\QueryService\MemoQueryServiceInterface;
use App\Models\Memo as EloquentMemo;

class MemoQueryService implements MemoQueryServiceInterface
{
    private EloquentMemo $eloqMemo;

    public function __construct(EloquentMemo $eloqMemo)
    {
        $this->eloqMemo = $eloqMemo;
    }

    public function fetchUsersMemo(int $userId): array
    {
        $eloqMemoList = $this->eloqMemo::where('user_id', $userId)->get()->all();
        $ret = [];
        if(!empty($eloqMemoList)){
            foreach ($eloqMemoList as $memo){
                $memoIndexDto = new MemoIndexDto($memo->id, $memo->content);
                $ret[] = $memoIndexDto;
            }
        }

        return $ret;
    }

    public function findById(int $memoId)
    {
        $eloqMemoModel = $this->eloqMemo::find($memoId);
        return new MemoDetailDto($eloqMemoModel->id, $eloqMemoModel->content, $eloqMemoModel->created_at);
    }
}
