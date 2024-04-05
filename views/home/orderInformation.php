<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>

<div class="w-full overflow-auto my-6">
    <?php if (isset($_SESSION['errors'])) : ?>
        <div class="success-notification bg-red-100 border-[1px] border-[#DC143C] text-white px-4 py-2 fixed top-0 right-0 m-4 shadow-md shadow-red-300 animate__animated animate__backInRight">
            <p class="font-bold text-[#DC143C]"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo $_SESSION['errors'] ?></p>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success-notification bg-green-100 border-[1px] border-[#3CB371] px-4 py-[10px] fixed top-0 right-0 m-4 shadow-md shadow-green-200 animate__animated animate__backInRight">
            <p class="font-bold text-green-600"><i class="fa-solid fa-circle-check"></i> <?php echo $_SESSION['success'] ?></p>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    <div class="mx-auto mb-5 p-5">
        <?php
        foreach ($viewOrders as $view) {
        ?>
            <form action="/cancle_order/<?php echo $this->e($view->id); ?>" method="POST">
                <div class="shadow-md mb-6 border">
                    <div class="p-4 flex lg:justify-between justify-center items-center flex-col lg:flex-row gap-3">
                        <div class="flex gap-2">
                            <p class="flex items-center font-semibold bg-[#DC143C] p-1 text-[12px] text-[#fff]">Yêu thích</p>
                            <p class="font-semibold flex items-center p-1 text-[14px]">JeiKei Shop</p>
                        </div>
                        <div class="flex gap-2 items-center text-[14px] text-[#008B8B]">
                            <i class="fa-solid fa-truck"></i>
                            <?php if ($this->e($view->state) > 1) {
                                echo "<p>Đơn hàng đã giao thành công</p>";
                            } else if ($this->e($view->state) == 1) {
                                echo "<p>Đơn hàng đang được giao</p>";
                            } else {
                                echo "<p>Đơn hàng đang được xử lý</p>";
                            } ?>
                        </div>
                    </div>
                    <hr>
                    <div class="flex gap-3 items-center p-4">
                        <img src="../assets/<?php echo ($view['image']); ?>" class="w-[100px] lg:w-[150px]" alt="">
                        <div class="flex flex-col gap-1 w-full overflow-hidden">
                            <div class="overflow-hidden text-ellipsis whitespace-nowrap w-full">
                                <p class="text-[15px] font-semibold inline"><?php echo $this->e($view->name); ?></p>
                            </div>
                            <div class="flex justify-between flex-col lg:flex-row">
                                <p class="text-[13px]">Ngày đặt hàng : <span class="text-[#DC143C]"><?php echo $this->e($view->order_date); ?></span></p>
                                <p class="text-[13px]">Số lượng : <span class="text-[#DC143C]"><?php echo $this->e($view->amount); ?></span></p>
                            </div>
                            <p class="text-[13px]">Giá : <span class="text-[#DC143C]"><?php echo $this->e($view->price); ?> đ</span></p>
                            <p class="text-[13px]">Phương thức thanh toán : <span class="text-[#DC143C]"><?php echo $this->e($view->payment); ?></span></p>
                            <p class="text-[13px]">Mã giảm giá của shop : <span class="text-[#DC143C]"><?php if ($this->e($view->coupon) == null) {
                                                                                                                echo "Không áp dụng mã giảm giá.";
                                                                                                            } else {
                                                                                                                echo $this->e($view->coupon);
                                                                                                            }?></span></p>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between flex-col lg:flex-row">
                        <p class="text-[15px] p-4">Chú ý : <span class="text-[#DC143C]">Đơn hàng chỉ có thể hủy khi chưa được vận chuyển.</span></p>
                        <p class="text-[15px] px-4 pb-2 pt-4 text-end">Tổng số tiền : <span class="text-[#DC143C]"><?php echo $this->e($view->total_amount); ?> đ</span></p>
                    </div>
                    <div class="flex justify-end gap-4 px-4 pt-2 pb-4">
                        <button type="submit" class="text-[13px] font-semibold py-2 px-3 text-[#fff] bg-[#DC143C]">Hủy đơn hàng</button>
                        <a href="/orders/<?php echo $this->e($view->product_id); ?>" class="text-[13px] font-semibold py-2 px-3 text-[#fff] bg-[#4169E1]">Mua lại</a>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>

<?php $this->stop() ?>