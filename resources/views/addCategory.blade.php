<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_name">Category Description</label>
            <textarea class="form-control @error('name') is-invalid @enderror" name="description" rows="5">{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
        <button class="btn btn-primary" type="submit">Add Category</button>
    </div>
</form>