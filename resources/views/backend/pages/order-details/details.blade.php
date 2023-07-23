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
                                            <button class="bg-blue-800 px-2 py-2 text-white rounded-xl" type="submit">Search</button>
                                        </div>
                                        <div class="input-group-append" style="margin-left: 5px;">
                                            <a class="bg-cyan-800 px-2 py-2 text-white rounded-xl" href="{{ route('orders.track') }}" type="submit">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @if (isset($datas->id))
                                <div class="col-6 offset-2 pt-5">
                                    <span><p style="font-size: 1.1rem"><strong>Routing : </strong></p></span>
                                </div>
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
                                                <div class="mdl-stepper-step active-step step-done">
                                                    <div class="mdl-stepper-circle"><span>2</span></div>
                                                    <div class="mdl-stepper-title">{{ $datas->progress1 }}</div>
                                                    <div class="mdl-stepper-optional">Optional</div>
                                                    <div class="mdl-stepper-bar-left"></div>
                                                    <div class="mdl-stepper-bar-right"></div>
                                                </div>
                                            @endif
                                            @if (isset($datas->progress2))
                                                <div class="mdl-stepper-step active-step step-done">
                                                    <div class="mdl-stepper-circle"><span>3</span></div>
                                                    <div class="mdl-stepper-title">{{ $datas->progress2 }}</div>
                                                    <div class="mdl-stepper-optional">Optional</div>
                                                    <div class="mdl-stepper-bar-left"></div>
                                                    <div class="mdl-stepper-bar-right"></div>
                                                </div>
                                            @endif
                                            <div class="mdl-stepper-step active-step step-done">
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

    <!-- rownok edits -->
        <div class="container mx-auto">
        <form class="flex items-center">   
    <label for="simple-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </div>
        <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  " placeholder="Search here..." required>
    </div>
    <button type="submit" class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
 Search
    </button>
    <button type="submit" class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-teal-700 rounded-lg border border-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 ">
       Reset
    </button>
</form>
<!-- routing -->

        <p class="text-xl mt-3 font-semibold">Routing</p>

        <div class="">
    <div class="mx-4 p-4">
        <div class="flex items-center">
            <div class="flex items-center text-teal-600 relative">
                <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-teal-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark ">
                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
               
                <div class=" text-xs font-medium capitalize text-teal-600 px-2">starting</div>
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-teal-600">Dhaka</div>
               
              
            </div>
            <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-teal-600"></div>
            <div class="flex items-center text-white relative">
                <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 bg-teal-600 border-teal-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus ">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <line x1="20" y1="8" x2="20" y2="14"></line>
                        <line x1="23" y1="11" x2="17" y2="11"></line>
                    </svg>
                </div>
                <div class="px-2 text-xs font-medium capitalize text-teal-600">Account</div>
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-teal-600">Account</div>
                
            </div>
            <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300"></div>
            <div class="flex items-center text-gray-500 relative">
                <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail ">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
                <div class="px-2 text-xs font-medium uppercase text-gray-500">Message</div>
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500">Message</div>
            </div>
            <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300"></div>
            <div class="flex items-center text-gray-500 relative">
                <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database ">
                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                    </svg>
                </div>
                <div class="px-2 text-xs font-medium uppercase text-gray-500">Confirm</div>
                <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500">Confirm</div>
            </div>
        </div>
    </div>


<div class="relative overflow-x-auto my-10">
    <table class="w-full text-sm text-left text-gray-500 border rounded-xl ">
        <thead class="text-base text-gray-700 capitalize bg-slate-100">
            <tr>
                <th scope="col" class="px-6 py-3">
                   sl no
                </th>
                <th scope="col" class="px-6 py-3">
                    bl no
                </th>
                <th scope="col" class="px-6 py-3">
                    booking no
                </th>
                <th scope="col" class="px-6 py-3">
                    starting point
                </th>
                <th scope="col" class="px-6 py-3">
                    destination
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    1
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
            </tr>
            <tr class="bg-white border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    1
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
            </tr>
        </tbody>
    </table>
</div>

 <div class="flex items-center gap-10">

 <ol class="relative text-gray-500 border-l border-gray-200 my-10">                  
    <li class="mb-10 ml-6">            
        <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -left-4 ring-4 ring-white ">
            <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
            </svg>
        </span>
        <h3 class="font-medium leading-tight">Personal Info</h3>
        <p class="text-sm">Step details here</p>
    </li>
    <li class="mb-10 ml-6">
        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white ">
            <svg class="w-3.5 h-3.5 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"/>
            </svg>
        </span>
        <h3 class="font-medium leading-tight">Account Info</h3>
        <p class="text-sm">Step details here</p>
    </li>
    <li class="mb-10 ml-6">
        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white ">
            <svg class="w-3.5 h-3.5 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
            </svg>
        </span>
        <h3 class="font-medium leading-tight">Review</h3>
        <p class="text-sm">Step details here</p>
    </li>
    <li class="ml-6">
        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white ">
            <svg class="w-3.5 h-3.5 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
            </svg>
        </span>
        <h3 class="font-medium leading-tight">Confirmation</h3>
        <p class="text-sm">Step details here</p>
    </li>
</ol>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-slate-50 border border-zinc-50 px-4 py-2 flex items-center rounded-lg">
            <p>Vessel Voy No. : dfdsfds</p>
        </div>
        <div class="bg-slate-50 border border-zinc-50 px-4 py-2 flex items-center rounded-lg">
            <p>No. of Containers (booking quantity) : 21</p>
        </div>
        <div class="bg-slate-50 border border-zinc-50 px-4 py-2 flex items-center rounded-lg">
            <p>No. of Packages : 23</p>
        </div>
        <div class="bg-slate-50 border border-zinc-50 px-4 py-2 flex items-center rounded-lg">
            <p>Measurement : dfsdsgf</p>
        </div>
        <div class="bg-slate-50 border border-zinc-50 px-4 py-2 flex items-center rounded-lg">
            <p>On Board Date : 23rd July, 2023</p>
        </div>
        <div class="bg-slate-50 border border-zinc-50 px-4 py-2 flex items-center rounded-lg">
            <p>Service Requirement : fgfg</p>
        </div>
        <div class="bg-slate-50 border border-zinc-50 px-4 py-2 col-span-2 flex items-center rounded-lg">
            <p>Gross Cargo Weight : dfdsfsd</p>
        </div>
        </div>
 </div>


        </div>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>

   


@endsection
@push('js')

@endpush
