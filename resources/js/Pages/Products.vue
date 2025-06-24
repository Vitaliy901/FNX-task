<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';

const props = defineProps({
    products: Object // Paginated data
});

function updateStock(productId, newStock) {
    router.put(`/products/${productId}/stock`, {
        in_stock: newStock
    }, {
        preserveScroll: true,
        preserveState: true
    });
}

function goToPage(url) {
    router.get(url, {}, {
        preserveScroll: true,
        preserveState: true
    });
}
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Products List
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 space-y-4">
                        <table class="min-w-full table-auto">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>In Stock</th>
                                <th>Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="product in products.data" :key="product.id">
                                <td>
                                    <input
                                        type="checkbox"
                                        :value="product.id"
                                        v-model="selectedProducts"
                                    />
                                </td>
                                <td>{{ product.name }}</td>
                                <td>{{ product.price }}$</td>
                                <td>
                                    <input
                                        type="number"
                                        v-model.number="product.in_stock"
                                        class="border rounded px-2 w-20"
                                    >
                                </td>
                                <td>
                                    <button
                                        @click="updateStock(product.id, product.in_stock)"
                                        class="px-3 py-1 bg-blue-500 text-white rounded"
                                    >
                                        Save
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="mt-6 flex justify-center space-x-2">
                            <button
                                v-for="link in products.links"
                                :key="link.label"
                                @click="goToPage(link.url)"
                                :disabled="!link.url"
                                v-html="link.label"
                                class="px-3 py-1 border rounded"
                                :class="{'bg-gray-300': !link.url, 'bg-blue-500 text-white': link.active}"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
