@extends('layouts.myapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$list->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Дата</th>
                                @foreach($tasks as $task)
                                    {!!  "<th scope=\"col\">".$task."</th>"!!}
                                @endforeach
                                <th scope="col">Общий итог</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i=0; $i <= 10; $i++)

                            <tr>
                                <th scope="row">{{$i+1}}</th>
                                <td>{{$date = $list->getDayFromDate($i)}}</td>
                                @foreach($tasks as $name)
                                @php
                                 $taskCur  = \App\Task::getTaskByParam($name,$date, $list->id);
                                @endphp
                                    <td>
                                    @if(!empty($taskCur))
                                    <button type="button" class="btn rounded-circle btn-{{\App\Task::getDescBy($taskCur[0]->status_id)}}" onclick="changeColor({{$taskCur[0]->id}})">&nbsp;{{$taskCur[0]->id}}&nbsp;&nbsp;</button>
                                    @endif
                                    </td>
                                @endforeach
                            </tr>
                            @endfor
                            <tr>
                                <th scope="row">Итог</th>
                                <td></td>
                                <td><button type="button" class="btn btn-info">80%</button></td>
                                <td><button type="button" class="btn btn-info">100%</button></td>
                                <td><button type="button" class="btn btn-info">80%</button></td>
                                <td><button type="button" class="btn btn-info">100%</button></td>
                                <td><button type="button" class="btn btn-info">90% (среднее арифметическое)</button></td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>

        </div>
    </div>

    <script>

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


        function changeColor(task_id) {

            // alert(task_id)
            $.ajax({
                url: '/change_task_status',
                type: 'POST',

                data: {_token: CSRF_TOKEN, taskId:task_id},
                dataType: 'JSON',
                beforeSend: function() {
                    console.log("before");
                },
                success: function(data){

                    console.log(data);
                    location.reload();
                }
            });

        }

        $( document ).ready(function() {



        });
    </script>
</div>
@endsection
