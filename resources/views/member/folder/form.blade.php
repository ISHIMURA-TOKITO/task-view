{{-- HTML共通化処理 --}}
<div class="mb-3 text-center">
    <label for="folder_name" class="form-label">{{ $title }}</label>
    <input type="text" class="form-control @error('name')is-invalid @enderror" id="folder_name" name="name"
        value="{{ old('name', isset($folder) ? $folder->name : '') }}" placeholder="フォルダ名">
    <div class="invalid-feedback">
        @error('name')
            {{ $message }}
        @enderror
    </div>
</div>
