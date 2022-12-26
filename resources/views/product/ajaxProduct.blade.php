<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('ajax.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'discount',
                    name: 'discount'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $('#createNewProduct').click(function() {
            $('#name').val('');
            $('#description').val('');
            $('#price').val('');
            $('#discount').val('');
            $('#imgUrl').val('');
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#bookForm').serialize(),
                url: "{{ route('ajax.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    $('#productForm').trigger("reset");
                    $('#form').modal('hide');
                    $('.modal-backdrop').hide();
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteProduct', function() {

            let ajax = $(this).attr("data-id");
            let url = '{{ route('ajax.destroy', ':ajax') }}';
            url = url.replace(':ajax', ajax);
            confirm("Are You sure want to delete !");
            $.ajax({
                type: "DELETE",
                url: url,
                success: function(data) {
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
        $('body').on('click', '.edit', function() {
            let ajax = $(this).attr("data-id");
            let url = '{{ route('ajaxGetItemEdit', ':ajax') }}';
            url = url.replace(':ajax', ajax);
            $.ajax({
                type: "get",
                url: url,
                success: function(data) {
                    $('#name').val(data.name);
                    $('#description').val(data.description);
                    $('#price').val(data.price);
                    $('#discount').val(data.discount);
                    $('#imgUrl').val(data.imgUrl);
                    $('#form').modal('show');
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
    })
</script>
