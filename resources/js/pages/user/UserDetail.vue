<template>
    <div>
        <mu-appbar title="用户详情" center color="primary" style="text-align: center">
            <mu-button icon slot="left" @click="back">
                <mu-icon value="arrow_back"></mu-icon>
            </mu-button>
        </mu-appbar>
    </div>
</template>

<script>
    export default {
        name: "UserDetail",
        methods: {
            back() {
                this.$router.back();
            }
        }
    }
</script>

<style scoped>

</style>
