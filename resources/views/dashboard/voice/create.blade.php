@extends('dashboard');
@section('body')
    <form class="needs-validation" method="POST"
          action="{{isset($voices)?route('voice.update',$voices->id):route('voice.store')}}"

          enctype="multipart/form-data">
        @csrf
        @if(isset($voices))
            @method('put')
        @endif
        <!-- Tooltip validations start -->
        <section class="tooltip-validations" id="tooltip-validation">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add new Game</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-1">
                                <div class="col-md-4 col-12 mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip01"> Name</label>
                                    <input type="text" class="form-control" id="validationTooltip01" name="name"
                                          value="{{isset($voices)?$voices->name:null}}"/>
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Tooltip validations end -->

        <!-- Basic File Browser start -->
        <section id="input-file-browser">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">voice</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                    <label for="formFile" class="form-label">voice_file</label>
                                    <input class="form-control" name="voice_file" type="file" id="voice_file"/>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic File Browser end -->
        <!-- Bootstrap Select start -->
        <section class="bootstrap-select">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Select Category</h4>
                        </div>
                        <div class="card-body">
                            <!-- Basic Select -->
                            <div class="mb-1">
                                <select class="form-select" id="category_id" name="category_id">
                                    @foreach($category as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <!-- Bootstrap Select end -->
@endsection
