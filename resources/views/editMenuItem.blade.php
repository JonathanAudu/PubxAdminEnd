@extends('components.layout')
    @section('contents')


        <div class="flex grow items-center justify-left p-12">
            <div class="mx-auto w-full max-w-[550px]">
                <h1 class="text-3xl font-semibold text-gray-800 text-center mb-8 capitalize lg:text-4xl">Edit Item</h1>
            <form action="{{route('updateitem')}}" method="POST" class=" p-7 bg-slate-100 rounded" enctype="multipart/form-data">
                @csrf

                <div class="mb-5">
                    <label
                        for="name"
                        class="mb-3 block text-base font-medium text-[#07074D]"
                    >
                        Edit Item
                    </label>

                    <input
                        type="text"
                        name="menu_groups_id"
                        id="menuid"
                        value="{{$menuitem->menu_groups_id}}"
                        hidden
                    />

                    <input
                        type="text"
                        name="id"
                        id="itemid"
                        value="{{$menuitem->id}}"
                        hidden
                    />

                    <input
                        type="text"
                        name="menu_item"
                        id="name"
                        autocomplete="off"
                        placeholder="New Task"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 mb-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        value="{{$menuitem->menu_item}}"
                    />

                    <input
                        type="text"
                        name="price"
                        id="name"
                        autocomplete="off"
                        placeholder="New Task"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6  mb-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        value="{{$menuitem->price}}"
                    />

                    <input
                        type="number"
                        name="discount"
                        id="discount"
                        autocomplete="off"
                        placeholder="Discount"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 my-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        value="{{$menuitem->discount}}"
                    />

                    <div class="flex items-center mb-4">
                        <input id="default-checkbox" name="is_featured" type="checkbox" value="1" class="w-4 h-4

                        text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"

                        @if ($menuitem->is_featured == 1)
                        checked
                        @elseif ($menuitem->is_featured == 0)

                        @endif>
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Feautured</label>
                    </div>



                    <div>
                    <img src="{{asset('images/'.$menuitem->photo)}}"
                    style="height: 100px; width: 150px;">

                    <input type="text" name="oldPics" value="{{$menuitem->photo}}" hidden>

                        <div class="image">
                            <label><h4>Add image</h4></label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div>

                <button
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                >
                    update
                </button>
                </div>
            </form>
            </div>
        </div>

    @endsection
