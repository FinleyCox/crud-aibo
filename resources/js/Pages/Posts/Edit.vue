<template>
    <div>
        <div class="heading text-center font-bold text-2xl m-5 text-gray-800">投稿をへんしゅうする</div>
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <input
            class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none"
            spellcheck="false"
            placeholder="Title"
            type="text"
            v-model="post.title"
        >
        <textarea
            class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none"
            spellcheck="false"
            placeholder="Content"
            v-model="post.content"
        ></textarea>

        <div class="buttons flex">
            <div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto" @click="update">
            へんこうをほぞんする
            </div>
        </div>
        </div>

        <div>
        <div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto" @click="back">
            もどる
        </div>
        </div>
    </div>
    </template>

<script setup>
    import { router } from '@inertiajs/vue3';
    import axios from 'axios';
    import { defineProps } from 'vue';

    const { post } = defineProps(['post']);

    const update = async () => {
        try {
            const response = await axios.post(`/post-edit/${post.id}`, post);
            console.log("SUCCESS");

            if (response) {
                window.history.back();
                window.location.href = '/posts';
            }
        }
        catch(error) {
            console.error("ERROR", error);
        }
    }

    const back = () => {
        window.history.back();
    }


</script>
