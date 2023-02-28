<div class="card-body">
    <table class="table table-bordered" id="dataTable">
        <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $sl => $category)
                <tr>
                    <td>{{ ++$sl }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <div class="d-flex">
                            <button class="btn btn-primary btn-sm mr-1" 
                                data-target="{{$category->id }}"><i
                                    class="fas fa-edit"></i></button>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="delete btn btn-danger btn-sm"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>


                <!-- Category edit Modal-->
                
            @endforeach
        </tbody>
    </table>
</div>