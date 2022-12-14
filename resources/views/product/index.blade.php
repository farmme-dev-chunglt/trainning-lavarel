<a href="{{ route('product.create') }}">Add</a>
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
                <a href="{{ route('product.edit', $item) }}">Edit</a>
            </th>
            <th>
                <form action="{{ route('product.destroy', $item) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </th>
            <th>
                <form action="{{ route('product.softDestroy', $item) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>softDestroy</button>
                </form>
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
