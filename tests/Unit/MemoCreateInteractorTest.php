<?php

namespace Tests\Unit;

use packages\Domain\Application\Memo\MemoCreateInteractor;
use packages\Mock\MockMemoRepository;
use packages\UseCase\Memo\Create\MemoCreateRequest;
use PHPUnit\Framework\TestCase;

class MemoCreateInteractorTest extends TestCase
{
    public function testMemoCreate()
    {
        $userId = mt_rand(1, 100);
        $str = null;
        for ($i = 0; $i < 10; $i++){
            $str .= chr(mt_rand(97, 122));
        }
        $content = $str;
        $repository = new MockMemoRepository();
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
