
<form method="GET" action="{{ route('product') }}">
    <div class="form-group">
      <label for="price_filter">Filter by Price:</label>
      <select id="price_filter" name="price_filter" class="form-control">
        <option value="">All Prices</option>
        <option value="0-100" @if($priceFilter === '0-100') selected @endif>0 - 100</option>
        <option value="101-1000" @if($priceFilter === '101-1000') selected @endif>101 - 1000</option>
        <option value="1001-10000" @if($priceFilter === '1001-10000') selected @endif>1001 - 10000</option>
        <option value="10001-100000" @if($priceFilter === '10001-100000') selected @endif>10001 - 100000</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
  </form>
  
<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
        <tr>
          <td>
          <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
          </td>
          

          <td>{{ $product->description }}</td>
          <td>{{ $product->price }}</td>
          <td>
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
            <form method="POST" action="{{ route('product.destroy', $product->id) }}" style="display: inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  