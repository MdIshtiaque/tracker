<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {

                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
</head>


<body class="bg-gradient-to-r from-slate-50 via-purple-50 to-zinc-50">

<!-- navbar edits -->

<nav class="bg-white border-gray-200 sticky top-0 left-0 w-full z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-center px-20 mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo"/>
            <span class="self-center text-2xl font-semibold whitespace-nowrap ">Company</span>
        </a>

    </div>
</nav>

<!-- rownok edits -->
<div class="container mx-auto my-10">
    <!-- Radio buttons -->
    <form class="flex flex-col items-center" action="" method="get">
        <p class="text-xl mb-5 font-semibold">Trace Your Order Here</p>
        @csrf
        <!-- Radio buttons -->
        <div class="flex mb-3">
            <div class="form-check form-check-inline" style="padding-right: 10px">
                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                       id="inlineRadio1"
                       value="option1" {{ $request->inlineRadioOptions == 'option1' ? 'checked' : ''}}>
                <label class="form-check-label" for="inlineRadio1">Booking No</label>
            </div>
            <div class="form-check form-check-inline" style="padding-right: 10px">
                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                       id="inlineRadio2"
                       value="option2" {{ $request->inlineRadioOptions == 'option2' ? 'checked' : ''}}>
                <label class="form-check-label" for="inlineRadio2">BL No</label>
            </div>
            <div class="form-check form-check-inline" style="padding-right: 10px">
                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                       id="inlineRadio3"
                       value="option3" {{ $request->inlineRadioOptions == 'option3' ? 'checked' : ''}}>
                <label class="form-check-label" for="inlineRadio2">Container No.</label>
            </div>
            <div class="form-check form-check-inline" style="padding-right: 10px">
                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                       id="inlineRadio4"
                       value="option4" {{ $request->inlineRadioOptions == 'option4' ? 'checked' : ''}}>
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
            <a type="submit" href="{{ route('home') }}"
               class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-teal-700 rounded-lg border border-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300">
                Reset
            </a>
        </div>
    </form>
    <!-- routing -->


    @if (isset($datas->id))
        <p class="text-xl my-10 font-semibold text-center">Tracking Result</p>
        @php
            $active = 0;
            if (isset($datas->currentPort)){
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
                }
        @endphp
        <div class="">
            <div class="mx-4 p-4">
                <div class="flex items-center">
                    <div
                        class="flex items-center {{ $active >= 1 ? 'text-white' : 'text-blue'}} relative">
                        <div
                            class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 {{ $active >= 1 ? 'bg-blue-600' : ''}} border-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-bookmark ">
                                <path
                                    d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>

                        <div class=" text-xs font-medium capitalize text-blue-600 px-2">
                            Starting Point
                        </div>
                        <div
                            class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-blue-600">
                            {{ $datas->starting_point }}
                        </div>
                    </div>
                    @if (isset($datas->progress1))
                        <div
                            class="flex-auto border-t-2 transition duration-500 ease-in-out {{ $active >= 2 ? 'border-orange-600' : 'border-gray-300'}}"></div>
                        <div
                            class="flex items-center {{ $active >= 2 ? 'text-white' : 'text-black'}} relative">
                            <div
                                class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 {{ $active >= 2 ? 'bg-orange-600' : ''}} border-orange-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M10.562 16.285c.03-.502-.083-1.645-.338-3.48l2.652-2.432l1.691 6.053a.5.5 0 0 0 .822.232c1.493-1.386 2.291-2.639 2.36-3.793c.052-.886-.412-2.749-1.397-5.68l.47-.43c2.062-2.062 2.62-3.747 1.417-4.951c-1.204-1.204-2.89-.646-4.937 1.4l-.445.485c-2.932-.984-4.795-1.449-5.68-1.396c-1.155.069-2.408.866-3.793 2.36a.5.5 0 0 0 .232.821l6.053 1.692l-2.431 2.652c-1.835-.256-2.979-.369-3.482-.339c-.78.047-1.6.57-2.497 1.535a.5.5 0 0 0 .232.822l4.78 1.335l.6.6l1.335 4.78a.5.5 0 0 0 .822.231c.965-.895 1.488-1.716 1.534-2.497Zm-1.365-3.6c.27 1.91.393 3.11.367 3.541c-.02.332-.225.742-.629 1.217L7.8 13.375a.5.5 0 0 0-.128-.219l-.786-.785a.5.5 0 0 0-.219-.128L2.6 11.107c.475-.404.884-.61 1.217-.63c.431-.025 1.631.097 3.543.368a.5.5 0 0 0 .438-.157l3.16-3.447a.5.5 0 0 0-.234-.82L4.7 4.74c.979-.93 1.83-1.406 2.535-1.448c.734-.043 2.637.44 5.608 1.45a.5.5 0 0 0 .53-.136l.65-.709c1.692-1.69 2.827-2.066 3.508-1.385c.68.681.305 1.815-1.402 3.522l-.693.635a.5.5 0 0 0-.136.53c1.009 2.97 1.493 4.874 1.45 5.608c-.042.704-.518 1.556-1.449 2.535L13.62 9.319a.5.5 0 0 0-.82-.234l-3.446 3.16a.5.5 0 0 0-.157.44Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="px-2 text-xs font-medium capitalize text-orange-600">
                                Progress 1
                            </div>
                            <div
                                class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-orange-600">
                                {{ $datas->progress1 }}
                            </div>

                        </div>
                    @endif
                    @if (isset($datas->progress2))
                        <div
                            class="flex-auto border-t-2 transition duration-500 ease-in-out {{ $active >= 3 ? 'border-yellow-300' : ''}}"></div>
                        <div
                            class="flex items-center {{ $active >= 3 ? 'text-black' : ''}} relative">
                            <div
                                class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 {{ $active >= 3 ? 'bg-yellow-300' : ''}} border-yellow-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M10.562 16.285c.03-.502-.083-1.645-.338-3.48l2.652-2.432l1.691 6.053a.5.5 0 0 0 .822.232c1.493-1.386 2.291-2.639 2.36-3.793c.052-.886-.412-2.749-1.397-5.68l.47-.43c2.062-2.062 2.62-3.747 1.417-4.951c-1.204-1.204-2.89-.646-4.937 1.4l-.445.485c-2.932-.984-4.795-1.449-5.68-1.396c-1.155.069-2.408.866-3.793 2.36a.5.5 0 0 0 .232.821l6.053 1.692l-2.431 2.652c-1.835-.256-2.979-.369-3.482-.339c-.78.047-1.6.57-2.497 1.535a.5.5 0 0 0 .232.822l4.78 1.335l.6.6l1.335 4.78a.5.5 0 0 0 .822.231c.965-.895 1.488-1.716 1.534-2.497Zm-1.365-3.6c.27 1.91.393 3.11.367 3.541c-.02.332-.225.742-.629 1.217L7.8 13.375a.5.5 0 0 0-.128-.219l-.786-.785a.5.5 0 0 0-.219-.128L2.6 11.107c.475-.404.884-.61 1.217-.63c.431-.025 1.631.097 3.543.368a.5.5 0 0 0 .438-.157l3.16-3.447a.5.5 0 0 0-.234-.82L4.7 4.74c.979-.93 1.83-1.406 2.535-1.448c.734-.043 2.637.44 5.608 1.45a.5.5 0 0 0 .53-.136l.65-.709c1.692-1.69 2.827-2.066 3.508-1.385c.68.681.305 1.815-1.402 3.522l-.693.635a.5.5 0 0 0-.136.53c1.009 2.97 1.493 4.874 1.45 5.608c-.042.704-.518 1.556-1.449 2.535L13.62 9.319a.5.5 0 0 0-.82-.234l-3.446 3.16a.5.5 0 0 0-.157.44Z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="px-2 text-xs font-medium uppercase text-yellow-600">
                                Progress 2
                            </div>
                            <div
                                class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-yellow-600">
                                {{ $datas->progress2 }}
                            </div>
                        </div>
                    @endif
                    <div
                        class="flex-auto border-t-2 transition duration-500 ease-in-out {{ $active >= 4 ? 'border-green-600' : ''}}"></div>
                    <div
                        class="flex items-center {{ $active >= 4 ? 'text-white' : 'text-gray'}} relative">
                        <div
                            class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 {{ $active >= 4 ? 'bg-green-600' : ''}} border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-database ">
                                <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                            </svg>
                        </div>
                        <div class="px-2 text-xs font-medium uppercase text-green-500">
                            Destination
                        </div>
                        <div
                            class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-green-500">
                            {{ $datas->destination }}
                        </div>
                    </div>
                </div>
            </div>


            <div class="relative overflow-x-auto my-20">
                <p class="text-xl my-5 font-semibold">Basic Details</p>
                <table class="w-full text-sm text-left text-gray-500 border rounded-lg ">
                    <thead class="text-base text-gray-700 capitalize bg-blue-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Receipt no
                        </th>
                        <th scope="col" class="px-6 py-3">
                            BL no
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Booking no
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Starting Point
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Destination
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="bg-white border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
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
            <p class="text-xl my-5 font-semibold">Route scheduling</p>
            <div class="grid grid-cols-3 items-start gap-10 mt-10">

                <ol class="relative text-gray-500 border-l border-gray-200 col-span-1">
                    @if(isset($datas->status))
                        @foreach ($datas->status->reverse() as $status)
                            <li class="{{ $loop->last ? '' : 'mb-8' }} ml-6">
                                                        <span
                                                            class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -left-4 ring-4 ring-white ">
                                                            <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400"
                                                                 aria-hidden="true"
                                                                 xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                 viewBox="0 0 16 12">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                      stroke-linejoin="round" stroke-width="2"
                                                                      d="M1 5.917 5.724 10.5 15 1.5"/>
                                                            </svg>
                                                        </span>
                                <h3 class="font-medium leading-tight font-semibold">
                                    <strong>{{ $status->title }}</strong></h3>
                                <p class="text">{{ $status->description }}</p>
                                <p class='text'>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $status->time)->format('jS F, Y') }}</p>

                            </li>
                        @endforeach
                    @endif
                </ol>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 col-span-2">
                    <div class="bg-teal-100 border border-teal-400 px-4 py-2 flex items-center shadow-md rounded-lg">
                        <p>Vessel Voy No. : {{ $datas->vessel_voy_no }}</p>
                    </div>
                    <div class="bg-teal-100 border border-teal-400 px-4 py-2 flex items-center shadow-md rounded-lg">
                        <p>No. of Containers (booking quantity) : {{ $datas->no_of_containers }}</p>
                    </div>
                    <div class="bg-teal-100 border border-teal-400 px-4 py-2 flex items-center shadow-md rounded-lg">
                        <p>No. of Packages : {{ $datas->no_of_packages }}</p>
                    </div>
                    <div
                        class="bg-violet-100 border border-violet-400 px-4 py-2 flex items-center shadow-md rounded-lg">
                        <p>Measurement : {{ $datas->measurement }}</p>
                    </div>
                    <div
                        class="bg-violet-100 border border-violet-400 px-4 py-2 flex items-center shadow-md rounded-lg">
                        <p>On Board Date
                            : {{ \Carbon\Carbon::createFromFormat('Y-m-d', $datas->on_board_date)->format('jS F, Y') }}</p>
                    </div>
                    <div
                        class="bg-violet-100 border border-violet-400 px-4 py-2 flex items-center shadow-md rounded-lg">
                        <p>Gross Cargo Weight : {{ $datas->gross_cargo_weight }} </p>
                    </div>
                    <div
                        class="bg-orange-100 border border-orange-400 px-4 py-2 col-span-3  flex justify-centeritems-center shadow-md rounded-lg">
                        <p>Service Requirement : {{ $datas->service_requirement }}</p>
                    </div>
                </div>
            </div>
            <div class="relative overflow-x-auto my-20">
                <p class="text-xl my-5 font-semibold">Container Section</p>
                <table class="w-full text-sm text-left text-gray-500 border rounded-lg ">
                    <thead class="text-base text-gray-700 capitalize bg-blue-50">
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
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
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
            @endif


        </div>
</div>

<!-- footer area -->
<div class="inset-x-0 bottom-0 px-4 pt-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-20" style="background-color: #9ca8b3">
    <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
        <div class="sm:col-span-2">
            <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
                <svg class="w-8 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linejoin="round"
                     stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
                    <rect x="3" y="1" width="7" height="12"></rect>
                    <rect x="3" y="17" width="7" height="6"></rect>
                    <rect x="14" y="1" width="7" height="6"></rect>
                    <rect x="14" y="11" width="7" height="12"></rect>
                </svg>
                <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Company</span>
            </a>
            <div class="mt-6 lg:max-w-sm">
                <p class="text-sm text-gray-800">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam.
                </p>
                <p class="mt-4 text-sm text-gray-800">
                    Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                </p>
            </div>
        </div>
        <div class="space-y-2 text-sm">
            <p class="text-base font-bold tracking-wide text-gray-900">Contacts</p>
            <div class="flex">
                <p class="mr-1 text-gray-800">Phone:</p>
                <a href="tel:850-123-5021" aria-label="Our phone" title="Our phone"
                   class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">850-123-5021</a>
            </div>
            <div class="flex">
                <p class="mr-1 text-gray-800">Email:</p>
                <a href="mailto:info@lorem.mail" aria-label="Our email" title="Our email"
                   class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">info@lorem.mail</a>
            </div>
            <div class="flex">
                <p class="mr-1 text-gray-800">Address:</p>
                <a href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer" aria-label="Our address"
                   title="Our address"
                   class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">
                    312 Lovely Street, NY
                </a>
            </div>
        </div>
        <div>
            <span class="text-base font-bold tracking-wide text-gray-900">Social</span>
            <div class="flex items-center mt-1 space-x-3">
                <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                        <path
                            d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z"
                        ></path>
                    </svg>
                </a>
                <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                    <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
                        <circle cx="15" cy="15" r="4"></circle>
                        <path
                            d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"
                        ></path>
                    </svg>
                </a>
                <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                        <path
                            d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"
                        ></path>
                    </svg>
                </a>
            </div>
            <p class="mt-4 text-sm text-gray-500">
                Bacon ipsum dolor amet short ribs pig sausage prosciutto chicken spare ribs salami.
            </p>
        </div>
    </div>
    <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
        <p class="text-sm text-gray-600">
            © Copyright 2020 Lorem Inc. All rights reserved.
        </p>
        <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
            <li>
                <a href="/"
                   class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">F.A.Q</a>
            </li>
            <li>
                <a href="/"
                   class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Privacy
                    Policy</a>
            </li>
            <li>
                <a href="/"
                   class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Terms
                    &amp; Conditions</a>
            </li>
        </ul>
    </div>
</div>
</body>

</html>
