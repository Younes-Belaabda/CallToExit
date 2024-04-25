@extends('layouts.app')

@section('content')
    <div class="col-12">
         <a href="{{ route('admin.reasons.index') }}" class="btn btn-success btn-sm mb-2">الرجوع</a>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.reasons.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">السبب</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <button class="btn btn-success btn-sm">إنشاء</button>
                </form>
            </div>
        </div>
    </div>
@endsection
