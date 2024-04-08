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
        <h2 class="text-[#333] font-bold text-2xl">Thống kê</h2>
    </div>
    <div class="relative flex items-center justify-center mb-4">
        <form action="/search" method="post" class="relative hidden md:block">
            <input name="search" type="text" placeholder="Tìm kiếm theo ngày ..." class="<?php if (\App\SessionGuard::user() == null) {
                                                                                            echo 'w-[250px]';
                                                                                        } else {
                                                                                            echo 'w-[300px]';
                                                                                        } ?> relative border-[1.2px] outline-none border-[#646464] bg-transparent p-2 rounded-e-[5px] rounded-s-[5px] placeholder:text-[#808080]">
            <button type="submit">
                <div class="absolute top-0 right-0 rounded-e-md translate-x-[50%] bg-[#DC143C] px-4 py-[8.5px] cursor-pointer"><i class="text-[#fff] fa-solid fa-magnifying-glass cursor-pointer"></i></div>
            </button>
        </form>
    </div>
    <div id="all_products" class="w-full overflow-x-scroll overflow-y-scroll text-[#333f48]">
        <div class="grid grid-cols-2 gap-4 w-full p-2">
            <div class="border-2 border-[#cecece] shadow-md rounded p-3">
                <p class="text-[12px] font-semibold mb-2 text-[#DC143C]">TỔNG DOANH THU</p>
                <div class="flex justify-between items-center">
                    <p class="text-[14px] font-semibold">Hôm nay : <span class="text-[#DC143C]">1.250.000 VNĐ</span></p>
                    <i class="fa-solid fa-chart-column text-[#DC143C] text-[30px]"></i>
                </div>
                <hr class="my-2">
                <p class="text-[14px] font-semibold">Tổng cộng 6 đơn hàng.</p>
            </div>
            <div class="border-2 border-[#cecece] shadow-md rounded p-3 text-[#333f48]">
                <p class="text-[12px] font-semibold mb-2 text-[#DC143C]">TỔNG SẢN PHẨM ĐÃ BÁN</p>
                <div class="flex justify-between items-center">
                    <p class="text-[14px] font-semibold">Đã bán : <span class="text-[#DC143C]">10 sản phẩm</span></p>
                    <i class="fa-solid fa-truck-fast text-[#DC143C] text-[30px]"></i>
                </div>
                <hr class="my-2">
                <p class="text-[14px] font-semibold">Có 3 lần đánh giá sản phẩm.</p>
            </div>
            <div class="border-2 border-[#cecece] shadow-md rounded p-3 text-[#333f48]">
                <p class="text-[12px] font-semibold mb-2 text-[#DC143C]">TỔNG GIÁ TRỊ ĐÃ MUA</p>
                <div class="flex justify-between items-center">
                    <p class="text-[14px] font-semibold">Tổng : <span class="text-[#DC143C]">13.200.000 VNĐ</span></p>
                    <i class="fa-solid fa-dollar-sign text-[#DC143C] text-[30px]"></i>
                </div>
                <hr class="my-2">
                <p class="text-[14px] font-semibold">JeiKei Shop <span class="text-[#DC143C]">|</span> Nintendo Switch</p>
            </div>
            <div class="border-2 border-[#cecece] shadow-md rounded p-3 text-[#333f48]">
                <p class="text-[12px] font-semibold mb-2 text-[#DC143C]">TỔNG GIÁ TRỊ BÁN LẠI</p>
                <div class="flex justify-between items-center">
                    <p class="text-[14px] font-semibold">Tổng : <span class="text-[#DC143C]">17.230.000 VNĐ</span></p>
                    <i class="fa-solid fa-dollar-sign text-[#DC143C] text-[30px]"></i>
                </div>
                <hr class="my-2">
                <p class="text-[14px] font-semibold">JeiKei Shop <span class="text-[#DC143C]">|</span> Nintendo Switch</p>
            </div>
        </div>
        <?php foreach ($warehouses as $warehouse) : ?>
            <div class="shadow-md border-2 border-[#cecece] mx-2 my-4 rounded">
                <div class="flex items-center p-2">
                    <img class="w-[125px]" src="../assets/<?php echo $warehouse['image']; ?>" />
                    <div class="flex flex-col gap-1 w-full">
                        <p class="text-[14px] font-semibold"><?= $this->e($warehouse->name) ?></p>
                        <p class="text-[14px] font-semibold">Giá bán ra : <span class="text-[#DC143C]"><?= $this->e($warehouse->price) ?> VNĐ</span></p>
                        <p class="text-[14px] font-semibold">Giá nhập vào : <span class="text-[#DC143C]"><?= $this->e($warehouse->PurchasePrice) ?> VNĐ</span></p>
                        <div class="flex flex-col lg:flex-row justify-between">
                            <p class="text-[14px] font-semibold">Đã bán : <span class="text-[#DC143C]"><?= $this->e($warehouse->test) ?> sản phẩm</span></p>
                            <p class="text-[14px] font-semibold">Hiện tại : <span class="text-[#DC143C]"> còn <?php if ($this->e($warehouse->quantity) > 0) {
                                                                                                                    echo $this->e($warehouse->quantity);
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