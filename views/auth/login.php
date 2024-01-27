<?php $this->layout("layouts/auth", ["title" => "Log in"]) ?>

<?php $this->start("page") ?>
<div class="w-full min-h-screen flex justify-center items-center bg-gradient-to-r from-red-700 to-white">
    <?php

    if (isset($messages["success"])) {
    ?>
        <div id="success-notification" class="bg-green-500 text-white px-4 py-2 fixed top-0 right-0 m-4 rounded-md shadow-lg animate__animated animate__backInRight">
            <p class="font-bold"><i class="fa-solid fa-check"></i> Đăng ký tài khoản thành công</p>
            <p>Tiếp tục đăng nhập để tiến hành mua hàng!!</p>
        </div>
    <?php } ?>

    <div class="max-w-[1300px] lg:bg-[#fff] lg:w-10/12 w-full min-[1025px]:min-h-screen lg:m-5 flex overflow-hidden lg:shadow-xl">
        <div class="w-1/2 h-full overflow-hidden hidden lg:block rounded-md mt-20">
            <img src="https://www.polywork.fagis.fr/assets/images/crew-left.png" alt="">
        </div>
        <form action="/login" method="POST" class="lg:w-1/2 flex justify-center items-center w-full lg:p-3 gap-2">
            <div class="sm:w-[450px] w-[90%] bg-[#fff] flex flex-col justify-center rounded-md p-6 gap-2 shadow-xl">
                <div class="mb-2">
                    <h1 class="font-bold text-[27px]">JeiKei Access</h1>
                    <p class="text-[13px] text-[#333f48] font-semibold">Vui lòng điền đầy đủ thông tin để đăng nhập.</p>
                </div>
                <label for="" class="font-semibold text-[16px]">Email</label>
                <input name="email" id="email" type="text" required autofocus placeholder="name@gmail.com" class="<?= isset($errors['email']) ? 'border-red-500' : '' ?>  block text-[#333f48] border border-[#333f48] p-[6px] focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-md" name="email" value="<?= isset($old['email']) ? $this->e($old['email']) : '' ?>">
                <?php if (isset($errors['email'])) : ?>
                    <span class="text-red-500">
                        <strong><?= $this->e($errors['email']) ?></strong>
                    </span>
                <?php endif ?>

                <label for="password" class="font-semibold text-[16px]">Mật khẩu</label>
                <input name="password" id="password" type="password" placeholder="••••••••" class=" <?= isset($errors['password']) ? 'border-red-500' : '' ?> block text-[#333f48] border border-[#333f48] p-[6px] focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-md">
                <?php if (isset($errors['password'])) : ?>
                    <span class="text-red-500">
                        <strong><?= $this->e($errors['password']) ?></strong>
                    </span>
                <?php endif ?>

                <button class="block bg-[#5429FF] text-[#fff] mt-4 p-2 font-bold rounded-sm transition-all duration-300 hover:bg-[#2ea9d2] focus:ring focus:bg-[#4169E1] active:bg-[#4169E1]">Đăng nhập</button>
                <div class="flex items-center gap-1 justify-center">
                    <p class="text-[14px] text-[#333] font-semibold">Nếu chưa có tài khoản?</p>
                    <a href="/register" class="text-[15px] text-[#5429FF] font-semibold cursor-pointer hover:underline">Đăng ký</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $this->stop() ?>
<?php $this->start("page_specific_js") ?>
<script>
    $(document).ready(function() {
        const successNotification = $('#success-notification');
        if (successNotification.length > 0) {
            successNotification.css('display', 'block');
        }
        setTimeout(() => {
            successNotification.css('display', 'none');
        }, 3000);
    });
</script>
<?php $this->stop() ?>