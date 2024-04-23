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
                            <a href="#home1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                المرحلة الأولى
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile1" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                المرحلة التانية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                المرحلة الثالثة
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="home1">
                            <form action="" method="post">
                                @csrf
                                <label for="eID" class="mb-2">المرجو إدخال رقم الهوية</label>
                                <input type="text" name="eID" class="form-control mb-2">
                                <button class="btn btn-success">التالي</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="profile1">
                            <div class="alert alert-warning">
                                المرجو إدخال رقم الهوية لظهور الطلاب
                            </div>
                        </div>
                        <div class="tab-pane" id="settings1">
                            <p>Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                                ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
                                consequat massa quis enim.</p>
                            <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim
                                justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis
                                pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate
                                eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
