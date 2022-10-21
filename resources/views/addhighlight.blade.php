@extends('components.layout')
    @section('contents')

    <div class="flex grow items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <h1 class="text-3xl font-semibold text-gray-800 text-center mb-8 capitalize lg:text-4xl">Add A New Highlight</h1>
            <form action="{{route('storeHighlight')}}" method="POST" enctype="multipart/form-data" class=" p-7 bg-slate-100 rounded ">
                @csrf
                <div class="mb-5">


                {{-- <input
                    type="text"
                    name="id"
                    id="name"
                    autocomplete="on"
                    placeholder="id"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    value=""
                    hidden

                /> --}}
                <div>
                <div class="mb-5">
                <label
                    for="name"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                >
                    Title
                </label>
                <input
                    type="text"
                    name="title"
                    id="name"
                    autocomplete="on"
                    placeholder="title"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 mb-3  text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    value=""

                />

                </div>
                <div class="mb-5">
                <label
                    for="name"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                >
                    Information
                </label>
                <input
                    type="text"
                    name="info"
                    id="name"
                    autocomplete="on"
                    placeholder="info"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 mb-3  text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    value=""

                />

                </div>
                <div class="mb-5">
                    <label
                        for="name"
                        class="mb-3 block text-base font-medium text-[#07074D]"
                    >
                        Event-Start-Date
                    </label>
                    <input
                        type="date"
                        name="event_start_date"
                        id="name"
                        autocomplete="on"
                        placeholder="{{ date('d M Y', strtotime(today())) }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 mb-3  text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        value="{{ date('d M Y', strtotime(today())) }}"

                    />
                </div>
                <div class="mb-5">
                <label
                    for="name"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                >
                Event-End-Date
                </label>
                <input
                    type="date"
                    name="event_end_date"
                    id="name"
                    autocomplete="on"
                    placeholder="{{ date('d M Y', strtotime(today())) }}"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 mb-3  text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    value="{{ date('d M Y', strtotime(today())) }}"

                />

                </div>
                <div class="mb-5">
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
