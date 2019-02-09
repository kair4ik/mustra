@extends('layouts.myapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">



                <div class="card-header">Муштра список №1</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <input type="text" class="form-control" id="list_id" placeholder="" value="{{$list->id}}">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя списка</label>
                            <input type="text" class="form-control" id="list_name" placeholder="Введите имя">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Дата начала </label>
                            <input type="text" class="form-control" id="date_start" placeholder="Выберите дату" value="{{$list->date_start}}">
                        </div>

                        {{--<button type="button" id="step1" class="btn btn-primary">Далее</button>--}}

                        Список задач:

                        <br>
                        <br>


                        <input type="text" class="form-control" id="list_name" placeholder="Введите задачу">
                        <button type="button" id="add_task" class="btn btn-primary">Добавить задачу</button>


                </div>
            </div>

        </div>
    </div>
    <script>

        $( document ).ready(function() {

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#date_start").mask("99.99.9999");


            $("#step1").click(function () {

                    $.ajax({
                        url: '/create_list',
                        type: 'POST',

                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        beforeSend: function() {
                            console.log("before");
                        },
                        complete: function(data){
                           console.log(data);
                        }
                    });
            });

            $("#add_task").click(function () {

                $.ajax({
                    url: '/create_list',
                    type: 'POST',

                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    beforeSend: function() {
                        console.log("before");
                    },
                    complete: function(data){
                        console.log(data);
                    }
                });
            });

        });

    </script>

</div>
@endsection
