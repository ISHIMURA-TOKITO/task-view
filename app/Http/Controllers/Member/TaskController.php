<?php

namespace App\Http\Controllers\Member;

use App\Http\Requests\Member\TaskRequest;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\CodeCleaner\ReturnTypePass;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // urlパラメータからfolder_idを取得
        $folder_id = $request->folder;
        // フォルダーのレコードを取得
        $folder = Folder::find($folder_id ?? 0);
        switch (true) {
                // パラメータからfolderの部分を消した場合
            case !$request->filled('folder'):
                // フォルダーのidがそもそも無い値を入れられたとき
            case is_null($folder):
                // ログインユーザのidとfolderレコードのuser_idが一致しない場合
            case Auth::user()->id != $folder->user_id:
                toastr()->error('不正アクセスを検知しました。');
                return redirect()->route('member.top.index');
        }
        return view('member.task.create', compact('folder_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        try {
            DB::beginTransaction();
            Task::create([
                'folder_id'  => $request->folder_id,
                'name'     => $request->name,
                'limid'     => $request->limid,
                'situation'     => $request->situation,
            ]);
            DB::commit();
            toastr()->success('追加が完了しました！');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('エラーが発生しました。');
            return redirect()->back()->withInput();
        }
        return redirect()->route('member.task.show', $request->folder_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        // 複数レコードを取得するため、変数名は複数形
        $folder = Folder::getFolder($request, $id);
        // 1レコードしか取得しない為、変数名は単数形
        $comment = Comment::getRandomComment();
        // dd($folder->Tasks);
        return view('member.task.show', compact('folder', 'comment', 'request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::with('folder')->where('id', $id)->firstOrFail();
        // 「？」マークを付けることによってオプショナルチェーンを適用させる
        if (Auth::user()->id != $task->folder?->user_id) {
            toastr()->error('不正アクセスを検知しました。');
            return redirect()->route('member.top.index');
        }
        return view('member.task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $task = Task::findOrFail($id);
            $task->fill([
                'folder_id'  => $request->folder_id,
                'name'     => $request->name,
                'limid'     => $request->limid,
                'situation'     => $request->situation,
            ])->save();
            DB::commit();
            toastr()->success('編集が完了しました！');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('エラーが発生しました。');
            return redirect()->back()->withInput();
        }
        return redirect()->route('member.task.show', $request->folder_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $task = Task::findOrFail($id);
            $folder_id = $task->folder_id;
            $task->delete();
            DB::commit();
            toastr()->success('削除が完了しました！');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('エラーが発生しました。');
            return redirect()->back()->withInput();
        }
        return redirect()->route('member.task.show', $folder_id);
    }
}
