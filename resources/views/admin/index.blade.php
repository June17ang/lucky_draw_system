@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="draw_form" method="POST" action="{{ route('admin.draw.insert') }}">
            @csrf
            <div class="form-group col-12">
                <label class="control-label" for="prize_type">Price Type<span style="color:red">*</span></label>
                <select class="form-control @error('prize_type') is-invalid @enderror" name="prize_type" id="prize_type">
                    <option value="">Please Select</option>
                    @foreach($prize_type_arr as $key => $prize)
                        <option value="{{ $key }}" @if($prize["not_available"]) disabled @endif>{{ $prize['name'] }}</option>
                    @endforeach
                </select>
                @error('prize_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- <div class="form-group col-12" id="random_control">
                <label class="control-label" for="is_random">Generate Randomly</label>
                <select class="form-control @error('is_random') is-invalid @enderror" name="is_random" id="is_random">
                    <option value="">Please Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                @error('is_random')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12" id="manual_insert">
                <label class="control-label" for="winning_number">Winning Number</label>
                <input class="form-control @error('winning_number') is-invalid @enderror" name="winning_number" id="winning_number" placeholder="Please insert winning number">
                @error('winning_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> -->
            <div class="col">
                <button class="btn btn-primary" type="submit">Draw</button>
            </div>
        </form>
        <br />
        @if(isset($winners))
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
                                <td>{{ $prize_type_arr[$winner->prize_type]['name'] }}</td>
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