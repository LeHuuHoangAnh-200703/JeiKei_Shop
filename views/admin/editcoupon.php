<?php $this->layout("layouts/admin", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="w-[95%] mx-auto h-[100%]">
    <?php if (isset($success)) { ?>
        <div class="success-notification text-green-600 bg-green-100 border-[1px] border-[#3CB371] px-4 py-[10px] fixed top-0 right-0 m-4 shadow-md shadow-green-200 animate__animated animate__backInRight">
            <p class="font-bold"><i class="fa-solid fa-check"></i> Chúc mừng</p>
            <p class="font-bold"><?php echo $success; ?></p>
        </div>
    <?php } ?>
    <div class="text-center py-4">
        <h2 class="text-[#333] font-bold text-[20px]">CẬP NHẬT MÃ GIẢM GIÁ</h2>
    </div>
    <form action="/admin/coupon/<?= $this->e($coupon['id']) ?>" method="POST" enctype="multipart/form-data" id="all_products" class="w-full overflow-y-scroll">
        <div class="flex flex-col w-full md:w-[70%] mx-auto gap-4 border-2 rounded-xl shadow-md p-5 m-2">
            <div class="">
                <div>
                    <label for="name_coupon" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Tên mã giảm giá</label>
                    <input value="<?= $this->e($coupon['name_coupon']) ?>" name="name_coupon" autofocus type="text" id="name_coupon" class="<?= isset($errors['name_coupon']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="Nhập mã giảm giá ..." />
                    <?php if (isset($errors['name_coupon'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['name_coupon']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>
            </div>
            <div class="">
                <div>
                    <label for="coupon_code" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Mã giảm giá</label>
                    <input value="<?= $this->e($coupon['coupon_code']) ?>" name="coupon_code" autofocus type="text" id="coupon_code" class="<?= isset($errors['coupon_code']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="Nhập mã giảm giá ..." />
                    <?php if (isset($errors['coupon_code'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['coupon_code']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>
            </div>
            <div class="">
                <div>
                    <label for="price_coupon" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Giá trị mã giảm giá</label>
                    <input value="<?= $this->e($coupon['price_coupon']) ?>" min="1" name="price_coupon" autofocus type="number" id="price_coupon" class="<?= isset($errors['price_coupon']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="10VNĐ" />
                    <?php if (isset($errors['price_coupon'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['price_coupon']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>
            </div>
            <div class="">
                <div>
                    <label for="num_uses" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Số lần sử dụng</label>
                    <input value="<?= $this->e($coupon['num_uses']) ?>" min="1" name="num_uses" autofocus type="number" id="num_uses" class="<?= isset($errors['num_uses']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="Số lần sử dụng ..." />
                    <?php if (isset($errors['num_uses'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['num_uses']) ?></strong>
                        </span>
                    <?php endif ?>

                </div>
            </div>
            <div class="">
                <div>
                    <label for="expiration_date" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Ngày hết hạn</label>
                    <input value="<?= $this->e($coupon['expiration_date']) ?>" min="1" name="expiration_date" autofocus type="date" id="expiration_date" class="<?= isset($errors['expiration_date']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="Số lần sử dụng ..." />
                    <?php if (isset($errors['expiration_date'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['expiration_date']) ?></strong>
                        </span>
                    <?php endif ?>

                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="inline-block rounded-lg bg-[#4169E1] px-5 py-2.5 text-sm font-bold text-[#fff] shadow-md transition-all duration-300 hover:bg-blue-500 focus:ring focus:ring-blue-300 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Tạo mã</button>
            </div>
        </div>
    </form>
</div>
<?php $this->stop() ?>