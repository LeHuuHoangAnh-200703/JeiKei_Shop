<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>

<div class="w-full overflow-auto mt-6">
    <?php
    print_r(var_dump($cart));
    if ($cart) {
    ?>
        <table class="w-full border-collapse bg-white text-center text-sm text-gray-500">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold text-[#333f48]">Số thứ tự</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-[#333f48]">Tên sản phẩm</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-[#333f48]">Hình ảnh</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-[#333f48]">Giá</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-[#333f48]">Thành tiền</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-[#333f48]">Xóa</th>
                </tr>
            </thead>
            <tbody class="divide-gray-100 border-t border-slate-500 w-full">
                <?php foreach ($cart as $index => $cartItem) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td class="whitespace-nowrap"><?= $this->e($cartItem['product_name']) ?></td>
                        <td class="flex justify-center"><img src="<?= $this->e($cartItem['product_image']) ?>" class="w-[100px]" alt=""></td>
                        <td><?= $this->e($cartItem['product_price']) ?></td>
                        <td><?= $this->e($cartItem['product_price']) ?></td>
                        <td>
                            <form action="">
                                <button type="submit" class="text-primary-700 bg-[#DC143C] px-4 py-2 text-[#fff]">Xóa sản phẩm</button>
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