@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1 class="m-0 text-dark">Users</h1>
@stop

@section('content')
    <div class="max-1200">
        <div class="card">
            <div class="card-header row">
                <div class="col-4">
                    <select id="filter-role" class="form-control">
                        <option value="">Filter Role</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-body table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@stop


@push('js')
    {{ $dataTable->scripts() }}
    <script>
        var finishDraw = true;

        $('#filter-role').on('change', function() {
            var id = $(this).val();
            if (id == "" || id == null || id == "-") {  
                filterTable()
                return;
            }
            filterTable()
        })

        function filterTable() {
            if (finishDraw === false) return;

            var roleId = $('#filter-role').val()

            if(roleId == "" || roleId == null || roleId == "-"){
                window.LaravelDataTables["user-table"].column(3).search("");
            }else{
                window.LaravelDataTables["user-table"].column(3).search(roleId);
            }

            window.LaravelDataTables["user-table"].draw();
            finishDraw = false;
        }

        $("#user-table").on('draw.dt', function() {
            // finish draw
            finishDraw = true;

            $('.btn-delete').on('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $(e.target).parent().submit();
                    }
                });
            })
        });
    </script>
@endpush