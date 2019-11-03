<template>
    <mu-paper>
        <mu-list textline="three-line">
            <div v-for="user in 10" :key="user">
                <mu-list-item avatar button>
                    <mu-list-item-action>
                        <mu-avatar>
                            <img src="../../assets/images/avatar.gif">
                        </mu-avatar>
                    </mu-list-item-action>
                    <mu-list-item-content>
                        <mu-list-item-title>hanyun</mu-list-item-title>
                        <mu-list-item-sub-title>
                            <div>男-30-XX大学</div>
                            <div>
                                <mu-chip style="margin-right: 6px" v-for="chip in favoriteList">{{chip}}</mu-chip>
                            </div>
                        </mu-list-item-sub-title>
                    </mu-list-item-content>
                </mu-list-item>
                <mu-divider></mu-divider>
            </div>
        </mu-list>
    </mu-paper>
</template>

<script>
    export default {
        name: "FriendList",
        data() {
            return {
                favoriteList: [
                    '足球',
                    '足球',
                    '足球',
                ]
            };
        }
    }
</script>

<style lang="scss">

</style>
