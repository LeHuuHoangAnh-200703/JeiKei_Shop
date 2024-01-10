<?php $this->layout("layouts/default", ["title" => "Orders"]) ?>

<?php $this->start("page") ?>
<div class="mx-auto p-5 mb-5">
    <?php if (isset($errors)) {
    ?> <div id="success-notification" class="bg-[#DC143C] text-white px-4 py-2 fixed top-0 right-0 m-4 rounded-md shadow-lg animate__animated animate__backInRight">
            <p class="font-bold"><i class="fa-solid fa-triangle-exclamation"></i> Thử lại</p>
            <p class="font-bold"><?php echo $errors; ?></p>
        </div> <?php } ?>

    <?php if (isset($success)) {
    ?><div id="success-notification" class="bg-green-500 text-white px-4 py-2 fixed top-0 right-0 m-4 rounded-md shadow-lg animate__animated animate__backInRight">
            <p class="font-bold"><i class="fa-solid fa-check"></i> Chúc mừng</p>
            <p class="font-bold"><?php echo $success; ?></p>
        </div> <?php } ?>
    <div class="relative w-full flex justify-center mb-3">
        <h1 class="text-[30px] font-semibold">Đặt hàng</h1>
        <div class="absolute bottom-0 w-24 h-1 bg-[#DC143C]"></div>
    </div>
    <div class="w-full h-full grid grid-cols-1 md:grid-cols-3 gap-7 border rounded-xl p-5 shadow-md justify-center items-start">
        <div class="w-full flex items-center justify-center">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['image']); ?>" />
        </div>
        <form action="/orders/<?= $this->e($product->id) ?>" method="POST" class="col-span-2">
            <h1 class="text-[25px] font-semibold py-2"><?php echo $this->e($product->name); ?></h1>
            <p class="text-[18px] font-semibold">Giá : <span class="text-[#DC143C]">$<?php echo $this->e($product->price); ?></span></p>
            <p class="text-[18px] font-semibold py-2 flex justify-start items-center gap-x-2">Kho :<span class="text-[#DC143C] flex justify-center items-center gap-x-1"><?php echo $this->e($product->quantity); ?> <small>sản phẩm có sẳn</small></span></p>
            <div class="py-1">
                <p class="text-[18px] font-semibold">Số lượng sản phẩm : </p>
                <div class="py-2 flex">
                    <button type="button" id="decrease" class="text-lg border border-1  py-1 px-3"><i class="fa-solid fa-minus"></i></button>
                    <input id="quantity" name="total_amount" value="1" style="appearance: textfield;" type="number" min="1" class="text-lg border border-1 font-semibold h-10 w-12 text-center" />
                    <button type="button" id="increase" class="text-lg border border-1  py-1 px-3"><i class="fa-solid fa-plus"></i></button>
                </div>
                <?php if (isset($errors['total_amount'])) : ?>
                    <span class="text-red-500 mt-1 text-sm">
                        <strong><i class="fa-solid fa-triangle-exclamation"></i> <?= $this->e($errors['total_amount']) ?></strong>
                    </span>
                <?php endif ?>
            </div>
            <p class="text-[18px] font-semibold mb-2">Chọn phương thức thanh toán :</p>
            <select class="relative mb-2 border-2 p-2 rounded-md cursor-pointer outline-none" name="payment">
                <div class="flex justify-between items-center p-[10px] border-1 rounded-[6px] cursor-pointer clickdown_2">
                    <p class="font-semibold">Direct payment</p>
                    <i class="fa-solid fa-caret-down rotate-180 ease-out duration-500 dropdown_2"></i>
                </div>
                <div class="bg-[#ededed] p-2 rounded-[10px] hidden list_2">
                    <option class="transition-all duration-300 hover:text-[#4169E1] cursor-pointer py-1" value="direct payment">Thanh toán trực tiếp</option>
                    <option class="transition-all duration-300 hover:text-[#4169E1] cursor-pointer py-1" value="payment via card">Thanh toán qua thẻ</option>
                </div>
            </select>
            <div class="flex flex-col bg-[#333f48] p-2">
                <p class="text-[18px] font-semibold pb-2 text-[#fff]">Địa chỉ nhận hàng :</p>
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