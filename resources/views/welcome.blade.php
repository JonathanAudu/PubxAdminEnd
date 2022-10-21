@extends('components.main-layout')
    @section('contents')
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 text-center capitalize lg:text-4xl">Welcome to PubX Dashboard</h1>


            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">


                <div class="lg:flex px-5 max-w-sm rounded overflow-hidden shadow-lg">


                    <div class="flex flex-col justify-between py-6 lg:mx-6">

                        <div class="flex justify-between">
                            <a href="{{route('nav')}}" class="text-xl font-semibold text-gray-800 hover:underline  ">
                                Menu
                            </a>


                        </div>

                        <p class="text-sm text-gray-500 ">

                        </p>

                        <span class="text-sm text-gray-500 ">

                        </span>
                    </div>


                </div>

                <div class="lg:flex px-5 max-w-sm rounded overflow-hidden shadow-lg">


                    <div class="flex flex-col justify-between py-6 lg:mx-6">

                        <div class="flex justify-between">
                            <a href="{{route('promo')}}" class="text-xl font-semibold text-gray-800 hover:underline  ">
                                Promo
                            </a>


                        </div>

                        <p class="text-sm text-gray-500 ">

                        </p>

                        <span class="text-sm text-gray-500 ">

                        </span>
                    </div>


                </div>


                <div class="lg:flex px-5 max-w-sm rounded overflow-hidden shadow-lg">


                    <div class="flex flex-col justify-between py-6 lg:mx-6">

                        <div class="flex justify-between">
                            <a href="{{route('reservation')}}" class="text-xl font-semibold text-gray-800 hover:underline  ">
                                Reservation
                            </a>


                        </div>

                        <p class="text-sm text-gray-500 ">

                        </p>

                        <span class="text-sm text-gray-500 ">

                        </span>
                    </div>


                </div>
                <div class="lg:flex px-5 max-w-sm rounded overflow-hidden shadow-lg">


                    <div class="flex flex-col justify-between py-6 lg:mx-6">

                        <div class="flex justify-between">
                            <a href="{{route('highlight')}}" class="text-xl font-semibold text-gray-800 hover:underline  ">
                                Highlights
                            </a>


                        </div>

                        <p class="text-sm text-gray-500 ">

                        </p>

                        <span class="text-sm text-gray-500 ">

                        </span>
                    </div>


                </div>

            </div>
        </div>
    </section>
    @endsection
