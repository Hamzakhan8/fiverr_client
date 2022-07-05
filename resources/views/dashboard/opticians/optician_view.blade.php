@extends('adminlte::page')

@section('title', 'Opticians')

@section('content_header')
    <h1>Opticians List <small>></small> {{ $opticians->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form class="d-flex justify-content-around p-3 optician_form_group">
                    <div class="input-group-1">
                        <div class="form-group">
                            <label for="inputEmail4">Name</label>
                            <input type="text" name="name"
                                    class="form-control"
                                     value="{{ $opticians->name }}">
                        </div>

                        <div class="form-group">
                            <label for="inputCity">Street</label>
                            <input type="text" name="street"
                                    class="form-control"
                                     value="{{ $opticians->street }}"
                                    id="inputCity">
                        </div>

                        <div class="form-group">
                            <label for="inputZip">Zip + city</label>
                            <input type="text" name="zip" min="1"
                                    class="form-control" max="999999999"
                                    value="{{ $opticians->zip }} {{ $opticians->city }}"
                                    id="inputZip">
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Url HomePage</label>
                            <input type="url" name="url_homepage"
                                    class="form-control"

                                    value="{{ $opticians->url_homepage }}"
                                    id="inputAddress">
                        </div>
                    </div>

                    <div class="input-group-2">
                        <div class="form-group">
                            <label for="inputAddress2">Url Imprint</label>
                            <input type="url" name="url_imprint"
                                    class="form-control"
                                     value="{{ $opticians->url_imprint }}"
                                    id="inputAddress2">
                        </div>

                        <div class="form-group">
                            <label for="inputAddress2">Url Privacy</label>
                            <input type="url" name="url_privacy"
                                    class="form-control"
                                     value="{{ $opticians->url_privacy }}"
                                    id="inputAddress2">
                        </div>

                        <div class="form-group">
                            <label for="inputAddress2">Url Contact</label>
                            <input type="url" name="url_contact"
                                    class="form-control"
                                     value="{{ $opticians->url_contact }}"
                                    id="inputAddress2">
                        </div>

                        <div class="form-group">
                            <label for="inputAddress2">Url Appointment</label>
                            <input type="url" name="url_appointment"
                                    class="form-control"
                                    value="{{ $opticians->url_appointment }}"
                                    id="inputAddress2">
                        </div>
                    </div>
                </form>

            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="card-body table-responsive p-0">
        <div class="d-flex justify-content-between">
            <h2>Customer_list</h2>
            <div class="div">
                <button class="btn">Save</button><br>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                    Add new Customer List
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Csv File</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('customer_list.csv.import') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                      <label for="">Add File</label>
                                      <input type="file" name="csv_file" accept=".csv" required id="" class="form-control border-0" placeholder="" aria-describedby="helpId">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Upload Csv</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table id="opticianss" class="table table-hover text-nowrap" style="width:100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Events</th>
                <th>Customer Entries</th>
                <th>created at</th>
                <th>Download Csv File</th>
                <th>Download PDF File</th>


                <th style="width:100px;">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($opticians->customer_lists as $customer_list)
                    <tr>
                        <td>{{ $customer_list->name }}</td>
                        <td>{{ $customer_list->events->name }}</td>

                        <td>{{ $opticians->customer_lists->count() }}</td>
                        <td>{{ $customer_list->created_at }}</td>

                       <td><a href="{{ route('customerlist.export') }}" target="_blank" class="btn text btn-primary me-1">Export Data</a></td>
                        <td><a href="{{ route('customer_list.pdf.download') }}" class="btn btn-warning">download PDF file </a></td>
                    </tr>
                @endforeach
            </tbody>
            {{-- <tbody>
            @foreach ($opticianss as $optician)
                <tr>
                    <td scope="row">{{ $optician->name }}</td>
                    <td>{{ $optician->street }}</td>
                    <td>{{ $optician->zip }}</td>
                    <td>{{ $optician->city }}</td>
                    <td>@if ( $optician->url_homepage ) <a href="{{ $optician->url_homepage }}">homepage</a>@else - @endif</td>
                    <td>@if ( $optician->url_imprint ) <a href="{{ $optician->url_imprint }}">imprint</a>@else - @endif</td>
                    <td>@if ( $optician->url_privacy ) <a href="{{ $optician->url_privacy }}">privacy</a>@else - @endif</td>
                    <td>@if ( $optician->url_contact ) <a href="{{ $optician->url_contact }}">contact</a>@else - @endif</td>
                    <td>@if ( $optician->url_appointment ) <a href="{{ $optician->url_appointment }}">appointment</a>@else - @endif</td>
                    <td>
                        <form method="POST" action="{{route('opticians.delete', $optician->id)}}">
                            @method('delete')
                            @csrf
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a href="{{route('opticians.view', $optician->id)}}"><button type="button" class="btn btn-primary btn-sm fa fa-eye"></button></a></li>
                                <li class="list-inline-item"><button type="button" data-toggle="modal" data-target="#opticianModal-{{ $optician->id }}" class="btn btn-warning btn-sm fa fa-edit"></button></li>
                                <li class="list-inline-item"><button type="submit" class="btn btn-danger btn-sm fa fa-trash-alt"></button></li>
                            </ul>
                        </form>

                        <!-- Edit Optician Modal -->
                        <div class="modal fade" id="opticianModal-{{ $optician->id }}" tabindex="-1"
                             role="dialog" aria-labelledby="opticianModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="opticianModalLabel">Modal
                                            title</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST"
                                              action="{{route('opticians.update', $optician->id)}}">
                                            @method('put')
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Name</label>
                                                    <input type="text" name="name"
                                                           class="form-control"
                                                           required value="{{ $optician->name }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputZip">Zip</label>
                                                    <input type="number" name="zip" min="1"
                                                           class="form-control" max="999999999"
                                                           min="1"
                                                           required value="{{ $optician->zip }}"
                                                           id="inputZip">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Street</label>
                                                    <input type="text" name="street"
                                                           class="form-control"
                                                           required value="{{ $optician->street }}"
                                                           id="inputCity">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">City</label>
                                                    <input type="text" name="city"
                                                           class="form-control"
                                                           required value="{{ $optician->city }}"
                                                           id="inputCity">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress">Url HomePage</label>
                                                <input type="url" name="url_homepage"
                                                       class="form-control"
                                                       required
                                                       value="{{ $optician->url_homepage }}"
                                                       id="inputAddress">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress2">Url Imprint</label>
                                                <input type="url" name="url_imprint"
                                                       class="form-control"
                                                       required value="{{ $optician->url_imprint }}"
                                                       id="inputAddress2">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress2">Url Privacy</label>
                                                <input type="url" name="url_privacy"
                                                       class="form-control"
                                                       required value="{{ $optician->url_privacy }}"
                                                       id="inputAddress2">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress2">Url Contact</label>
                                                <input type="url" name="url_contact"
                                                       class="form-control"
                                                       required value="{{ $optician->url_contact }}"
                                                       id="inputAddress2">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress2">Url Appointment</label>
                                                <input type="url" name="url_appointment"
                                                       class="form-control" required
                                                       value="{{ $optician->url_appointment }}"
                                                       id="inputAddress2">
                                            </div>
                                            <input type="submit" class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody> --}}
        </table>
    </div>
@stop
