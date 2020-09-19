<?php

namespace packages\Infrastracture\Memo;

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

    public function findUserMemo()
    {
        // TODO: Implement findUserMemo() method.
    }

    public function save(Memo $memo, int $userId): Memo
    {
        $eloqMemo = new $this->eloquentMemo;
        $eloqUser = EloquentUser::find($userId);

        $eloqUser->memos()->save($eloqMemo->fill(
            [
                'user_id' => $memo->getUserId(),
                'content' => $memo->getContent()
            ]));

        return new Memo($eloqMemo->id, $eloqMemo->user_id, $eloqMemo->content, (string)$eloqMemo->created_at);
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
