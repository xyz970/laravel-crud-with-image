
@extends('layout.base',['title'=>'Data'])

@section('content')
<section class="px-3 py-5">
    @include('sweetalert::alert')
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto ">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                <div class="flex justify-end px-4 py-4">
                    <a href="show-insert-form" class="text-white bg-green-400 hover:bg-green-500 px-4 py-2 rounded antialiased font-bold">Tambah Data</a>
                </div>
                    <div id="table"></div>
                {{-- <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    
                </div> --}}
                
            </div>
        </div>
    </div>
</section>
@endsection