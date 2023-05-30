<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\FolderRequest;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FolderController extends Controller
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
    public function create()
    {
        return view('member.folder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FolderRequest $request)
    {
        try {
            DB::beginTransaction();
            Folder::create([
                'user_id'  => Auth::user()->id,
                'name'     => $request->name,
            ]);
            DB::commit();
            toastr()->success('追加が完了しました！');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('エラーが発生しました。');
            return redirect()->back()->withInput();
        }
        return redirect()->route('member.top.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $folder = Folder::findOrFail($id);
        return view('member.folder.edit', compact('folder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FolderRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $folder = Folder::findOrFail($id);
            $folder->fill([
                'name' => $request->name,
            ])->save();
            DB::commit();
            toastr()->success('編集が完了しました！');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('エラーが発生しました。');
            return redirect()->back()->withInput();
        }
        return redirect()->route('member.top.index');
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
            $folder = Folder::findOrFail($id);
            $folder->delete();
            DB::commit();
            toastr()->success('削除が完了しました！');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('エラーが発生しました。');
            return redirect()->back()->withInput();
        }
        return redirect()->route('member.top.index');
    }
}
