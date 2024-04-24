<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <thead>
            <th>الإسم الثلاثي</th>
            <th>رقم الهوية</th>
            <th>الصف</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select name="name" id="">
                        @foreach ($headings as $heading)
                            <option value="{{ $heading }}">{{ $heading }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="eID" id="">
                        @foreach ($headings as $heading)
                            <option value="{{ $heading }}">{{ $heading }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="grade_id" id="">
                        @foreach ($headings as $heading)
                            <option value="{{ $heading }}">{{ $heading }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <button>تأكيد الرفع</button>
</form>
