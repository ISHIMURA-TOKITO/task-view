<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Services\Slack\SlackFacade as Slack;
use Illuminate\Http\Request;

class TaskSendController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // タスク情報取得(findOrFailにすることによって、値が存在しない場合、404エラーとする)。
        $task = Task::findOrFail($id);
        $message = '';
        $message .= "タスク名：" . $task->name . "\n";
        $message .= "期限：" . $task->limid . "\n";
        $message .= "進捗状況：" . $task->situation . "\n";
        Slack::send($message);
        // http://dev.task-view.example/api/task_send/1　←URLに直書きしてSlackに反映されるか確認
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
