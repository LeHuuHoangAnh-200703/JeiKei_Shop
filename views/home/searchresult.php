<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="w-[90%] my-5 mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-3 gap-y-5 px-5">
        <?php
        foreach ($resultArray as $result) {
        ?>
            <div class="group flex flex-col items-center w-full overflow-hidden rounded-md bg-white shadow-lg style">
                <form action="/add_to_cart/<?php echo $this->e($result->id) ?>" method="POST" enctype="multipart/form-data" id="add_to_cart_form">
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
                            <p class="text-[14px] text-[#DC143C] font-semibold">Đã bán : <?php if ($this->e($result->test) == null) {
                                                                                                echo "0";
                                                                                            } else {
                                                                                                echo $this->e($result->test);
                                                                                            } ?>
                            </p>
                        </div>
                    </div>
                    <div type="hidden" class="productID hidden"><?php echo $this->e($result->id) ?></div>
                    <div class="w-full">
                        <div class="px-3 pb-3 w-full flex justify-center flex-col gap-3">
                            <button name="add_to_cart" type="submit" class="add_to_cart w-100 text-[#333f48] py-1 font-semibold transition-all duration-150 hover:underline hover:text-[#DC143C] focus-visible:outline-none focus-visible:ring active:opacity-60/90 add"><i class="fa-solid fa-circle-plus"></i> Thêm giỏ hàng</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>