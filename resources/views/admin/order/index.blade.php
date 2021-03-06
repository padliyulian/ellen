@extends('layouts.custome')

@section('content')

    @if (@isset($status))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{$status}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>    
    @endif

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table data-order='[[ 0, "desc" ]]' id="order-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Product</th>
                            <th>Total Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="{{ asset('/js/jquery-3.3.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript">
        // data table
        let table = $('#order-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{!! route('api.order.index') !!}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'product', name: 'product'},
                {data: 'total_order', name: 'total_order'},
                {data: 'action', name: 'action', orderable: false},
            ],
            columnDefs: [
                {
                    'targets': 0,
                    'className': 'text-center',
                }
            ],
        });

        // delete order
        $('body').on('click', '.js-order__delete', function (event) {
            event.preventDefault();

            let me = $(this),
                url = me.attr('href'),
                csrf_token = $('meta[name="csrf-token"]').attr('content');

            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url : url,
                        type : "POST",
                        data : {'_method' : 'DELETE', '_token' : csrf_token},
                        success : function(response) {
                            table.ajax.reload();
                            console.log(response);
                            swal.fire({
                                title: 'Success!',
                                text: 'Data has been deleted!',
                                type: 'success',
                            })
                        },
                        error : function () {
                            swal.fire({
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                type: 'error',
                                timer: '3000'
                            })
                        }
                    });
                }
            });
        });
    </script>
@endsection

