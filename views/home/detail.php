<?php $this->layout("layouts/default", ["title" => $this->e($product->name)]) ?>


<?php $this->start("page") ?>
<div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-6 gap-y-6 w-[100%] min-h-screen mx-auto mt-3 mb-5 p-5">
    <div class="w-full flex justify-center gap-2">
        <div class="w-[20%] flex flex-col gap-3">
            <img src="../assets/nintendo-switch-oled-red-blue-joy-con-41-160x160.jpg" alt="" class="border border-[#dbdbdb] w-[100px] lg:w-[75px] cursor-pointer">
            <img src="../assets/nintendo-switch-oled-red-blue-joy-con-42-160x160.jpg" alt="" class="border border-[#dbdbdb] w-[100px] lg:w-[75px] cursor-pointer">
            <img src="../assets/nintendo-switch-oled-red-blue-joy-con-43-160x160.jpg" alt="" class="border border-[#dbdbdb] w-[100px] lg:w-[75px] cursor-pointer">
            <img src="../assets/nintendo-switch-oled-red-blue-joy-con-44-160x160.jpg" alt="" class="border border-[#dbdbdb] w-[100px] lg:w-[75px] cursor-pointer">
        </div>
        <div class="w-[80%] flex items-start">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['image']); ?>" />
        </div>
    </div>
    <div>
        <h1 class="text-[18px] text-[#333] font-semibold lg:text-[24px]"><?php echo $this->e($product->name); ?></h1>
        <div class="mb-2 flex items-center gap-3">
            <p class="text-[13px] font-medium border-r-2 border-[#333f48] pr-3">Model : <span class="text-[#DC143C]">(Đang cập nhật ...)</span></p>
            <p class="text-[13px] font-medium">Machine type : <span class="text-[#DC143C]"><?php echo $this->e($product->type); ?></span></p>
        </div>
        <hr>
        <div class="flex flex-col gap-1">
            <div class="mt-1">
                <p class="text-[#333] text-[24px] font-bold"><span class="text-[#DC143C]">
                        $<?php echo $this->e($product->price); ?></span></p>
            </div>
            <div>
                <p class="text-[#333] text-[14px] font-medium">Tình trạng :
                    <span class="text-[#DC143C]">Còn hàng</span>
                </p>
                <p class="text-[#333] text-[14px] font-medium my-1">Nhà sản xuất :
                    <span class="text-[#DC143C]">Nintendo</span>
                </p>
                <p class="text-[#333] text-[14px] font-medium mb-1">Bảo hành :
                    <span class="text-[#DC143C]">12 tháng</span>
                </p>
                <p class="text-[#333] text-[14px] font-medium">Khuyến mãi :
                    <span class="text-[#DC143C]">Hiện tại shop không còn chương trình khuyến mãi nữa.</span>
                </p>
            </div>
            <ul class="ml-4 my-3 flex flex-col gap-[6px]">
                <li class="list-disc text-[15px] text-[#333f48]">Hỗ trợ thẻ nhớ có dung lượng tối đa 2TB.</li>
                <li class="list-disc text-[15px] text-[#333f48]">Bộ nhớ trong 64GB.</li>
                <li class="list-disc text-[15px] text-[#333f48]">Cảm biến : cảm biến gia tốc, con quay hồi chuyển.</li>
                <li class="list-disc text-[15px] text-[#333f48]">Dung lượng pin : 4310 mAh, thời lượng sử dụng từ 4.5 đến 9 tiếng (đối với máy nintendo OLED).</li>
                <li class="list-disc text-[15px] text-[#333f48]">Dung lượng pin : 3570mAh, thời lượng sử dụng từ 3 đến 7 tiếng (đối với máy nintendo Lite).</li>
                <li class="list-disc text-[15px] text-[#333f48]">Sản phẩm <?php echo $this->e($product->name); ?> được sản xuất hoàn toàn bởi Nintendo.</li>
            </ul>
            <a href="/orders/<?php echo $product->id ?>" class="flex flex-col justify-center items-center gap-x-1 bg-[#333] py-[6px] font-bold hover:bg-[#DC143C] text-[#fff] transition-all duration-[0.4s]"> MUA NGAY VỚI GIÁ $<?php echo $this->e($product->price); ?><span class="text-[14px] font-normal">Đặt mua giao hàng tận nơi</span></a>
            <div class="flex md:items-center gap-2 flex-col md:flex-row">
                <p class="text-[#333f48] ml-2 my-2 text-[15px] pr-4 md:border-r-2"><i class="fa-solid fa-tag text-[#A0522D]"></i> Có <span class="font-bold"><?php echo $product->sold_count ?></span> lượt mua sản phẩm</p>
                <p class="text-[#333f48] ml-2 text-[15px]"><i class="fa-solid fa-eye text-[#4169E1]"></i> Có <span class="font-bold"><?php echo $product->view_count ?></span> lượt xem sản phẩm</p>
            </div>
            <hr>
            <p class="text-center text-[15px] mt-2">Hotline đặt hàng và hỗ trợ : <span class="text-[#4169E1]"><i class="fa-solid fa-square-phone-flip"></i> 079.965.8592</span> (7:30-22:00)</p>
        </div>
    </div>
</div>

<?php $this->stop() ?>