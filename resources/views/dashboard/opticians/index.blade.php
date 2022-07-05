@extends('adminlte::page')

@section('title', 'Opticians')

@section('content_header')
    <h1>Opticians List</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    {{-- displaying errors from components --}}
                    <div class="errors">
                        <x-errors.error/>
                    </div>
                    <div class="card-tools">
                        <!-- Add Optician Modal btn -->
                        <button type="button" class="btn float-right btn-primary" data-toggle="modal"
                                data-target="#opticianModal">
                            Add Optician
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table id="opticians" class="table table-hover text-nowrap" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Street</th>
                            <th>Zip</th>
                            <th>City</th>
                            <th>URL_Homepage</th>
                            <th>URL_Imprint</th>
                            <th>URL_Privacy</th>
                            <th>URL_Contact</th>
                            <th>URL_Appointment</th>
                            <th style="width:100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($opticians as $optician)
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->


    <!-- Button trigger modal -->


    <!-- Add Optician Modal -->
    <div class="modal fade" id="opticianModal" tabindex="-1" role="dialog" aria-labelledby="opticianModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="opticianModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('opticians.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" name="name" class="form-control" id="inputEmail4" required placeholder="Write Your Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputZip">Zip</label>
                                <input type="number" name="zip" min="1" class="form-control" max="999999999"
                                       min="1"
                                       placeholder="******" required id="inputZip">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Street</label>
                                <input type="text" name="street" class="form-control" placeholder="Street"
                                       required
                                       id="inputCity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" name="city" class="form-control" placeholder="City" required
                                       id="inputCity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Url HomePage</label>
                            <input type="url" name="url_homepage" class="form-control" required
                                   placeholder="Url HomePage">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Url Imprint</label>
                            <input type="url" name="url_imprint" class="form-control" required
                                   placeholder="Url Imprint">
                        </div>

                        <div class="form-group">
                            <label for="inputAddress2">Url Privacy</label>
                            <input type="url" name="url_privacy" class="form-control" required
                                   placeholder="Url Privacy">
                        </div>

                        <div class="form-group">
                            <label for="inputAddress2">Url Contact</label>
                            <input type="url" name="url_contact" class="form-control" required
                                   id="inputAddress2"
                                   placeholder="Url Contact">
                        </div>

                        <div class="form-group">
                            <label for="inputAddress2">Url Appointment</label>
                            <input type="url" name="url_appointment" class="form-control" required
                                   id="inputAddress2"
                                   placeholder="Url Appointment">
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script defer>
        $(document).ready(function() {
            $('#opticians').DataTable({
                responsive: true,
            });
        });
    </script>
@stop
