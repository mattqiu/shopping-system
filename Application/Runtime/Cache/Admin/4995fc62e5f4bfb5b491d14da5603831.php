<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: category_info.htm 16752 2009-10-20 09:59:38Z wangleisvn $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 添加分类 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
<script src="/Public/Admin/js/jquery-3.2.1.min.js"></script>
<script src="/Public/Plugins/layer/layer.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="/Admin/Category/categoryList">商品分类</a></span>
    <span class="action-span1"><a href="/Admin">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - 添加分类 </span>
    <div style="clear:both"></div>
</h1>
<div class="main-div">
    <form action="" name="theForm" enctype="multipart/form-data" id="categoryEdit">
        <table width="100%" id="general-table">
            <tr>
                <td class="label">分类名称:</td>
                <td>
                    <input type='text' name='cat_name' maxlength="20" value='<?php echo ($category_detail["cat_name"]); ?>' size='27' id="cat_name"/> <font color="red">*</font>
                </td>
            </tr>
            <tr>
                <td class="label">上级分类:</td>
                <td>
                    <select name="parent_id" id="parent_id">
                        <option value="0">顶级分类</option>
                        <?php if(is_array($cat_list)): foreach($cat_list as $key=>$val): ?><option value="<?php echo ($val["id"]); ?>"><?php echo (str_repeat('&nbsp;&nbsp;',$val["level"])); ?>-<?php echo ($val["cat_name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label">排序:</td>
                <td>
                    <input type="text" name='sort_num'  value="<?php echo ($category_detail["sort_num"]); ?>" size="15" id="sort_num"/>
                </td>
            </tr>
            <tr>
                <td class="label">是否显示:</td>
                <td>
                    <input type="radio" name="is_show" value="是" id="is_show_1"/> 是 
                    <input type="radio" name="is_show" value="否" id="is_show_0"/> 否
                </td>
            </tr>
            <tr>
                <td class="label">导航显示:</td>
                <td>
                    <input type="radio" name="is_floor" value="是" id="is_floor_1"/> 是 
                    <input type="radio" name="is_floor" value="否" id="is_floor_0"/> 否
                </td>
            </tr>
            <tr>
                <td class="label">关键字:</td>
                <td>
                    <input type="text" name="keywords" value='<?php echo ($category_detail["keywords"]); ?>' size="50" id="keywords"/>
                </td>
            </tr>
        </table>
        <div class="button-div">
            <input type="hidden" name="id" value="<?php echo ($category_detail["id"]); ?>"/>
            <input type="submit" value=" 确定 " onmouseover="this.style.cursor='pointer'"/>
            <input style="width:45px;" type="bubtton" value=" 返 回 " class="button" onclick="location='/Admin/Category/categoryList/from/categoryEdit'" onmouseover="this.style.cursor='pointer'"/>
        </div>
    </form>
</div>
<div id="footer">
版权所有 &copy; 2017-2017 ThinkPHP ZY 学习。</div>
</body>
<script>
$('#categoryEdit').submit(function(evt){
    //收集表单域信息
    var data = new FormData(this);
    loadXMLDoc(data,"/Admin/Category/categoryEdit",function(){
        if(xhr.readyState!=4){
            //layer加载层
            layer.load(2);
            // layer.msg('请稍等！正在努力加载中！', {icon: 4});
        }
        if(xhr.readyState==4 && xhr.status==200){
            layer.closeAll('loading');
            var object=JSON.parse(xhr.responseText,function(key,value){
                if (value=='success') {
                    layer.alert('分类信息更新成功！',function(){
                        window.location.href = "/Admin/Category/categoryList/from/categoryEdit";
                        icon: 6;
                    });
                }else{
                    layer.alert(value, {icon: 5});
                }
            });
        }
    });
    evt.preventDefault();
});
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
//渲染默认被选择的单选框和复选框
window.onload=function(){
    if("<?php echo ($category_detail["is_show"]); ?>"=='是'){
        $('#is_show_1').attr('checked','true');
    }else if("<?php echo ($category_detail["is_show"]); ?>"=='否'){
        $('#is_show_0').attr('checked','true');
    }
    if("<?php echo ($category_detail["is_floor"]); ?>"=='是'){
        $('#is_floor_1').attr('checked','true');
    }else if("<?php echo ($category_detail["is_floor"]); ?>"=='否'){
        $('#is_floor_0').attr('checked','true');
    }
    $('#parent_id').val(<?php echo ($category_detail["parent_id"]); ?>);
}
</script>
</html>