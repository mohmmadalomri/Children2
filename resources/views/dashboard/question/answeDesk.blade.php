@extends('dashboard');
@section('body')
<form method="POST" action="{{route('submentans',$questions->category->id)}}">
    @csrf
    <section id="basic-radio">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{\Illuminate\Support\Facades\Session::get("nextq")}}
                    <div class="card-header">

                        <h4 class="card-title">{{$questions->name}}</h4>
                    </div>

                    <div class="card-body">
                        <div class="demo-inline-spacing">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ans"
                                       id="flexRadioDefault1" value="a">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    {{$questions->ansa}}
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ans"
                                       id="flexRadioDefault2"  value="b">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    {{$questions->ansb}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ans"
                                       id="flexRadioDefault2"  value="c">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    {{$questions->ansc}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ans"
                                       id="flexRadioDefault2"  value="d">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    {{$questions->ansd}}
                                </label>
                            </div>
                            <input class="form-check-input" type="hidden" name="dbans"
                                   id="flexRadioDefault2"  value="{{$questions->ans}}">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <button class="btn btn-primary" type="submit">NEXT</button>
</form>
@endsection
