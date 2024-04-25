@extends('layouts.guest')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="w-75 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">طلب إستئذان</h4>
                        <p class="text-muted mb-0">ملاحظة هامة : لابد من حضور ولي الأمر في حال خروج الطالب أثناء اليوم الدراسي
                    خلاف ذلك يمنع خروج الطالب من المدرسة حسب لوائح وزارة التعليم</p>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <button class="tab-phase tab-phase-1 nav-link rounded-0 active">
                                    المرحلة الأولى
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="tab-phase tab-phase-2 nav-link rounded-0">
                                    المرحلة التانية
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="tab-phase tab-phase-3 nav-link rounded-0">
                                    المرحلة الثالثة
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="home1">
                                <div class="phase phase-1">
                                    <form id="form-phase-1" action="{{ route('api.father.students') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="father_identity" class="mb-2">المرجو إدخال رقم الهوية</label>
                                            <input id="father-identity" type="text" name="father_identity" class="form-control mb-2" required>
                                        </div>
                                        <button class="btn btn-success">التالي</button>
                                    </form>
                                </div>
                                <div class="phase phase-2 d-none">
                                    <form id="form-phase-2" action="{{ route('api.student') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="student_identity" class="mb-2">المرجو إدخال رقم هوية الطالب</label>
                                            <input type="text" name="student_identity" class="form-control mb-2">
                                        </div>
                                        <button class="btn btn-success">التالي</button>
                                    </form>
                                </div>

                                <div class="phase phase-3 d-none">
                                    <form class="form-phase-3" action="{{ route('guest.request-exit-choose') }}" method="post">
                                        @csrf
                                        <div class="form-group students">

                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="reason" class="form-label mb-2">سبب طلب الإستئذان</label>
                                            <select class="form-control mb-2" name="reason_choice" id="">
                                                <option name="reason_choice">اختر سبب</option>
                                                @foreach (\App\Models\Reason::all() as $reason)
                                                    <option value="{{ $reason->name }}">{{ $reason->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="reason" class="form-label mb-2">في حالة عدم وجود السبب يمكنك كتابته</label>
                                            <textarea name="reason" id="reason" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <button class="btn btn-success">التالي</button>
                                    </form>
                                </div>

                                <div class="phase phase-4 d-none">
                                    <div class="alert alert-warning">سيتم مراجعة طلبك المرجو الإنتظار</div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@section('scripts')
    <script>
        function get_students(el) {
            return new Promise((res, rej) => {
                $.ajax({
                        method: el.attr('method'),
                        url: el.attr('action'),
                        data: el.serialize()
                    })
                    .done(function(response) {
                        res(response)
                    });
            });
        }

        function get_student(el) {
            return new Promise((res, rej) => {
                $.ajax({
                        method: el.attr('method'),
                        url: el.attr('action'),
                        data: el.serialize()
                    })
                    .done(function(response) {
                        res(response)
                    });
            });
        }

        $(function() {
            $('#form-phase-1').on('submit', function(e) {
                e.preventDefault();
                get_students($('#form-phase-1'))
                    .then((res) => {
                        $('.phase').addClass('d-none');
                        $('.' + res.phase).removeClass('d-none');
                        if (res.phase == 'phase-3') {
                            var html = '';
                            $.each(res.students, function(index, item) {
                                html += `<div class="badge bg-danger p-2 d-flex align-items-center gap-2 mb-2">
                                            <span>${item.name}</span>
                                            <input type="checkbox" name="eIDs[]" value="${item.id}" />
                                        </div>`;
                            });
                            $('.form-group.students').append(html);
                            $('.tab-phase').removeClass('active');
                            $('.tab-phase-2').addClass('active');
                        }
                    });
            });

            $('#form-phase-2').on('submit', function(e) {
                e.preventDefault();
                get_student($('#form-phase-2'))
                    .then((res) => {
                        $('.phase').addClass('d-none');
                        $('.' + res.phase).removeClass('d-none');
                        if (res.phase == 'phase-3') {
                            var html = '';
                            $.each(res.students, function(index, item) {
                                html += `<div class="badge bg-danger p-2 d-flex align-items-center gap-2">
                                            <span>${item.name}</span>
                                            <input type="checkbox" name="eIDs[]" value="${item.id}" />
                                        </div>`;
                            });
                            $('.form-group.students').append(html);
                            $('.tab-phase').removeClass('active');
                            $('.tab-phase-2').addClass('active');
                        }
                    });
            });

            $('.form-phase-3').on('submit', function(e) {
                e.preventDefault();
                var data = $('.form-phase-3').serializeArray();
                data.push({name:'requested_by' , value: $('#father-identity').val()});
                data = $.param(data);
                $.ajax({
                        method: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: data,
                    })
                    .done(function(res) {
                        $('.phase').addClass('d-none');
                        $('.phase-4').removeClass('d-none');
                        $('.tab-phase').removeClass('active');
                        $('.tab-phase-3').addClass('active');
                    })
                    .fail(function(jqXHR , response) {
                        console.dir(jqXHR);
                        console.dir(response);
                        Swal.fire({
                            title: "هناك خطأ",
                            text: 'المرجو إختيار الطلاب مع وضع السبب',
                            icon: "warning"
                        });
                    })
            });
        });
    </script>
@endsection
