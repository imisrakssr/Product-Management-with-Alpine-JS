<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Management Using Alpine</title>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen py-12 px-4 sm:px-6 lg:px-8" x-data=data>
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-extrabold text-gray-900 text-center mb-8">Product Management Using Alpine</h1>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
            <div class="px-4 py-5 sm:p-6">
                <h2 class="text-lg leading-6 font-medium text-gray-900 mb-4">Add New Product</h2>

                <form @submit.prevent="saveProduct" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter product name" x-model="name">
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter product description" x-model="description"></textarea>
                    </div>
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" name="price" id="price" class="block w-full pl-7 pr-12 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="0.00" step="0.01" x-model="price">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            Add Product
                        </button>

                    </div>
                </form>

            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h2 class="text-lg leading-6 font-medium text-gray-900 mb-4">Product Listings</h2>


                <ul class="divide-y divide-gray-200">

                    <template x-for = "product,index in products" :key="product.id">

                        <li class="py-4 flex items-center justify-between space-x-4 animate-[fadeIn_0.5s_ease-in-out]">
                            <div class="flex-1 min-w-0">

                                <p class="text-sm font-medium text-gray-900 truncate" x-text="product.name"></p>
                                <p class="text-sm text-gray-500" x-text="product.description"></p>

                            </div>

                            <div class="flex items-center space-x-4">

                                <span class="flex-shrink-0 text-sm font-medium text-gray-900" x-text="product.price"></span>

                                <button @click="edit(product)" class="p-1 rounded-full text-indigo-600 hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>

                                <button @click="deleteProduct(product)" class="p-1 rounded-full text-red-600 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>

                            </div>
                        </li>

                    </template>



                </ul>


            </div>
        </div>
    </div>

    <!-- Modal -->
    <div
    x-show="open"
    class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center transition-opacity duration-300"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true"
>
    <div
        class="relative mx-auto p-5 border w-96 shadow-lg rounded-md bg-white transition-transform transform scale-95"
        x-show="open"
        x-transition:enter="ease-out duration-300"
        x-transition:leave="ease-in duration-200"
    >
        <!-- Modal Content -->
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Edit Product</h3>
            <div class="mt-2 px-7 py-3">
                <form @submit.prevent id="editForm" class="space-y-4">
                    <div>
                        <label for="productName" class="block text-sm font-medium text-gray-700 text-left">Product Name</label>
                        <input x-model="editProduct.name" type="text" id="productName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>
                    <div>
                        <label for="productDescription" class="block text-sm font-medium text-gray-700 text-left">Description</label>
                        <textarea x-model="editProduct.description" id="productDescription" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
                    </div>
                    <div>
                        <label for="productPrice" class="block text-sm font-medium text-gray-700 text-left">Price</label>
                        <input x-model="editProduct.price" type="number" id="productPrice" class="block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="0.00" step="0.01" required>
                    </div>
                </form>
            </div>
            <div class="flex items-center justify-around px-4 py-3">
                <button @click="updateProduct()" type="submit" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600 focus:outline-none">
                    Save
                </button>
                <button
                    @click="open=false"
                    class="px-4 py-2 bg-gray-500 text-white font-medium rounded-md hover:bg-gray-600 focus:outline-none"
                >
                    Close
                </button>

            </div>
        </div>
    </div>
</div>


    <script>
        const data={
            products: @json($products),
            name: '',
            description: '',
            price: '',
            editProduct:{
                id: '',
                name: '',
                description: '',
                price: ''
            },
            open: false,
            saveProduct(){
                axios.post('/products',{
                    name: this.name,
                    description: this.description,
                    price: this.price
                }).then(response=>{
                    alert(response.data.message);
                    this.products.push(response.data.product);

                    // Clear the input fields
                    this.name = '';
                    this.description = '';
                    this.price = '';
                })
            },
            fetchProducts(){
                axios.get('/products').then(response=>{
                    this.products = response.data
                })
            },
            deleteProduct(product){
                if (confirm('Are you sure you want to delete this product?')) {
                    axios.delete(`/products/${product.id}`).then(response=>{
                        alert(response.data.message);
                        this.fetchProducts();
                    })
                }
            },
            edit(product){
                this.editProduct = {...product};
                this.open = true;
            },
            updateProduct(){
                axios.put(`/products/${this.editProduct.id}`, this.editProduct).then(response => {
                alert(response.data.message);
                this.open=false;
                this.fetchProducts();
                });
            }

        }
    </script>

</body>

<script src="https://cdn.tailwindcss.com"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</html>
