<?php $this->layout("layouts/admin", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="w-[95%] mx-auto h-[100%]">
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success-notification bg-green-100 border-[1px] border-[#3CB371] px-4 py-[10px] fixed top-0 right-0 m-4 shadow-md shadow-green-200 animate__animated animate__backInRight">
            <p class="font-bold text-green-600"><i class="fa-solid fa-circle-check"></i> <?php echo $_SESSION['success'] ?></p>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    <div class="text-center py-4">
        <h2 class="text-[#333] font-bold text-2xl">Tất cả mã giảm giá</h2>
    </div>
    <div id="all_products" class="w-full overflow-x-scroll overflow-y-scroll">
        <?php
        foreach ($coupons as $coupon) {
        ?>
            <div class="border-2 border-[#cecece] shadow-md rounded-md m-3">
                <div class="m-5">
                    <div class="flex gap-x-2 mb-2 items-center">
                        <img src="../assets/z5313072515118_d9cabc9ab0ffac7f7e00fd1feb792394.jpg" alt="" class="w-[100px] lg:w-[150px]">
                        <div class="flex flex-col gap-1 items-start justify-center">
                            <p class="text-[#333f48] text-[18px] font-semibold"><?php echo $this->e($coupon->name_coupon); ?></p>
                            <p class="text-[#333f48] text-[14px] font-medium">Mã giảm giá : <span class="font-semibold text-[#DC143C]"><?php echo $this->e($coupon->coupon_code); ?></span></p>
                            <p class="text-[#333f48] text-[14px] font-medium">Giá trị mã giảm giá : <span class="font-semibold text-[#DC143C]"><?php echo $this->e($coupon->price_coupon); ?> VNĐ</span></p>
                            <p class="text-[#333f48] text-[14px] font-medium">Ngày hết hạn : <span class="font-semibold text-[#DC143C]"><?php if ($this->e($coupon->expiration_date) < date('Y-m-d H:i:s')) {
                                                                                                                                            echo "Mã giảm giá đã hết hạn.";
                                                                                                                                        } else {
                                                                                                                                            echo $this->e($coupon->expiration_date);
                                                                                                                                        } ?></span></p>
                            <p class="text-[#333f48] text-[14px] font-medium">Số lần sử dụng : <span class="font-semibold text-[#DC143C]"><?php if ($this->e($coupon->num_uses) <= 0) {
                                                                                                                                                echo "Mã giảm giá đã được sử dụng hết.";
                                                                                                                                            } else {
                                                                                                                                                echo $this->e($coupon->num_uses);
                                                                                                                                            }?></span></p>
                        </div>
                    </div>
                    <hr>
                    <div class="flex flex-col justify-between items-center gap-4 px-4 pt-4 lg:flex-row">
                        <p class="text-[16px] text-[#333f48] font-semibold">JeiKei Shop <span class="text-[#DC143C]">|</span> Nintendo Switch</p>
                        <div class="flex gap-3">
                            <form action="/admin/deletecoupon/<?php echo $coupon->id ?>" method="post">
                                <button type="submit" class="text-[13px] font-semibold py-2 px-3 text-[#fff] bg-[#DC143C]">Xóa mã</button>
                            </form>
                            <a href="/admin/editcoupon/<?= $coupon->id ?>" class="text-[13px] font-semibold py-2 px-3 text-[#fff] bg-[#4169E1]">Chỉnh sửa mã</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>