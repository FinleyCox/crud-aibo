<style>
    body {background:white !important;}
</style>

<script>
    export default {
        methods:{
            back() {
                console.log("--BACK--")
                window.history.back();
            },
            store() {
                console.log("--POSTED--")
                this.$inertia.post('/posts-store',
                    {
                        title: this.title,
                        content: this.content,
                        filename: this.filename,
                    }
                );
            }
        },
        data() {
            return {
                title: '',
                content: '',
                filename: '',
            }
        }
    }
</script>


<template>
    <div class="heading text-center font-bold text-2xl m-5 text-gray-800">新規投稿</div>

    <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false"
                placeholder="タイトル"
                type="text"
                v-model="title"
        >
        <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none"
                    spellcheck="false"
                    placeholder="内容"
                    v-model="content"
        >
        </textarea>

        <div class="buttons flex">
            <div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto"
                @click="store"
            >
                内容を送信
            </div>
        </div>
    </div>

    <div>
        <div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto"
            @click="back"
        >
            もどる
        </div>
    </div>

</template>


