<?php $this->layout("layouts/default", ["title" => $this->e($product->name)]) ?>


<?php $this->start("page") ?>
<?php if (isset($errors)) {
?> <div class="success-notification text-[#DC143C] bg-red-100 border-[1px] border-[#DC143C] px-4 py-2 fixed top-0 right-0 m-4 shadow-md shadow-red-300 animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-triangle-exclamation"></i> <?php foreach ($errors as $error) {
                                                                                    echo $error . "\n";
                                                                                } ?></p>
    </div> <?php } ?>

<?php if (isset($success)) {
?><div class="success-notification text-green-600 bg-green-100 border-[1px] border-[#3CB371] px-4 py-[10px] fixed top-0 right-0 m-4 shadow-md shadow-green-200 animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-circle-check"></i> <?php echo $success; ?></p>
    </div> <?php } ?>
<div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-6 gap-y-6 w-[100%] h-full mx-auto mt-3 p-5">
    <div class="w-full flex justify-center">
        <div class="w-[20%] flex flex-col gap-3 list_img">
            <img src="../assets/<?php echo $product['image_1']; ?>" alt="" class="border border-[#dbdbdb] w-[100px] lg:w-[75px] cursor-pointer hover:border-[#24577e] hover:shadow-md transition-all duration-200">
            <img src="../assets/<?php echo $product['image_2']; ?>" alt="" class="border border-[#dbdbdb] w-[100px] lg:w-[75px] cursor-pointer hover:border-[#24577e] hover:shadow-md transition-all duration-200">
            <img src="../assets/<?php echo $product['image_3']; ?>" alt="" class="border border-[#dbdbdb] w-[100px] lg:w-[75px] cursor-pointer hover:border-[#24577e] hover:shadow-md transition-all duration-200">
            <img src="../assets/<?php echo $product['image_4']; ?>" alt="" class="border border-[#dbdbdb] w-[100px] lg:w-[75px] cursor-pointer hover:border-[#24577e] hover:shadow-md transition-all duration-200">
        </div>
        <div class="w-[80%] flex items-start">
            <img src="../assets/<?php echo $product['image']; ?>" alt="" class="img_main">
        </div>
    </div>
    <div>
        <h1 class="text-[18px] text-[#333f48] mb-2 font-semibold lg:text-[24px]"><?php echo $this->e($product->name); ?></h1>
        <div class="mb-2 flex lg:items-center lg:gap-3 gap-y-2 flex-col lg:flex-row">
            <p class="text-[13px] font-medium lg:border-r-2 lg:border-[#333f48] lg:pr-3">Mã máy : <span class="text-[#DC143C]">1420<?php echo $this->e($product->id); ?>*</span></p>
            <p class="text-[13px] font-medium">Loại máy : <span class="text-[#DC143C]"><?php echo $this->e($product->type); ?></span></p>
        </div>
        <hr>
        <div class="flex flex-col gap-1">
            <div class="mt-1">
                <p class="text-[#333f48] text-[24px] font-bold"><span class="text-[#DC143C]">
                        <?php echo $this->e($product->price); ?> VNĐ</span></p>
            </div>
            <div>
                <p class="text-[#333f48] text-[14px] font-medium">Tình trạng :
                    <span class="text-[#DC143C]">vẫn còn <?php echo $this->e($product->quantity); ?> sản phẩm.</span>
                </p>
                <p class="text-[#333f48] text-[14px] font-medium my-1">Nhà sản xuất :
                    <span class="text-[#DC143C]">Nintendo</span>
                </p>
                <p class="text-[#333] text-[14px] font-medium mb-1">Bảo hành :
                    <span class="text-[#DC143C]">12 tháng</span>
                </p>
            </div>
            <h2 class="my-3 text-[#333f48] bg-gray-300 pl-3 py-2 text-lg">Cấu hình chi tiết</h2>
            <ul class="ml-4 mb-3 flex flex-col gap-[6px]">
                <li class="list-disc text-[15px] text-[#333f48]">Hỗ trợ thẻ nhớ có dung lượng tối đa 2TB.</li>
                <li class="list-disc text-[15px] text-[#333f48]">Bộ nhớ trong : <?php echo $this->e($product->memory); ?> </li>
                <li class="list-disc text-[15px] text-[#333f48]">Màn hình : <?php echo $this->e($product->screen); ?>.</li>
                <li class="list-disc text-[15px] text-[#333f48]">Độ phân giải : <?php echo $this->e($product->resolution); ?>.</li>
                <li class="list-disc text-[15px] text-[#333f48]">Dung lượng pin : <?php echo $this->e($product->description); ?></li>
                <li class="list-disc text-[15px] text-[#333f48]">Cảm biến : cảm biến gia tốc, con quay hồi chuyển.</li>
                <li class="list-disc text-[15px] text-[#333f48]">Sản phẩm <?php echo $this->e($product->name); ?> được sản xuất hoàn toàn bởi Nintendo.</li>
            </ul>
            <a href="/orders/<?php echo $product->id ?>" class="flex flex-col justify-center items-center gap-x-1 bg-[#333] py-[6px] font-bold hover:bg-[#DC143C] text-[#fff] transition-all duration-[0.4s]"> MUA NGAY VỚI GIÁ <?php echo $this->e($product->price); ?> VNĐ<span class="text-[14px] font-normal">Đặt mua giao hàng tận nơi</span></a>
            <div class="flex md:items-center gap-2 flex-col md:flex-row">
                <p class="text-[#333f48] ml-2 my-2 text-[15px] pr-4 md:border-r-2"><i class="fa-solid fa-tag text-[#A0522D]"></i> Có <span class="font-bold"><?php echo $product->sold_count ?></span> lượt mua sản phẩm</p>
                <p class="text-[#333f48] ml-2 text-[15px]"><i class="fa-solid fa-eye text-[#DC143D]"></i> Có <span class="font-bold"><?php echo $product->view_count ?></span> lượt xem sản phẩm</p>
            </div>
            <hr>
            <p class="text-center text-[15px] mt-4">Hotline đặt hàng và hỗ trợ : <span class="text-[#DC143C]"><i class="fa-solid fa-square-phone-flip"></i> 079.965.8592</span> (7:30-22:00)</p>
        </div>
    </div>
</div>
<hr>
<div class="w-full my-5 p-5 relative flex flex-col gap-4">
    <div class="relative">
        <h1 class="text-[22px] font-semibold text-[#333f48]">Đánh giá sản phẩm</h1>
        <span class="absolute left-0 bottom-0 w-[215px] bg-[#DC143C] h-[2px]"></span>
    </div>
    <form action="/add_feedback/<?php echo $product->id ?>" method="POST">
        <div class="grid lg:grid-cols-6 grid-cols-1 gap-2 lg:gap-4 items-center my-3">
            <label for="name" class="text-[#333f48] text-[17px]">Đánh giá của bạn <span class="text-[#DC143c]">*</span></label>
            <textarea type="text" name="description" placeholder="Vui lòng đánh giá sản phẩm tại đây ..." class="<?= isset($errors['description']) ? 'border-red-500' : '' ?> col-span-5 border border-gray-400 bg-gray-100 w-full h-[100px] p-2 rounded-[4px] outline-none hover:border-slate-800 focus:border-slate-800"></textarea>
        </div>
        <div class="grid lg:grid-cols-6 grid-cols-1 gap-2 lg:gap-4 items-center">
            <span></span>
            <div class="col-span-5">
                <?php if (isset($errors['description'])) : ?>
                    <span class="text-red-500 mt-1 text-sm">
                        <strong><?= $this->e($errors['description']) ?></strong>
                    </span>
                <?php endif ?>
            </div>
        </div>
        <div class="grid lg:grid-cols-6 grid-cols-1 gap-2 lg:gap-4 items-center my-3">
            <span></span>
            <p class="col-span-5 text-[#DC143C]">Lưu ý : <span class="text-[#333f48]">HTML không được chấp nhận!</span></p>
        </div>
        <div class="grid lg:grid-cols-6 grid-cols-1 gap-2 lg:gap-4 items-center mb-5">
            <h2 class="text-[#333f48] text-[17px]">Chất lượng <span class="text-[#DC143c]">*</span></h2>
            <select name="quality" class="col-span-5 outline-0 p-2 block w-full lg:w-[40%] rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 cursor-pointer">
                <option checked value="Rất tệ">Rất tệ</option>
                <option value="Bình thường">Bình thường</option>
                <option value="Tốt">Tốt</option>
                <option value="Tuyệt vời">Tuyệt vời</option>
            </select>
        </div>
        <button type="submit" class="w-full py-3 text-[#fff] font-semibold bg-slate-800 transition-all duration-300 hover:bg-[#2e6da4]">Gửi đánh giá</button>
    </form>
</div>

<?php $this->stop() ?>