@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')
    {{ csrf_field() }}
    <section id="basic-datatable">
                   
                                    
                                    <a class="btn btn-success" href="{{url('admin/product-category')}}">Add Categories</a>
                              
                                <br>
                                   <div class="card-datatable p-2">
                                    <table class="table dynamic_table">
                                        <thead>
                                             <tr role="row">
		                                        <th>Sr No</th>
		                                        <th> Name</th>
                                                <th>Action</th>
                                   			 </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($data['results'] as $key=>$value)
                                   		 <tr>
                                        <td> {{$key+1}}</td>
                                        <td>{{$value->name}}</td>
                                             <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{url('admin/product-category/'.$value->id)}}">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a data-href="{{url('admin/deleteproduct-category/'.$value->id)}}" class="dropdown-item removeItemWithConfirm" href="javascript:void(0);">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        <span>Delete</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                          </section>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
             
            </div>
            <div class="modal-body">
                Confirm
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                <a href='' class="btn btn-primary btn-ok test _confirmItemDelete">Delete</a>
            </div>
        </div>
    </div>
</div>


@endsection


@section('js')

    <script type="text/javascript">
        $(document).ready(function() {
            $('.dynamic_table').DataTable();
             $('.dynamic_table').on( 'draw.dt', function () {
                feather.replace();
            });
            $('.tariningR').addClass('sidebar-group-active');
            $('.classrooms').addClass('active');
        });
    </script>
@endsection
