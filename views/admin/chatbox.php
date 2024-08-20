<?php $this->layout("layouts/admin", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<?php if (isset($errors)) {
?> <div class="success-notification text-[#DC143C] bg-red-100 border-[1px] border-[#DC143C] px-4 py-2 fixed top-0 right-0 m-4 shadow-md shadow-red-300 animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-triangle-exclamation"></i> Thất bại</p>
        <p class="font-bold"><?php echo $errors; ?></p>
    </div> <?php } ?>

<?php if (isset($success)) {
?><div class="success-notification text-green-600 bg-green-100 border-[1px] border-[#3CB371] px-4 py-[10px] fixed top-0 right-0 m-4 shadow-md shadow-green-200 animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-check"></i> Chúc mừng</p>
        <p class="font-bold"><?php echo $success; ?></p>
    </div> <?php } ?>

<style>
    .chat, .chat-window{
        height: calc(100vh - 120px);
    }

    @media screen and (max-width: 768px) {
        .chat, .chat-window{
            height: calc(100vh - 200px);
        }
    }
</style>
<div class="w-[95%] mx-auto h-[100%]">
    <div class="flex gap-5 p-2">
        <div class="chat relative lg:w-[35%] w-full flex flex-col gap-3 p-3 bg-white border-2 border-[#cecece] rounded-xl shadow">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-[16px]">Đoạn chat</h2>
                <i class="fa-solid fa-comments"></i>
            </div>
            <form action="" class="relative">
                <input type="text" class="relative w-full border p-3 text-[12px] bg-slate-200 rounded-2xl outline-none" placeholder="Tìm kiếm tên khách hàng ...">
                <button class="absolute top-[6px] right-2 w-8 h-8 rounded-full bg-[#DC143C]">
                    <i class="text-[#fff] fa-solid fa-magnifying-glass cursor-pointer"></i>
                </button>
            </form>
            <div class="overflow-auto flex flex-col gap-3">
                <div class="user-item flex gap-3 hover:bg-slate-200 p-2 rounded-full cursor-pointer duration-200 transition-all">
                    <div class="relative">
                        <div style="background-image: url('../assets/B2105599_LêHữuHoàngAnh.jpg');" class="w-10 h-10 rounded-full flex justify-center items-center cursor-pointer bg-center bg-cover">
                            <div class="bg-[#fff] w-3 h-3 rounded-full absolute bottom-0 right-0">
                                <span class="absolute inset-0 m-auto w-2 h-2 bg-green-400 rounded-full"></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center overflow-hidden">
                        <p class="font-semibold text-[12px]">Lê Hữu Hoàng Anh</p>
                        <div class="w-52 whitespace-nowrap text-ellipsis overflow-hidden text-gray-400">
                            <p class="inline font-medium text-[10px]">Hình ảnh</p>
                        </div>
                    </div>
                </div>
                <div class="user-item flex gap-3 hover:bg-slate-200 p-2 rounded-full cursor-pointer duration-200 transition-all">
                    <div class="relative">
                        <div style="background-image: url('../assets/B2105599_LêHữuHoàngAnh.jpg');" class="w-10 h-10 rounded-full flex justify-center items-center cursor-pointer bg-center bg-cover">
                            <div class="bg-[#fff] w-3 h-3 rounded-full absolute bottom-0 right-0">
                                <span class="absolute inset-0 m-auto w-2 h-2 bg-green-400 rounded-full"></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center overflow-hidden">
                        <p class="font-semibold text-[12px]">Lê Hữu Hoàng Anh</p>
                        <div class="w-52 whitespace-nowrap text-ellipsis overflow-hidden text-gray-400">
                            <p class="inline font-medium text-[10px]">Hình ảnh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-window relative w-full hidden lg:block bg-white border-2 border-[#cecece] rounded-xl shadow">
            <div class="px-3 py-3 flex gap-4 items-center w-full">
                <button class="back-Chat">
                    <i class="fa-solid fa-arrow-left text-[#DC143C] text-[20px] lg:hidden block"></i>
                </button>
                <div class="flex gap-2 items-center justify-center">
                    <div style="background-image: url('../assets/B2105599_LêHữuHoàngAnh.jpg');" class="w-10 h-10 rounded-full flex justify-center items-center cursor-pointer bg-center bg-cover"></div>
                    <p class="font-medium text-[14px]">Lê Hữu Hoàng Anh</p>
                </div>
            </div>
            <hr class="h-[1.5px] bg-[#cecece]">
            <div style="height: calc(100vh - 45vh);" class="flex-1 overflow-y-auto my-2">
                <div class="px-3 py-3 flex gap-3 items-center">
                    <div style="background-image: url('../assets/B2105599_LêHữuHoàngAnh.jpg');" class="w-10 h-10 rounded-full flex justify-center items-center cursor-pointer bg-center bg-cover"></div>
                    <span class="p-3 text-[14px] w-[300px] bg-[#cecece] shadow rounded-full flex justify-center items-center">Hello, My name is HoangAnh</span>
                </div>
                <div class="px-3 py-3 flex justify-end items-center gap-3">
                    <span class="p-3 text-[14px] w-[300px] text-white shadow bg-[#DC143C] rounded-full flex justify-center items-center">Xin chào hoàng anh, jeikei shop có thể giúp gì cho bạn</span>
                    <div style="background-image: url('../assets/png-transparent-nintendo-switch-wii-u-lumo-logo-nintendo-angle-text-nintendo-removebg-preview.png');" class="w-10 h-10 rounded-full border-2 border-[#8d8d8d] flex justify-center items-center cursor-pointer bg-center bg-cover"></div>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 px-3 py-3 w-full">
                <form action="">
                    <div class="flex justify-between items-center gap-6">
                        <input type="text" placeholder="Tin nhắn của bạn ..." class="w-full border p-3 text-[12px] bg-slate-200 rounded-2xl outline-none">
                        <button class="px-8 py-3 bg-[#DC143C] text-[12px] rounded-xl text-white font-semibold">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>