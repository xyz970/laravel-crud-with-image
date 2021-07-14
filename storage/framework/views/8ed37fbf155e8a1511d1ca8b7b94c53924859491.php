<?php $__env->startSection('content'); ?>
<section class="px-3 py-5">
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto ">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                <div class="flex justify-end px-4 py-4">
                    <a href="show-insert-form" class="text-white bg-green-400 hover:bg-green-500 px-4 py-2 rounded antialiased font-bold">Tambah Data</a>
                </div>
                    <div id="table"></div>
                
                
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base',['title'=>'Data'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lara-pond.test/resources/views/data.blade.php ENDPATH**/ ?>