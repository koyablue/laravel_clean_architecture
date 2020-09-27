<?php

namespace Tests\Unit;

use packages\Domain\Application\Memo\MemoCreateInteractor;
use packages\Infrastructure\Memo\MemoRepository;
use packages\UseCase\Memo\Create\MemoCreateRequest;
use Tests\Base\TestBase;

class MemoCreateInteractorTest extends TestBase
{
    public function testMemoCreate()
    {
        $userId = $this->user->id;
        $str = null;
        for ($i = 0; $i < 10; $i++){
            $str .= chr(mt_rand(97, 122));
        }
        $content = $str;
        $repository = new MemoRepository();
        $memoCreateRequest = new MemoCreateRequest($userId, $content);
        $interactor = new MemoCreateInteractor($repository);
        $createdMemo = $interactor->create($memoCreateRequest);

        var_dump($createdMemo);

        $this->assertNotNull($createdMemo);
        $this->assertNotNull($createdMemo->getId());
        $this->assertEquals($userId, $createdMemo->getUserId());
        $this->assertEquals($str, $createdMemo->getContent());
        $this->assertNotNull($createdMemo->getCreatedAt());

    }
}
