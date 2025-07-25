<?php $this->layout("layouts/default", ["title" => $this->e($product->name)]) ?>

<?php $this->start("page") ?>
<div class="mx-auto p-5 mb-5">
    <?php if (isset($errors)) {
    ?> <div class="success-notification text-[#DC143C] bg-red-100 border-[1px] border-[#DC143C] px-4 py-2 fixed top-0 right-0 m-4 shadow-md shadow-red-300 animate__animated animate__backInRight">
            <p class="font-bold"><i class="fa-solid fa-triangle-exclamation"></i> Đặt hàng thất bại.</p>
            <p class="font-bold"><?php foreach ($errors as $error) {
                                        echo $error . "\n";
                                    } ?></p>
        </div> <?php } ?>

    <?php if (isset($success)) {
    ?><div class="success-notification text-green-600 bg-green-100 border-[1px] border-[#3CB371] px-4 py-[10px] fixed top-0 right-0 m-4 shadow-md shadow-green-200 animate__animated animate__backInRight">
            <p class="font-bold"><i class="fa-solid fa-circle-check"></i> Đặt hàng thành công. </p>
            <p class="font-bold"><?php echo $success; ?></p>
        </div> <?php } ?>
    <?php if (isset($_SESSION['errors'])) : ?>
        <div class="success-notification bg-red-100 border-[1px] border-[#DC143C] text-white px-4 py-2 fixed top-0 right-0 m-4 shadow-md shadow-red-300 animate__animated animate__backInRight">
            <p class="font-bold text-[#DC143C]"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo $_SESSION['errors'] ?></p>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>
    <div class="relative w-full flex justify-center mb-3">
        <h1 class="text-[30px] font-semibold">Đặt hàng</h1>
        <div class="absolute bottom-0 w-36 h-1 bg-[#DC143C]"></div>
    </div>
    <div class="w-full h-full grid grid-cols-1 md:grid-cols-3 gap-7 border rounded-xl p-5 shadow-md justify-center items-start">
        <div class="w-full flex flex-col items-center justify-center">
            <?php
            $images = json_decode($product->images, true);
            $index = 0;
            if (is_array($images) && !empty($images)) :
                foreach ($images as $item_product) : ?>
                    <?php if ($index == 0) { ?>
                        <img src="../assets/<?php echo $item_product ?>" />
                    <?php break;
                    } ?>
                <?php endforeach;
                ?>
            <?php endif; ?>
        </div>
        <form action="/orders/<?= $this->e($product->id) ?>" method="POST" class="col-span-2">
            <h1 class="text-[25px] font-semibold py-2"><?php echo $this->e($product->name); ?></h1>
            <div class="flex flex-col lg:flex-row lg:items-center lg:gap-4">
                <p class="text-[16px] font-semibold">Giá : <span class="text-[#DC143C]"><?php echo $this->e($product->price); ?> VNĐ</span></p>
                <span class="font-bold lg:block hidden">|</span>
                <p class="text-[16px] font-semibold py-2 flex justify-start items-center gap-x-2">Tình trạng :<span class="text-[#DC143C] flex justify-center items-center gap-x-1"><?php if ($this->e($product->quantity) > 0) {
                                                                                                                                                                                        echo "vẫn còn " . $this->e($product->quantity) . " sản phẩm";
                                                                                                                                                                                    } else {
                                                                                                                                                                                        echo "Hết hàng";
                                                                                                                                                                                    } ?></span></p>
            </div>
            <div class="py-1">
                <p class="text-[16px] font-semibold">Số lượng sản phẩm : </p>
                <div class="py-2 flex">
                    <button type="button" id="decrease" class="text-lg border border-1 py-1 px-3"><i class="fa-solid fa-minus"></i></button>
                    <input id="quantity" name="total_amount" value="1" style="appearance: textfield;" type="number" min="1" class="text-lg border border-1 font-semibold h-10 w-12 text-center" />
                    <button type="button" id="increase" class="text-lg border border-1 py-1 px-3"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>
            <p class="text-[16px] font-semibold mb-2">Chọn phương thức thanh toán :</p>
            <select class="relative mb-2 border-2 border-[#333f48] p-2 rounded-md cursor-pointer outline-none" name="payment">
                <div class="flex justify-between items-center p-[10px] border-1 rounded-[6px] cursor-pointer clickdown_2">
                    <p class="font-semibold">Direct payment</p>
                    <i class="fa-solid fa-caret-down rotate-180 ease-out duration-500 dropdown_2"></i>
                </div>
                <div class="bg-[#ededed] p-2 rounded-[10px] hidden list_2">
                    <option class="transition-all duration-300 hover:text-[#4169E1] cursor-pointer py-1" value="Thanh toán trực tiếp">Thanh toán trực tiếp</option>
                    <option class="transition-all duration-300 hover:text-[#4169E1] cursor-pointer py-1" value="Thanh toán qua thẻ">Thanh toán qua thẻ</option>
                </div>
            </select>
            <div class="mb-3">
                <p class="text-[16px] font-semibold mb-2">Nhập mã giảm giá : </p>
                <div class="flex gap-3 items-center">
                    <input type="text" id="coupon" name="coupon" class="block p-2 border-2 border-[#333f48] rounded-md outline-none" placeholder="Nhập mã giảm giá ...">
                </div>
            </div>
            <div class="flex flex-col bg-[#333f48] p-2">
                <p class="text-[16px] font-semibold pb-2 text-[#fff]">Địa chỉ nhận hàng :</p>
                <div class="flex flex-col gap-2">
                    <input name="address" type="text" placeholder="#-#-#" class="p-2 border-none outline-none text-[#333]">
                    <?php if (isset($errors['address'])) : ?>
                        <span class="text-yellow-500 mt-1 text-sm">
                            <strong><i class="fa-solid fa-triangle-exclamation"></i> <?= $this->e($errors['address']) ?></strong>
                        </span>
                    <?php endif ?>
                    <input name="phone" type="text" placeholder="0##-###-####" class="p-2 border-none outline-none text-[#333]">
                    <?php if (isset($errors['phone'])) : ?>
                        <span class="text-yellow-500 mt-1 text-sm">
                            <strong><i class="fa-solid fa-triangle-exclamation"></i> <?= $this->e($errors['phone']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>
            </div>
            <button type="submit" class="bg-[#333] p-2 my-3 font-medium hover:bg-[#DC143C] text-[#fff] transition-all duration-[0.4s]">Đặt Hàng</button>
        </form>
    </div>
</div>
<?php $this->stop() ?>