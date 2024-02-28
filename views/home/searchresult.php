<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="w-[90%] my-5 mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-3 gap-y-5 px-5">
        <?php
        foreach ($resultArray as $result) {
        ?>
            <div class="group flex flex-col items-center w-full overflow-hidden rounded-md bg-white shadow-lg style">
                <div class="p-4">
                    <div class="relative transition-all duration-300 hover:scale-105">
                        <img src="../assets/<?php echo $result['image']; ?>" />
                        <a class="w-full h-full absolute cursor-pointer top-0 left-0" href="/detail/<?php echo $this->e($result->id) ?>"></a>
                    </div>
                    <div class="text-ellipsis whitespace-nowrap overflow-hidden w-52">
                        <a href="/detail/<?php echo $this->e($result->id) ?>" class="text-[17px] md:text-[13px] text-center font-semibold text-gray-800 hover:text-[#DC134C] transition-all duration-300 cursor-pointer py-2 name"><?php echo $this->e($result->name) ?></a>
                    </div>
                    <div class="flex justify-center items-center p-1">
                        <p class="w-1/2 flex-1 text-[15px] max-w-[45ch] text-sm text-[#DC143C] font-semibold price"><?php echo $this->e($result->price) ?>$</p>
                        <small class="text-[#DC143C] text-[15px] lg:text-[13px] font-semibold warehouse">Đã bán : <?php echo $this->e($result->sold_count) ?></small>
                    </div>
                </div>
                <div type="hidden" class="productID hidden"><?php echo $this->e($result->id) ?></div>
                <div class="w-full">
                    <div class="px-3 pb-3 w-full flex justify-center flex-col gap-3">
                        <button class="add_to_cart w-100 text-[#333] py-1 font-semibold transition-all duration-150 hover:underline hover:text-[#DC143C] focus-visible:outline-none focus-visible:ring active:opacity-60/90 add"><i class="fa-solid fa-circle-plus"></i> Thêm giỏ hàng</button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div id="added_to_cart_successfully" class="hidden bg-green-500 text-white px-4 py-2 fixed top-0 right-2 mt-2 rounded-md shadow-lg animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-check"></i> Sản phẩm đã được thêm vào giỏ hàng!</p>
    </div>
</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>