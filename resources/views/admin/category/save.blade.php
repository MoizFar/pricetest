@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
@endsection

@section('content')
    <div class="content-body">
    <section id="basic-input">
                            
                                           <form action="{{ url('admin/saveproduct-category') }}" class="" id="form_submit" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    Category Name
                                                                </label>
                                                                <input  class="form-control" name="name" type="text" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}">
                                                                </input>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                                               <button type="submit" class="btn btn-success mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>
                                               <a href="{{url('admin/categories')}}" class="btn btn-danger">Back</a>
                                            </input>
                                            </input>
                                        </form>
                                


 </section>
</div>
@endsection
@section('js')
    <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script type="text/javascript">
        $('.tariningR').addClass('sidebar-group-active');
        $('.classrooms').addClass('active');
        window.ResetValidationForm = "{{(isset($data['results']->id) ? $data['results']->id : 0)}}"
        window.formValidationObj = $('#form_submit').validate({
            rules: {
                'name': {
                    required: true, 
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
