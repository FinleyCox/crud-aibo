<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useRemember } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps ({
    posts: Array,
})
</script>

<template>
    <Head title="Konichiwa" />

    <AuthenticatedLayout>
        <template #header>
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">投稿ページ</h2>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <NavLink :href="route('posts.create')" :active="route().current('posts.create')">
                投稿する
            </NavLink>
            </div>
        </div>
        </template>
        <!-- <div>
            <ul>
                <li v-for="post in $page.props.posts" :key="post.id">{{ post.title }}</li>
            </ul>
        </div> -->

        <div v-for="post in posts" :key="post.id" class="flex items-center justify-center h-screen">
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
