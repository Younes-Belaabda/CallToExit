@extends('layouts.app')

@section('content')
    <div class="col-12">
        <a href="{{ route('admin.reasons.index') }}" class="btn btn-success btn-sm mb-2">الرجوع</a>
        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label class="form-label" for="name">السبب</label>
                    <input class="form-control" type="text" name="name" value="{{ $reason->name }}">
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.reasons.edit', ['reason' => $reason]) }}" class="btn btn-success btn-sm">تعديل</a>
                    <form id="form-delete" class="prevent-submit"
                        action="{{ route('admin.reasons.destroy', ['reason' => $reason]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#form-delete').on('submit', function(e) {
                if ($(this).hasClass('prevent-submit')) {
                    e.preventDefault();
                }

                Swal.fire({
                    title: "تأكيد عملية الحذف .",
                    showCancelButton: true,
                    confirmButtonText: "تأكيد",
                    cancelButtonText: `تراجع`
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).removeClass('prevent-submit');
                        $(this).submit();
                    }
                });

            });
        })
    </script>
@endsection
