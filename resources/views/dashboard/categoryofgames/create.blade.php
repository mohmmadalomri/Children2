@extends('dashboard');

@section('body')
    <form class="needs-validation" novalidate method="post" enctype="multipart/form-data"
          action="{{isset($categoryOfGames)?route('categoryofgames.update',$categoryOfGames->id):route('categoryofgames.store')}}">
        @if(isset($categoryOfGames))
            @method('put')
        @endif

        @csrf
        <section class="tooltip-validations" id="tooltip-validation">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">اضف تصنيف العاب جديد</h2>
                        </div>
                        <div class="card-body">
                            <div class="row g-1">
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip01">الاسم</label>
                                    <input type="text" class="form-control" id="validationTooltip01" placeholder=" name"
                                           name="name" value="{{isset($categoryOfGames)?$categoryOfGames->name:null}}" required/>
                                    <div class="valid-tooltip">Looks good!</div>
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
                            <h4 class="card-title">image</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" name="image" type="file"
                                           id="image"/>
                                </div>
                                <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                    <label for="formFile" class="form-label">background</label>
                                    <input class="form-control" name="background" type="file"
                                           id="background"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection
