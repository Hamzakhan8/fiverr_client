@extends('adminlte::page')

@section('title', 'Events')

@section('content_header')
    <h1>Settings</h1>
@stop

@section('content')
<div class="row d-block">
    <section class="p-4">
        <!-- Tabs navs -->
        <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="ex1-tab-1" data-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Events</a>
          </li>
          {{-- <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex1-tab-2" data-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Tab 2</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex1-tab-3" data-toggle="tab" href="#ex1-tabs-3" role="tab" aria-controls="ex1-tabs-3" aria-selected="false">Tab 3</a>
          </li> --}}
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content col-12" id="ex1-content">
          <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box mt-3">
                            <div class="errors">
                                {{-- displaying errors from components --}}
                                <x-errors.error/>
                            </div>
                            <button type="button" class="btn float-right mb-3 btn-primary" data-toggle="modal" data-target="#AddEventModal">
                            Add Events
                            </button>
                            <div class=" box-body">
                                <table id="example1" class="table table-striped table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $event)
                                            <tr>
                                                <td scope="row">{{ $event->name }}</td>
                                                <td class="d-flex">
                                                    <form action="{{ route('events.delete', $event->id) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="border-0" style="background: none" type="submit">
                                                            <a>
                                                                <i class="fa text-danger fa-trash" aria-hidden="true"></i>
                                                            </a>
                                                        </button>
                                                    </form>|
                                                    <a data-toggle="modal"
                                                    class="editEventModelBtn"
                                                    data-event-name="{{ $event->name }}"
                                                    data-event-id="{{ $event->id }}">
                                                    <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          {{-- <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
            Tab 2 content
          </div>
          <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
            Tab 3 content
          </div> --}}
        </div>
        <!-- Tabs content -->
    </section>
</div>

<!-- Event Add Modal -->
<div class="modal fade" id="AddEventModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('events.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="event_name">Event Name</label>
                      <input type="text" name="name" id="event_name" class="form-control" placeholder="Write event name">
                    </div>
                    <button class="btn btn-primary" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Event Edit Modal -->
<div class="modal fade editEventModel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="eventUpdateForm" action="{{ route('events.update', ':id') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label for="edit_event_name">Event name</label>
                    <input type="text" name="name" value="" id="edit_event_name" class="form-control" placeholder="Write event name" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
