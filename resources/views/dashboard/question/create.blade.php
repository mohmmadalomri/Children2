@extends('dashboard');
@section('body')

    <form class="needs-validation" method="POST"
          action="{{isset($question)?route('question.update',$question->id):route('question.store')}}"
          enctype="multipart/form-data">
        @csrf
        @if(isset($question))
            @method('put')
        @endif
        <!-- Tooltip validations start -->
        <section class="tooltip-validations" id="tooltip-validation">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add new Question</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-1">
                                <div class="col-md-8 col-12 mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip01"> Question</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{isset($question)?$question->name:null}}" required/>
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 mb-3 position-relative">

                                <label class="form-label" for="a">answer_1</label>
                                <input type="text" class="form-control" id="answer_1"
                                       value="{{isset($question)?$question->ansa:null}}" name="answer_1"/>
                                <div class="valid-tooltip">Looks good!</div>

                                <label class="form-label" for="ansb"> answer_2</label>
                                <input type="text" class="form-control" id="answer_2"
                                       value="{{isset($question)?$question->ansb:null}}" name="answer_2"/>
                                <div class="valid-tooltip">Looks good!</div>

                                <label class="form-label" for="ansc">answer_3</label>
                                <input type="text" class="form-control" id="answer_3"
                                       value="{{isset($question)?$question->ansc:null}}" name="answer_3"/>
                                <div class="valid-tooltip">Looks good!</div>

                                <label class="form-label" for="ansd">answer_4</label>
                                <input type="text" class="form-control" id="answer_4"
                                       value="{{isset($question)?$question->ansd:null}}" name="answer_4"/>
                                <div class="valid-tooltip">Looks good!</div>
                            </div>
                            <div class="col-md-4 col-12 mb-3 position-relative">
                                <div class="mb-1">
                                    <label class="form-label" for="ans">correct answer</label>
                                    <select class="form-select" id="correct_answer" name="correct_answer" required>
                                        <option value="answer_1">Answer 1</option>
                                        <option value="answer_2">Answer 2</option>
                                        <option value="answer_3">Answer 3</option>
                                        <option value="answer_4">Answer 4</option>
                                    </select>
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
                            <h4 class="card-title">image</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" name="image" type="file" id="image"/>
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
                                <label class="form-label" for="category_id">Basic Select</label>
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
