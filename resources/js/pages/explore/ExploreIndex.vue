<template>
    <div>
        <mu-appbar color="primary">
            <mu-tabs :value.sync="tab" center>
                <mu-tab>关注</mu-tab>
                <mu-tab>推荐</mu-tab>
                <mu-tab>附近</mu-tab>
                <mu-tab>活动</mu-tab>
            </mu-tabs>
        </mu-appbar>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "ExploreIndex",
        data() {
            return {
                tab: 1
            };
        }
    }
</script>

<style scoped>

</style>
