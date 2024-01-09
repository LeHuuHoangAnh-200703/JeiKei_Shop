<?php $this->layout("layouts/default", ["title" => $this->e($product->name)]) ?>

<?php $this->start("page") ?>
<div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-6 gap-y-6 w-[95%] min-h-screen mx-auto mt-3 mb-5 p-5">
    <div class="w-full flex justify-center lg:block">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['image']); ?>" />
    </div>
    <div>
        <h1 class="text-[18px] text-[#333] font-semibold lg:text-[24px]"><?php echo $this->e($product->name); ?></h1>
        <div class="mb-2 flex items-center gap-3">
            <p class="text-[13px] font-medium border-r-2 border-[#333f48] pr-3">SKU : <span class="text-[#DC143C]">(Đang cập nhật ...)</span></p>
            <p class="text-[13px] font-medium">Trademark : <span class="text-[#DC143C]"><?php echo $this->e($product->type); ?></span></p>
        </div>
        <hr>
        <div class="flex flex-col gap-1">
            <div class="mt-1">
                <p class="text-[#333] text-[24px] font-bold"><span class="text-[#DC143C]">
                        $<?php echo $this->e($product->price); ?></span></p>
            </div>
            <div>
                <p class="text-[#333] text-[14px] font-medium mb-1">Tình trạng : 
                    <span class="text-[#DC143C]">Còn hàng</span>
                </p>
                <p class="text-[#333] text-[14px] font-medium">Phân phối bởi : 
                    <span class="text-[#DC143C]">C3 Gundam</span>
                </p>
            </div>
            <ul class="ml-4 my-3 flex flex-col gap-[6px]">
                <li class="list-disc text-[15px] text-[#333f48]">Sản phẩm Gunpla chính hãng của Bandai, sản xuất tại Nhật Bản.</li>
                <li class="list-disc text-[15px] text-[#333f48]">Sản phẩm giúp phát triển trí não và rèn luyện tính kiên nhẫn cho người chơi.</li>
                <li class="list-disc text-[15px] text-[#333f48]">Người chơi sẽ thỏa sức sáng tạo với hàng nghìn mẫu và chi tiết để có thể tạo ra sản phẩm của bản thân.</li>
                <li class="list-disc text-[15px] text-[#333f48]">Sản phẩm gắn với nhau bằng khớp nối, không dùng keo dán.</li>
                <li class="list-disc text-[15px] text-[#333f48]">Mô hình lắp ráp <?php echo $this->e($product->name); ?> Gunpla chính hãng Nhật Bản.</li>
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