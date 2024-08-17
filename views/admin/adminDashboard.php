<?php $this->layout("layouts/admin", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<?php if (isset($errors)) {
?> <div class="success-notification text-[#DC143C] bg-red-100 border-[1px] border-[#DC143C] px-4 py-2 fixed top-0 right-0 m-4 shadow-md shadow-red-300 animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-triangle-exclamation"></i> Thất bại</p>
        <p class="font-bold"><?php echo $errors; ?></p>
    </div> <?php } ?>

<?php if (isset($success)) {
?><div class="success-notification text-green-600 bg-green-100 border-[1px] border-[#3CB371] px-4 py-[10px] fixed top-0 right-0 m-4 shadow-md shadow-green-200 animate__animated animate__backInRight">
        <p class="font-bold"><i class="fa-solid fa-check"></i> Chúc mừng</p>
        <p class="font-bold"><?php echo $success; ?></p>
    </div> <?php } ?>
<div class="w-[95%] mx-auto h-[100%]">
    <div class="text-center py-4">
        <h2 class="text-[#333] font-bold text-[20px]">DANH SÁCH SẢN PHẨM</h2>
    </div>

    <div id="all_products" class="w-full overflow-x-scroll overflow-y-scroll">
        <table class="w-full border-collapse bg-white whitespace-nowrap text-center text-sm text-gray-500">
            <thead class="bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">ID</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Tên sản phẩm</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Giá bán</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Giá nhập sản phẩm</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Loại sản phẩm</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Số lượng</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Tình trạng</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Ảnh sản phẩm</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Ảnh chi tiết sản phẩm</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Ảnh chi tiết sản phẩm</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Ảnh chi tiết sản phẩm</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Dung lượng pin</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Màn hình</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Độ phân giải</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Bộ nhớ</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Điều chỉnh</th>
                </tr>
            </thead>
            <tbody class="w-full">
                <?php foreach ($productinfo as $product) : ?>
                    <tr class="border-t border-slate-500">
                        <th class="px-6 py-4 font-medium text-gray-900"><?= $this->e($product->id) ?></th>
                        <td class="px-6 py-4 whitespace-nowrap"><?= $this->e($product->name) ?></td>
                        <td class="px-6 py-4"><?= $this->e($product->price) ?></td>
                        <td class="px-6 py-4"><?= $this->e($product->PurchasePrice) ?></td>
                        <td class="px-6 py-4"><?= $this->e($product->type)  ?></td>
                        <td class="px-6 py-4"><?= $this->e($product->quantity) ?></td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3 w-3">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                Paid
                            </span>
                        </td>
                        <?php
                        // Chuyển đổi JSON images thành mảng
                        $images = json_decode($product->images, true);

                        // Kiểm tra xem biến $images có phải là mảng và không rỗng
                        if (is_array($images) && !empty($images)) :
                            foreach ($images as $item_product) : ?>
                                <td><img class="w-[125px]" src="../assets/<?php echo $item_product ?>" /> </td>
                            <?php endforeach;
                        else : ?>
                            <td>Không có ảnh nào</td>
                        <?php endif; ?>
                        <td class="px-6 py-4 whitespace-nowrap"><?= $this->e($product->description) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?= $this->e($product->screen) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?= $this->e($product->resolution) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?= $this->e($product->memory) ?></td>
                        <td class="flex justify-center gap-4 px-6 py-4 flex-col">
                            <a href="/admin/editproduct/<?= $product->id ?>" class="text-center bg-[#4169E1] px-2 py-2 text-[#fff]">Sửa sản phẩm</a>
                            <form class="form-inline" action="/admin/delete/<?= $product->id ?>" method="POST">
                                <button type="submit" class="text-primary-700 bg-[#DC143C] px-4 py-2 text-[#fff]" name="delete-product">
                                    <i alt="Delete"></i> Xóa sản phẩm
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->stop() ?>