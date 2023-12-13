<?php $this->layout("layouts/auth", ["title" =>  "Sign up"]) ?>

<?php $this->start("page") ?>
<div class="w-full min-h-screen flex justify-center items-center">
    <div class="max-w-[1300px] lg:w-10/12 w-full min-h-screen lg:m-5 flex overflow-hidden">
        <form method="POST" action="/register" class="lg:w-1/2 flex justify-center items-center w-full lg:p-3">
            <div class="sm:w-[450px] w-[90%] bg-[#fff] flex flex-col justify-center rounded-md p-6 shadow-xl lg:shadow-md gap-y-3">
            <div class="mb-2">
                    <h1 class="font-bold text-[27px]">JK Register</h1>
                    <p class="text-[13px] text-[#333f48] font-medium">Please fill your detail to access your account.</p>
                </div>
                <label for="name" class="font-medium text-[16px]">Your name</label>
                <input name="name" value="<?= isset($old['name']) ? $this->e($old['name']) : '' ?>" required autofocus type="text" placeholder="Jackson Micheal" class="<?= isset($errors['name']) ? 'border-red-500' : '' ?> block text-[#333f48] border border-[#333f48] p-[6px] focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-md">
                <?php if (isset($errors['name'])) : ?>
                    <span class="text-red-500">
                        <strong><?= $this->e($errors['name']) ?></strong>
                    </span>
                <?php endif ?>


                <label for="email" class="font-medium text-[16px]">Your email</label>
                <input name="email" value="<?= isset($old['email']) ? $this->e($old['email']) : '' ?>" required autofocus type="email" placeholder="name@gmail.com" class="<?= isset($errors['email']) ? 'border-red-500' : '' ?> block text-[#333f48] border border-[#333f48] p-[6px] focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-md">
                <?php if (isset($errors['email'])) : ?>
                    <span class="text-red-500">
                        <strong><?= $this->e($errors['email']) ?></strong>
                    </span>
                <?php endif ?>


                <label for="password" class="font-medium text-[16px]">Password</label>
                <input type="password" placeholder="••••••••" id="password" name="password" required class="<?= isset($errors['password']) ? ' border-red-500' : '' ?> block text-[#333f48] border border-[#333f48] p-[6px] focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-md">
                <?php if (isset($errors['password'])) : ?>
                    <span class="text-red-500">
                        <strong><?= $this->e($errors['password']) ?></strong>
                    </span>
                <?php endif ?>


                <label for="password-confirm" class="font-medium text-[16px]">Confirm Password</label>
                <input placeholder="••••••••" id="password-confirm" type="password" name="password_confirmation" required class="<?= isset($errors['password_confirmation']) ? 'border-red-500' : '' ?> block text-[#333f48] border border-[#333f48] p-[6px] focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-md">
                <?php if (isset($errors['password'])) : ?>
                    <span class="text-red-500">
                        <strong><?= $this->e($errors['password']) ?></strong>
                    </span>
                <?php endif ?>

                <label for="phone" class="font-medium text-[16px]">Phone </label>
                <input name="phone" value="<?= isset($old['phone']) ? $this->e($old['name']) : '' ?>" required autofocus type="text" placeholder="0123456789" class="<?= isset($errors['phone']) ? 'border-red-500' : '' ?> block text-[#333f48] border border-[#333f48] p-[6px] focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-md">
                <?php if (isset($errors['phone'])) : ?>
                    <span class="text-red-500">
                        <strong><?= $this->e($errors['phone']) ?></strong>
                    </span>
                <?php endif ?>

                <label for="address" class="font-medium text-[16px]">Address</label>
                <textarea name="address" maxlength="100" class="w-full block text-[#333f48] border border-[#333f48] p-[6px] focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-md" placeholder="Your address"></textarea>
                <button class="block bg-[#5429FF] text-[#fff] mt-4 p-2 font-bold rounded-sm transition-all duration-300 hover:bg-[#2ea9d2] focus:ring focus:bg-[#4169E1] active:bg-[#4169E1]">Sign Up</button>
                <div class="flex items-center gap-1 justify-center">
                    <p class="text-[14px] text-[#333] font-medium">If you have an account?</p>
                    <a href="/login" class="text-[15px] text-[#5429FF] font-semibold cursor-pointer hover:underline">Log in</a>
                </div>
            </div>
        </form>
        <div class="w-1/2 h-full overflow-hidden hidden lg:block mt-20">
            <img src="./assets/main.jpg" alt="">
        </div>
    </div>
</div>
<?php $this->stop() ?>

<