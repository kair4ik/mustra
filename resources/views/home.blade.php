@extends('layouts.myapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Мои списки:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @foreach($lists as $list)
                            <a href="/view/{{$list->id}}">{{ $list->name}}</a> <br>
                        @endforeach
                </div>
            </div>

        </div>
    </div>


</div>
@endsection
