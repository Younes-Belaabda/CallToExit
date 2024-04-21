@extends('layouts.app')

@section('content')
    <div class="col-12">
         <a href="{{ route('admin.fathers.index') }}" class="btn btn-success btn-sm mb-2">الرجوع</a>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.fathers.update' , ['father' => $father]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="eID">رقم الهوية</label>
                        <input class="form-control" type="text" name="eID" value="{{ old('eID' , $father->eID) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">الإسم الثلاثي</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name' , $father->name) }}">
                    </div>
                    <button class="btn btn-warning btn-sm">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
