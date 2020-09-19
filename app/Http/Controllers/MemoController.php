<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemoCreateFormRequest;
use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use packages\UseCase\Memo\Create\MemoCreateRequest;
use packages\UseCase\Memo\Create\MemoCreateUseCaseInterface;

class MemoController extends Controller
{
    /**
     * 一覧
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $user = Auth::user();
        $memos = $user->memos;
        return view('index', compact('memos'));
    }

    /**
     * 詳細表示
     * @param $memoId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($memoId){
        $memo = Memo::find($memoId);
        return view('detail', compact('memo'));
    }

    /**
     * 新規作成
     * @param MemoCreateFormRequest $request
     * @param MemoCreateUseCaseInterface $interactor
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(MemoCreateFormRequest $request, MemoCreateUseCaseInterface $interactor){
        $user = Auth::user();
        $content = $request->get('content');
        $memoCreateRequest = new MemoCreateRequest($user->id, $content);
        $interactor->create($memoCreateRequest);
        return redirect(route('index'));
    }

    /**
     * 編集画面
     * @param $memoId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($memoId){
        $memo = Memo::find($memoId);
        return view('edit', compact('memo'));
    }

    /**
     * 更新
     * @param Request $request
     * @param $memoId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $memoId){
        $memo = Memo::find($memoId);
        $memo->fill(['content' => $request->get('content')])->save();
        return redirect(route('index'));
    }

    /**
     * 削除
     * @param $memoId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($memoId){
        $memo = Memo::find($memoId);
        $memo->delete();
        return redirect(route('index'));
    }
}
