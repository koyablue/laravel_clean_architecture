<?php

namespace packages\UseCase\Memo\Index;

interface MemoIndexUseCaseInterface
{
    public function getMemoList(MemoIndexRequest $request): array;
}
