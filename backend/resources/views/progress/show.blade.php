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
                    showです
                    {{ $progress->reception_time }}
                    {{ $progress->reception_person }}
                    {{ $progress->name }}
                    {{ $gender }}
                    {{ $progress->company }}
                    {{ $doctor_check }}
                    {{ $nurse_check }}
                    <form method="GET" action="{{ route('progress.edit', ['id'  => $progress->id ])}}">
                    @csrf

                    <input class="btn btn-info" type="submit" value="変更する">
                    </form>

                <form method="POST" action="{{ route('progress.destroy', ['id'  => $progress->id ])}}" id="delete_{{ $progress->id }}">
                @csrf
                <a href="#" class="btn btn-danger" data-id="{{ $progress->id }}" onclick="deletePost(this);" >削除する</a>
                </form>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    <!--
    /************************************
    削除ボタンを押してすぐにレコードが削除
    されるのも問題なので、一旦javascriptで
    確認メッセージを流します。
    *************************************/
    //-->
    function deletePost(e) {
        'use strict';
        if (confirm('本当に削除していいですか?')) {
        document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
    </script>

@endsection
