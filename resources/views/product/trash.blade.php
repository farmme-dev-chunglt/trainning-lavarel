<a href="{{ route('product.index') }}">Home</a>
<a href="{{ route('product.trash') }}">Trash</a>
<table>
    <tr>
        <th> id </th>
        <th> name </th>
        <th> title </th>
        <th> price </th>
        <th> discount </th>
        <th> btn </th>
    </tr>
    @foreach ($product as $item)
        <tr>
            <th>{{ $item->id }}</th>
            <th>{{ $item->name }}</th>
            <th>{{ $item->title }}</th>
            <th>{{ $item->price }}</th>
            <th>{{ $item->discount }}</th>
            <th>
                <a href="{{ route('product.restore', $item->id) }}">restore</a>
            </th>
            <th>
                <a href="{{ route('product.deleteTrasher', $item->id) }}">delete</a>
            </th>
        </tr>
    @endforeach
</table>
{{ $product->onEachSide(5)->links() }}
<style>
    a {
        margin: 30px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .relative.z-0.inline-flex.shadow-sm.rounded-md {
        display: none !important;
    }
</style>