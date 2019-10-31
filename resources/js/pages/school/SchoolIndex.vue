<template>
    <div>
        <mu-appbar color="primary" style="position: fixed;width:100%">
            <mu-tabs :value.sync="tab" center>
                <mu-tab to="/">动态</mu-tab>
                <mu-tab to="/friend/list">校友</mu-tab>
                <mu-tab>社团</mu-tab>
                <mu-tab>问答</mu-tab>
                <mu-tab>校园</mu-tab>
            </mu-tabs>
        </mu-appbar>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "SchoolIndex",
        data() {
            return {
                tab: 0
            };
        },
        mounted() {
            switch (this.$route.path) {
                case '/friend/list':
                    this.$data.tab = 1;
                    break;
                case '/school/list':
                    this.$data.tab = 0;
                    break;
                default:
                    this.$data.tab = 0;
            }
        },
    }
</script>

<style scoped>
    a:hover {
        color: white;
        text-decoration: none;
    }
</style>
