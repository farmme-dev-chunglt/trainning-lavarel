<form action="{{ route('product.update', $product) }}" method="post">
    @csrf
    @method('PUT')
    <label> name:</label><br>
    <input type="text" name="name" value="{{ $product->name }}">
    @if ($errors->has('name'))
        <span>{{ $errors->first('name') }}</span>
    @endif
    <br><br>
    <label>title</label><br>
    <input type="text" name="title" value="{{ $product->title }}"><br><br>
    <label>price</label><br>
    <input type="number" name="price" value="{{ $product->price }}"><br><br>
    <label>discount</label><br>
    <input type="number" name="discount" value="{{ $product->discount }}"><br><br>
    <label>imgUrl</label><br>
    <input type="text" name="imgUrl" value="{{ $product->imgUrl }}"><br><br>
    <input type="submit" value="Submit">
</form>
