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
                        <input type="text" name="id" placeholder="请输入id" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-block">
                        <input type="text" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">手机号</label>
                    <div class="layui-input-block">
                        <input type="text" name="mobile" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-block">
                        <input type="text" name="email" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <button class="layui-btn layuiadmin-btn-useradmin" lay-submit lay-filter="admin-search">
                        <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="layui-card-body">
            <div style="padding-bottom: 10px;">
                <button class="layui-btn layuiadmin-btn-useradmin" data-type="add">添加</button>
            </div>

            <table id="LAY-admin-manage" lay-filter="LAY-admin-manage"></table>
            <script type="text/html" id="imgTpl">
            </script>
            <script type="text/html" id="status">
                @{{#  if(d.status === 0){ }}
                <button class="layui-btn layui-btn-xs layui-btn-warm">禁用</button>
                @{{#  } else { }}
                <button class="layui-btn layui-btn-primary layui-btn-xs">正常</button>
                @{{#  } }}
            </script>
            <script type="text/html" id="table-useradmin-webuser">
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i
                            class="layui-icon layui-icon-edit"></i>编辑</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="delete"><i
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
    }).use(['index', 'table', 'form'], function () {
        var $ = layui.$
            , form = layui.form
            , table = layui.table;


        table.render({
            elem: '#LAY-admin-manage'
            , url: '{{admin_url('/admin/list')}}' //模拟接口
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
                , {field: 'id', width: 100, title: 'ID', sort: true}
                , {field: 'userName', title: '用户名', minWidth: 100}
                , {field: 'avatar', title: '头像', width: 100, templet: '#imgTpl'}
                , {field: 'mobile', title: '手机'}
                , {field: 'email', title: '邮箱'}
                , {field: 'status', width: 80, title: '状态', templet: '#status'}
                , {field: 'ip', title: 'IP'}
                , {field: 'createdAt', title: '最后登录时间'}
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
        form.on('submit(admin-search)', function (data) {
            var field = data.field;

            //执行重载
            table.reload('LAY-admin-manage', {
                where: field
            });
        });


        table.on('tool(LAY-admin-manage)', function (obj) {
            if (obj.event === 'edit') {
                layer.open({
                    type: 2
                    , title: '编辑管理员'
                    , content: '{{admin_url('/admin/edit')}}?id=' + obj.data.id
                    , area: ['420px', '420px']
                    , btn: ['确定', '取消']
                    , yes: function (index, layero) {
                        var iframeWindow = window['layui-layer-iframe' + index]
                            , submitID = 'LAY-user-edit-submit'
                            , submit = layero.find('iframe').contents().find('#' + submitID);

                        //监听提交
                        iframeWindow.layui.form.on('submit(' + submitID + ')', function (data) {
                            var field = data.field; //获取提交的字段
                            if (data.field.status === undefined) {
                                data.field.status = 0;
                            }
                            data.field.id = obj.data.id;
                            //提交 Ajax 成功后，静态更新表格中的数据
                            $.ajax({
                                url: '{{admin_url('/admin/update')}}',
                                method: 'post',
                                data: field,
                                success: function (res) {
                                    if (res.code === 0) {
                                        layer.msg(res.msg, {
                                            offset: '15px'
                                            , icon: 1
                                        });
                                        table.reload('LAY-admin-manage'); //数据刷新
                                        layer.close(index); //关闭弹层
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
                    , success: function (layero, index) {

                    }
                })

            } else if (obj.event === 'delete') {


                layer.prompt({
                    formType: 1
                    , title: '敏感操作，请验证口令'
                }, function (value, index) {
                    layer.close(index);
                    layer.confirm('确定删除吗？', function (index) {
                        $.ajax({
                            url: '{{admin_url('/admin/delete')}}',
                            data: {id: obj.data.id, password: value,_token:'{{csrf_token()}}'},
                            method: 'post',
                            success: function (res) {
                                if (res.code === 0) {
                                    layer.msg(res.msg, {
                                        offset: '15px'
                                        , icon: 1
                                    });
                                    table.reload('LAY-admin-manage'); //数据刷新
                                    layer.close(index); //关闭弹层
                                } else {
                                    layer.msg(res.msg, {
                                        offset: '15px'
                                        , icon: 2
                                    });

                                }
                            }
                        });
                    });
                });

            }

        });


        //事件
        var active = {
            batchdel: function () {
                var checkStatus = table.checkStatus('LAY-admin-manage')
                    , checkData = checkStatus.data; //得到选中的数据

                if (checkData.length === 0) {
                    return layer.msg('请选择数据');
                }

                layer.prompt({
                    formType: 1
                    , title: '敏感操作，请验证口令'
                }, function (value, index) {
                    layer.close(index);

                    layer.confirm('确定删除吗？', function (index) {

                        //执行 Ajax 后重载
                        /*
                        admin.req({
                          url: 'xxx'
                          //,……
                        });
                        */
                        table.reload('LAY-admin-manage');
                        layer.msg('已删除');
                    });
                });
            }
            , add: function () {
                layer.open({
                    type: 2
                    , title: '添加管理员'
                    , content: '{{admin_url('/admin/add')}}'
                    , maxmin: true
                    , area: ['500px', '450px']
                    , btn: ['确定', '取消']
                    , yes: function (index, layero) {
                        var iframeWindow = window['layui-layer-iframe' + index]
                            , submitID = 'admin-add-submit'
                            , submit = layero.find('iframe').contents().find('#' + submitID);

                        //监听提交
                        iframeWindow.layui.form.on('submit(' + submitID + ')', function (data) {
                            var field = data.field; //获取提交的字段

                            //提交 Ajax 成功后，静态更新表格中的数据
                            $.ajax({
                                url: '{{admin_url('/admin/add')}}',
                                method: 'post',
                                data: field,
                                success: function (res) {
                                    if (res.code === 0) {
                                        layer.msg(res.msg, {
                                            offset: '15px'
                                            , icon: 1
                                        });
                                        table.reload('LAY-admin-manage'); //数据刷新
                                        layer.close(index); //关闭弹层
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
            , edit: function () {
                layer.open({
                    type: 2
                    , title: '编辑管理员'
                    , content: 'userform.html'
                    , maxmin: true
                    , area: ['500px', '450px']
                    , btn: ['确定', '取消']
                    , yes: function (index, layero) {
                        var iframeWindow = window['layui-layer-iframe' + index]
                            , submitID = 'LAY-user-front-submit'
                            , submit = layero.find('iframe').contents().find('#' + submitID);

                        //监听提交
                        iframeWindow.layui.form.on('submit(' + submitID + ')', function (data) {
                            var field = data.field; //获取提交的字段

                            //提交 Ajax 成功后，静态更新表格中的数据
                            //$.ajax({});
                            table.reload('LAY-user-front-submit'); //数据刷新
                            layer.close(index); //关闭弹层
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
