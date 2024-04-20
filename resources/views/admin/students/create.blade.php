@extends('layouts.app')

@section('content')
    <div class="col-12">
         <a href="{{ route('admin.students.index') }}" class="btn btn-success btn-sm mb-2">الرجوع</a>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.students.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="eID">رقم الهوية</label>
                        <input class="form-control" type="text" name="eID">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">الإسم الثلاثي</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="grade_id">الصف</label>
                        <select class="form-control" name="grade_id">
                            @foreach (\App\Models\Grade::all() as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success btn-sm">إنشاء</button>
                </form>
            </div>
        </div>
    </div>
@endsection
