<?php
namespace packages\UseCase\Memo\Update;

interface MemoUpdateUseCaseInterface
{
    public function update(MemoUpdateRequest $memoUpdateRequest);
}
