@extends('layouts.app')

@section('content')
    <div class="badge bg-danger">علاقة مع أولياء الأمور</div>
    <div class="badge bg-danger">{{ $student->name }}</div>
    <div class="col-12">
        <a href="{{ route('admin.students.index') }}" class="btn btn-success btn-sm mb-2">الرجوع</a>
        <div class="card">
            <div class="card-body">
                <form id="form-create" action="{{ route('admin.students.store.fathers', ['student' => $student]) }}"
                    method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <button id="btn-repeater" class="btn btn-info btn-sm" type="button">إضافة سطر جديد</button>
                        <button class="btn btn-success btn-sm">إنشاء</button>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="eIDs">رقم الهوية</label>
                        <input class="form-control" type="text" name="eIDs[]" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function remove_repeater(el) {
            $(el).parent().remove();
        }

        $(function() {
            $('#btn-repeater').click(function() {
                var repeater = `<div class="form-group mb-3">
                        <label class="form-label" for="eIDs">رقم الهوية</label>
                        <input class="form-control mb-1" type="text" name="eIDs[]" required>
                        <button type="button" onclick="remove_repeater(this)" class='btn btn-danger btn-sm'>حذف</button>
                    </div>`;
                $('#form-create').append(repeater);
            });
        });
    </script>
@endsection
