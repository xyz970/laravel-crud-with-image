<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('third-party/gridjs/dist/theme/mermaid.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('third-party/filepond/dist/filepond.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('third-party/filepond/dist/filepond-plugin-image-preview.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('third-party/sweetalert2/dist/sweetalert2.min.css')); ?>" type="text/css">
    <script src="<?php echo e(asset('third-party/sweetalert2/dist/sweetalert2.all.min.js     ')); ?>"></script>
    <script src="<?php echo e(asset('third-party/filepond/dist/filepond-plugin-image-exif-orientation.min.js         ')); ?>"></script>
    <script src="<?php echo e(asset('third-party/filepond/dist/filepond-plugin-image-preview.min.js         ')); ?>"></script>

    <script src="<?php echo e(asset('third-party/filepond/dist/filepond-plugin-file-validate-type.js        ')); ?>"></script>

    <script src="<?php echo e(asset('third-party/filepond/dist/filepond.min.js                              ')); ?>"></script>

    <script src="<?php echo e(asset('third-party/gridjs/dist/gridjs.umd.js')); ?>"></script>
    
    <title>Siswa - <?php echo e($title); ?></title>
</head>
<body>

    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    
</body>
<script>


    function edit(nisn) {
        Swal.fire({
            title: 'Edit?',
            text: "Apakah anda yakin ingin mengubah data ini?",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                // console.log(`${nisn}`);
                window.location.href = 'show-update-form/'+nisn;
                // console.log(id);
            }
        })
    }

    function hapus(nisn) {
        Swal.fire({
            title: 'Hapus?',
            text: "Apakah anda yakin ingin menghapus data ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                // console.log(`${nisn}`);
                window.location.href = 'delete/'+nisn;
                // console.log(id);
            }
        })
    }

    let table = document.getElementById('table');
    if (table) {
        /*
    * GridJs Initialization
    */
    new gridjs.Grid({
    columns: [
        {
        name:'Foto',
        // formatter:(_,row,)=>gridjs.html(
        //    `<img src="<?php echo e(asset('assets/img/upload/')); ?>" height="100" alt="">`
        // ),
        formatter: (img) => gridjs.html(`<center><img src='<?php echo e(asset('assets/img/students-photo/')); ?>/${img}' height="300" /></center>`)
    },
        "NISN", "Nama Siswa","Tempat Lahir","Email" ,"Tanggal Lahir",
    {
        name: 'Actions',
        formatter: (_, row, ) => gridjs.html(
            `<button class="text-white bg-blue-700 hover:bg-blue-600 px-4 py-2 rounded antialiased font-bold"  onclick="edit('${row.cells[1].data}')">Ubah</button>
            |
            <button class="text-white bg-red-700 hover:bg-red-600 px-4 py-2 rounded antialiased font-bold"  onclick="hapus('${row.cells[1].data}')" >Hapus</button>`
        ),

    }],
    className:{
        td:'px-6 pb-12 whitespace-nowrap',
        container: 'shadow overflow-hidden border-b border-gray-200 sm:rounded-lg',
        table: 'min-w-full ',
        // table:'w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5'
        tbody:'bg-white ',
        thead:'bg-gray-50',
        paginationButtonCurrent: 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium',
        paginationButton: 'relative inline-flex items-center px-5 py-5 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50'
    },
    language:{
        search: {
            placeholder: '🔍 Cari...'
        },
        pagination:{
            previous: '⬅️',
            next: '➡️',
            showing: 'Menampilkan',
            results: () => 'Data',
            to:'sampai',
            of:'dari'
        }
    },
    sort: true,
    pagination: {
        
        enabled:true,
        limit:10,

    },
    server: {
        url: "/data",
        then: data => data.data.map(student => [
            student.photo,student.nisn,student.name,student.pob,student.email,student.dob
        ]),
        total: data => data.count,
    },
    search: {
    server: {
      url: (_, keyword) => `search/${keyword}`
    }
  },
}).render(document.getElementById("table"));
    }

    
</script>

</html><?php /**PATH /var/www/html/lara-pond.test/resources/views/layout/base.blade.php ENDPATH**/ ?>