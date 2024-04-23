@extends('layouts.auth')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xxl-8 col-lg-10">
            <div class="card overflow-hidden">
                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-block p-2">
                        <img src="assets/images/auth-img.jpg" alt="" class="img-fluid rounded h-100">
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex flex-column h-100">
                            <div class="auth-brand p-4">
                                <a href="index.php" class="logo-light">
                                    <img src="assets/images/logo.png" alt="logo" height="22">
                                </a>
                                <a href="index.php" class="logo-dark">
                                    <img src="assets/images/logo-dark.png" alt="dark logo" height="22">
                                </a>
                            </div>
                            <div class="p-4 my-auto">
                                <h4 class="fs-20">تسجيل الدخول</h4>
                                <p class="text-muted mb-3">تسجيل الدخول  خاص بالمشرفين</p>

                                <!-- form -->
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">البريد الإلكتروني</label>
                                        <input class="form-control" type="email" name="email">
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="mb-3">
                                        <a href="auth-forgotpw.php" class="text-muted float-end"></a>
                                        <label for="password" class="form-label">كلمة المرور</label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                    {{-- <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                            <label class="form-check-label" for="checkbox-signin">Remember
                                                me</label>
                                        </div>
                                    </div> --}}
                                    <div class="mb-0 text-start">
                                        <button class="btn btn-soft-primary w-100" type="submit"><i
                                                class="ri-login-circle-fill me-1"></i> <span class="fw-bold">الدخول</span> </button>
                                    </div>

                                </form>
                                <!-- end form-->
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
@endsection
