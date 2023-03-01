@extends('dashboard');
@section('body')





    <div class="card">
        <div class="card-body">
            correctans anser    {{Session::get('correctans')}}
        </div>
    </div>
    <div class="card">
        <div class="card-body">
             {{Session::get('wrongans')}} wrongans anser
        </div>
    </div>
    <div class="card">
        <div class="card-body">
           result =  {{Session::get('correctans')}}/{{Session::get('wrongans')+Session::get('correctans')}}
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            This is some text within a card body.
        </div>
    </div>


@endsection
