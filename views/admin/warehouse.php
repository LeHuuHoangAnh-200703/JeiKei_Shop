<?php $this->layout("layouts/admin", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<?php if (isset($errors)) {
?> <div class="success-notification text-[#DC143C] bg-red-100 border-[1px] border-[#DC143C] px-4 py-2 fixed top-0 right-0 m-4 shadow-md shadow-red-300 animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-triangle-exclamation"></i> Thất bại</p>
        <p class="font-bold"><?php echo $errors; ?></p>
    </div> <?php } ?>

<?php if (isset($success)) {
?><div class="success-notification text-green-600 bg-green-100 border-[1px] border-[#3CB371] px-4 py-[10px] fixed top-0 right-0 m-4 shadow-md shadow-green-200 animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-check"></i> Chúc mừng</p>
        <p class="font-bold"><?php echo $success; ?></p>
    </div> <?php } ?>
<div class="w-[95%] mx-auto h-[100%]">
    <div class="text-center py-4">
        <h2 class="text-[#333] font-bold text-[20px]">THỐNG KÊ</h2>
    </div>
    <div id="all_products" class="w-full overflow-x-scroll overflow-y-scroll text-[#333f48]">
        <div class="relative mb-4">
            <form action="/admin/search" method="post" class="relative flex items-center justify-center gap-1">
                <select name="interval" class="relative w-[230px] lg:w-[270px] rounded font-semibold cursor-pointer outline-none shadow border-2 border-[#cecece] bg-transparent p-2 placeholder:text-[#808080]">
                    <option value="daily">Hôm nay</option>
                    <option value="weekly">Tuần</option>
                    <option value="monthly">Tháng</option>
                    <option value="last_week">Tuần trước</option>
                    <option value="last_month">Tháng trước</option>
                </select>
                <button type="submit">
                    <div class="bg-[#DC143C] shadow px-4 py-[8px] rounded cursor-pointer text-[14px] font-semibold text-[#fff]">Tìm kiếm</div>
                </button>
            </form>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 w-full p-2">
            <div class="border-2 border-[#cecece] shadow-md rounded p-3">
                <p class="text-[12px] font-semibold mb-2">TỔNG DOANH THU</p>
                <div class="flex justify-between items-center">
                    <p class="text-[14px] font-semibold">Doanh thu : <span class="text-[#DC143C]"><?= number_format($totalRevenue, 3, '.', '.') ?> VNĐ</span></p>
                    <i class="fa-solid fa-chart-column text-[#DC143C] text-[30px]"></i>
                </div>
                <hr class="my-2">
                <p class="text-[14px] font-semibold">Tổng cộng <span class="text-[#DC143C]"><?= $totalOrders ?></span> đơn hàng.</p>
            </div>
            <div class="border-2 border-[#cecece] shadow-md rounded p-3 text-[#333f48]">
                <p class="text-[12px] font-semibold mb-2">TỔNG SẢN PHẨM ĐÃ BÁN</p>
                <div class="flex justify-between items-center">
                    <p class="text-[14px] font-semibold">Đã bán : <span class="text-[#DC143C]"><?= $totalProductsSold ?> sản phẩm</span></p>
                    <i class="fa-solid fa-cart-plus text-[#DC143C] text-[30px]"></i>
                </div>
                <hr class="my-2">
                <p class="text-[14px] font-semibold">Có <span class="text-[#DC143C]"><?= $totalFeedbacks ?></span> lượt đánh giá sản phẩm.</p>
            </div>
            <div class="border-2 border-[#cecece] shadow-md rounded p-3 text-[#333f48]">
                <p class="text-[12px] font-semibold mb-2">TỔNG GIÁ TRỊ ĐÃ MUA</p>
                <div class="flex justify-between items-center">
                    <p class="text-[14px] font-semibold">Tổng : <span class="text-[#DC143C]"><?= number_format($TotalPurchasePrice, 3, '.', '.') ?> VNĐ</span></p>
                    <i class="fa-solid fa-dollar-sign text-[#DC143C] text-[30px]"></i>
                </div>
                <hr class="my-2">
                <p class="text-[14px] font-semibold">JeiKei Shop <span class="text-[#DC143C]">|</span> Nintendo Switch</p>
            </div>
            <div class="border-2 border-[#cecece] shadow-md rounded p-3 text-[#333f48]">
                <p class="text-[12px] font-semibold mb-2">TỔNG GIÁ TRỊ BÁN LẠI</p>
                <div class="flex justify-between items-center">
                    <p class="text-[14px] font-semibold">Tổng : <span class="text-[#DC143C]"><?= number_format($TotalSellingPrice, 3, '.', '.') ?> VNĐ</span></p>
                    <i class="fa-solid fa-dollar-sign text-[#DC143C] text-[30px]"></i>
                </div>
                <hr class="my-2">
                <p class="text-[14px] font-semibold">JeiKei Shop <span class="text-[#DC143C]">|</span> Nintendo Switch</p>
            </div>
            <div class="border-2 border-[#cecece] shadow-md rounded p-3 text-[#333f48]">
                <p class="text-[12px] font-semibold mb-2">TỔNG LỢI NHUẬN</p>
                <div class="flex justify-between items-center">
                    <p class="text-[14px] font-semibold">Tổng : <span class="text-[#DC143C]"><?= number_format($totalProfit, 3, '.', '.') ?> VNĐ</span></p>
                    <i class="fa-solid fa-dollar-sign text-[#DC143C] text-[30px]"></i>
                </div>
                <hr class="my-2">
                <p class="text-[14px] font-semibold">JeiKei Shop <span class="text-[#DC143C]">|</span> Nintendo Switch</p>
            </div>
            <div class="border-2 border-[#cecece] shadow-md rounded p-3 text-[#333f48]">
                <p class="text-[12px] font-semibold mb-2">SỐ ĐƠN HÀNG ĐƯỢC CHUYỂN ĐI</p>
                <div class="flex justify-between items-center">
                    <p class="text-[14px] font-semibold">Tổng : <span class="text-[#DC143C]"><?= number_format($totalProfit, 3, '.', '.') ?> VNĐ</span></p>
                    <i class="fa-solid fa-truck-fast text-[#DC143C] text-[30px]"></i>
                </div>
                <hr class="my-2">
                <p class="text-[14px] font-semibold">JeiKei Shop <span class="text-[#DC143C]">|</span> Nintendo Switch</p>
            </div>
        </div>
        <?php foreach ($warehouses as $warehouse) : ?>
            <div class="shadow-md border-2 border-[#cecece] mx-2 my-4 rounded">
                <div class="flex items-center p-2">
                    <?php
                    $images = json_decode($warehouse->images, true);
                    $index = 0;
                    if (is_array($images) && !empty($images)) :
                        foreach ($images as $item_product) : ?>
                            <?php if ($index == 0) { ?>
                                <img class="w-[125px]" src="../assets/<?php echo $item_product ?>" />
                            <?php break;
                            } ?>
                        <?php endforeach;
                        ?>
                    <?php endif; ?>
                    <div class="flex flex-col gap-1 w-full">
                        <p class="text-[14px] font-semibold"><?= $this->e($warehouse->name) ?></p>
                        <p class="text-[14px] font-semibold">Giá bán ra : <span class="text-[#DC143C]"><?= $this->e($warehouse->price) ?> VNĐ</span></p>
                        <p class="text-[14px] font-semibold">Giá nhập vào : <span class="text-[#DC143C]"><?= $this->e($warehouse->PurchasePrice) ?> VNĐ</span></p>
                        <div class="flex flex-col lg:flex-row justify-between">
                            <p class="text-[14px] font-semibold">Đã bán : <span class="text-[#DC143C]"><?= $this->e($warehouse->test) ?> sản phẩm</span></p>
                            <p class="text-[14px] font-semibold">Hiện tại : <span class="text-[#DC143C]"> <?php if ($this->e($warehouse->quantity) > 0) {
                                                                                                                echo "Còn lại " . $this->e($warehouse->quantity);
                                                                                                                echo " sản phẩm";
                                                                                                            } else {
                                                                                                                echo "Đã bán hết.";
                                                                                                            }  ?> </span></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php $this->stop() ?>