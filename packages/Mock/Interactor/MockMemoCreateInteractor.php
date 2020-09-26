<?php

namespace packages\Mock\Interactor;

use packages\UseCase\Memo\Create\MemoCreateRequest;
use packages\UseCase\Memo\Create\MemoCreateUseCaseInterface;

class MockMemoCreateInteractor implements MemoCreateUseCaseInterface
{
    public function create(MemoCreateRequest $request)
    {
        // TODO: Implement create() method.
    }
}
