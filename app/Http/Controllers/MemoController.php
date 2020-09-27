<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemoCreateFormRequest;
use App\Http\Requests\MemoUpdateFormRequest;
use App\Models\Memo;
use App\Models\MemoDetailViewModel;
use App\Models\MemoEditViewModel;
use App\Models\MemoIndexViewModel;
use App\Models\MemoViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use packages\UseCase\Memo\Create\MemoCreateRequest;
use packages\UseCase\Memo\Create\MemoCreateUseCaseInterface;
use packages\UseCase\Memo\Delete\MemoDeleteRequest;
use packages\UseCase\Memo\Delete\MemoDeleteUseCaseInterface;
use packages\UseCase\Memo\Index\MemoIndexRequest;
use packages\UseCase\Memo\Index\MemoIndexUseCaseInterface;
use packages\UseCase\Memo\QueryService\MemoQueryServiceInterface;
use packages\UseCase\Memo\Show\MemoDetailRequest;
use packages\UseCase\Memo\Show\MemoDetailUseCaseInterface;
use packages\UseCase\Memo\Update\MemoUpdateRequest;
use packages\UseCase\Memo\Update\MemoUpdateUseCaseInterface;

class MemoController extends Controller
{
    /**
     * 一覧
     * @param MemoIndexUseCaseInterface $interactor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(MemoIndexUseCaseInterface $interactor)
    {
        $userId = Auth::user()->id;

        $memoIndexRequest = new MemoIndexRequest($userId);
        $usersMemoDtoList = $interactor->getMemoList($memoIndexRequest);

        $memoViewModels = array_map(function ($usersMemo){
            return new MemoViewModel($usersMemo->getMemoId(), $usersMemo->getContent());
        }, $usersMemoDtoList);
        $MemoIndexViewModel = new MemoIndexViewModel($memoViewModels);

        return view('index', compact('MemoIndexViewModel'));
    }

    /**
     * 詳細表示
     * @param MemoDetailUseCaseInterface $interactor
     * @param $memoId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(MemoDetailUseCaseInterface $interactor, int $memoId)
    {
        $memoDetailRequest = new MemoDetailRequest($memoId);
        $memoDetailDto = $interactor->getMemoDetail($memoDetailRequest);

        $memo = new MemoDetailViewModel($memoDetailDto->getId(), $memoDetailDto->getContent(),
            $memoDetailDto->getCreatedAt());
        return view('detail', compact('memo'));
    }

    /**
     * 新規作成
     * @param MemoCreateFormRequest $request
     * @param MemoCreateUseCaseInterface $interactor
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(MemoCreateFormRequest $request, MemoCreateUseCaseInterface $interactor)
    {
        $userId = Auth::user()->id;
        $content = $request->get('content');
        $memoCreateRequest = new MemoCreateRequest($userId, $content);
        $interactor->create($memoCreateRequest);
        return redirect(route('index'));
    }

    /**
     * 編集画面
     * @param MemoQueryServiceInterface $memoQueryService
     * @param $memoId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(MemoQueryServiceInterface $memoQueryService, int $memoId)
    {
        $memoEditDto = $memoQueryService->getEditTarget($memoId);
        $memo = new MemoEditViewModel($memoEditDto->getMemoId(), $memoEditDto->getContent());
        return view('edit', compact('memo'));
    }

    /**
     * 更新
     * @param MemoQueryServiceInterface $memoQueryService
     * @param MemoUpdateFormRequest $request
     * @param $memoId
     * @param MemoUpdateUseCaseInterface $memoUpdateUseCase
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(
        MemoQueryServiceInterface $memoQueryService,
        MemoUpdateFormRequest $request,
        $memoId,
        MemoUpdateUseCaseInterface $memoUpdateUseCase
    ){
        $memo = $memoQueryService->findById($memoId);
        $memoUpdateRequest = new MemoUpdateRequest($memo->getId(), $request->get('content'));
        $memoUpdateUseCase->update($memoUpdateRequest);
        return redirect(route('index'));
    }

    /**
     * 削除
     * @param MemoDeleteUseCaseInterface $memoDeleteInteractor
     * @param $memoId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(MemoDeleteUseCaseInterface $memoDeleteInteractor, $memoId)
    {
        $memoDeleteRequest = new MemoDeleteRequest($memoId);
        $memoDeleteInteractor->delete($memoDeleteRequest);
        return redirect(route('index'));
    }
}
