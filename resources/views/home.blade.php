<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('dark-mode.css') }}" rel="stylesheet">

</head>
    <body>
        <div class="container mt-4">
            <h1>Products Page</h1>

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form for Adding/Editing Products -->
            <form action="{{ isset($product) ? route('home.update', $product->id) : route('home.store') }}" method="POST">
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" placeholder="Product Name" required>
                </div>
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" placeholder="Product Price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Product Description">{{ old('description', $product->description ?? '') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update' : 'Add' }}</button>
            </form>

            <!-- Display Products -->
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('home.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('home.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
