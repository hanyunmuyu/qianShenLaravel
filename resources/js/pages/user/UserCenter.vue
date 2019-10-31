<template>
    <div>
        <mu-appbar title="我的" center color="primary" style="text-align: center"></mu-appbar>
        <mu-container style="margin-top: 10px">
            <mu-flex v-if="$store.state.user!==null" align-items="center">
                <mu-flex justify-content="center">
                    <mu-avatar v-if="$store.state.user!==null" size="60">
                        <img :src="$store.state.user.data.user.avatar">
                    </mu-avatar>
                </mu-flex>
                <mu-flex class="user" justify-content="center">{{$store.state.user.data.user.userName}}</mu-flex>
            </mu-flex>
            <mu-flex v-else class="flex-wrapper" align-items="center">
                <mu-flex justify-content="center">
                    <mu-avatar size="60">
                        <img src="../../assets/images/avatar.gif">
                    </mu-avatar>
                </mu-flex>
                <mu-flex class="user" justify-content="center">
                    <mu-button small flat to="/login">登录</mu-button>
                </mu-flex>
            </mu-flex>
        </mu-container>
    </div>
</template>

<script>
    export default {
        name: "UserCenter",
        mounted() {
        }
    }
</script>

<style scoped>
    .user {
        margin-left: 10px;
    }
</style>
