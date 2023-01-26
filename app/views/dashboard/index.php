<?php require APPROOT . "/views/inc/header.php" ?>
<!-- <?php #var_dump($data['products']); 
        ?> -->
<div class="max-w-lg mx-auto">
    <?php flash("login_success") ?>
</div>
<section>
    <div class="containner py-10">
        <div class="flex justify-between items-center my-6">
            <h2 class="text-xl font-medium"> Welcome <span class="text-primary"><?= ucwords($_SESSION['username']) ?></span></h2>
            <div class="space-x-4 flex flex-col sm:flex-row gap-3">
                <a href="<?= URLROOT ?>/dashboard/add" class="text-md text-white bg-green-500 px-3 py-2 rounded-md"> <i class="fa-solid fa-plus mr-1"></i> Add Product</a>
                <button type="button" data-modal-target="statistics" data-modal-toggle="statistics" class="text-md text-white bg-[#ebbb89] hover:bg-sec px-3 py-2 rounded-md transition duration-200"> <i class="fa-solid fa-eye mr-1"></i> Statistics</button>
            </div>
        </div>
        <!-- Sorting -->
        <div class="flex flex-col md:flex-row justify-between md:items-center gap-6">
            <select name="sorting" id="sort" class="w-44 text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary ">
                <option value="0">Categories</option>
                <?php foreach ($data['categories'] as $category) : ?>
                    <option value="<?= $category->id ?>"><?= $category->name_cat ?></option>
                <?php endforeach; ?>

            </select>


            <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="searchDash" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#ebbb89] focus:border-[#ebbb89] block w-full pl-10 p-2.5 " placeholder="Search" required>
                </div>

            </form>

        </div>
        <!-- Sorting end -->


        <?php if (empty($data['products'])) : ?>
            <h3 class="text-red-400">No products to show</h3>
        <?php else : ?>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-white uppercase bg-primary">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php foreach ($data['products'] as $product) : ?>
                            <tr class="bg-white border-b  hover:bg-gray-50 ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                    <span class="text-xs sm:max-w-[20%]"><?= $product->name ?></span>
                                </th>
                                <td class="px-6 py-4">
                                    <img src="<?= $product->image ?>" alt="" class="w-10 h-10">
                                </td>
                                <td class="px-6 py-4">
                                    <?= $product->category ?>
                                </td>
                                <td class="px-6 py-4">
                                    $<?= $product->price ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= substr($product->description, 0, 10) ?> ...
                                </td>
                                <td class="px-6 py-4 flex flex-col sm:flex-row items-center gap-1">
                                    <a href="<?= URLROOT ?>/dashboard/edit/<?= $product->id ?>" class=" text-sm font-medium text-white bg-blue-500 px-3 py-2 rounded-md"><i class="fa-solid fa-pen mr-1 text-xs"></i> Edit</a>
                                    <a href="<?= URLROOT ?>/dashboard/delete/<?= $product->id ?>" class=" text-sm font-medium text-white bg-red-500 px-3 py-2 rounded-md"><i class="fa-solid fa-trash mr-1 text-xs"></i> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        <?php endif; ?>



    </div>
</section>





<!-- Main modal -->
<div id="statistics" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-gray-100 rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900">
                    Statistics
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="statistics">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6  grid grid-cols-2 gap-6">
                <div class="bg-white shadow-md p-10 rounded-md ">
                    <h3 class="text-lg text-gray-400 text-center">Total Products :</h3>
                    <p class="text-2xl text-primary font-bold text-center mt-2 "><?= $data['statistics']['productCount'] ?></p>
                </div>
                <div class="bg-white shadow-md p-10 rounded-md ">
                <h3 class="text-lg text-gray-400 text-center">Total Categories :</h3>
                    <p class="text-2xl text-primary font-bold text-center mt-2 "><?= $data['statistics']['categoryCount'] ?></p>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex justify-end items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                <button data-modal-hide="statistics" type="button" class="text-white bg-[#ebbb89] hover:bg-[sec] focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center">Close</button>
            </div>
        </div>
    </div>
</div>


<?php require APPROOT . "/views/inc/footer.php" ?>