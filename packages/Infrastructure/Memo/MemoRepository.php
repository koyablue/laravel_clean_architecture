<?php

namespace packages\Infrastructure\Memo;

use packages\Domain\Domain\Memo\Memo;
use packages\Domain\Domain\Memo\MemoRepositoryInterface;
use App\Models\Memo as EloquentMemo;
use App\Models\User as EloquentUser;

class MemoRepository implements MemoRepositoryInterface
{
    private EloquentMemo $eloquentMemo;
    private EloquentUser $eloquentUser;

    public function __construct(EloquentMemo $eloquentMemo, EloquentUser $eloquentUser)
    {
        $this->eloquentMemo = $eloquentMemo;
        $this->eloquentUser = $eloquentUser;
    }

    public function find()
    {
        // TODO: Implement find() method.
    }

    public function findUserMemo(int $userId): array
    {
        $eloqMemo = $this->eloquentMemo;
        $userMemoList = $eloqMemo::where('user_id', $userId)->get()->all();
        $ret = [];
        if(!empty($userMemoList)){
            foreach ($userMemoList as $userMemo){
                $memo = new Memo($userMemo->id, $userId, $userMemo->content, $userMemo->created_at);
                $ret[] = $memo;
            }
        }

        return $ret;
    }

    public function save(Memo $memo): Memo
    {
        $eloqMemo = new $this->eloquentMemo;

        $eloqMemo->fill(
            [
                'user_id' => $memo->getUserId(),
                'content' => $memo->getContent()
            ])->save();

        return new Memo($eloqMemo->id, $eloqMemo->user_id, $eloqMemo->content, $eloqMemo->created_at);
    }

    public function update(int $memoId, string $content)
    {
        $eloqMemo = $this->eloquentMemo::find($memoId);
        $eloqMemo->fill(['content' => $content])->save();
    }

    public function delete(int $memoId)
    {
        $eloqMemo = $this->eloquentMemo::find($memoId);
        $eloqMemo->delete();
    }
}
