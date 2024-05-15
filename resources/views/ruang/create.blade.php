@extends('sidebar')

@section('content')
        <!-- content -->
        <div class="flex-1 p-10">
            <nav class="rounded-md px-6 py-4 w-full">
                <ol class="list-reset float-right font-semibold hidden sm:flex">
                    <li><a href="#" class="text-gray-800 hover:text-gray-900">Data</a></li>
                    <li><span class="text-gray-700 mx-2">/</span></li>
                    <li><a href="#" class="text-gray-800 hover:text-gray-900">Ruangan</a></li>
                </ol>
                <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">DATA RUANGAN</h3>
            </nav>

            <div class="h-screen">
                <section class="flex items-center text-gray-600">
                    <div class="container px-5 py-5 mx-auto">
                        <div class="my-1 px-1 w-full">
                            <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                                <h1 class="flex justify-center text-2xl font-semibold">DATA RUANGAN</h1>
                                <h2 class="flex justify-center text-md">Mohon Menambahkan Data Dengan Benar</h2>
                                <br>

                                <form action="{{ url('ruang') }}" method="post">
                                    @csrf
                                    <div class="space-y-2">
                                        <label for="nama_ruang" class="ml-3 font-medium">Nama Ruang</label>
                                        <input type="text" name="nama_ruang" id="nama_ruang" required value="{{ Session::get
                                            ('nama_ruang') }}"
                                            class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                    </div>
                                    <br>

                                    <div class="flex justify-center">
                                        <button type="submit"
                                            class="w-48 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                            SIMPAN
                                        </button>
                                    </div>
                                    <br>
                                </form>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- content ends -->
        @endsection