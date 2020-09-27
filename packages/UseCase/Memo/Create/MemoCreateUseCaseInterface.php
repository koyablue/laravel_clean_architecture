<?php

namespace packages\UseCase\Memo\Create;

use packages\Domain\Domain\Memo\Memo;

interface MemoCreateUseCaseInterface
{
    public function create(MemoCreateRequest $request): Memo;
}
