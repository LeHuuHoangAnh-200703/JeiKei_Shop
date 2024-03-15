<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="w-full overflow-auto my-6">
    <div class="mx-auto mb-5 p-5">
        <h1 class="text-center text-[20px] font-semibold mb-5">Đơn hàng của bạn</h1>
        <?php
        foreach ($viewOrders as $view) {
        ?>
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
                            }?>
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
                            <p class="text-[13px]">Ngày đặt : <span class="text-[#DC143C]"><?php echo $this->e($view->order_date); ?></span></p>
                            <p class="text-[13px]">Số lượng : <span class="text-[#DC143C]"><?php echo $this->e($view->amount); ?></span></p>
                        </div>
                        <p class="text-[13px]">Giá : <span class="text-[#DC143C]"><?php echo $this->e($view->price); ?> đ</span></p>
                        <p class="text-[13px]">Phương thức thanh toán : <span class="text-[#DC143C]"><?php echo $this->e($view->payment); ?></span></p>
                    </div>
                </div>
                <hr>
                <p class="text-[15px] px-4 py-2 text-end">Tổng số tiền : <span class="text-[#DC143C]"><?php echo $this->e($view->total_amount); ?> đ</span></p>
                <div class="flex justify-end gap-4 px-4 pt-2 pb-4">
                    <button class="text-[13px] font-semibold py-2 px-3 text-[#fff] bg-[#DC143C]">Hủy đơn hàng</button>
                    <button class="text-[13px] font-semibold py-2 px-3 text-[#fff] bg-[#4169E1]">Mua lại</button>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php $this->stop() ?>