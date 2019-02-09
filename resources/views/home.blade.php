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

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Подьем 7:30</th>
                                <th scope="col">Зарядка</th>
                                <th scope="col">Пробежка</th>
                                <th scope="col">Англиский</th>
                                <th scope="col">Общий итог</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>09.02.19</td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-danger">-</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-danger">-</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>10.02.19</td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-primary">-</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>11.02.19</td>
                                <td><button type="button" class="btn btn-danger">-</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-danger">-</button></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>12.02.19</td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>13.02.19</td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                                <td><button type="button" class="btn btn-success">+</button></td>
                            </tr>
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


</div>
@endsection
