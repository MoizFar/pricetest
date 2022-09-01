@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">
@endsection
@section('content')

<div class="content-body">
    <section id="basic-input">
       
                <form action="{{ url('admin/saveproduct') }}" class="form-group" id="form_submit" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Title </label>
                                <input class="form-control" name="title" type="text" value="{{(isset($data['results']->id) ? $data['results']->title : '')}}">
                            </div>
                        </div>
                        
                       
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" data-option-id="{{(isset($data['results']->id) ? $data['results']->status : '')}}">
                                    <option value="">Select</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                        </div>
                      

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Categories</label>
                                <select name="category_id" class=" form-control" data-option-id="{{(isset($data['results']->id) ? $data['results']->category_id : '')}}">
                                    @foreach($data['categories'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                         <div class="row">
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label>Price </label>
                                <input class="form-control" name="price" type="text" value="{{(isset($data['results']->id) ? $data['results']->price : 0)}}">
                            </div>
                        </div>


                    
                   
                        
                      

                    </div>

                 
                   
                    <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                    <button type="submit" class="btn btn-success mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                    <a class="btn btn-danger" href="{{url('admin/products')}}">Back</a>

                </form>

            

    </section>
</div>
@endsection


@section('js')
<script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/forms/form-select2.js')}}"></script>

<script type="text/javascript">
    $('.tariningR').addClass('sidebar-group-active');
    var type = 'post';
    $('.' + type).addClass('active');

   


    $('select.classrooms').select2({
        dropdownAutoWidth: true,
        width: '100%',
        placeholder: 'Select '
    });

 
       

    window.ResetValidationForm = "{{(isset($data['results']->id) ? $data['results']->id : 0)}}"
    window.formValidationObj = $('#form_submit').validate({
        rules: {
            'title': {
                required: true,
                normalizer: function(value) {
                    return $.trim(value);
                }
            },
           
            'status': {
                required: true,
                normalizer: function(value) {
                    return $.trim(value);
                }
            },
           
            'user_id': {
                required: true,
                normalizer: function(value) {
                    return $.trim(value);
                }
            },
            'price': {
                required: true,
                number: true,
                normalizer: function(value) {
                    return $.trim(value);
                }
            },
        }
    });
</script>
    <!-- form submission -->
    <script src="{{asset('/app-assets/js/scripts/forms/submitter.js')}}"></script>
@endsection