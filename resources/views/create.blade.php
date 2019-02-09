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

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01">
                                <option selected>Количество дней</option>
                                <option value="1">30 дней</option>
                                <option value="2">50 дней</option>
                                <option value="3">100 дней</option>
                            </select>
                        </div>

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


</div>
@endsection
