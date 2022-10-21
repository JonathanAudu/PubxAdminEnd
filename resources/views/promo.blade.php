@extends('components.main-layout')
    @section('contents')
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 text-center capitalize lg:text-4xl">Promo</h1>
            <a href="addpromo" class="text-xl font-semibold text-gray-800 hover:underline  ">
               add New promo
            </a>



                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">S/n</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Code</th>
                                <th class="px-4 py-3">Total</th>
                                <th class="px-4 py-3">Expiry</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @php
                                $i = 1;
                            @endphp
                            @forelse ( $promolist as $promo)
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
                                    <a href="{{ route('promoUser', [ $promo->id, $promo->promo_code])}}" class="hover:underline ">
                                    <p class="font-semibold text-black mx-2">{{$promo->promo_name}}</p>
                                    </a>
                                </div>
                            </td>

                            <td class="px-4 py-3 border">
                                <p class="font-semibold text-black">{{$promo->promo_code}}</p>
                            </td>
                            <td class="px-4 py-3 text-sm border">
                                {{$promo->promo_total}}
                            </td>
                                <td class="px-4 py-3 border">
                                    <p class="font-semibold text-black">
                                    {{$promo->promo_expiry}}
                                    </p>

                                </td>

                            <td class="px-4 py-3 text-sm border">
                                <a href="{{route('deletePromo', $promo->id)}}">Delete</a>
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
