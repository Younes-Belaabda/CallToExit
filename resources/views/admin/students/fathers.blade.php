@extends('layouts.app')

@section('content')
    <div class="col-12">
        <a href="{{ route('admin.students.create.fathers' , ['student' => $student]) }}" class="btn btn-success btn-sm mb-2">إنشاء علاقة مع ولي أمر</a>
        <div class="card">
            <div class="card-body">
                <div class="responsive-table-plugin">
                    <div class="table-rep-plugin">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th data-priority="1">رقم الهوية</th>
                                        <th data-priority="3">الإسم الثلاثي</th>
                                        <th data-priority="6">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student->fathers as $connection)
                                    <tr>
                                        <td>{{ $connection->father->eID }}</td>
                                        <td>{{ $connection->father->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.fathers.show' , ['father' => $connection->father]) }}" class="btn btn-warning btn-sm">عرض</a>
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


