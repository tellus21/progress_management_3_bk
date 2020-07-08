@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('progress.create') }}">
                    <button type="submit" class="btn btn-primary">
                            新規登録
                    </button>
                    </form>
                    <form method="GET" action="{{ route('progress.index') }}" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">受付時間</th>
                            <th scope="col">受付対応者</th>
                            <th scope="col">患者名</th>
                            <th scope="col">詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($progresses as $progress)
                            <tr>
                            <th>{{ $progress->id }}</th>
                            <td>{{ $progress->reception_time }}</td>
                            <td>{{ $progress->reception_person }}</td>
                            <td>{{ $progress->name }}</td>
                            <td><a href="{{ route('progress.show', ['id' => $progress->id ])}}">詳細をみる</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $progresses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
