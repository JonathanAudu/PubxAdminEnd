@extends('components.layout')
    @section('contents')
    <section class="container  px-6 py-10 mx-auto p-6 font-mono">

    <div class="max-w-sm rounded overflow-hidden shadow-lg mb-4">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$menugroup->menu_name}}</div>
        </div>
    </div>

        <h1 class="text-3xl font-semibold text-gray-800 text-center capitalize lg:text-4xl">Menu Item Lists</h1>

        <div class="flex justify-between ">
            <a href="{{ route('additem', $menugroup->id)}}" class="text-xl font-semibold text-gray-800 hover:underline ">
                add New Item
            </a>


            @if ( session()->get('loginId') == $menugroup->user_id )

                <a href="{{ route('deletemenugroup', $menugroup->id)}}" class="text-xl font-semibold text-red-800 hover:underline"
                onclick="return confirm('Are you sure you want to delete the whole project?');" >
                    Delete group
                </a>

            @endif

        </div>
        <div class="w-full mb-8  mt-8 overflow-hidden rounded-lg shadow-lg">
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="px-4 py-3">S/n</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3">Feautured</th>
                    <th class="px-4 py-3">Discount</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @php
                    $i = 1;
                @endphp
                @forelse ( $menuitemlist as $item)
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
                    <div class="flex items-center text-sm">
                        <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                            <img class="object-cover w-full h-full rounded-full" src="{{asset('images/'.$item->photo)}}" alt="" loading="lazy" />
                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                      <div class="flex">
                        <p class="font-semibold text-black mx-2">{{$item->menu_item}}</p>
                        <a href="{{route('edititem', $item->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </a>
                      </div>
                    </div>
                  </td>

                  <td class="px-4 py-3 border">
                    <p class="font-semibold text-black">{{$item->price}}</p>
                  </td>
                  <td class="px-4 py-3 text-sm border">
                    @if ($item->is_featured == 0)
                    <p class="font-semibold text-black">
                        No
                    </p>
                    @elseif ($item->is_featured == 1)
                    <p class="font-semibold text-black">
                        Yes
                    </p>
                    @endif
                  </td>
                    <td class="px-4 py-3 border">
                        <p class="font-semibold text-black">
                            {{$item->discount}} %
                        </p>

                    </td>

                  <td class="px-4 py-3 text-sm border">
                    <a href="{{route ('deleteitem', $item->id)}}">Delete</a>
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
            {{$menuitemlist->links()}}
          </div>
        </div>
    </section>
    @endsection
