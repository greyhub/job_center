@extends('layouts.admin')
@section('main_content')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Quản lý người dùng</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
            <li class="breadcrumb-item active">{{ $name }}</li>
        </ol>
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                @if ($name == 'user' )
                Danh sách người dùng
                @else
                Danh sách Admin
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="d-flex">
                                <th class="col-1">STT</th>
                                <th class="col-2">Email</th>
                                <th class="col-2">Tên</th>
                                <th class="col-3">Họ và tên đệm</th>
                                <th class="col-2">Ngày sinh</th>
                                <th class="col-2">Giới tính</th>
                                <th class="col-2">Thành phố</th>
                                <th class="col-2">Ngành nghề</th>
                                <th class="col-2">Ngày đăng ký</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <tr class="d-flex">
                                <th class="col-1">STT</th>
                                <th class="col-2">Email</th>
                                <th class="col-2">Tên</th>
                                <th class="col-3">Họ và tên đệm</th>
                                <th class="col-2">Ngày sinh</th>
                                <th class="col-2">Giới tính</th>
                                <th class="col-2">Thành phố</th>
                                <th class="col-2">Ngành nghề</th>
                                <th class="col-2">Ngày đăng ký</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($users as $user)
                            <tr class="d-flex">
                                <td class="col-1">{{ $i++ }}</th>
                                <td class="col-2">{{ $user->email }}</th>
                                <td class="col-2">{{ $user->first_name }}</th>
                                <td class="col-3">{{ $user->last_name ?? '' }}</th>
                                <td class="col-2">{{ $user->birthday ?? '' }}</th>
                                <td class="col-2">{{ $user->gender ?? '' }}</th>
                                <td class="col-2">{{ $user->city->name ?? '' }}</th>
                                <td class="col-2">{{ $user->sector ?? '' }}</th>
                                <td class="col-2">{{ $user->created_at ?? '' }}</th>
                                <td class="col-2">
                                    <form class="delete" action="{{ route('admin.edit', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        @if ($name == 'user')
                                        <input type="text" name="role" value="{{ 'admin'}}" hidden="true">
                                        <button id="btn-delete" class="btn btn-success float-left" type="submit">
                                            +A
                                        </button>
                                        @else
                                        <input type="text" name="role" value="{{ 'user' }}" hidden="true">
                                        <button id="btn-delete" class="btn btn-success float-left" type="submit">
                                            -A
                                        </button>
                                        @endif
                                    </form>
                                    <form class="delete" action="{{ route('user.delete', $user->id) }}" method="POSt">
                                        @csrf
                                        @method('DELETE')
                                        <button id="btn-delete" class="btn btn-danger float" type="submit">
                                        <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</main>
@endsection
