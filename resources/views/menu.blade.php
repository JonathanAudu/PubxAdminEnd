@extends('components.main-layout')
    @section('contents')
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 text-center capitalize lg:text-4xl">Menu Group Lists</h1>
            <a href="addmenugroup" class="text-xl font-semibold text-gray-800 hover:underline  ">
               add New Menu Group
            </a>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">


                @foreach ($menugrouplist as $menuGroup)

                <div class="lg:flex px-5 max-w-sm rounded overflow-hidden shadow-lg">



                    <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{asset('images/'.$menuGroup->photo)}}" alt="">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">

                    <div class="flex justify-between">
                        <a href="{{route('item', $menuGroup->id )}}" class="text-xl font-semibold text-gray-800 hover:underline  ">
                            {{$menuGroup->menu_name}}
                        </a>

                        <a href="{{route('editgroup', $menuGroup->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                        </a>
                    </div>

                        <p class="text-sm text-gray-500 ">
                            created by: {{$menuGroup->getUsers[0]->name}}
                        </p>

                        <span class="text-sm text-gray-500 ">
                            On: {{$menuGroup->created_at->format('jS \of F Y h:i:s A')}}
                        </span>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection
