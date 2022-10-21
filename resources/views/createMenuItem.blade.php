@extends('components.layout')
    @section('contents')

        <div class="flex grow items-center justify-left p-12">
            <div class="mx-auto w-full max-w-[550px]">
                <h1 class="text-3xl font-semibold text-gray-800 text-center mb-8 capitalize lg:text-4xl">Add Menu Item</h1>
            <form action="{{route('storeitem')}}" method="POST" enctype="multipart/form-data" class=" p-7 bg-slate-100 rounded">
                @csrf
                <h1 class="text-3xl font-semibold text-gray-800 text-left mb-8 capitalize lg:text-4xl">Menu Group Name: <span class="text-1xl font-semibold text-gray-800 text-left mb-8 capitalize lg:text-1xl" >{{$menu_groups->menu_name}}</span></h1>


                <div class="mb-5">
                <label
                    for="name"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                >
                    New Menu item
                </label>
                <input
                    type="text"
                    name="menu_groups_id"
                    id="menugroupid"
                    autocomplete="on"
                    placeholder="New menu item"
                    value="{{$menu_groups->id}}"
                    hidden
                />
                <input
                    type="text"
                    name="menu_item"
                    id="menu-item"
                    autocomplete="on"
                    placeholder="New menu item"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 my-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />

                <input
                    type="number"
                    name="price"
                    value='0'
                    id="price"
                    autocomplete="off"
                    placeholder="Price of Item"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 my-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />

                <input
                    type="number"
                    name="discount"
                    value='0'
                    id="discount"
                    autocomplete="off"
                    placeholder="Discount"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 my-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />

                <div class="flex items-center mb-4">
                    <input id="default-checkbox" name="is_featured" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Feautured</label>
                </div>

                <div class="image">
                    <label><h4>Add image</h4></label>
                    <input type="file" class="mb-3" name="image">
                </div>

                <button
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                >
                    Submit
                </button>
                </div>
            </form>
            </div>
        </div>

    @endsection
