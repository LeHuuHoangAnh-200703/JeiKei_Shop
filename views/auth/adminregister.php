<?php $this->layout("layouts/auth", ["title" =>  "Admin register"]) ?>
<?php $this->start("page") ?>

<div class="w-full min-h-screen flex justify-center items-center bg-gradient-to-r from-red-700 to-white">
    <div class="max-w-[1300px] min-[1025px]:min-h-screen flex justify-center lg:w-10/12 w-full lg:bg-[#fff] lg:m-5 overflow-hidden lg:shadow-lg">
        <form method="POST" action="/admin/register" class="lg:w-1/2 flex justify-center items-center w-full lg:p-3">
            <div class="sm:w-[450px] w-[90%] bg-[#fff] flex flex-col justify-center rounded-md p-6 shadow-xl gap-y-3">
                <div class="mb-2">
                    <h1 class="font-bold text-[27px]">JK Admin Register</h1>
                    <p class="text-[13px] text-[#333f48] font-medium">Please fill your detail to register your account.</p>
                </div>
                <label for="name" class="font-semibold text-[14px]">Your name</label>
                <input name="name" value="<?= isset($old['name']) ? $this->e($old['name']) : '' ?>" required autofocus type="text" placeholder="Jackson Micheal" class="<?= isset($errors['name']) ? 'border-red-500' : '' ?> block text-[#333f48] border border-[#333f48] p-[6px] focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-md">
                <?php if (isset($errors['name'])) : ?>
                    <span class="text-red-500">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <strong><?= $this->e($errors['name']) ?></strong>
                    </span>
                <?php endif ?>

                <label for="email" class="font-semibold text-[14px]">Your email</label>
                <input name="email" value="<?= isset($old['email']) ? $this->e($old['email']) : '' ?>" required autofocus type="email" placeholder="name@gmail.com" class="<?= isset($errors['email']) ? 'border-red-500' : '' ?> block text-[#333f48] border border-[#333f48] p-[6px] focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-md">
                <?php if (isset($errors['email'])) : ?>
                    <span class="text-red-500">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <strong><?= $this->e($errors['email']) ?></strong>
                    </span>
                <?php endif ?>


                <label for="password" class="font-semibold text-[14px]">Password</label>
                <input type="password" placeholder="••••••••" id="password" name="password" required class="<?= isset($errors['password']) ? ' border-red-500' : '' ?> block text-[#333f48] border border-[#333f48] p-[6px] focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-md">
                <?php if (isset($errors['password'])) : ?>
                    <span class="text-red-500">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <strong><?= $this->e($errors['password']) ?></strong>
                    </span>
                <?php endif ?>


                <label for="password-confirm" class="font-semibold text-[14px]">Confirm Password</label>
                <input placeholder="••••••••" id="password-confirm" type="password" name="password_confirmation" required class="<?= isset($errors['password_confirmation']) ? 'border-red-500' : '' ?> block text-[#333f48] border border-[#333f48] p-[6px] focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-md">
                <?php if (isset($errors['password'])) : ?>
                    <span class="text-red-500">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <strong><?= $this->e($errors['password']) ?></strong>
                    </span>
                <?php endif ?>
                <button class="block bg-[#5429FF] text-[#fff] mt-4 p-2 font-bold rounded-sm transition-all duration-300 hover:bg-[#2ea9d2] focus:ring focus:bg-[#4169E1] active:bg-[#4169E1]">Sign Up</button>
                <div class="flex items-center gap-1 justify-center">
                    <p class="text-[14px] font-medium text-[#333]">If you have an account?</p>
                    <a href="/admin/login" class="text-[15px] text-[#5429FF] font-semibold cursor-pointer hover:underline">Log in</a>
                </div>
            </div>
        </form>
        <div class="w-1/2 h-full overflow-hidden hidden rounded-md lg:block">
            <img src="https://www.polywork.fagis.fr/assets/images/crew-right.png" alt="">
        </div>
    </div>
</div>
<?php $this->stop() ?>

<