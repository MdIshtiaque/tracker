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

                        <div class="container mx-auto">
                            <form class="flex flex-col items-center" action="" method="get">
                                @csrf
                                <!-- Radio buttons -->
                                <div class="flex mb-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                               id="inlineRadio1" value="option1" {{ $request->inlineRadioOptions == 'option1' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="inlineRadio1">Booking No</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                               id="inlineRadio2" value="option2" {{ $request->inlineRadioOptions == 'option2' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="inlineRadio2">BL No</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                               id="inlineRadio3" value="option3" {{ $request->inlineRadioOptions == 'option3' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="inlineRadio2">Container No.</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                               id="inlineRadio4" value="option4" {{ $request->inlineRadioOptions == 'option4' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="inlineRadio4">P/O</label>
                                    </div>
                                </div>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </div>
                                    <input type="text" name="search" id="simple-search" value="{{ $request->input('search') }}"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                           placeholder="Search here..." required>
                                </div>
                                <div class="flex mt-2">
                                    <button type="submit"
                                            class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Search
                                    </button>
                                    <a type="submit" href="{{ route('orders.track') }}"
                                       class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-teal-700 rounded-lg border border-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300">
                                        Reset
                                    </a>
                                </div>
                            </form>
                            <!-- routing -->
                            @if (isset($datas->id))
                                @php
                                    if($datas->currentPort->current_port == $datas->starting_point)
                                        {
                                             $active = 1;
                                        }
                                    if($datas->currentPort->current_port == $datas->progress1)
                                        {
                                             $active = 2;
                                        }
                                    if($datas->currentPort->current_port == $datas->progress2)
                                        {
                                             $active = 3;
                                        }
                                    if($datas->currentPort->current_port == $datas->destination)
                                        {
                                             $active = 4;
                                        }
                                @endphp
                                <p class="text-xl mt-3 font-semibold">Tracking Result</p>
                                <div class="">
                                    <div class="mx-4 p-4">
                                        <div class="flex items-center">
                                            <div
                                                class="flex items-center {{ $active >= 1 ? 'text-white' : ''}} relative">
                                                <div
                                                    class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 {{ $active >= 1 ? 'bg-teal-600' : ''}} {{ $active >= 1 ? 'border-teal-600' : 'border-gray-300'}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                         fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-bookmark ">
                                                        <path
                                                            d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                                    </svg>
                                                </div>

                                                <div class=" text-xs font-medium capitalize text-teal-600 px-2">
                                                    Starting Point
                                                </div>
                                                <div
                                                    class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-teal-600">
                                                    {{ $datas->starting_point }}
                                                </div>
                                            </div>
                                            @if (isset($datas->progress1))
                                                <div
                                                    class="flex-auto border-t-2 transition duration-500 ease-in-out {{ $active >= 2 ? 'border-teal-600' : 'border-gray-300'}}"></div>
                                                <div
                                                    class="flex items-center {{ $active >= 2 ? 'text-white' : ''}} relative">
                                                    <div
                                                        class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 {{ $active >= 2 ? 'bg-teal-600' : ''}} border-teal-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="20" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M10.562 16.285c.03-.502-.083-1.645-.338-3.48l2.652-2.432l1.691 6.053a.5.5 0 0 0 .822.232c1.493-1.386 2.291-2.639 2.36-3.793c.052-.886-.412-2.749-1.397-5.68l.47-.43c2.062-2.062 2.62-3.747 1.417-4.951c-1.204-1.204-2.89-.646-4.937 1.4l-.445.485c-2.932-.984-4.795-1.449-5.68-1.396c-1.155.069-2.408.866-3.793 2.36a.5.5 0 0 0 .232.821l6.053 1.692l-2.431 2.652c-1.835-.256-2.979-.369-3.482-.339c-.78.047-1.6.57-2.497 1.535a.5.5 0 0 0 .232.822l4.78 1.335l.6.6l1.335 4.78a.5.5 0 0 0 .822.231c.965-.895 1.488-1.716 1.534-2.497Zm-1.365-3.6c.27 1.91.393 3.11.367 3.541c-.02.332-.225.742-.629 1.217L7.8 13.375a.5.5 0 0 0-.128-.219l-.786-.785a.5.5 0 0 0-.219-.128L2.6 11.107c.475-.404.884-.61 1.217-.63c.431-.025 1.631.097 3.543.368a.5.5 0 0 0 .438-.157l3.16-3.447a.5.5 0 0 0-.234-.82L4.7 4.74c.979-.93 1.83-1.406 2.535-1.448c.734-.043 2.637.44 5.608 1.45a.5.5 0 0 0 .53-.136l.65-.709c1.692-1.69 2.827-2.066 3.508-1.385c.68.681.305 1.815-1.402 3.522l-.693.635a.5.5 0 0 0-.136.53c1.009 2.97 1.493 4.874 1.45 5.608c-.042.704-.518 1.556-1.449 2.535L13.62 9.319a.5.5 0 0 0-.82-.234l-3.446 3.16a.5.5 0 0 0-.157.44Z" clip-rule="evenodd"/></svg>
                                                    </div>
                                                    <div class="px-2 text-xs font-medium capitalize text-teal-600">
                                                        Progress 1
                                                    </div>
                                                    <div
                                                        class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-teal-600">
                                                        {{ $datas->progress1 }}
                                                    </div>

                                                </div>
                                            @endif
                                            @if (isset($datas->progress2))
                                                <div
                                                    class="flex-auto border-t-2 transition duration-500 ease-in-out {{ $active >= 3 ? 'border-teal-600' : 'border-gray-300'}}"></div>
                                                <div
                                                    class="flex items-center {{ $active >= 3 ? 'text-white' : ''}} relative">
                                                    <div
                                                        class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 {{ $active >= 3 ? 'bg-teal-600' : ''}} border-gray-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="20" viewBox="0 0 24 24">
                                                            <path fill="currentColor" fill-rule="evenodd" d="M10.562 16.285c.03-.502-.083-1.645-.338-3.48l2.652-2.432l1.691 6.053a.5.5 0 0 0 .822.232c1.493-1.386 2.291-2.639 2.36-3.793c.052-.886-.412-2.749-1.397-5.68l.47-.43c2.062-2.062 2.62-3.747 1.417-4.951c-1.204-1.204-2.89-.646-4.937 1.4l-.445.485c-2.932-.984-4.795-1.449-5.68-1.396c-1.155.069-2.408.866-3.793 2.36a.5.5 0 0 0 .232.821l6.053 1.692l-2.431 2.652c-1.835-.256-2.979-.369-3.482-.339c-.78.047-1.6.57-2.497 1.535a.5.5 0 0 0 .232.822l4.78 1.335l.6.6l1.335 4.78a.5.5 0 0 0 .822.231c.965-.895 1.488-1.716 1.534-2.497Zm-1.365-3.6c.27 1.91.393 3.11.367 3.541c-.02.332-.225.742-.629 1.217L7.8 13.375a.5.5 0 0 0-.128-.219l-.786-.785a.5.5 0 0 0-.219-.128L2.6 11.107c.475-.404.884-.61 1.217-.63c.431-.025 1.631.097 3.543.368a.5.5 0 0 0 .438-.157l3.16-3.447a.5.5 0 0 0-.234-.82L4.7 4.74c.979-.93 1.83-1.406 2.535-1.448c.734-.043 2.637.44 5.608 1.45a.5.5 0 0 0 .53-.136l.65-.709c1.692-1.69 2.827-2.066 3.508-1.385c.68.681.305 1.815-1.402 3.522l-.693.635a.5.5 0 0 0-.136.53c1.009 2.97 1.493 4.874 1.45 5.608c-.042.704-.518 1.556-1.449 2.535L13.62 9.319a.5.5 0 0 0-.82-.234l-3.446 3.16a.5.5 0 0 0-.157.44Z" clip-rule="evenodd"/></svg>
                                                    </div>
                                                    <div class="px-2 text-xs font-medium uppercase text-gray-500">
                                                        Progress 2
                                                    </div>
                                                    <div
                                                        class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500">
                                                        {{ $datas->progress2 }}
                                                    </div>
                                                </div>
                                            @endif
                                            <div
                                                class="flex-auto border-t-2 transition duration-500 ease-in-out {{ $active >= 4 ? 'border-teal-600' : 'border-gray-300'}}"></div>
                                            <div
                                                class="flex items-center {{ $active >= 4 ? 'text-white' : ''}} relative">
                                                <div
                                                    class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 {{ $active >= 4 ? 'bg-teal-600' : ''}} border-gray-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                         fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-database ">
                                                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                                    </svg>
                                                </div>
                                                <div class="px-2 text-xs font-medium uppercase text-gray-500">
                                                    Destination
                                                </div>
                                                <div
                                                    class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500">
                                                    {{ $datas->destination }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="relative overflow-x-auto my-10">
                                        <p class="text-xl mb-3 font-semibold">Basic Details</p>
                                        <table class="w-full text-sm text-left text-gray-500 border rounded-xl ">
                                            <thead class="text-base text-gray-700 capitalize bg-slate-100">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Receipt no
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
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    {{ $datas->id }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $datas->bl_no }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $datas->booking_no }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $datas->starting_point }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $datas->destination }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="flex items-center gap-10 justify-between">
                                        <p class="text-xl mb-3 font-semibold">Route scheduling</p>
                                        <ol class="relative text-gray-500 border-l border-gray-200 my-10">
                                            @if(isset($datas->status))
                                                @foreach ($datas->status->reverse() as $status)
                                                    <li class="{{ $loop->last ? '' : 'mb-8' }} ml-6">
                                                        <span
                                                            class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -left-4 ring-4 ring-white ">
                                                            <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true"
                                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                      d="M1 5.917 5.724 10.5 15 1.5"/>
                                                            </svg>
                                                        </span>
                                                        <h3 class="font-medium leading-tight font-semibold"><strong>{{ $status->title }}</strong></h3>
                                                        <p class="text">{{ $status->description }}</p>
                                                        <p class='text'>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $status->time)->format('jS F, Y') }}</p>

                                                    </li>
                                                @endforeach
                                            @endif
                                        </ol>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                            <div
                                                class="bg-slate-50 border border-zinc-50 px-4 py-2 flex items-center rounded-lg">
                                                <p><strong>Vessel Voy No. :</strong> {{ $datas->vessel_voy_no }}</p>
                                            </div>
                                            <div
                                                class="bg-slate-50 border border-zinc-50 px-4 py-2 flex items-center rounded-lg">
                                                <p><strong>No. of Containers (booking quantity)
                                                        :</strong> {{ $datas->no_of_containers }}</p>
                                            </div>
                                            <div
                                                class="bg-slate-50 border border-zinc-50 px-4 py-2 flex items-center rounded-lg">
                                                <p><strong>No. of Packages :</strong> {{ $datas->no_of_packages }}</p>
                                            </div>
                                            <div
                                                class="bg-slate-50 border border-zinc-50 px-4 py-2 flex items-center rounded-lg">
                                                <p><strong>Measurement :</strong> {{ $datas->measurement }}</p>
                                            </div>
                                            <div
                                                class="bg-slate-50 border border-zinc-50 px-4 py-2 flex items-center rounded-lg">
                                                <p><strong>On Board Date
                                                        :</strong> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $datas->on_board_date)->format('jS F, Y') }}
                                                </p>
                                            </div>
                                            <div
                                                class="bg-slate-50 border border-zinc-50 px-4 py-2 flex items-center rounded-lg">
                                                <p><strong>Service Requirement
                                                        :</strong> {{ $datas->service_requirement }}</p>
                                            </div>
                                            <div
                                                class="bg-slate-50 border border-zinc-50 px-4 py-2 col-span-3 flex items-center rounded-lg">
                                                <p><strong>Gross Cargo Weight
                                                        :</strong> {{ $datas->gross_cargo_weight }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="relative overflow-x-auto my-10">
                                        <p class="text-xl mb-3 font-semibold">Container Section</p>
                                        <table class="w-full text-sm text-left text-gray-500 border rounded-xl ">
                                            <thead class="text-base text-gray-700 capitalize bg-slate-100">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Container No
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Size
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Type
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Seal No
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Move Type
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Latest Event
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Place
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    VGM
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="bg-white border-b ">
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    {{ $datas->container_no }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $datas->size }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $datas->type }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $datas->seal_no }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $datas->moveType }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $datas->latest_event }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $datas->place }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $datas->vgm }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>


            </div>
        </div>
    </div>
@endsection
