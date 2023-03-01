@extends('dashboard');
@section('body')
    <form class="needs-validation" method="POST" action="{{route('contact.update',$contact)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Tooltip validations start -->
        <section class="tooltip-validations" id="tooltip-validation">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit contact us</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-1">
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip01"> email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="email" value="{{$contact->email}}" required/>
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip02">youtube link</label>
                                    <input type="url" class="form-control" id="youtube"
                                           placeholder="youtube" value="{{$contact->youtube}}"  name="youtube" required/>
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip03">facbook link</label>
                                    <input type="url" class="form-control" value="{{$contact->facbook}}"  id="facbook" name="facbook"
                                           required/>
                                    <div class="invalid-tooltip"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="input-file-browser">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">backgroundvoice</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                    <label for="formFile" class="form-label">backgroundvoice</label>
                                    <input class="form-control" name="backgroundvoice" type="file"
                                           id="backgroundvoice"/>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <td><audio controls>
                                    <source src="{{ asset($contact->backgroundvoice) }}" type="audio/mp3">
                                </audio>
                            </td>
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Tooltip validations end -->
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <!-- Bootstrap Select end -->
@endsection
