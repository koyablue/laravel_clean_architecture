<?php

namespace Tests\Unit;

use packages\Domain\Application\Memo\MemoCreateInteractor;
use packages\Domain\Application\Memo\MemoDeleteInteractor;
use packages\Infrastructure\Memo\MemoRepository;
use packages\UseCase\Memo\Create\MemoCreateRequest;
use packages\UseCase\Memo\Delete\MemoDeleteRequest;
use PHPUnit\Framework\TestCase;
use App\Models\Memo as EloqMemo;
use Tests\Base\TestBase;

class MemoDeleteInteractorTest extends TestBase
{
    public function testMemoDelete()
    {
        $userId = $this->user->id;
        $str = null;
        for ($i = 0; $i < 10; $i++){
            $str .= chr(mt_rand(97, 122));
        }
        $content = $str;

        $repository = new MemoRepository();
        $createInteractor = new MemoCreateInteractor($repository);
        $createdMemo = $createInteractor->create(new MemoCreateRequest($userId, $content));
        $memoId = $createdMemo->getId();
        $this->assertNotNull(EloqMemo::find($memoId));

        $deleteInteractor = new MemoDeleteInteractor($repository);
        $deleteInteractor->delete(new MemoDeleteRequest($createdMemo->getId()));
        $this->assertNull(EloqMemo::find($memoId));
    }
}
