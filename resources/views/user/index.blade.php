@extends('layouts.app')


@section('header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users Available</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6 text-right">
                <a href="#" data-toggle="modal" data-title="New User" data-target="#user-modal" title="Add new user" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add</a>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{$dataTable->table()}}
                </div>
            </div>
        </div>
    </div>
</section>

@include('user.modal')
@endsection

@push('scripts')
{{$dataTable->scripts()}}

<script>
    function updateUser(_flag, _user) {
        var msg = _flag == 0 ? 'blocked' : 'unblocked'; 
        $.post({
            url: "{{ route('user.status') }}",
            data: {
                flag: _flag,
                user: _user
            },
            success: function(response) {
                window.Toast.fire({
                    icon: 'success',
                    title: 'User '+ msg +' successfully.'
                });
                reloadTable('#users-table');
            }
        });
    }
</script>
@endpush