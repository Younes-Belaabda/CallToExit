@extends('layouts.app')

@section('content')
    <div class="badge bg-danger">علاقة مع الطلاب</div>
    <div class="badge bg-danger">{{ $father->name }}</div>
    <div class="col-12">
        <a href="{{ route('admin.fathers.index') }}" class="btn btn-success btn-sm mb-2">الرجوع</a>
        <div class="card">
            <div class="card-body">
                <form id="form-create" action="{{ route('admin.fathers.store.students', ['father' => $father]) }}"
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

@section('styles')
    {{-- <style>
        #
    </style> --}}
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

            $('#form-create').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                        method: "POST",
                        url: $(this).attr('action'),
                        data: $(this).serialize()
                    })
                    .done(function(response) {
                        var eIDs_status = JSON.parse(response);
                        var is_completed = true;
                        $.each(eIDs_status.status, function(index, el) {
                            var bg_status = 'border-success';
                            if (el.status == false) {
                                bg_status = 'border-danger';
                                is_completed = false;
                            }
                            $('input[name="eIDs[]"]').eq(index).addClass(bg_status);
                        })

                        $('input[name="eIDs[]"]').promise().done(function() {
                            if (is_completed) {
                                Swal.fire({
                                    title: "معلومات الطلاب صحيحة .",
                                    html: "إضغظ على تأكيد لربط الطلاب",
                                    showCancelButton: true,
                                    confirmButtonText: "تأكيد",
                                    cancelButtonText: `تراجع`
                                }).then((result) => {
                                    // if (result.isConfirmed) {
                                    //     $(this).removeClass('prevent-submit');
                                    //     $(this).submit();
                                    // }
                                });
                            }
                        });
                    });
            });
        });
    </script>
@endsection
