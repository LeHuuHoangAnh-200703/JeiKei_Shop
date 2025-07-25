<?php $this->layout("layouts/home", ["title" => APPNAME]) ?>

<?php $this->start("page");

?>
<div class="w-full mx-auto my-8">
    <div class="w-full flex justify-between items-start flex-col lg:flex-row p-4 gap-3 lg:gap-3 md:gap-x-[60px]">
        <div class="w-[20%] hidden lg:block flex-col py-1 px-2">
            <h2 class="py-2 flex items-center gap-2 text-[#333f48]"><i class="fa-solid fa-gamepad text-xl text-[#DC143C]"></i><strong> Nintendo Switch</strong></h2>
            <hr class="border border-[#333f48] rounded-full" />
            <ul>
                <li class="py-[6px] px-3 text-[#333f48] border border-1 cursor-pointer hover:border-[#DC143C] hover:text-[#DC143C] transition-all duration-100 my-3" id="all">Tất cả</li>
                <li class="py-[6px] px-3 text-[#333f48] border border-1 cursor-pointer hover:border-[#DC143C] hover:text-[#DC143C] transition-all duration-100 my-3" id="Nintendo_OLED">Nintendo OLED</li>
                <li class="py-[6px] px-3 text-[#333f48] border border-1 cursor-pointer hover:border-[#DC143C] hover:text-[#DC143C] transition-all duration-100 my-3" id="Nintendo_Lite">Nintendo Lite</li>
                <li class="py-[6px] px-3 text-[#333f48] border border-1 cursor-pointer hover:border-[#DC143C] hover:text-[#DC143C] transition-all duration-100 my-3" id="Nintendo_Old">Nintendo Cũ</li>
            </ul>
        </div>
        <div class="relative block lg:hidden w-full">
            <div class="relative border border-[#a3a3a3] rounded py-1 px-2 cursor-pointer clickdown_2">
                <div class="flex items-center justify-between">
                    <h2 class="py-2 flex items-center gap-2 text-[#333f48]"><i class="fa-solid fa-gamepad text-xl text-[#DC143C]"></i><strong> Nintendo Switch</strong></h2>
                    <i class="fa-solid fa-caret-down rotate-180 ease-out duration-500 dropdown_2"></i>
                </div>
            </div>
            <ul class="absolute top-[100%] left-0 z-40 hidden w-full bg-[#333] p-3 rounded list_2">
                <li class="mt-1 text-[#fff] py-2 px-3 cursor-pointer hover:text-[#DC143C] mb-1 font-medium transition-all duration-200" id="all_1">Tất cả</li>
                <hr>
                <li class="mt-1 text-[#fff] py-2 px-3 cursor-pointer hover:text-[#DC143C] mb-1 font-medium transition-all duration-200" id="Nintendo_OLED_1">Nintendo OLED</li>
                <hr>
                <li class="py-2 text-[#fff] px-3 cursor-pointer hover:text-[#DC143C] mb-1 font-medium transition-all duration-200" id="Nintendo_Lite_1">Nintendo lite</li>
                <hr>
                <li class="py-2 text-[#fff] px-3 cursor-pointer hover:text-[#DC143C] mb-1 font-medium transition-all duration-200" id="Nintendo_Old_1">Nintendo Old</li>
            </ul>
        </div>
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
        <div class="relative flex flex-col justify-center items-center w-[100%]">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 justify-center">
                <?php
                $type = [
                    ["type" => "Nintendo_OLED", "imgHeight" => "h-20"],
                    ["type" => "Nintendo_Lite", "imgHeight" => "h-20"],
                    ["type" => "Nintendo_Old", "imgHeight" => "h-20"]
                ];
                for ($i = 0; $i < count($type); $i++) {
                    foreach ($productinfo as $product) {
                        if ($product->type == $type[$i]["type"]) {
                ?>
                            <div class="<?php echo $type[$i]["type"] ?> relative group flex flex-col items-center w-full overflow-hidden rounded-md bg-white shadow-md z-0 style">
                                <form action="/add_to_cart/<?php echo $this->e($product->id) ?>" method="POST" enctype="multipart/form-data" id="add_to_cart_form">
                                    <div class="p-4 overflow-hidden">
                                        <div class="relative transition-all duration-300 hover:scale-105">
                                            <?php
                                            $images = json_decode($product->images, true);
                                            $index = 0;
                                            if (is_array($images) && !empty($images)) :
                                                foreach ($images as $item_product) : ?>
                                                <?php if($index == 0) {?>
                                                    <img src="../assets/<?php echo $item_product?>" />
                                                <?php break;}?>
                                                <?php endforeach;
                                            ?>
                                            <?php endif; ?>
                                            <a class="w-full h-full absolute cursor-pointer top-0 left-0" href="/detail/<?php echo $this->e($product->id) ?>"></a>
                                        </div>
                                        <div class="w-52 whitespace-nowrap text-ellipsis overflow-hidden">
                                            <a href="/detail/<?php echo $this->e($product->id) ?>" name="product_Name" class="inline text-[17px] md:text-[13px] text-center font-semibold text-[#333f48] hover:text-[#DC134C] transition-all duration-300 cursor-pointer py-2 name"><?php echo $this->e($product->name) ?></a>
                                        </div>
                                        <div class="flex justify-between items-center py-1">
                                            <p class="w-1/2 text-[14px] text-[#DC143C] font-semibold price" name="price"><?php echo $this->e($product->price) ?> VNĐ</p>
                                            <p class="text-[14px] text-[#DC143C] font-semibold">Đã bán : <?php if ($this->e($product->test) == null) {
                                                                                                                echo "0";
                                                                                                            } else {
                                                                                                                echo $this->e($product->test);
                                                                                                            } ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php if ($this->e($product->quantity) > 0) {
                                        echo '<input name="productID" type="text" id="productID" class="productID hidden" value="<?php echo $this->e($product->id) ?>"><div class="w-full"><div class="px-3 pb-3 w-full flex justify-center flex-col gap-3"><button name="add_to_cart" type="submit" class="add_to_cart w-100 text-[#333f48] py-1 font-semibold transition-all duration-150 hover:underline hover:text-[#DC143C] focus-visible:outline-none focus-visible:ring active:opacity-60/90 add"><i class="fa-solid fa-circle-plus"></i> Thêm giỏ hàng</button></div></div>';
                                    } else {
                                        echo '<p class="text-[16px] text-[#333f48] text-center font-semibold">Tình trạng : <span class="text-[#DC143C]">Hết hàng</span></p>';
                                    } ?>
                                </form>
                            </div>
                <?php   }
                    }
                }
                ?>

            </div>
        </div>
    </div>
    <!-- Notifications -->
    <!-- <div id="added_to_cart_successfully" class="hidden bg-green-500 text-white px-4 py-2 fixed top-0 right-2 mt-2 rounded-md shadow-lg animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-check"></i> Sản phẩm đã được thêm vào giỏ hàng!</p>
    </div> -->
</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>