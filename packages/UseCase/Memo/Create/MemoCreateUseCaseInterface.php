<?php
namespace packages\UseCase\Memo\Create;

interface MemoCreateUseCaseInterface
{
    public function create(MemoCreateRequest $request);
}
