@extends('components.layout')
    @section('contents')

    <div class="flex grow items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <h1 class="text-3xl font-semibold text-gray-800 text-center mb-8 capitalize lg:text-4xl">Add Menu Group</h1>
            <form action="{{route('addmenugroup')}}" method="POST" enctype="multipart/form-data" class=" p-7 bg-slate-100 rounded">
                @csrf
                <div class="mb-5">
                <label
                    for="name"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                >
                    Menu Group Name
                </label>
                <input
                    type="string"
                    name="user_id"
                    id="name"
                    autocomplete="on"
                    placeholder="user_id"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    value=""
                    hidden
                />
                </div>

                <div class="form-group form-check mb-5">
                    <input
                    type="text"
                    name="menu_name"
                    id="name"
                    autocomplete="on"
                    placeholder="Menu Group Name"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    
                />
                </div>

                <div class="image">
                    <label><h4>Add image</h4></label>
                    <input type="file" class="mb-3" name="image">
                </div>


                <div>
                <button
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                >
                    Add
                </button>
                </div>
            </form>
        </div>
    </div>


    @endsection
