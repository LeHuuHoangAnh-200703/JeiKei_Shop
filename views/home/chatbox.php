<?php $this->layout("layouts/chat", ["title" => APPNAME]) ?>


<?php $this->start("page") ?>
<?php if (isset($errors)) {
?> <div class="success-notification text-[#DC143C] bg-red-100 border-[1px] border-[#DC143C] px-4 py-2 fixed top-0 right-0 m-4 shadow-md shadow-red-300 animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-triangle-exclamation"></i> <?php foreach ($errors as $error) {
                                                                                    echo $error . "\n";
                                                                                } ?></p>
    </div> <?php } ?>

<?php if (isset($success)) {
?><div class="success-notification text-green-600 bg-green-100 border-[1px] border-[#3CB371] px-4 py-[10px] fixed top-0 right-0 m-4 shadow-md shadow-green-200 animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-circle-check"></i> <?php echo $success; ?></p>
    </div> <?php } ?>

<style>
    .chat-window {
        height: calc(100vh - 120px);
    }

    @media screen and (max-width: 768px) {
        .chat-window {
            height: calc(100vh - 200px);
        }
    }
</style>
<div class="w-full my-5">
    <div class="w-full flex gap-4 overflow-auto p-3">
        <div style="background-image: url('../assets/mario.png');" class="lg:flex w-[40%] hidden justify-between flex-col bg-cover bg-center gap-6 items-center p-7 rounded-md shadow">
            <div style="background-color: rgba(0, 0, 0, 0.5);" class="p-5 w-full text-[#fff] flex flex-col gap-2 rounded">
                <h1 class="text-[26px] font-semibold">JeiKei Shop</h1>
                <p class="text-[14px]">Xin chào Hoàng Anh, bắt đầu trò chuyện nhanh với JeiKei Shop.</p>
                <p class="text-[14px]">Góp ý : <span class="text-[#FFD700] font-semibold">jeikei@gmail.com</span></p>
            </div>
            <img src="../assets/z5227501410029_71677b8790ffa87d4bb72debf5914fed-removebg-preview.png" class="w-[250px]" alt="">
        </div>
        <div class="chat-window relative w-full shadow-md rounded-lg border-2">
            <div class="px-3 py-3 flex gap-4 items-center w-full bg-[#DC143C] rounded-t-md">
                <div class="flex gap-2 items-center justify-center">
                    <div style="background-image: url('../assets/png-transparent-nintendo-switch-wii-u-lumo-logo-nintendo-angle-text-nintendo-removebg-preview.png');" class="w-10 h-10 rounded-full bg-white flex justify-center items-center cursor-pointer bg-center bg-cover"></div>
                    <p class="font-semibold text-[16px] text-white">JeiKei Shop</p>
                </div>
            </div>
            <div class="flex-1 overflow-y-auto my-2">
                <div class="px-3 py-3 flex justify-start items-center gap-3">
                    <div style="background-image: url('../assets/png-transparent-nintendo-switch-wii-u-lumo-logo-nintendo-angle-text-nintendo-removebg-preview.png');" class="w-10 h-10 border-2 border-[#cecece] rounded-full flex justify-center items-center cursor-pointer bg-center bg-cover"></div>
                    <span style="overflow-wrap: break-word; word-break: break-word; white-space: normal;" class="p-3 text-[14px] w-[300px] text-white shadow bg-[#DC143C] rounded-t-2xl rounded-r-2xl flex justify-center items-center">Xin chào hoàng anh, jeikei shop có thể giúp gì cho bạn</span>
                </div>
                <div class="px-3 py-3 flex gap-3 justify-end items-center">
                    <span style="overflow-wrap: break-word; word-break: break-word; white-space: normal;" class="p-3 text-[14px] w-[300px] bg-[#cecece] shadow rounded-t-2xl rounded-l-2xl flex justify-center items-center">Hello, My name is HoangAnh</span>
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
</div>

<?php $this->stop() ?>