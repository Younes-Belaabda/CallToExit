@extends('layouts.app')

@section('content')
    <div class="col-12">
        <a href="" class="btn btn-success btn-sm mb-2">إنشاء</a>
        <div class="card">
            <div class="card-body">
                <div class="responsive-table-plugin">
                    <div class="table-rep-plugin">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th data-priority="3">هوية ولي الأمر</th>
                                        <th data-priority="1">السبب</th>
                                        <th data-priority="1">الطلاب</th>
                                        <th data-priority="1">الحالة</th>
                                        <th data-priority="1">تاريخ الطلب</th>
                                        <th data-priority="6">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $request)
                                    <tr>
                                        <td>{{ $request->requested_by }}</td>
                                        <td>{{ $request->reason }}</td>
                                        <td>
                                            <div class="badge bg-warning">
                                                {{ \App\Enums\ExitRequestStatusEnum::PROGRESS }}
                                            </div>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-success">عرض الطلب</a>
                                        </td>
                                        <td>
                                            {{ $request->created_at->format('d-m-Y | H:i') }}
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <form action="{{ route('admin.requests.approve' , ['request' => $request]) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-success">قبول</button>
                                                </form>
                                                <form action="{{ route('admin.requests.reject' , ['request' => $request]) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-danger">رفض</button>
                                                </form>
                                            </div>
                                        </td>
                                        {{-- <td>
                                            <a href="{{ route('request.requests.show' , ['request' => $request]) }}" class="btn btn-warning btn-sm">عرض</a>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end .table-responsive -->

                    </div> <!-- end .table-rep-plugin-->
                </div> <!-- end .responsive-table-plugin-->
            </div>
        </div> <!-- end card -->
    </div> <!-- end col -->
@endsection

@section('styles')
    <link href="{{ asset('assets/css/vendor/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
