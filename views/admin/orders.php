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
        <h2 class="text-[#333] font-bold text-[20px]">DANH SÁCH ĐƠN HÀNG</h2>
    </div>
    <div id="all_products" class="w-full overflow-x-scroll overflow-y-scroll">
        <?php foreach ($orders as $order) : ?>
            <div class="relative bg-white">
                <div class="shadow-md mb-6 mx-2 border-2 border-[#cecece] rounded">
                    <div class="p-4 flex lg:justify-between justify-center items-center flex-col lg:flex-row gap-3">
                        <div class="flex gap-2">
                            <div id="user_info" class="w-10 h-10 border border-1 border-slate-950 rounded-full flex justify-center items-center cursor-pointer bg-center bg-cover" style="background-image:url('../<?php echo ($order['image_user']); ?>')"></div>
                            <p class="font-semibold flex items-center p-1 text-[14px]"><?php echo $this->e($order->username); ?></p>
                        </div>
                        <div class="flex gap-2 items-center text-[14px] text-[#008B8B]">
                            <i class="fa-solid fa-box-open"></i>
                            <?php if ($this->e($order->state) > 1) {
                                echo "<p>Đơn hàng đã giao thành công</p>";
                            } else if ($this->e($order->state) == 1) {
                                echo "<p>Đơn hàng đang được giao</p>";
                            } else {
                                echo "<p>Đơn hàng đang được xử lý</p>";
                            } ?>
                        </div>
                    </div>
                    <hr>
                    <div class="flex gap-3 items-center p-4">
                        <img src="../assets/<?php echo ($order['image']); ?>" class="w-[100px] lg:w-[150px]" alt="">
                        <div class="flex flex-col gap-1 w-full overflow-hidden">
                            <div class="overflow-hidden text-ellipsis whitespace-nowrap w-full">
                                <p class="text-[15px] font-semibold inline"><?php echo $this->e($order->name); ?></p>
                            </div>
                            <div class="flex justify-between flex-col lg:flex-row">
                                <p class="text-[13px]">Ngày đặt hàng : <span class="text-[#DC143C]"><?php echo $this->e($order->order_date); ?></span></p>
                                <p class="text-[13px]">Số lượng : <span class="text-[#DC143C]"><?php echo $this->e($order->amount); ?></span></p>
                            </div>
                            <p class="text-[13px]">Giá : <span class="text-[#DC143C]"><?php echo $this->e($order->price); ?> đ</span></p>
                            <p class="text-[13px]">Số điện thoại : <span class="text-[#DC143C]"><?php echo $this->e($order->phone); ?></span></p>
                            <p class="text-[13px]">Địa chỉ : <span class="text-[#DC143C]"><?php echo $this->e($order->address); ?></span></p>
                            <p class="text-[13px]">Phương thức thanh toán : <span class="text-[#DC143C]"><?php echo $this->e($order->payment); ?></span></p>
                            <p class="text-[13px]">Mã giảm giá đã áp dụng : <span class="text-[#DC143C]"><?php if ($this->e($order->coupon) == null) {
                                                                                                                echo "Không áp dụng mã giảm giá.";
                                                                                                            } else {
                                                                                                                echo $this->e($order->coupon);
                                                                                                            }?></span></p>
                        </div>
                    </div>
                    <hr>
                    <p class="text-[15px] px-4 pb-2 pt-4 text-end">Tổng số tiền : <span class="text-[#DC143C]"><?php echo number_format($this->e($order->total_amount), 3, '.', '.') ?> đ</span></p>
                    <div class="flex justify-end gap-4 px-4 pt-2 pb-4">
                        <form action="/admin/deleteorder/<?= $order->id ?>" method="post">
                            <button type="submit" class="text-[13px] font-semibold py-2 px-3 text-[#fff] bg-[#DC143C]">Xóa đơn</button>
                        </form>
                        <form action="/admin/updateorder/<?= $order->id ?>" method="post">
                            <button type="submit" class="text-[13px] font-semibold py-2 px-3 text-[#fff] bg-[#4169E1]">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
</div>
</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>