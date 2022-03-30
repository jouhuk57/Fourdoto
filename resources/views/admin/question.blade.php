<!--users start-->
@extends('layouts.admin')
@section('content')
<div class="panel"><table class="table ">
<div class="container mt-5">
    <h2 class="mb-4" style="display: inline-block;">Questions</h2>
    <button type="button" class="btn btn-primary" style="display: inline-block;">Create</button>
    <table class="table table-striped title1 yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Question</th>
                <th>Department</th>
                <th>Sub Department</th>
                <th>Access Level</th>
                <th>Answer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
    
</div>

<!--user end-->




<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('question.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'question_description', name: 'question_description'},
            {data: 'department', name: 'department'},
            {data: 'subdepartment', name: 'subdepartment'},
            {data: 'accesslevel', name: 'accesslevel'},
            {data: 'no_of_choices', name: 'no_of_choices'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>

@endsection