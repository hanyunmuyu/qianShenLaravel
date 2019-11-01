<template>
    <mu-paper>

        <mu-row v-for="data,index in dataList" gutter style="margin: 6px" :key="index">
            <mu-col span="12">
                <mu-flex align-items="center">
                    <mu-flex justify-content="center">
                        <router-link to="/user/detail">
                            <mu-avatar>
                                <img src="../../assets/images/avatar.gif">
                            </mu-avatar>
                        </router-link>
                    </mu-flex>
                    <mu-flex justify-content="center" style="margin-left: 16px">
                        <mu-row>
                            <mu-col span="12">寒云</mu-col>
                            <mu-col span="12">12分钟前</mu-col>
                        </mu-row>
                    </mu-flex>
                </mu-flex>

            </mu-col>
            <mu-col>
                ssssssssssss
            </mu-col>
            <mu-col span="12" style="margin-top: 8px">
                <mu-row align-content="stretch" style="text-align: center">
                    <mu-col span="6">
                        <mu-icon @click="thumb(index)" :color="data.thumbUp?'primary':'grey500'"
                                 :class="{'bounceIn':data.thumbUp}"
                                 value="thumb_up"></mu-icon>
                    </mu-col>
                    <mu-col span="6">
                        <mu-icon @click="doFavorite(index)" :color="data.favorite?'primary':'grey500'"
                                 :class="{'bounceIn':data.favorite}"
                                 :value="data.favorite?'favorite':'favorite_border'"></mu-icon>
                    </mu-col>
                </mu-row>
            </mu-col>
            <mu-col span="12" style="margin-top: 8px">
                <mu-divider></mu-divider>
            </mu-col>
        </mu-row>

    </mu-paper>
</template>

<script>
    export default {
        name: "SchoolActive",
        data() {
            return {
                dataList: [
                    {
                        thumbUp: false,
                        favorite: false,
                    },
                    {
                        thumbUp: false,
                        favorite: false,
                    },
                ]
            }
        },
        methods: {
            thumb(index) {
                this.dataList[index].thumbUp = !this.dataList[index].thumbUp;
            },
            doFavorite(index) {
                this.dataList[index].favorite = !this.dataList[index].favorite;
            }
        }
    }
</script>

<style lang="scss">

</style>
