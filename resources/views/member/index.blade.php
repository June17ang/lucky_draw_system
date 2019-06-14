@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Winning Numbers</h2>
        <div class="col-12">
            {!! implode(', ', $winning_numbers) !!}
        </div>
        <hr>
        @if(!$is_finish)
            <h2>Get a chance to win Grand Prize!</h2>
            <form class="draw_form" method="POST" action="{{ route('member.store.winning_number') }}">
                @csrf
                <button class="btn btn-danger">Get Winning Number</button>
            </form>
        @elseif(isset($winners))
            @if($winners->where('user_id', auth()->user()->id)->count() > 0)
                <h1 style="text-align:center; color:red;">You WON!!</h1>
            @endif
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
                            <tr @if($winner->user_id == auth()->user()->id) style="background-color: #efa4bb" @endif>
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
@endsection