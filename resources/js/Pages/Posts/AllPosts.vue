<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useRemember } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps ({
    allPosts: Array,
})
</script>

<template>
    <Head title="Mitemiru" />

    <AuthenticatedLayout>
        <template #header>
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">みてみよう🐶</h2>
        </div>
        </template>

        <div v-for="post in allPosts" :key="post.id" class="flex items-center justify-center h-screen">
            <!-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> -->
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4" >
                    {{ post.title }}
                </div>
                <div>
                    {{ post.content }}
                </div>
            </div>
        </div>

    </AuthenticatedLayout>

    <!-- CARDS FOR Post -->

</template>
