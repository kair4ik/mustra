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
                        <input type="hidden" class="form-control" id="list_id" placeholder="" value="{{$list->id}}">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя списка</label>
                            <input type="text" class="form-control" id="list_name" placeholder="Введите имя" value="{{$list->name}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Дата начала </label>
                            <input type="text" class="form-control" id="date_start" placeholder="Выберите дату" value="{{$list->date_start}}">
                        </div>

                        Список задач:
                        <div id="tasks_list">
                            @foreach($tasks as $task)
                               {!!  "<b>".$task ."</b><br>"!!}
                            @endforeach
                        </div>

                        <br>
                        <br>


                        <input type="text" class="form-control" id="task_name" placeholder="Введите задачу">
                        <button type="button" id="add_task" class="btn btn-primary">Добавить задачу</button>
                        <br>
                        <br>
                        <button type="button" id="save_list" class="btn btn-primary">Сохранить  муштра-список</button>
                </div>
            </div>

        </div>
    </div>
    <script>

        $( document ).ready(function() {

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#date_start").mask("9999.99.99");


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


                var taskName = $("#task_name").val();
                var listId = $("#list_id").val();

                $.ajax({
                    url: '/create_task',
                    type: 'POST',

                    data: {_token: CSRF_TOKEN,listId:listId,taskName:taskName},
                    dataType: 'JSON',
                    beforeSend: function() {
                        console.log("before");
                    },
                    success: function(data){

                        $("#tasks_list").append(data +"<br>");
                        $("#task_name").val("");
                        console.log(data);
                    }
                });

            });

            $("#save_list").click(function () {


                var listName = $("#list_name").val();
                var taskName = $("#task_name").val();
                var listId = $("#list_id").val();

                if (listName !== "") {

                    $.ajax({
                        url: '/save_list',
                        type: 'POST',

                        data: {_token: CSRF_TOKEN,listId:listId,listName:listName},
                        dataType: 'JSON',
                        beforeSend: function() {
                            console.log("before");
                        },
                        success: function(data){

                            $("#tasks_list").append(data +"<br>");
                            $("#task_name").val("");
                            if (data == "success") {
                                window.location.href = "/home"
                            }
                            console.log(data);
                        }
                    });
                } else {
                    alert("Введите название списка");
                }

            });

        });

    </script>

</div>
@endsection
