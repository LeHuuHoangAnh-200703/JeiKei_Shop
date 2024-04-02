<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>

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

<div class="w-full overflow-auto my-6">
    <?php
    if ($cart) {
    ?>
        <table class="w-full border-collapse whitespace-nowrap bg-white text-center text-sm text-gray-500">
            <thead>
                <tr>
                    <th scope="col" class="text-base px-6 py-4 font-semibold text-[#333f48]">Tên sản phẩm</th>
                    <th scope="col" class="text-base flex justify-start px-6 py-4 font-semibold text-[#333f48]">Hình ảnh</th>
                    <th scope="col" class="text-base px-6 py-4 font-semibold text-[#333f48]">Còn lại</th>
                    <th scope="col" class="text-base px-6 py-4 font-semibold text-[#333f48]">Giá</th>
                    <th scope="col" class="text-base px-6 py-4 font-semibold text-[#333f48]">Thành tiền</th>
                    <th scope="col" class="text-base px-6 py-4 font-semibold text-[#333f48]">Điều chỉnh</th>
                </tr>
            </thead>
            <tbody class="w-full text-center">
                <?php foreach ($cart as $index => $cartItem) : ?>
                    <tr class="border-t border-slate-500">
                        <td class="whitespace-nowrap"><?= $this->e($cartItem['product_name']) ?></td>
                        <td class=""><img src="../assets/<?= $this->e($cartItem['product_image']) ?>" class="w-[100px]" alt=""></td>
                        <td><?= $this->e($cartItem['product_quantity']) ?> sản phẩm</td>
                        <td><?= $this->e($cartItem['product_price']) ?> VNĐ</td>
                        <td><?= $this->e($cartItem['product_price']) ?> VNĐ</td>
                        <td class="flex items-center gap-4 flex-col mt-4">
                            <a href="/orders/<?php echo $cartItem['product_id'] ?>" class="text-primary-700 bg-[#4169E1] px-[15px] py-2 text-[#fff]"> Mua sản phẩm </a>
                            <form action="/delete/<?php echo $cartItem['product_id'] ?>" method="POST">
                                <button type="submit" class="text-primary-700 bg-[#DC143C] px-[16px] py-2 text-[#fff] mb-4">Xóa sản phẩm</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else {
        echo '<div class="flex justify-center items-center mt-10"><img src="../assets/Picture1.png" class="w-[350px]" alt=""></div>';
    }
    ?>
</div>

<?php $this->stop() ?>