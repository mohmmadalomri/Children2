@extends('dashboard');
@section('body')
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Question Table </h4>
                    <a href="">
                        <button type="button" class="btn btn-primary">start Quez</button>
                    </a>
                    <a href="{{route('question.create')}}">
                        <button type="button" class="btn btn-primary">add new</button>
                    </a>

                </div>
                <div class="card-body">
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($question as $item )
                                <td>{{$item->name}}</td>
                                <td><img src="{{ asset($item->image) }}" style="height: 50px" style="width: 50px"  alr="image"></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{route('question.edit',$item->id)}}">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <form method="post" action="{{route('question.destroy',$item->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button class="dropdown-item" type="submit">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
    {{ $question->links() }}
@endsection
