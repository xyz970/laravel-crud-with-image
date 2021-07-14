@extends('layout.base',['title'=>$title])

@section('content')
    @yield('form')
<script>
    /*
    * FilePond Initialization
    */
    const inputElement = document.querySelector('input[type="file"]');
    // FilePond.registerPlugin(
    //     FilePondPluginImageExifOrientation,
    //     FilePondPluginImagePreview,
    // );
    // const edit = document.getElementsByName
    FilePond.registerPlugin(
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
    );
let pond = FilePond.create(
            inputElement,{
            acceptedFileTypes: ['image/jpeg','image/png','image/jpg'],
            // labelFileTypeNotAllowed: 'File Gambar tidak valid',
            // fileValidateTypeLabelExpectedTypes: 'File harus berekstensi .jpeg/.jpg atau .png',
            // labelFileProcessingComplete: `Upload Berhasil`,
            //     labelTapToUndo: `ketuk untuk membatalkan`, 	
            //     labelTapToCancel: `ketuk untuk membatalkan`,
            //     labelFileProcessingError: `Gagal Memproses`,
            //     labelTapToRetry:`ketuk untuk coba lagi`,
            //     labelFileProcessing: `Sedang memproses`,
            // labelIdle: `Seret dan tempel atau <span class="filepond--label-action">Pilih Foto</span>`,
            credits:false,
        });
    var value = document.getElementsByClassName('filepond--data');
    
    const file = pond.files;
    pond.setOptions({
        server: {
            process: "temp/store",
            revert: {
                url: "temp/delete/",
                method: 'GET',
            },
            headers:{
                'X-CSRF-TOKEN': '{{csrf_token()}}',
            }
        }
    });
</script>
@endsection