@extends('adminlte::page')

@section('title', 'Campaign')

@section('content_header')
    <h1>Compaign List</h1>
@stop
@section('content')
<div class="row d-block">
    <section class="p-4">
        <!-- Tabs navs -->
        <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="ex1-tab-1" data-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Campaign</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex1-tab-2" data-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Opticians</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex1-tab-3" data-toggle="tab" href="#ex1-tabs-3" role="tab" aria-controls="ex1-tabs-3" aria-selected="false">Customer List</a>
          </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content col-12" id="ex1-content">
          <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{-- displaying errors from components --}}
                        <div class="errors">
                            <x-errors.error/>
                        </div>
                        <button type="button" class="btn float-right mb-3 btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Campaign
                        </button>
                        <div class="box mt-3">
                            <div class=" box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Active Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!($campaigns)->isEmpty())
                                            @foreach ($campaigns as $campaign)
                                                <tr>
                                                    <td scope="row">{{ $campaign->name }}</td>
                                                    <td>
                                                        <form action="{{ route('campaigns.update', $campaign->id) }}" method="post">
                                                            @csrf
                                                            @method("PUT")
                                                            @if ( $campaign->active  == 1)
                                                                <button type="submit" class="btn text-white btn-success btn-sm">Active</button>
                                                            @elseif($campaign->active == 0)
                                                                <button type="submit" class="btn text-white btn-danger btn-sm">In Active</button>
                                                            @endif
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a class="text-danger" href="{{ route('campaigns.delete', $campaign->id) }}">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a> |
                                                        <a data-toggle="modal" data-target="#exampleModal-{{ $campaign->id }}" class="text-success" >
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="exampleModal-{{ $campaign->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Campaign Edit</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="GET" action="{{ route('campaigns.edit', $campaign->id) }}">
                                                                @csrf
                                                                <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="inputEmail4">Name</label>
                                                                    <input type="text"  name="name" class="form-control" id="inputEmail4" required value="{{ $campaign->name }}" >
                                                                </div>

                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Upload customer</button>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                            @endforeach
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box mt-3">
                            <div class=" box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!($campaigns)->isEmpty())
                                            @foreach ($campaigns as $campaign)
                                                @foreach ($campaign->customer_lists as $customer_list)
                                                        <tr>
                                                            <td scope="row">{{ $customer_list->opticians->name }}</td>
                                                            <td scope="row">
                                                                <a href="{{ route('opticians.lock', $customer_list->opticians->id) }}">
                                                                    <i class=" text-danger fa fa-lock" aria-hidden="true"></i>
                                                                </a>
                                                                |<a href="{{ route('opticians.unlock', $customer_list->opticians->id) }}">
                                                                    <i class="fa fa-unlock" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box mt-3">
                            <div class=" box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!($campaigns)->isEmpty())
                                            @foreach ($campaigns as $campaign)
                                                @foreach ($campaign->customer_lists as $customer_list)
                                                    <tr>
                                                        <td scope="row">{{ $customer_list->name }}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- Tabs content -->
    </section>
</div>

<!-- Add Campaign Modal -->
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
            <form method="post" action="{{ route('campaigns.store') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Write Campaign Name" required >
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Campaign</button>
            </form>
            </div>
        </div>
    </div>
</div>
@stop
