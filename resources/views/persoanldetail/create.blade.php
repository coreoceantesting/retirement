@extends('layouts.admin')

@section('title')
Create Personal Create
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add New User</h3>
        <div class="card-tools">
                <a href="{{ route('personaldetail.index') }}" class="btn btn-danger"><i class="fa fa-shield-alt"></i> Back</a>
        </div>
    </div>
    <form method="POST" action="{{ route('personaldetail.store') }}"  enctype="multipart/form-data" onsubmit="return validateForm()">
        @csrf
        <div class="card-body">
         <div class="form-group">

                <div class="row">
                        <div class="col-md-3">
                            <label> First Name <span style="color: red;">*</span></label>
                            <input type="text" name="first_name"  id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label> Middle Name <span style="color: red;">*</span></label>
                            <input type="text" name="middle_name"  id="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}" required >
                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label> Last Name <span style="color: red;">*</span></label>
                            <input type="text" name="last_name"  id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required >
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-3">
                            <label> Date Of Birth <span style="color: red;">*</span></label>
                            <input type="date" onchange="fnCalculateAge();"   name="date_of_birth"  id="txtDOB" class="form-control @error('date_of_birth') is-invalid @enderror" maxlength="10" placeholder="mm/dd/yyyy"  value="{{ old('date_of_birth')  }}" required >
                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div><br>


                <div class="row">
                        <div class="col-lg-3">
                                <label class="control-label" for="inputEmail3">Gender <span style="color: red;">*</span></label>
                                <select class="form-control valdation_select" name="gender" required>
                                <option value='male' > Male</option>  
                                <option value='female'> Female </option>   
                                <option value='other'> Other </option>   
                            </select>         
                        </div>
                        <div class="col-lg-3">
                            <label>  Mobile No <span style="color: red;">*</span> </label>
                                <input type="text"  name="mobile_no"  id="mobile_no" pattern="[0-9]{10}" title="Please enter a 10-digit mobile number"  class="form-control @error('mobile_no') is-invalid @enderror" value="{{ old('mobile_no') }}"  required>
                                    @error('mobile_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                         </div>    
                         <div class="col-lg-3">
                                <label> Email <span style="color: red;"></span></label>
                                <input type="email"  name="email"  id="email"  class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>   
                        <div class="col-lg-3">
                            <label>  Aadhar Card No <span style="color: red;">*</span></label>
                            <input type="text"  name="aadhaar_no"  id="aadhaar_no"  pattern="[0-9]{12}" placeholder="Must be a 12-digit number."  class="form-control @error('aadhaar_no') is-invalid @enderror" value="{{ old('aadhar_card') }}"   required>
                            @error('aadhaar_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                 </div><br>

                <div class="row">
                        <div class="col-lg-3">
                            <label>  Retirement Date <span style="color: red;">*</span></label>
                            <input type="date"  name="retirement_date"  id="retirement_date"  class="form-control @error('retirement_date') is-invalid @enderror" value="{{ old('retirement_date') }}" required  >
                            @error('retirement_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-3">
                            <label>  Address  </label>
                            <textarea type="textarea"  name="address"  id="address"  rows="2" cols="80" style="width: auto;" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"   ></textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                 </div><br>

                 <div class="row">
                        <div class="col-lg-3">
                            <label>  Live Photo <span style="color: red;">*</span></label>
                            <input type="file"  name="live_photo"  id="live_photo"  class="form-control @error('live_photo') is-invalid @enderror" value="{{ old('live_photo') }}" required  >
                            @error('live_photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-3">
                            <label>  Live Video <span style="color: red;">*</span></label>
                            <input type="file"  name="live_video"  id="live_video"   style="width: auto;" class="form-control @error('live_video') is-invalid @enderror" value="{{ old('live_video') }}"   ></input>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                 </div><br>


            <!-- ------------------------------Documents Start--------------------------- -->
            <h4> Documents: </h4>
            <div class="panel panel-footer">
                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                    <thead>
                            <tr>
                                <th width="50%">Document Type</th>
                                <th width="50%">Image  <small style="color: red;">*</small> </th>
                                <th><a href="javascip:" class="btn btn-sm btn-success addDocuments"><i class="fa fa-plus"></i> </a></th>
                            </tr>
                    </thead>
                    <tbody id="documents">
                        <tr>
                            <td width="50%">   
                                <select class="form-control select2" name="document_type[]" id="document_type" required>
                                    <option value="">-select-</option>
                                    @foreach ($document as $data)
                                      <option value="{{ $data->document_type_id  }}">{{ $data->document_type_name }}</option>
                                    @endforeach 
                                </select>  
                            </td>
                            <td width="50%"><input type="file" name="document_path[]" class="form-control" multiple="" required></td>    
                            <!-- <td><a href="javascip:" class="btn btn-sm btn-danger removeDocuments disabled"><i class="fa fa-remove"></i></a></td> -->
                        <tr>
                    </tbody>
                </table>
             </div><br>
            <!--------------------------------Documents End--------------------------- -->

         </div>
     </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Create </button>
        </div>
       
        

       
    </form>
</div>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js" defer></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}" defer> </script>

<script type="text/javascript">
$(document).ready(function(){

// --------------------------Documents Start-------------------
$('.addDocuments').on('click',function(){
    addDocuments();
  });

  function addDocuments(){
    var tr='<tr>'+
    '<td width="50%"><select class="form-control select2" name="document_type[]" id="document_title" required><option value="">-select-</option>@foreach ($document as $data)<option value="{{ $data->document_type_id  }}">{{ $data->document_type_name }}</option>@endforeach</select></td>'+
    '<td width="50%"><input type="file" name="document_path[]" class="form-control" multiple=""></td>'+
    '<td><a href="javascrip:" class="btn btn-sm btn-danger removeDocuments"><i class="fa fa-remove"></i></a></td>'
    '<tr>';
    $('#documents').append(tr);
  };

   //  Check for duplicate dropdown values
   $(document).on('change', 'select[name="document_type[]"]', function () {
        var selectedValue = $(this).val();
        var duplicateCount = $('select[name="document_type[]"]').filter(function () {
            return $(this).val() === selectedValue;
        }).length;

        if (duplicateCount > 1) {
            alert('Document Type already selected in another dropdown. Please choose a different dropdown.');
            // alert('Duplicate value selected. Please choose a different value.');
            $(this).val(''); // Reset the value
        }
    });

    $('.removeDocuments').live('click',function () {
            $(this).parent().parent().remove();
    });
  });
// --------------------------Documents End-------------------




</script> 
@stop
