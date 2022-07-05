@if ($errors && (is_array($errors) || $errors->all()))
<div class="alert alert-danger" role="alert">
    <strong>Errors encounteded!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul class="list-decimal pl-4 space-y-0.5 flex flex-col">
        @foreach ((is_array($errors) ? $errors : $errors->all()) as $error)
          <li class="text-sm">{{ $error }}</li>
        @endforeach
    </ul>
    @elseif (Session::has('created'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('created') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif (Session::has('updated'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('updated') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif (Session::has('deleted'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('deleted') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif (Session::has('lock'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('lock') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif (Session::has('unlock'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('unlock') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
