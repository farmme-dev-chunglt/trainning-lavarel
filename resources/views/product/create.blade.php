<form action="{{ route('product.store') }}" method="post">
    @csrf
    <label> name:</label><br>
    <input type="text" name="name">
    @if ($errors->has('name'))
        <span>{{ $errors->first('name') }}</span>
    @endif
    <br><br>
    <label>title</label><br>
    <input type="text" name="title"><br><br>
    <label>price</label><br>
    <input type="number" name="price"><br><br>
    <label>discount</label><br>
    <input type="number" name="discount"><br><br>
    <label>imgUrl</label><br>
    <input type="text" name="imgUrl"><br><br>
    <input type="submit" value="Submit">
</form>
