<template>
    <div>
        <mu-appbar color="primary">
            <mu-tabs :value.sync="tab" center>
                <mu-tab>动态</mu-tab>
                <mu-tab>校友</mu-tab>
                <mu-tab>社团</mu-tab>
                <mu-tab>问答</mu-tab>
                <mu-tab>校园</mu-tab>
            </mu-tabs>
        </mu-appbar>
    </div>
</template>

<script>
    export default {
        name: "SchoolIndex",
        data() {
            return {
                tab: 0
            };
        }
    }
</script>

<style scoped>

</style>
