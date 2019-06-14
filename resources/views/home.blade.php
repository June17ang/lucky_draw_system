@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(!empty($winners))
            <div class="col-12">
                <h2>Winner Result</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Prize</th>
                            <th>Winner Name</th>
                            <th>Winner Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($winners as $winner)
                            <tr>
                                <td>{{ $prize_type_arr[$winner->prize_type] }}</td>
                                <td>{{ $winner->user->name }}</td>
                                <td>{{ $winner->number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
