@extends('dashboard');
@section('body')

    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        <div class="row match-height">
            <!-- Greetings Card starts -->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">Wellcome {{\Illuminate\Support\Facades\Auth::user()->name}}
                                ,</h1>
                            <p class="card-text m-auto w-75">
                                You have done <strong>57.6%</strong> more sales today. Check your new badge in your
                                profile.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Greetings Card ends -->

            <!-- Subscribers Chart Card starts -->
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather='dribbble' class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder mt-1">{{$games}}</h2>
                        <p class="card-text">Number of Games</p>
                    </div>
                    <div id="gained-chart"></div>
                </div>
            </div>
            <!-- Subscribers Chart Card ends -->

            <!-- Orders Chart Card starts -->
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-warning p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather='mic' class="font-medium-5"> </i>
                            </div>
                        </div>
                        <h2 class="fw-bolder mt-1">{{$voice}}</h2>
                        <p class="card-text">Number of Voice</p>
                    </div>
                    <div id="order-chart"></div>
                </div>
            </div>
            <!-- Orders Chart Card ends -->
        </div>

        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather='type' class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bolder mt-1">{{$translation}}</h2>
                    <p class="card-text">Number of translation</p>
                </div>
                <div id="gained-chart"></div>
            </div>
        </div>


        <!-- List DataTable -->

        <!--/ List DataTable -->
    </section>
    <!-- Dashboard Analytics end -->

@endsection
