<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemoCreateFormRequest;
use App\Models\Memo;
use App\Models\MemoDetailViewModel;
use App\Models\MemoIndexViewModel;
use App\Models\MemoViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use packages\UseCase\Memo\Create\MemoCreateRequest;
use packages\UseCase\Memo\Create\MemoCreateUseCaseInterface;
use packages\UseCase\Memo\QueryService\MemoQueryServiceInterface;

class MemoController extends Controller
{
    /**
     * 一覧
     * @param MemoQueryServiceInterface $memoQueryService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(MemoQueryServiceInterface $memoQueryService)
    {
        $user = Auth::user();
        $memosFetchedByUserId = $memoQueryService->fetchUsersMemo($user->id);
        $memoViewModels = [];
        foreach ($memosFetchedByUserId as $memo){
            $memoViewModels[] = new MemoViewModel($memo->getMemoId(), $memo->getContent());
        }
        $MemoIndexViewModel = new MemoIndexViewModel($memoViewModels);

        return view('index', compact('MemoIndexViewModel'));
    }

    /**
     * 詳細表示
     * @param MemoQueryServiceInterface $memoQueryService
     * @param $memoId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(MemoQueryServiceInterface $memoQueryService, $memoId)
    {
        $memoDetailDto = $memoQueryService->findById($memoId);
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
        $user = Auth::user();
        $content = $request->get('content');
        $memoCreateRequest = new MemoCreateRequest($user->id, $content);
        $interactor->create($memoCreateRequest);
        return redirect(route('index'));
    }

    /**
     * 編集画面
     * @param MemoQueryServiceInterface $memoQueryService
     * @param $memoId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(MemoQueryServiceInterface $memoQueryService, $memoId)
    {
        $memo = $memoQueryService->findById($memoId);
        return view('edit', compact('memo'));
    }

    /**
     * 更新
     * @param Request $request
     * @param $memoId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $memoId)
    {
        $memo = Memo::find($memoId);
        $memo->fill(['content' => $request->get('content')])->save();
        return redirect(route('index'));
    }

    /**
     * 削除
     * @param $memoId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($memoId)
    {
        $memo = Memo::find($memoId);
        $memo->delete();
        return redirect(route('index'));
    }
}
