@extends('layouts.app')

@section('content')
    <div class="col-12">
         <a href="{{ route('admin.students.index') }}" class="btn btn-success btn-sm mb-2">الرجوع</a>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.students.update' , ['student' => $student]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="eID">رقم الهوية</label>
                        <input class="form-control" type="text" name="eID" value="{{ old('eID' , $student->eID) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">الإسم الثلاثي</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name' , $student->name) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="grade_id">الصف</label>
                        <select class="form-control" name="grade_id">
                            @foreach (\App\Models\Grade::all() as $grade)
                                <option @selected($grade->id == $student->grade_id) value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-warning btn-sm">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
