@extends('backend.master')
@push('css')
    <style>
        .c-timeline__item {
            position: relative;
            display: flex;
            gap: 1.5rem;
        }

        .c-timeline__content {
            flex: 1;
            position: relative;
            order: 1;
            padding-left: 1.5rem;
            padding-bottom: 3rem;
        }

        .c-timeline__content:before {
            content: "";
            position: absolute;
            right: 100%;
            top: 0;
            height: 100%;
            width: 2px;
            background-color: lightblue; /* Updated color to light blue */
        }

        .c-timeline__content:after {
            content: "";
            position: absolute;
            left: calc(0px - 11px);
            top: 0;
            width: 20px;
            height: 20px;
            background-color: lightblue; /* Updated color to light blue */
            z-index: 1;
            border: 2px solid lightblue; /* Updated color to light blue */
            border-radius: 50%;
        }

        /* Simple setup for this demo */
        .mdl-card {
            width: 750px;
            min-height: 0;
            margin: 10px auto;
        }

        .mdl-card__supporting-text {
            width: 100%;
            padding: 0;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step {
            width: 25%;
            /* 100 / no_of_steps */
        }


        /* Begin actual mdl-stepper css styles */

        .mdl-stepper-horizontal-alternative {
            display: table;
            width: 100%;
            margin: 0 auto;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step {
            display: table-cell;
            position: relative;
            padding: 24px;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step:hover,
        .mdl-stepper-horizontal-alternative .mdl-stepper-step:active {
            background-color: rgba(0, 0, 0, .06);
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step:active {
            border-radius: 15% / 75%;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step:first-child:active {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step:last-child:active {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step:hover .mdl-stepper-circle {
            background-color: #757575;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step:first-child .mdl-stepper-bar-left,
        .mdl-stepper-horizontal-alternative .mdl-stepper-step:last-child .mdl-stepper-bar-right {
            display: none;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-circle {
            width: 24px;
            height: 24px;
            margin: 0 auto;
            background-color: #9E9E9E;
            border-radius: 50%;
            text-align: center;
            line-height: 2em;
            font-size: 12px;
            color: white;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.active-step .mdl-stepper-circle {
            background-color: rgb(33, 150, 243);
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.step-done .mdl-stepper-circle:before {
            content: "\2714";
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.step-done .mdl-stepper-circle *,
        .mdl-stepper-horizontal-alternative .mdl-stepper-step.editable-step .mdl-stepper-circle * {
            display: none;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.editable-step .mdl-stepper-circle {
            -moz-transform: scaleX(-1);
            /* Gecko */
            -o-transform: scaleX(-1);
            /* Opera */
            -webkit-transform: scaleX(-1);
            /* Webkit */
            transform: scaleX(-1);
            /* Standard */
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.editable-step .mdl-stepper-circle:before {
            content: "\270E";
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-title {
            margin-top: 16px;
            font-size: 14px;
            font-weight: normal;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-title,
        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-optional {
            text-align: center;
            color: rgba(0, 0, 0, .26);
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.active-step .mdl-stepper-title {
            font-weight: 500;
            color: rgba(0, 0, 0, .87);
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.active-step.step-done .mdl-stepper-title,
        .mdl-stepper-horizontal-alternative .mdl-stepper-step.active-step.editable-step .mdl-stepper-title {
            font-weight: 300;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-optional {
            font-size: 12px;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.active-step .mdl-stepper-optional {
            color: rgba(0, 0, 0, .54);
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-bar-left,
        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-bar-right {
            position: absolute;
            top: 36px;
            height: 1px;
            border-top: 1px solid #BDBDBD;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-bar-right {
            right: 0;
            left: 50%;
            margin-left: 20px;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-bar-left {
            left: 0;
            right: 50%;
            margin-right: 20px;
        }
    </style>
@endpush
@section('content')
    <div class="content">
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Order Track</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30 p-5" style="min-height: 70vh">
                        <div class="row">
                            <div class="col-6 offset-3">
                                <div class="row my-4 px-4 justify-content-center">
                                    <form action="" method="get">
                                        @csrf
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">Booking No</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">BL No</label>
                                          </div>
                                    </div>
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="search" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                        <div class="input-group-append" style="margin-left: 5px;">
                                            <a class="btn btn-primary" href="{{ route('orders.track') }}" type="submit">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @if (isset($datas->id))
                                <div class="mdl-card mdl-shadow--2dp">
                                    <div class="mdl-card__supporting-text">
                                        <div class="mdl-stepper-horizontal-alternative">
                                            <div class="mdl-stepper-step active-step step-done">
                                                <div class="mdl-stepper-circle"><span>1</span></div>
                                                <div class="mdl-stepper-title">Starting Point</div>
                                                <div class="mdl-stepper-optional">{{ $datas->starting_point }}</div>
                                                <div class="mdl-stepper-bar-left"></div>
                                                <div class="mdl-stepper-bar-right"></div>
                                            </div>
                                            @if (isset($datas->progress1))
                                                <div class="mdl-stepper-step active-step editable-step">
                                                    <div class="mdl-stepper-circle"><span>2</span></div>
                                                    <div class="mdl-stepper-title">{{ $datas->progress1 }}</div>
                                                    <div class="mdl-stepper-optional">Optional</div>
                                                    <div class="mdl-stepper-bar-left"></div>
                                                    <div class="mdl-stepper-bar-right"></div>
                                                </div>
                                            @endif
                                            @if (isset($datas->progress2))
                                                <div class="mdl-stepper-step active-step">
                                                    <div class="mdl-stepper-circle"><span>3</span></div>
                                                    <div class="mdl-stepper-title">{{ $datas->progress2 }}</div>
                                                    <div class="mdl-stepper-optional">Optional</div>
                                                    <div class="mdl-stepper-bar-left"></div>
                                                    <div class="mdl-stepper-bar-right"></div>
                                                </div>
                                            @endif
                                            <div class="mdl-stepper-step active-step">
                                                <div class="mdl-stepper-circle"><span>4</span></div>
                                                <div class="mdl-stepper-title">Destination</div>
                                                <div class="mdl-stepper-optional">{{ $datas->destination }}</div>
                                                <div class="mdl-stepper-bar-left"></div>
                                                <div class="mdl-stepper-bar-right"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="table">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr style="background-color: #9E9E9E">
                                                <th class="text-center">SL</th>
                                                <th class="text-center">BL no.</th>

                                                <th class="text-center">Booking no.</th>
                                                <th class="text-center">Starting Point</th>
                                                <th class="text-center">Destination</th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">

                                            <tr>
                                                <td>{{ $datas->id }}</td>
                                                <td>{{ $datas->bl_no }}</td>
                                                <td>{{ $datas->booking_no }}</td>
                                                <td>{{ $datas->starting_point }}</td>
                                                <td>{{ $datas->destination }}</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="container mt-4">
                                        <div class="row">
                                            <!-- Left side column -->
                                            <div class="col-md-6">
                                                <p><strong>Vessel Voy No. :</strong> {{ $datas->vessel_voy_no }}</p>
                                                <p><strong>No. of Packages :</strong> {{ $datas->no_of_packages }}</p>
                                                <p><strong>On Board Date :</strong> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $datas->on_board_date)->format('jS F, Y') }}</p>
                                                <p><strong>Gross Cargo Weight :</strong> {{ $datas->gross_cargo_weight }}</p>
                                            </div>
                                            <!-- Right side column -->
                                            <div class="col-md-6">
                                                <p><strong>No. of Containers (booking quantity) :</strong> {{ $datas->no_of_containers }}</p>
                                                <p><strong>Measurement :</strong> {{ $datas->measurement }}</p>
                                                <p><strong>Service Requirement :</strong> {{ $datas->service_requirement }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrapper mt-5" >
                                        <ol class="c-timeline list-group list-group-flush">
                                            @if(isset($datas->status))
                                                @foreach ($datas->status->reverse() as $status)
                                                    <li class="c-timeline__item list-group-item">
                                                        <div class="c-timeline__content">
                                                            <h3 class="c-timeline__title" style="font-size: 20px">{{ $status->title }}</h3>
                                                            <p class="c-timeline__desc">{{ $status->description }}</p>
                                                        </div>
                                                        <time class="list-group-item-text">{{ \Carbon\Carbon::parse($status->time)->format('Y-m-d \a\t h:ia') }}</time>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ol>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection