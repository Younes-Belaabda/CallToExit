@extends('layouts.app')

@section('content')
    <div class="col-12">
         <a href="{{ route('admin.staffs.index') }}" class="btn btn-success btn-sm mb-2">الرجوع</a>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.staffs.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">الإسم الثلاثي</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="email">البريد الإلكتروني</label>
                        <input class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="password">كلمة المرور</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <button class="btn btn-success btn-sm">إنشاء</button>
                </form>
            </div>
        </div>
    </div>
@endsection
