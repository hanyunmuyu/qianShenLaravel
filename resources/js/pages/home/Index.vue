<template>
    <div>
        <router-view></router-view>
        <div id="footer">
            <mu-bottom-nav :value="tab">
                <mu-bottom-nav-item title="邂逅" value="favorite" icon="favorite"></mu-bottom-nav-item>
                <mu-bottom-nav-item title="高校" value="school" to="/" icon="school"></mu-bottom-nav-item>
                <mu-bottom-nav-item title="发现" value="explore" to="/explore" icon="explore"></mu-bottom-nav-item>
                <mu-bottom-nav-item title="我的" value="person" to="/user/center" icon="person"></mu-bottom-nav-item>
            </mu-bottom-nav>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Home",
        data() {
            return {
                tab: 'school'
            };
        }
    }
</script>

<style lang="scss">
    a {
        &:link, &:hover, &:active &:visited {
            text-decoration: none;
        }
    }
</style>
