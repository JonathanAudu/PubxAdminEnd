@extends('components.main-layout')
@section('contents')
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 text-center capitalize lg:text-4xl">Highlights</h1>
        <a href="addhighlight " class="text-xl font-semibold text-gray-800 hover:underline  ">
            add New Highlight
        </a>



        <table class="w-full">
            <thead>
                <tr
                    class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="px-4 py-3">S/N</th>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Information</th>
                    <th class="px-4 py-3">Event_Start_Date</th>
                    <th class="px-4 py-3">Event_End_Date</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @php
                    $i =1
                @endphp
                @forelse ($highlights as $highlight)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold text-black">
                                    {{$i++}}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 border">

                            <div class="">
                                <a href="" class="hover:underline ">
                                    <p class="font-semibold text-black mx-2"> {{$highlight->title}}</p>
                                </a>
                            </div>
                        </td>
                        <td class="px-4 py-3 border">

                            <div class="">
                                <a href="" class="hover:underline ">
                                    <p class="font-semibold text-black mx-2"> {{$highlight->info}}</p>
                                </a>
                            </div>
                        </td>
                        <td class="px-4 py-3 border">

                            <div class="">
                                <a href="" class="hover:underline ">
                                    <p class="font-semibold text-black mx-2"> {{$highlight->event_start_date}}</p>
                                </a>
                            </div>
                        </td>
                        <td class="px-4 py-3 border">

                            <div class="">
                                <a href="" class="hover:underline ">
                                    <p class="font-semibold text-black mx-2"> {{$highlight->event_end_date}}</p>
                                </a>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm border">
                            <a href="{{ route('deleteHighlight', $highlight->id) }}">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold text-black">No Items yet</p>
                                    <p class="text-xs text-gray-600"></p>
                                </div>
                            </div>
                        </td>

                        <td class="px-4 py-3 text-xs border">
                            --
                        </td>
                        <td class="px-4 py-3 text-sm border"> -- </td>
                    </tr>
                @endforelse

            </tbody>
        </table>





    </div>



    </div>
    </div>
    </section>
@endsection
