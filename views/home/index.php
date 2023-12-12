<?php $this->layout("layouts/home", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="w-full mx-auto mb-8">
    <div class="w-full flex justify-between items-start flex-col lg:flex-row p-4 gap-3 lg:gap-3 md:gap-x-[60px]">
        <div class="w-[20%] hidden lg:block flex-col py-1 px-2">
            <h2 class="py-2"><i class="fa-solid fa-jedi text-[#DC143C]"></i><strong> TRADEMARK</strong></h2>
            <hr />
            <ul>
                <li class="py-[6px] px-3 border border-1 cursor-pointer hover:border-[#DC143C] hover:text-[#DC143C] transition-all duration-100 my-3" id="all">All</li>
                <li class="py-[6px] px-3 border border-1 cursor-pointer hover:border-[#DC143C] hover:text-[#DC143C] transition-all duration-100 my-3" id="BANDAI">BANDAI</li>
                <li class="py-[6px] px-3 border border-1 cursor-pointer hover:border-[#DC143C] hover:text-[#DC143C] transition-all duration-100 my-3" id="SDCS">SDCS</li>
                <li class="py-[6px] px-3 border border-1 cursor-pointer hover:border-[#DC143C] hover:text-[#DC143C] transition-all duration-100 my-3" id="RG">RG</li>
                <li class="py-[6px] px-3 border border-1 cursor-pointer hover:border-[#DC143C] hover:text-[#DC143C] transition-all duration-100 my-3" id="SD-BBLEGEND">SD - BBLEGEND</li>
                <li class="py-[6px] px-3 border border-1 cursor-pointer hover:border-[#DC143C] hover:text-[#DC143C] transition-all duration-100 my-3" id="MGSD">MGSD</li>
            </ul>
        </div>
        <div class="relative block lg:hidden w-full">
            <div class="relative border border-[#a3a3a3] rounded py-1 px-2 cursor-pointer clickdown_2">
                <div class="flex items-center justify-between">
                    <h2 class="py-2"><i class="fa-solid fa-jedi text-[#DC143C]"></i><strong> TRADEMARK</strong></h2>
                    <i class="fa-solid fa-caret-down rotate-180 ease-out duration-500 dropdown_2"></i>
                </div>
            </div>
            <ul class="absolute top-[100%] left-0 z-40 hidden w-full bg-[#333] p-3 rounded list_2">
                <li class="mt-1 text-white py-2 px-3 cursor-pointer hover:text-[#DC143C] mb-1 font-medium transition-all duration-200" id="all_1">All</li>
                <hr>
                <li class="mt-1 text-white py-2 px-3 cursor-pointer hover:text-[#DC143C] mb-1 font-medium transition-all duration-200" id="BANDAI_1">BANDAI</li>
                <hr>
                <li class="py-2 text-white px-3 cursor-pointer hover:text-[#DC143C] mb-1 font-medium transition-all duration-200" id="SDCS_1">SDCS</li>
                <hr>
                <li class="py-2 text-white px-3 cursor-pointer hover:text-[#DC143C] mb-1 font-medium transition-all duration-200" id="RG_1">RG</li>
                <hr>
                <li class="py-2 text-white px-3 cursor-pointer hover:text-[#DC143C] mb-1 font-medium transition-all duration-200" id="SD-BBLEGEND_1">SD - BBLEGEND</li>
                <hr>
                <li class="py-2 text-white px-3 cursor-pointer hover:text-[#DC143C] mb-1 font-medium transition-all duration-200" id="MGSD_1">MGSD</li>
            </ul>
        </div>
        <div class="flex flex-col justify-center items-center w-[100%]">
            <img src="./assets/n24.webp" alt="">
            <span class="w-[100%] h-[2px] bg-[#DCDCDC] my-5"></span>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 justify-center">
                <?php
                $type = [
                    ["type" => "BANDAI", "imgHeight" => "h-20"], ["type" => "RG", "imgHeight" => "h-20"],
                    ["type" => "SDCS", "imgHeight" => "h-20"],   ["type" => "SD-BBLEGEND", "imgHeight" => "h-20"], ["type" => "MGSD", "imgHeight" => "h-20"]
                ];
                for ($i = 0; $i < count($type); $i++) {
                    foreach ($productinfo as $product) {
                        if ($product->type == $type[$i]["type"]) {
                ?>
                            <div class="<?php echo $type[$i]["type"] ?> group flex flex-col items-center w-full overflow-hidden rounded-md bg-white shadow-lg style">
                                <div class="p-4">
                                    <div class="relative transition-all duration-300 hover:scale-110 hover:shadow-xl">
                                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['image']); ?>" />
                                        <a class="w-full h-full absolute cursor-pointer top-0 left-0" href="/detail/<?php echo $this->e($product->id) ?>"></a>
                                    </div>
                                    <h3 class="text-[17px] md:text-[13px] text-center font-semibold text-gray-800 hover:text-[#DC134C] transition-all duration-300 cursor-pointer py-2 name"><?php echo $this->e($product->name) ?></h3>
                                    <div class="flex justify-center items-center p-1">
                                        <p class="w-1/2 flex-1 text-[15px] max-w-[45ch] text-sm text-[#DC143C] font-semibold price"><?php echo $this->e($product->price) ?>$</p>
                                        <small class="text-[#DC143C] text-[15px] lg:text-[13px] font-semibold warehouse">Warehouse: <?php echo $this->e($product->quantity) ?></small>
                                    </div>
                                </div>
                                <div type="hidden" class="productID hidden"><?php echo $this->e($product->id) ?></div>
                                <div class="w-full">
                                    <div class="px-3 pb-6 w-full flex justify-center flex-col gap-3">
                                        <button class="add_to_cart w-100 text-[#333] border border-1 px-4 py-2 bg-transparent font-semibold transition-all duration-300 hover:bg-[#DC143C] hover:text-[#fff] focus-visible:outline-none focus-visible:ring active:opacity-60/90 add">Add to cart</button>
                                        <a href="/orders/<?php echo $this->e($product->id) ?>" class="bg-[#333] text-center px-4 py-2 text-white font-semibold transition-all duration-300 hover:bg-[#DC143C] focus-visible:outline-none focus-visible:ring active:opacity-60/90">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                <?php }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Notifications -->
    <div id="added_to_cart_successfully" class="hidden bg-green-500 text-white px-4 py-2 fixed top-0 right-2 mt-2 rounded-md shadow-lg animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-check"></i> Added product to cart successfully!</p>
    </div>
</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>