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


<body class="bg-gradient-to-r from-slate-50 via-purple-50 to-zinc-50 ">

<!-- navbar edits -->

<nav class="bg-white border-gray-200 sticky top-0 left-0 w-full z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-center px-20 mx-auto p-4">
   
        <a href="http://marinerx.co.uk/assets/images/footer-logo.png" class="flex items-center">
            <img src="http://marinerx.co.uk/assets/images/logo.png" class="h-10 mr-3" alt="Flowbite Logo"/>
           
        </a>

    </div>
</nav>

<!-- rownok edits -->
<div class="relative container mx-auto min-h-[400px] mb-10 mt-20 items-center">
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
                <div class="flex flex-col md:flex-row items-center">
                    <div
                        class="flex flex-col md:flex-row items-center {{ $active >= 1 ? 'text-white' : 'text-blue'}} relative">
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
                            class="flex flex-col md:flex-auto border-t-2 transition duration-500 ease-in-out {{ $active >= 2 ? 'border-orange-600' : 'border-gray-300'}}"></div>
                        <div
                            class="flex flex-col md:flex-row items-center {{ $active >= 2 ? 'text-white' : 'text-black'}} relative">
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


            <div class="relative overflow-auto md:my-20">
                <p class="text-xl my-5 font-semibold">Basic Details</p>
                <table class="w-full text-sm text-left text-gray-500 border rounded-lg overflow-x-auto">
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
            <p class="text-xl my-5 font-semibold pl-10 md:pl-0">Route scheduling</p>
            <div class="grid grid-cols-1 md:grid-cols-3 items-center md:items-start gap-10 mt-10 px-10">

                <ol class="relative text-gray-500 border-l border-gray-200 md:col-span-1">
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
                                <h3 class="font-medium leading-tight ">
                                    <strong>{{ $status->title }}</strong></h3>
                                <p class="text">{{ $status->description }}</p>
                                <p class='text'>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $status->time)->format('jS F, Y') }}</p>

                            </li>
                        @endforeach
                    @endif
                </ol>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:col-span-2">
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
                        class="bg-orange-100 border border-orange-400 px-4 py-2 md:col-span-3  flex justify-center items-center shadow-md rounded-lg">
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
<div class="bg-[#002B35] ">

    <div class="flex flex-col justify-center items-center px-10 md:px-20 pt-20 text-white">
    <img src="http://marinerx.co.uk/assets/images/footer-logo.png" class="w-1/2" alt="logo"/>
<p class="text-white text-justify">Welcome to MarinerX Logistics, your ultimate partner in seamless cargo shipping and transportation solutions. With a dedication to excellence, we navigate the seas with precision, delivering your goods safely and swiftly across the globe. Trust MarinerX for efficient, reliable, and expert logistics services.At MarinerX, our experienced team ensures efficient customs clearance and advanced tracking, guaranteeing peace of mind throughout the entire shipping process. Experience excellence with MarinerX Logistics today.</p>
<div class="flex gap-2 items-center mt-5">
<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z"/><circle cx="12" cy="10" r="3"/></svg>
<p>Bangladesh </p>
</div>
 <div class="w-full h-[1px] mt-5 bg-gray-100"></div>
 <div class="flex flex-col justify-between items-center w-full my-4">
                <p>© 2023 Fastrans- Logistics Services. All rights reserved.
Made by with  Thrive Digital</p>
<p>made with Trive Day</p>
 </div>
    </div>


</div>

</body>

</html>
