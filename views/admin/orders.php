<?php $this->layout("layouts/admin", ["title" => "Đơn hàng"]) ?>

<?php $this->start("page") ?>
<div class="w-[95%] mx-auto h-[100%]">
    <div class="text-center py-4">
        <h2 class="text-[#333] font-bold text-2xl">Tất cả đơn hàng</h2>
    </div>
    <div id="all_products" class="w-full overflow-x-scroll overflow-y-scroll">
        <?php foreach ($orders as $order) : ?>
            <div class="relative bg-white">
                <div class="shadow-md mb-6 border">
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
                                <p class="text-[13px]">Ngày đặt : <span class="text-[#DC143C]"><?php echo $this->e($order->order_date); ?></span></p>
                                <p class="text-[13px]">Số lượng : <span class="text-[#DC143C]"><?php echo $this->e($order->amount); ?></span></p>
                            </div>
                            <p class="text-[13px]">Giá : <span class="text-[#DC143C]"><?php echo $this->e($order->price); ?> đ</span></p>
                            <p class="text-[13px]">Số điện thoại : <span class="text-[#DC143C]"><?php echo $this->e($order->phone); ?></span></p>
                            <p class="text-[13px]">Địa chỉ : <span class="text-[#DC143C]"><?php echo $this->e($order->address); ?></span></p>
                            <p class="text-[13px]">Phương thức thanh toán : <span class="text-[#DC143C]"><?php echo $this->e($order->payment); ?></span></p>
                        </div>
                    </div>
                    <hr>
                    <p class="text-[15px] px-4 pb-2 pt-4 text-end">Tổng số tiền : <span class="text-[#DC143C]"><?php echo $this->e($order->total_amount); ?> đ</span></p>
                    <div class="flex justify-end gap-4 px-4 pt-2 pb-4">
                        <form action="/admin/deleteorder/<?= $order->id ?>" method="post">
                            <button type="submit" class="px-4 py-2 bg-[#DC143C] text-[#fff] font-semibold rounded-md">Xóa đơn</button>
                        </form>
                        <form action="/admin/updateorder/<?= $order->id ?>" method="post">
                            <button type="submit" class="py-2 px-4 bg-[#4169E1] text-[#fff] font-semibold rounded-md">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <!-- <div class="row">
        <div class="col-12">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Price</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Size</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Color</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Amount</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Order date</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Total Pay</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">User</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <th class="px-6 py-4 font-medium text-gray-900"><?= $this->e($order->id) ?></th>
                                <td class="px-6 py-4"><?= $this->e($order->name) ?></td>
                                <td class="px-6 py-4"><?= $this->e($order->price) ?></td>
                                <td class="px-6 py-4"><?= $this->e($order->size) ?></td>
                                <td class="px-6 py-4"><?= $this->e($order->color) ?></td>


                                <td class="px-6 py-4"><?= $this->e($order->order_date) ?></td>
                                <td class="px-6 py-4"><?= $this->e($order->total_amount) ?></td>
                                <td class="px-6 py-4"><?= $this->e($order->username) ?></td>
                                <td class="flex justify-end gap-4 px-6 py-4 font-medium">
                                    <a href="/admin/editproduct/<?= $order->id ?>" class="text-center bg-[#4169E1] px-4 py-2 text-[#fff]">Edit</a>
                                    <form class="form-inline ml-1" action="/admin/delete/<?= $order->id ?>" method="POST">
                                        <button type="submit" class="text-primary-700 bg-[#DC143C] px-4 py-2 text-[#fff]" name="delete-product">
                                            <i alt="Delete"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div> -->
    <!-- Table Ends Here -->
</div>
</div>
</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>