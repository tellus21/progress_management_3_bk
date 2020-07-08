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
                    editです
                    <form method="POST" action="{{ route('progress.update', [ 'id' => $progress->id ]) }}">
                    @csrf

                    受付時間
                    <input type="date" name="reception_time" value="{{ $progress->reception_time }}">
                    <br>
                    受付対応者
                    <input type="text" name="reception_person" value="{{ $progress->reception_person }}">
                    <br>
                    氏名
                    <input type="text" name="name" value="{{ $progress->name }}">
                    <br>
                    性別
                    <input type="radio" name="gender" value="0" @if($progress->gender === 0 ) checked @endif>男性
                    <input type="radio" name="gender" value="1" @if($progress->gender === 1 ) checked @endif>女性
                    <br>
                    企業
                    <input type="text" name="company" value="{{ $progress->company }}">
                    <br>
                    医師確認
                    <input type="radio" name="doctor_check" value="0" @if($progress->doctor_check === 0 ) checked @endif>確認済
                    <input type="radio" name="doctor_check" value="1" @if($progress->doctor_check === 1 ) checked @endif>未確認
                    <br>
                    看護師確認
                    <input type="radio" name="nurse_check" value="0" @if($progress->doctor_check === 0 ) checked @endif>確認済
                    <input type="radio" name="nurse_check" value="1" @if($progress->doctor_check === 1 ) checked @endif>未確認
                    <br>

                    <input class="btn btn-info" type="submit" value="更新する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
