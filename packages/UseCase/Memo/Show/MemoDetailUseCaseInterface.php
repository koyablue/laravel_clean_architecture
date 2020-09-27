<?php

namespace packages\UseCase\Memo\Show;

use packages\UseCase\Memo\Dto\MemoDetailDto;

interface MemoDetailUseCaseInterface
{
    public function getMemoDetail(MemoDetailRequest $request): MemoDetailDto;
}
