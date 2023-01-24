$(document).ready(function(){
    $("#sort").change(function(){
        const cat_id = $('#sort').val();
        $.ajax({
            url : `http://localhost/glowguru/dashboard/category/${cat_id}`,
            type: 'GET',
            success: function (data){
                const products = JSON.parse(data)
                displayProducts(products)
            }
        })
    })
})


const displayProducts = (products) => {

    console.log(products);
    const tableBody = document.querySelector("#tableBody")
    tableBody.innerHTML = ""

    products.forEach((product)=> {
        console.log(product)

        tableBody.innerHTML += `
        <tr class="bg-white border-b  hover:bg-gray-50 ">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
            <span class="text-xs sm:max-w-[20%]">${product.name}</span>
        </th>
        <td class="px-6 py-4">
            <img src="${product.image}" alt="" class="w-10 h-10">
        </td>
        <td class="px-6 py-4">
            ${product.category}
        </td>
        <td class="px-6 py-4">
            ${product.price}
        </td>
        <td class="px-6 py-4">
            ${product.description} ...
        </td>
        <td class="px-6 py-4 flex flex-col sm:flex-row items-center gap-1">
            <a href="#" class=" text-sm font-medium text-white bg-blue-500 px-3 py-2 rounded-md"><i class="fa-solid fa-pen mr-1 text-xs"></i> Edit</a>
            <a href="#" class=" text-sm font-medium text-white bg-red-500 px-3 py-2 rounded-md"><i class="fa-solid fa-trash mr-1 text-xs"></i> Delete</a>
        </td>
    </tr>
        `
    })
}