@extends('layouts.app')

@section('content')
    <div class="col-12">
         <a href="{{ route('admin.admins.index') }}" class="btn btn-success btn-sm mb-2">الرجوع</a>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.admins.update' , ['admin' => $admin]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">الإسم الثلاثي</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name' , $admin->name) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="email">البريد الإلكتروني</label>
                        <input class="form-control" type="email" name="email" value="{{ old('name' , $admin->email) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="password">كلمة المرور</label>
                        <input class="form-control" type="text" name="password" value="{{ $admin->password }}">
                    </div>
                    <button class="btn btn-warning btn-sm">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
