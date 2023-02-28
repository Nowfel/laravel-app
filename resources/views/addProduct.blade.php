<form method="POST" action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}">
    @csrf
    @if (isset($product))
      @method('PUT')
    @endif
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ isset($product) ? $product->name : '' }}">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" id="description" name="description">{{ isset($product) ? $product->description : '' }}</textarea>
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" id="price" name="price" value="{{ isset($product) ? $product->price : '' }}">
    </div>
    <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update' : 'Create' }}</button>
  </form>
  