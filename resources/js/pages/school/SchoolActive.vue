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
            <mu-col span="12">
                <mu-sub-header>1111111111111</mu-sub-header>
            </mu-col>
            <mu-col span="12">
                <div v-if="imgList.length===1" class="nine-container">
                    <div class="nine-img col-a"
                         style="height: auto;max-height: 400px"
                         v-for="imgSrc,index in imgList" :key="index">
                        <img :src="imgSrc">
                    </div>
                </div>
                <div v-else-if="imgList.length===2" class="nine-container">
                    <div class="nine-img col-b"
                         v-for="imgSrc,index in imgList" :key="index">
                        <img :src="imgSrc">
                    </div>
                </div>
                <div v-else="imgList.length" class="nine-container">
                    <div class="nine-img col-c"
                         v-for="imgSrc,index in imgList" :key="index">
                        <img :src="imgSrc">
                    </div>
                </div>
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
                ],
                imgList: [
                    '/images/gg.jpg',
                    '/images/flutter.jpg',
                    '/images/flutter.jpg',
                    // '/images/mm.jpg',
                    // '/images/mm.jpg',
                    // '/images/dream.png',
                    // '/images/flutter.jpg',
                    // '/images/flutter.jpg',
                    // '/images/dream.png',
                ],
                'colC': 'colC'
            }
        },
        computed: {
            img() {
                let a = 'd';
                let len = this.$data.imgList.length;
                switch (len) {
                    case 1:
                        a = 'a';
                        break;
                    case 2:
                        a = 'b';
                        break;
                    case len > 3:
                        a = 'c';
                        break;
                    default:
                        a = 'c';
                }
                return a;
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


    .nine-container {
        width: 100%;
        margin: 0 auto;
        text-align: center;

        .nine-img {
            float: left;
            overflow: hidden;
            height: 80px;
            padding: 2px;
            display: table-cell;
            text-align: center;
            vertical-align: center;
            margin: 0 auto;
            img {
                width: 100%;
                height: auto;
            }
        }
    }
    .col-a {
        width: 100%;
    }

    .col-b {
        width: 50%;
    }

    .col-c {
        width: 33%;
    }
</style>
