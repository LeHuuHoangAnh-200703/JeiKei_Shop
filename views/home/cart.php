<?php $this->layout("layouts/default", ["title" => $this->e($product->name)]) ?>

<?php $this->start("page") ?>

<div class="cart-shop fixed top-0 right-0 bg-[#FFFAFA] w-full md:w-[500px] h-full z-20 transition-all duration-[.4s] translate-x-[100%]">
            <div class="w-full overflow-y-auto h-full">
                <div class="relative mt-[20px]">
                    <h1 class="text-center font-bold text-2xl uppercase text-[#333]">JEIKEI <span class="text-[#DC143C]">SWITCH</span> Giỏ Hàng</h1>
                </div>
                <?php
                if (!empty($cart)) {
                    foreach ($cart as $cartItem) {
                ?>
                        <div class="flex justify-center items-center flex-col m-[30px] cart_product">
                            <div class="flex justify-start gap-2 border-b-2 border-[#333] py-[15px] cart">
                                <div class="w-1/3">
                                    <img src="<?php echo $cartItem['image'] ?>" alt="Product Image">
                                </div>
                                <div class="text-sm flex justify-center flex-col gap-[8px] font-semibold">
                                    <h1><?php echo $cartItem['name'] ?></h1>
                                    <p>Giá : <span class="text-[#DC143C] price"><?php echo $cartItem['price'] ?> đ</span></p>
                                    <div class="flex items-center gap-4">
                                        <a href="/orders/<?php echo $cartItem['product_id'] ?>" class="px-[18px] py-[6px] bg-[#333] transition-all duration-300 text-[#fff] hover:bg-[#DC143C]"><i class="fa-solid fa-cart-shopping"></i> Mua hàng</a>
                                        <button class="px-[18px] py-[6px] bg-[#DC143C] transition-all duration-500 hover:text-[#fff] del">Xóa sản phẩm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="flex justify-center items-center mt-10">
                    <img src="../assets/Picture1.png" class="w-[400px]" alt="">
                </div>';
                }
                ?>
            </div>
            <div class="absolute bottom-0 w-full grid grid-cols-2 font-semibold text-[#fff]">
                <div class="bg-[#DC143C] w-full p-2 text-center total"> đ</div>
                <div class="bg-[#333] w-full p-2 text-center cursor-pointer close-cart">Close</div>
            </div>
        </div>

<?php $this->stop() ?>