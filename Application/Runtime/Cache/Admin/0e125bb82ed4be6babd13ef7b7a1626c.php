<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 编辑商品 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
<link href="/Public/Plugins/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script src="/Public/Admin/js/jquery-3.2.1.min.js"></script>
<script src="/Public/Plugins/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Plugins/umeditor/third-party/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Plugins/umeditor/third-party/template.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Plugins/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Plugins/umeditor/umeditor.min.js"></script>
<script type="text/javascript" src="/Public/Plugins/umeditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="/Admin/Goods/goodsList.html">商品列表</a>
    </span>
    <span class="action-span1"><a href="/Admin">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - 编辑商品 </span>
    <div style="clear:both"></div>
</h1>

<div class="tab-div">
    <div id="tabbar-div">
        <p>
            <span class="tab-front" id="general-tab">通用信息</span>
        </p>
    </div>
    <div id="tabbody-div">
        <form enctype="multipart/form-data" method="post" id="goodsEdit">
            <table width="90%" id="general-table" align="center">
                <tr>
                    <td class="label">商品名称：</td>
                    <td><input type="text" name="goods_name" value="<?php echo ($goods_detail["goods_name"]); ?>" size="30" id="goods_name"/>
                    <span class="require-field">*</span></td>
                </tr>
                <tr>
                    <td class="label">商品货号： </td>
                    <td>
                        <input type="text" name="goods_sn" value="<?php echo ($goods_detail["goods_sn"]); ?>" size="20" id="goods_sn"/>
                        <span id="goods_sn_notice"></span><br />
                        <span class="notice-span"id="noticeGoodsSN">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品分类：</td>
                    <td>
                        <select name="cat_id" id="cat_id">
                            <option value="0">请选择........</option>
                            <?php if(is_array($cat_list)): foreach($cat_list as $key=>$val): ?><option value="<?php echo ($val["id"]); ?>"><?php echo (str_repeat('&nbsp;&nbsp;',$val["level"])); ?>-<?php echo ($val["cat_name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品品牌：</td>
                    <td>
                        <select name="brand_id" id="brand_id">
                            <option value="0">请选择...</option>
                            <?php if(is_array($brand_list)): foreach($brand_list as $key=>$val): ?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["brand_name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">本店售价：</td>
                    <td>
                        <input type="text" name="shop_price" value="<?php echo ($goods_detail["shop_price"]); ?>" size="20" id="shop_price"/>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品数量：</td>
                    <td>
                        <input type="text" name="goods_number" size="8" value="<?php echo ($goods_detail["goods_number"]); ?>" id="goods_number"/>
                    </td>
                </tr>
                <tr>
                    <td class="label">是否上架：</td>
                    <td>
                        <input type="radio" name="is_on_sale" value="是" id='is_on_sale_1'/> 是
                        <input type="radio" name="is_on_sale" value="否" id='is_on_sale_0'/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">加入推荐：</td>
                    <td>
                        <input type="checkbox" name="is_best" value="1" id="is_best"/> 精品 
                        <input type="checkbox" name="is_new" value="1" id="is_new"/> 新品 
                        <input type="checkbox" name="is_hot" value="1" id="is_hot"/> 热销
                    </td>
                </tr>
                <tr>
                    <td class="label">推荐排序：</td>
                    <td>
                        <input type="text" name="sort_num" size="5" value="<?php echo ($goods_detail["sort_num"]); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td class="label">市场售价：</td>
                    <td>
                        <input type="text" name="market_price" value="<?php echo ($goods_detail["market_price"]); ?>" size="20" />
                    </td>
                </tr>
                <tr>
                    <td class="label">商品LOGO：</td>
                    <td>
                        <span>当前logo</span>
                        <img src="/<?php echo ($goods_detail["sm_logo"]); ?>"/><br/>
                        <input type="file" name="logo" size="35" id="logo"/>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品简单描述：</td>
                    <td>
                        <textarea id="goods_desc" name="goods_desc" cols="40" rows="3"><?php echo ($goods_detail["goods_desc"]); ?></textarea>
                    </td>
                </tr>
            </table>
            <div class="button-div">
                <input type="hidden" name="id" value="<?php echo ($goods_detail["id"]); ?>"/>
                <input type="submit" value=" 确 定 " class="button"/>
                <input type="reset" value=" 重 置 " class="button" />
            </div>
        </form>
    </div>
</div>
<div id="footer">版权所有 &copy; 2017-2017 ThinkPHP ZY 学习。</div>
</body>
<script>
    var xhr;
    function loadXMLDoc(data,url,cfunc){
        if(window.XMLHttpRequest){
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xhr=new XMLHttpRequest();
        }else{
            // code for IE6, IE5
            xhr=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhr.onreadystatechange=cfunc;
        xhr.open("post",url,true);
        xhr.send(data);
    }
    var form = document.getElementById('goodsEdit');
    form.onsubmit = function(evt){
        //收集表单域信息
        var data = new FormData(this);
        loadXMLDoc(data,"/Admin/Goods/goodsEdit",function(){
            if(xhr.readyState!=4){
                //layer加载层
                layer.load(2);
                // layer.msg('请稍等！正在努力加载中！', {icon: 4});
            }
            if(xhr.readyState==4 && xhr.status==200){
                layer.closeAll('loading');
                var object=JSON.parse(xhr.responseText,function(key,value){
                    if (value=='success') {
                        layer.alert('商品信息更新成功！',function(){
                            window.location.href = "/Admin/Goods/goodsList/from/goodsEdit";
                            icon: 6;
                        });
                    }else if(key!=''){
                        layer.tips(value, '#'+key, {tipsMore: true});
                    }
                });
            }
        });
        evt.preventDefault();
    }
    UM.getEditor('goods_desc',{
        initialFrameWidth:'100%', //初始化编辑器宽度
        initialFrameHeight:150  //初始化编辑器高度
    });
    //渲染默认被选择的单选框和复选框
    window.onload=function(){
        if("<?php echo ($goods_detail["is_on_sale"]); ?>"=='是'){
            $('#is_on_sale_1').attr('checked','true');
        }else if("<?php echo ($goods_detail["is_on_sale"]); ?>"=='否'){
            $('#is_on_sale_0').attr('checked','true');
        }
        if("<?php echo ($goods_detail["is_best"]); ?>"=='是'){
            $('#is_best').attr('checked','true');
        }
        if("<?php echo ($goods_detail["is_new"]); ?>"=='是'){
            $('#is_new').attr('checked','true');
        }
        if("<?php echo ($goods_detail["is_hot"]); ?>"=='是'){
            $('#is_hot').attr('checked','true');
        }
        $('#brand_id').val("<?php echo ($goods_detail["brand_id"]); ?>");
        $('#cat_id').val("<?php echo ($goods_detail["cat_id"]); ?>");
    }
</script>
</html>