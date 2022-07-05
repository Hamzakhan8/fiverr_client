@extends('adminlte::page')

@section('title', 'customerlist')

@section('content_header')
    <h1>Customer List</h1>
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="box mt-3">
                <button type="button" class="btn float-right mb-3 btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add customerlist
                </button>
               
                <a href="#" class="btn float-right mr-3 mb-3 text-decoration-none text-white btn-success">Download csv File</a>

             <div class=" box-body">
          <table id="example1" class="table table-striped table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customerlists as $customerlist)
                <tr>
                    <td scope="row">{{ $customerlist->name }}</td>
                    <td>
                        <a href="{{route('customerlist.delete',$customerlist->id)}}"><i class="fa text-danger text-lg fa-trash" aria-hidden="true"></i></a> |<button type="button" data-toggle="modal" data-target="#exampleModal-{{ $customerlist->id }}" class="btn text-info btn-lg fa fa-edit" ></button>
                    </td>
                </tr>
                    </div>
                  </div>
                </div>
        <div class="modal fade" id="exampleModal-{{ $customerlist->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Campaign Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('customerlist.update', $customerlist->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Name</label>
                            <input type="text"  name="name" class="form-control" id="inputEmail4" required value="{{ $customerlist->name }}" >
                        </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Upload customer</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
                    @endforeach
                    </tbody>

                </table>
                </div>
            </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->



        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Campaign Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('customerlist.store')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Write customer Name" required >
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Add customer</button>
                    </form>
                 </div>
             </div>
         </div>
     </div>
  </div>
@stop
