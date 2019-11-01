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
        <div style="height: 66px"></div>
        <router-view></router-view>
        <div style="margin-bottom: 56px"></div>

        <mavon-editor ref=md
                      @imgAdd="imgAdd"
                      @imgDel="imgDel"
                      v-model="context"
                      :toolbars="toolbars"
                      codeStyle="solarized-dark"/>

    </div>
</template>

<script>
    export default {
        name: "SchoolPost",
        data() {
            return {
                tab: 0,
                context: '```php5\n' +
                    '\n' +
                    '<?php\n' +
                    '\n' +
                    'namespace App\\Http\\Controllers\\Api\\v1;\n' +
                    '\n' +
                    'use App\\Http\\Controllers\\Controller;\n' +
                    'use Illuminate\\Http\\Request;\n' +
                    '\n' +
                    'class IndexController extends Controller\n' +
                    '{\n' +
                    '    //\n' +
                    '    public function index()\n' +
                    '    {\n' +
                    '        return $this->success();\n' +
                    '    }\n' +
                    '}\n' +
                    '\n' +
                    '\n' +
                    '```',//输入的数据
                toolbars: {
                    bold: true, // 粗体
                    italic: true, // 斜体
                    header: true, // 标题
                    underline: true, // 下划线
                    strikethrough: true, // 中划线
                    mark: true, // 标记
                    superscript: true, // 上角标
                    subscript: true, // 下角标
                    quote: true, // 引用
                    ol: true, // 有序列表
                    ul: true, // 无序列表
                    imagelink: true, // 图片链接
                    code: true, // code
                    table: true, // 表格
                    fullscreen: true, // 全屏编辑
                    readmodel: true, // 沉浸式阅读
                    help: true, // 帮助
                    htmlcode: true, // 展示html源码
                    /* 1.3.5 */
                    undo: true, // 上一步
                    redo: true, // 下一步
                    trash: true, // 清空
                    save: true, // 保存（触发events中的save事件）
                    /* 1.4.2 */
                    navigation: true, // 导航目录
                    /* 2.1.8 */
                    alignleft: true, // 左对齐
                    aligncenter: true, // 居中
                    alignright: true, // 右对齐
                    /* 2.2.1 */
                    subfield: true, // 单双栏模式
                    preview: true, // 预览
                },
            };
        },
        methods: {
            // 绑定@imgAdd event
            imgAdd(pos, $file) {
                // 第一步.将图片上传到服务器.
                var formdata = new FormData();
                formdata.append('file', $file);
                this.$api.upload(formdata, {'Content-Type': 'multipart/form-data'})
                    .then((res) => {
                        // 第二步.将返回的url替换到文本原位置![...](0) -> ![...](url)
                        /**
                         * $vm 指为mavonEditor实例，可以通过如下两种方式获取
                         * 1. 通过引入对象获取: `import {mavonEditor} from ...` 等方式引入后，`$vm`为`mavonEditor`
                         * 2. 通过$refs获取: html声明ref : `<mavon-editor ref=md ></mavon-editor>，`$vm`为 `this.$refs.md`
                         */
                        this.$refs.md.$img2Url(pos, res.data.imgUrl);
                    })
            },
            imgDel(file) {
                console.log(file)
            }
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
