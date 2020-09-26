<?php

namespace packages\Infrastructure\Memo;

use packages\Domain\Domain\Memo\Memo;
use packages\Domain\Domain\Memo\MemoRepositoryInterface;
use App\Models\Memo as EloqMemo;
use App\Models\User as EloqUser;

class MemoRepository implements MemoRepositoryInterface
{
    /**
     * @param Memo $memo
     * @return Memo
     */
    public function save(Memo $memo): Memo
    {
        $eloqMemo = new EloqMemo();

        $eloqMemo->fill(
            [
                'user_id' => $memo->getUserId(),
                'content' => $memo->getContent()
            ])->save();

        return new Memo($eloqMemo->id, $eloqMemo->user_id, $eloqMemo->content, $eloqMemo->created_at);
    }

    /**
     * @param int $memoId
     * @param string $content
     * @return Memo
     */
    public function update(int $memoId, string $content): Memo
    {
        $eloqMemo = EloqMemo::find($memoId);
        $eloqMemo->fill(['content' => $content])->save();
        return new Memo($eloqMemo->id, $eloqMemo->user_id, $eloqMemo->content, $eloqMemo->created_at);
    }

    /**
     * @param int $memoId
     */
    public function delete(int $memoId)
    {
        $eloqMemo = EloqMemo::find($memoId);
        $eloqMemo->delete();
    }
}
