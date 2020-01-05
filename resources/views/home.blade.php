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

                    <ul class="list-group list-group-flush ">
                        @foreach ($messages as $message)
                                <li class="message list-group-item @if ($message->response == true) response @endif">
                                    @if ($message->response == true)
                                        <h4>Larabot</h4>
                                    @else
                                        <h4>{{ $user }}</h4>
                                    @endif
                                    <p>{{$message->message}}</p>
                                    @if ($message->id === $messages[0]->id)
                                    <audio src="https://code.responsivevoice.org/getvoice.php?tl=fr-CA&sv=g3&vn=&pitch=0.5&rate=0.5&vol=1&gender=female&t={{$message->message}}" type="audio/mpeg" controls autoplay="autoplay">
                                    @endif
                                </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
