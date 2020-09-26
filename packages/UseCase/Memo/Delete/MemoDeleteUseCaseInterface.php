<?php
namespace packages\UseCase\Memo\Delete;

interface MemoDeleteUseCaseInterface
{
    public function delete(MemoDeleteRequest $memoDeleteRequest);
}
