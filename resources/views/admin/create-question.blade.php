
@extends('layouts.admin')
@section('content')

<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b> Question Data Entry</b></span><br /><br />
<div class="col-md-3"></div><div class="col-md-6"> 

@if ($errors->all())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="form-horizontal title1" name="form" action="{{route('manager.storeQuestion')}}"  method="POST">
@csrf
<fieldset>

<div class="form-group">
<label class="col-md-12 control-label" for="department"></label>  
<div class="col-md-12">
<select placeholder="Choose department " class="form-control input-md" name="department"  value="{{ old('department') }}"  autofocus>
  <option value="">Choose department *</option>
  @foreach($departments as $department)
  <option value="{{$department->id}}">{{$department->department_name}}</option>
  @endforeach
</select>

</div>
</div>


<div class="form-group">
<label class="col-md-12 control-label" for="department"></label>  
<div class="col-md-12">
<select placeholder="Choose Sub Department " class="form-control input-md" name="sub_department"  value="{{ old('sub_department') }}"  >
<option value=""> Choose Sub Department *</option>
 @foreach($subdepartments as $subdepartment)
  <option value="{{$subdepartment->id}}">{{$subdepartment->sub_department_name}}</option>
 @endforeach
</select>

</div>
</div>


<div class="form-group">
<label class="col-md-12 control-label" for="department"></label>  
<div class="col-md-12">
<select placeholder="Choose Access Level " class="form-control input-md" name="access_level"  value="{{ old('access_level') }}" >
  <option value="">Choose Access Level *</option>
 @foreach($access_levels as $access_level)
  <option value="{{$access_level->id}}">{{$access_level->level_name}}</option>
 @endforeach
</select>

</div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="question"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="question" class="form-control" placeholder="Write question here...">
  {{ old('question') }}
  </textarea>  
 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="question-picture"></label>  
  <div class="col-md-12">
  <input id="question-image" name="question_image" placeholder="Please upload the image" class="form-control input-md" type="file" value="{{ old('question-image') }}">
  <img src="#" id="category-img-tag" width="200px" />   
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="answer"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="answer" class="form-control" placeholder="Write answer here..." value="">{{ old('answer') }}</textarea> 

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="answer-picture"></label>  
  <div class="col-md-12">
  <input id="answer-image" name="answer_image" placeholder="Please upload the image" class="form-control input-md" type="file" value="{{ old('answer-image') }}">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="video"></label>  
  <div class="col-md-12">
  <input id="video-link" name="video_link" placeholder="Please paste video the embedded link" class="form-control input-md" type="text" value="{{ old('video-link') }}">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total-no-choices"></label>  
  <div class="col-md-12">
  <input id="choice" name="choice" placeholder="Enter total number of choices *" class="form-control input-md" type="number" value="4">

 </div>
</div>


<div id="optionbox"></div>

<div class="form-group">
<label class="col-md-12 control-label" for="department"></label>  
<div class="col-md-12">
<select placeholder="Choose Access Level " class="form-control input-md" id='currect_answer' name="currect_answer">
  <option value="">Select Currect Answer</option> 
</select>
</div>
</div>



<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>


<script>

$(document).ready(function() {

  $( "#category-img-tag" ).hide();
for (i = 1; i <= $("#choice").val(); i++) {
  $('#optionbox').append('<div class="form-group"><label class="col-md-12 control-label" for=""><div class="col-md-12"> <input name="optionid['+i+']" type="text" id="boxid['+i+']" placeholder="Option  '+(i)+'"  class="form-control input-md" ></div></div>');
 }

$("#currect_answer option").remove();

$('#currect_answer').append('<option value="">Select Currect Answer</option> ')

for (i = 1; i <= $("#choice").val(); i++)
{
  $('#currect_answer').append('<option value="'+i+'">Option '+i+'</option>')
}

  $('#choice').change(function() {
    $("#optionbox input").remove();
    
    for (i = 1; i <= $("#choice").val(); i++) {
      $('#optionbox').append('<div class="form-group"><label class="col-md-12 control-label" for=""><div class="col-md-12"> <input name="optionid['+i+']" type="text" id="boxid['+i+']" placeholder="Option  '+(i)+'" class="form-control input-md" ></div></div>');
    }

    $("#currect_answer option").remove();

    $('#currect_answer').append('<option value="">Select Currect Answer</option> ')

    for (i = 1; i <= $("#choice").val(); i++)
    {
      $('#currect_answer').append('<option value="'+i+'">Option '+i+'</option>')
    }
    
  });



});


function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#category-img-tag').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#question-image").change(function(){
        readURL(this);
        $( "#category-img-tag" ).show();
    });

</script>

@endsection