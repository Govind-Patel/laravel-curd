@extends('admin.layouts.masterlayouts')
@section('tittle','User Details')
@section('page')
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($showData as $k=>$row)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->address}}</td>
                                            <td>{{$row->mobile}}</td>
                                            <td>
                                                <a href="{{url('editUser/'.$row->id)}}" class="btn btn-sm btn-primary" title="Edit">Edit</a>
                                                <a href="{{url('deleteData/'.$row->id)}}" class="btn btn-sm btn-danger" title="Delete">Delete</a>
                                            </td>
                                        </tr>
                                    
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                 {{$showData->links("pagination::bootstrap-4")}}
                            </div>
                        </div>
                    </div>

                </div>

@endsection