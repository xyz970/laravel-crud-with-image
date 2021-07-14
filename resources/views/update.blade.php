@extends('layout.form',['title'=>'Ubah Data'])
@section('form')
<section class="flex items-center justify-center">
    <div class="w-1/2">
        <div class="py-8 ">
            <h2 class="font-bold text-2xl">Ubah Data</h2>
        </div>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data" method="POST" action="/update/{{$student->nisn}}">
            {{ csrf_field() }}
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    NISN
                </label>
                <input name="nisn" readonly value="{{$student->nisn}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white" type="text" placeholder="NISN">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Nama
                </label>
                <input name="name" readonly value="{{$student->name}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white" type="text" placeholder="Nama Siswa">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Email
                </label>
                <input name="email" value="{{$student->email}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white" type="email" placeholder="Email">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Tempat Lahir
                </label>
                <input name="pob" value="{{$student->pob}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white" type="text" placeholder="Tempat Lahir">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Tanggal Lahir
                </label>
                <input name="dob" value="{{$student->dob}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white" type="date" placeholder="Tanggal Lahir">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                </label>
                <input name="photo" id="img" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-indigo-700 focus:outline-none focus:bg-white" type="file">
            </div>
            <div class="flex items-center justify-start">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" name="submit" type="submit">
                    Simpan
                </button>
                <div class="px-6">
                    <button onclick="window.location.href='/'" type="button" class="bg-purple-700 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded">
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection