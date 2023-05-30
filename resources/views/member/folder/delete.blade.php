<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
    data-bs-target="#member_folder_delete_{{ $folder->id }}">
    <i class="fa-solid fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="member_folder_delete_{{ $folder->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">削除</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                本当にフォルダを削除しますか？
            </div>
            <div class="modal-footer">
                <form action="{{ route('member.folder.destroy', $folder) }}" method="POST">
                    @csrf
                    {{-- 削除処理は@method('delete')を記載 --}}
                    @method('delete')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">いいえ</button>
                    <button type="submit" class="btn btn-primary">はい</button>
                </form>
            </div>
        </div>
    </div>
</div>
