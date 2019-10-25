<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>表单元素</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
</head>
<body>

<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-card">
            <div class="layui-card-header">企业基本名称</div>
            <div class="layui-card-body">
                <form class="layui-form" action="" lay-filter="component-form-element">

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width: 130px">企业中文名称</label>
                        <div class="layui-input-block" style="margin-left: 160px">
                            <div class="layui-row layui-inline" style="width: 100%">
                                <div class="layui-col-md8 layui-inline">
                                    <input type="text" name="fullname" lay-verify="required" placeholder="请填企业中文名称"
                                           autocomplete="off" class="layui-input" style="width: 100%">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width: 130px">企业英文名称</label>
                        <div class="layui-input-block" style="margin-left: 160px">
                            <div class="layui-row layui-inline" style="width: 100%">
                                <div class="layui-col-md8 layui-inline">
                                    <input type="text" name="fullname" lay-verify="required" placeholder="请填企业英文名称"
                                           autocomplete="off" class="layui-input" style="width: 100%">

                                </div>
                                <div class="layui-inline  ">
                                    <div class="layui-form-mid layui-word-aux">如何填写</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width: 130px">统一社会信用代码</label>
                        <div class="layui-input-block" style="margin-left: 160px">
                            <div class="layui-row layui-inline" style="width: 100%">
                                <div class="layui-col-md8 layui-inline">
                                    <input type="text" name="fullname" lay-verify="required" placeholder="请填企业英文名称"
                                           autocomplete="off" class="layui-input" style="width: 100%">

                                </div>
                                <div class="layui-inline  ">
                                    <div class="layui-form-mid layui-word-aux">如何填写</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width: 130px">企业注册地址</label>
                        <div class="layui-input-block" style="margin-left: 160px">
                            <div class="layui-row layui-inline" style="width: 100%">
                                <div class="layui-col-md8">
                                    <div class="layui-row  layui-col-space5">

                                        <div class="layui-col-md6">
                                            <select name="quiz1">
                                                <option value="">请选择省</option>
                                                <option value="浙江" selected="">浙江省</option>
                                                <option value="你的工号">江西省</option>
                                                <option value="你最喜欢的老师">福建省</option>
                                            </select>

                                        </div>
                                        <div class="layui-col-md6">

                                            <select name="quiz2">
                                                <option value="">请选择市</option>
                                                <option value="杭州">杭州</option>
                                                <option value="宁波" disabled="">宁波</option>
                                                <option value="温州">温州</option>
                                                <option value="温州">台州</option>
                                                <option value="温州">绍兴</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="layui-row">
                                        <input type="text" name="fullname" lay-verify="required" placeholder="请填写详细街道地址"
                                               autocomplete="off" class="layui-input" style="width: 100%">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width: 130px">实际经营地址</label>
                        <div class="layui-input-block" style="margin-left: 160px">
                            <div class="layui-row layui-inline" style="width: 100%">
                                <div class="layui-col-md8">
                                    <div class="layui-row  layui-col-space5">

                                        <div class="layui-col-md6">
                                            <select name="quiz1">
                                                <option value="">请选择省</option>
                                                <option value="浙江" selected="">浙江省</option>
                                                <option value="你的工号">江西省</option>
                                                <option value="你最喜欢的老师">福建省</option>
                                            </select>

                                        </div>
                                        <div class="layui-col-md6">

                                            <select name="quiz2">
                                                <option value="">请选择市</option>
                                                <option value="杭州">杭州</option>
                                                <option value="宁波" disabled="">宁波</option>
                                                <option value="温州">温州</option>
                                                <option value="温州">台州</option>
                                                <option value="温州">绍兴</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="layui-row">
                                        <input type="text" name="fullname" lay-verify="required" placeholder="请填写详细街道地址"
                                               autocomplete="off" class="layui-input" style="width: 100%">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width: 130px">企业人数</label>
                        <div class="layui-input-block" style="margin-left: 160px">
                            <div class="layui-row layui-inline" style="width: 100%">
                                <div class="layui-col-md8 layui-inline">
                                    <select name="quiz1">
                                        <option value="">请选企业人数</option>
                                        <option value="浙江">浙江省</option>
                                        <option value="你的工号">江西省</option>
                                        <option value="你最喜欢的老师">福建省</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width: 130px">企业成立日期</label>
                        <div class="layui-input-block" style="margin-left: 160px">
                            <div class="layui-row layui-inline" style="width: 100%">
                                <div class="layui-col-md2 layui-inline">
                                    <input type="text" class="layui-input" id="test-laydate-normal-cn"
                                           placeholder="请选择企业成立日期">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width: 130px">企业到期日期</label>
                        <div class="layui-input-block" style="margin-left: 160px">
                            <div class="layui-row layui-inline" style="width: 100%">
                                <div class="layui-col-md2 layui-inline">
                                    <input type="text" class="layui-input" id="endDate"
                                           placeholder="请选择企业到期日期">
                                </div>
                                <div class="layui-col-md2 layui-inline">
                                    <input type="checkbox" name="like1[write]" lay-skin="primary" title="长期有效">

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width: 130px">出口类型</label>
                        <div class="layui-input-block" style="margin-left: 160px">
                            <div class="layui-row layui-inline" style="width: 100%">
                                <div class="layui-col-md8 layui-inline">
                                    <select name="quiz1" multiple>
                                        <option value="">请选企业人数</option>
                                        <option value="浙江">浙江省</option>
                                        <option value="你的工号">江西省</option>
                                        <option value="你最喜欢的老师">福建省</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label" style="width: 130px">出口商品名称</label>
                        <div class="layui-input-block" style="margin-left: 160px">
                            <div class="layui-row layui-inline" style="width: 100%">
                                <textarea name="text" placeholder="出口商品名称" class="layui-textarea"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


<script src="/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: '/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'form', 'laydate'], function () {
        var $ = layui.$
            , admin = layui.admin
            ,layer = layui.layer
            , element = layui.element
            , form = layui.form;
        var laydate = layui.laydate;

        form.render(null, 'component-form-element');
        element.render('breadcrumb', 'breadcrumb');

        form.on('submit(component-form-element)', function (data) {
            layer.msg(JSON.stringify(data.field));
            return false;
        });


        laydate.render({
            elem: '#test-laydate-normal-cn'
        });
        laydate.render({
            elem: '#endDate'
        });


        layer.open({
            title:'页面层'
            ,type: 1
            //,skin: 'layui-layer-rim'
            ,shadeClose: true
            ,area: admin.screen() < 2 ? ['80%', '300px'] : ['700px', '500px']
            ,content: '<div style="padding: 20px;">放入任意HTML</div>'
        });

    });
</script>
</body>
</html>
