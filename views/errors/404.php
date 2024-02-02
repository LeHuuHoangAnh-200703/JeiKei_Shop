<?php $this->layout("layouts/auth", ["title" => "Errors"]) ?>

<?php $this->start("page") ?>
<section class="flex items-center min-h-screen bg-[#D3D3D3]">
    <div class="container flex flex-col items-center justify-center px-5 mx-auto my-8">
        <div class="max-w-md text-center">
            <h2 class="mb-8 font-extrabold text-9xl text-[#DC143C]">
                <span class="sr-only">Error</span>404
            </h2>
            <p class="text-2xl font-semibold md:text-3xl text-[#333f48]">Xin lỗi, hiện tại không thể tìm thấy trang này!</p>
            <p class="mt-4 mb-8 text-[#DC143C] font-medium">Nhưng đừng quá lo lắng, bạn có thể tìm thấy nhiều thứ khác ở trang chủ của chúng tôi.</p>
            <a rel="noopener noreferrer" href="/home" class="px-8 py-3 font-semibold rounded bg-slate-600 text-white">Back to homepage</a>
        </div>
    </div>
</section>
<?php $this->stop() ?>