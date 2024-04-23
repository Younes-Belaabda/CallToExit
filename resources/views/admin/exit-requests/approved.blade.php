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
                                        <th data-priority="1">تاريخ الطلب</th>
                                        <th data-priority="1">تاريخ القبول</th>
                                        {{-- <th data-priority="6">العمليات</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $request)
                                    <tr>
                                        <td>{{ $request->requested_by }}</td>
                                        <td>{{ $request->reason }}</td>
                                        <td>
                                            <a href="" class="btn btn-success">عرض الطلب</a>
                                        </td>
                                        <td>
                                            {{ $request->created_at->format('d-m-Y | H:i') }}
                                        </td>
                                        <td>
                                            {{ $request->updated_at->format('d-m-Y | H:i') }}
                                        </td>
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
