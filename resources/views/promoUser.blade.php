@extends('components.layout')
    @section('contents')
    <section class="container  px-6 py-10 mx-auto p-6 font-mono">

        <div class="max-w-sm rounded overflow-hidden shadow-lg mb-4">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{$promo->promo_name}}</div>
            </div>
        </div>


        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 text-center capitalize lg:text-4xl"> List of user in Promo</h1>

                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">S/n</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($promo_users as $promouser )
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

                                    <p class="font-semibold text-black mx-2">{{ $promouser->user[0]->name }}</p>

                                </div>
                            </td>



                                <td class="px-4 py-3 border">
                                    <p class="font-semibold text-black">
                                        {{ $promouser->user[0]->email }}
                                    </p>

                                </td>

                            <td class="px-4 py-3 text-sm border">

                                <a href="{{ route ('deletePromoUser', [ $promo->id, $promouser->id] )}}">Delete</a>
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
