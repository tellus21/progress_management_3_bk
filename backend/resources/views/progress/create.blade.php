@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    createです
                    <form method="POST" action="{{route('progress.store')}}">
                    @csrf
                    受付時間
                    <input type="date" name="reception_time">
                    <br>
                    受付対応者
                    <input type="text" name="reception_person">
                    <br>
                    氏名
                    <input type="text" name="name">
                    <br>
                    性別
                    <input type="radio" name="gender" value="0">男性
                    <input type="radio" name="gender" value="1">女性
                    <br>
                    企業
                    <input type="text" name="company">
                    <br>
                    医師確認
                    <input type="radio" name="doctor_check" value="0">確認済
                    <input type="radio" name="doctor_check" value="1">未確認
                    <br>
                    看護師確認
                    <input type="radio" name="nurse_check" value="0">確認済
                    <input type="radio" name="nurse_check" value="1">未確認
                    <br>

                    <input class="btn btn-info" type="submit" value="登録する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
