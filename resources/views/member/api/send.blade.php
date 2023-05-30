<!-- Button trigger modal -->
<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#member_task_send_{{ $task->id }}">
    <i class="fa-brands fa-slack"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="member_task_send_{{ $task->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Slack共有</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Slackへタスクの共有を行いますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">いいえ</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="buttonClick({{ $task->id }})">はい</button>
            </div>
        </div>
    </div>
</div>
