<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>芊莘-用户</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
</head>
<body>

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">ID</label>
                    <div class="layui-input-block">
                        <input type="text" name="id" placeholder="请输入" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">角色名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="role_name" placeholder="请输入角色名称" autocomplete="off"
                               class="layui-input">
                    </div>
                </div>

                <div class="layui-inline">
                    <button class="layui-btn layuiadmin-btn-useradmin" lay-submit lay-filter="role-search">
                        <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="layui-card-body">
            <div style="padding-bottom: 10px;">
                <button class="layui-btn layuiadmin-btn-useradmin" data-type="add">添加</button>
            </div>

            <table id="LAY-role-manage" lay-filter="LAY-role-manage"></table>
            <script type="text/html" id="imgTpl">
            </script>
            <script type="text/html" id="table-useradmin-webuser">
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i
                            class="layui-icon layui-icon-edit"></i>编辑</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i
                            class="layui-icon layui-icon-delete"></i>删除</a>
            </script>
        </div>
    </div>
</div>

<script src="/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: '/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'table'], function () {
        var $ = layui.$
            , form = layui.form
            , table = layui.table;


        table.render({
            elem: '#LAY-role-manage'
            , url: '{{admin_url('/role/list')}}' //模拟接口
            , parseData: function (res) { //res 即为原始返回的数据
                return {
                    "code": res.code, //解析接口状态
                    "msg": res.msg, //解析提示文本
                    "count": res.data.total, //解
                    "curr": res.data.currentPage, //解
                    "data": res.data.data //解析数据列表
                };
            }
            //
            , cols: [[
                {type: 'checkbox', fixed: 'left'}
                , {field: 'id', width: 100, title: 'ID'}
                , {field: 'roleName', title: '角色'}
                , {title: '操作', width: 150, align: 'center', fixed: 'right', toolbar: '#table-useradmin-webuser'}
            ]]
            , page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
                layout: ['first', 'last', 'refresh', 'prev', 'page', 'next', 'skip'] //自定义分页布局
                , curr: 1 //设定初始在第 5 页
                , groups: 1 //只显示 1 个连续页码
            }
            , limit: 15
            , height: 'full-220'
            , text: '对不起，加载出现异常！'
        });


        //监听搜索
        form.on('submit(role-search)', function (data) {
            var field = data.field;

            //执行重载
            table.reload('LAY-role-manage', {
                where: field
            });
        });

        //事件
        var active = {
            add: function () {
                layer.open({
                    type: 2
                    , title: '添加角色'
                    , content: '{{admin_url('/role/add')}}'
                    , maxmin: true
                    , area: ['500px', '450px']
                    , btn: ['确定', '取消']
                    , yes: function (index, layero) {
                        var iframeWindow = window['layui-layer-iframe' + index]
                            , submitID = 'LAY-admin-role-submit'
                            , submit = layero.find('iframe').contents().find('#' + submitID);

                        //监听提交
                        iframeWindow.layui.form.on('submit(' + submitID + ')', function (data) {
                            var field = data.field; //获取提交的字段
                            field._token = '{{csrf_token()}}';
                            //提交 Ajax 成功后，静态更新表格中的数据
                            $.ajax({
                                url: '{{admin_url('/role/add')}}',
                                data: field,
                                method: 'post',
                                success: function (res) {
                                    if (res.code === 0) {
                                        table.reload('LAY-role-manage'); //数据刷新
                                        layer.close(index); //关闭弹层
                                        layer.msg(res.msg, {
                                            offset: '15px'
                                            , icon: 1
                                        });
                                    } else {
                                        layer.msg(res.msg, {
                                            offset: '15px'
                                            , icon: 2
                                        });
                                    }
                                }
                            });
                        });

                        submit.trigger('click');
                    }
                });
            }
        };

        $('.layui-btn.layuiadmin-btn-useradmin').on('click', function () {
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
</script>
</body>
</html>
