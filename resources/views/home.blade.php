@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenue</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/envoie" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="messages">Message</label>
                            <input class="form-control" type="text" name="message" id="messages">
                        </div>
                        <input class="btn btn-info w-100" type="submit" value="Envoyer">
                    </form>

                        @foreach ($messages as $message)
                            <ul class="list-group list-group-flush @if ($message->response == true) response @endif">
                                <li class="list-group-item">
                                    @if ($message->response == true)
                                        <h4>Larabot</h4>
                                    @else
                                        <h4>{{ $user }}</h4>
                                    @endif
                                    {{$message->message}}
                                </li>
                            </ul>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
