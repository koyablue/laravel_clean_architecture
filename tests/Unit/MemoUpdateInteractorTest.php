<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use packages\Domain\Application\Memo\MemoCreateInteractor;
use packages\Domain\Application\Memo\MemoUpdateInteractor;
use packages\Infrastructure\Memo\MemoRepository;
use packages\UseCase\Memo\Create\MemoCreateRequest;
use packages\UseCase\Memo\Update\MemoUpdateRequest;
use Tests\Base\TestBase;
use Tests\TestCase;

class memoUpdateInteractorTest extends TestBase
{
    public function testMemoUpdate()
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
        $this->assertEquals($str, $createdMemo->getContent());

        $updateInteractor = new MemoUpdateInteractor($repository);
        $newStr = 'updated memo.';
        $updatedMemo = $updateInteractor->update(new MemoUpdateRequest($createdMemo->getId(), $newStr));
        $this->assertEquals($newStr, $updatedMemo->getContent());
        $this->assertNotEquals($createdMemo->getContent(), $updatedMemo->getContent());
    }
}
