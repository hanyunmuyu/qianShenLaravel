<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$api.login().then((res) => {
                console.log(res)
            });
            console.log('Component mounted.')
        }
    }
</script>
<style>
    #footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>
