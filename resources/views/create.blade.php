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


                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя списка</label>
                            <input type="text" class="form-control" id="list_name" placeholder="Введите имя">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Дата начала (01.01.2019)</label>
                            <input type="text" class="form-control" id="date_start" placeholder="Выберите дату">
                        </div>

                        <button type="button" id="step1" class="btn btn-primary">Далее</button>

                        <br>
                        <br>

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Подьем 7:30</th>
                                <th scope="col">Общий итог</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>09.02.19</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                </div>
            </div>

        </div>
    </div>
    <script>

        $( document ).ready(function() {
            $("#date_start").mask("99.99.9999");


            $("#step1").click(function () {

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

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
