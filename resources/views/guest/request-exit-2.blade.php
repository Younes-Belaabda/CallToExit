@extends('layouts.guest')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">طلب إستئذان</h4>
                    <p class="text-muted mb-0">Using class <code>.nav-justified</code>, you can force your <code>tab menu
                            items</code> to use the full available width.</p>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <span class="nav-link rounded-0">
                                المرحلة الأولى
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="#home1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                المرحلة التانية
                            </a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link rounded-0">
                                المرحلة الثالثة
                            </span>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="home1">
                            <form action="" method="post">
                                @csrf
                                <label for="eID" class="mb-2">المرجو إدخال رقم هوية الطالب </label>
                                <input type="text" name="eID" class="form-control mb-2">
                                <button class="btn btn-success">التالي</button>
                            </form>
                            <form action="" method="post">
                                @csrf
                                <label for="eID" class="mb-2">المرجو اختيار الطلاب</label>
                                <button class="btn btn-success">التالي</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection