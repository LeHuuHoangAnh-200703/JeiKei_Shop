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
        <h2 class="text-[#333] font-bold text-2xl">Quản lý kho</h2>
    </div>

    <div id="all_products" class="w-full overflow-x-scroll overflow-y-scroll">
        <table class="w-full border-collapse bg-white whitespace-nowrap text-center text-sm text-gray-500">
            <thead class="bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">ID</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Tên sản phẩm</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Ảnh sản phẩm</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Giá bán</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Giá nhập sản phẩm</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Kho</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Đã bán</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Điều chỉnh</th>
                </tr>
            </thead>
            <tbody class="w-full">
                <?php foreach ($warehouses as $warehouse) : ?>
                    <?php if ($warehouse->quantity > 0) { ?>
                        <tr class="border-t border-slate-500">
                            <th class="px-6 py-4 font-medium text-gray-900"><?= $this->e($warehouse->id) ?></th>
                            <td class="px-6 py-4 whitespace-nowrap"><?= $this->e($warehouse->name) ?></td>
                            <td><img class="w-[125px]" src="../assets/<?php echo $warehouse['image']; ?>" /> </td>
                            <td class="px-6 py-4"><?= $this->e($warehouse->price) ?></td>
                            <td class="px-6 py-4"><?= $this->e($warehouse->PurchasePrice) ?></td>
                            <td class="px-6 py-4"><?= $this->e($warehouse->quantity) ?></td>
                            <td class="px-6 py-4"><?= $this->e($warehouse->test) ?></td>
                            <td class="flex justify-center gap-4 px-6 py-4 flex-col">
                                <a href="/admin/editproduct/<?= $warehouse->id ?>" class="text-center bg-[#4169E1] px-2 py-2 text-[#fff]">Sửa sản phẩm</a>
                                <form class="form-inline" action="/admin/delete/<?= $warehouse->id ?>" method="POST">
                                    <button type="submit" class="text-primary-700 bg-[#DC143C] px-4 py-2 text-[#fff]" name="delete-product">
                                        <i alt="Delete"></i> Xóa sản phẩm
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->stop() ?>