<template>
    <mu-paper>
        <mu-list>
            <mu-sub-header>Today</mu-sub-header>
            <mu-list-item v-for="user in 2" avatar button ripple :key="user">
                <mu-list-item-action>
                    <mu-avatar>
                        <img src="../../assets/images/avatar.gif">
                    </mu-avatar>
                </mu-list-item-action>
                <mu-list-item-title>Maco Mai</mu-list-item-title>
                <mu-list-item-action>
                    <mu-icon value="chat_bubble"></mu-icon>
                </mu-list-item-action>
            </mu-list-item>
        </mu-list>

        <mu-list textline="three-line">
            <mu-sub-header>今天</mu-sub-header>
            <mu-list-item avatar button v-for="user in 10" :key="user">
                <mu-list-item-action>
                    <mu-avatar>
                        <img src="../../assets/images/avatar.gif">
                    </mu-avatar>
                </mu-list-item-action>
                <mu-list-item-content>
                    <mu-list-item-title>这个周末一起吃饭么?</mu-list-item-title>
                    <mu-list-item-sub-title>
                        <span style="color: rgba(0, 0, 0, .87)">Myron Liu -</span> 周末要来你这里出差，要不要一起吃个饭呀，实在编不下去了,哈哈哈哈哈哈
                    </mu-list-item-sub-title>
                </mu-list-item-content>
            </mu-list-item>
            <mu-divider></mu-divider>
        </mu-list>


    </mu-paper>
</template>

<script>
    export default {
        name: "FriendList"
    }
</script>

<style lang="scss">

</style>
