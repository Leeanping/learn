{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/jscolor/jscolor.js"></script>
<div class="floattop">
    <ul id="mtab">
        <li class="btn active" tab="general">基本信息</li>
        <li class="btn" tab="detail">详细信息</li>
    </ul>
</div>
<form name="cpform" method="post" action="/admin/goods/{{$_postName}}" id="cpform" onsubmit="return $.checkForm(this)" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">商品名称</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="goodsname" value="{{$good.goodsname}}" type="text" class="txt" datatype="Require" msg="请填写商品名称" />
            </td>
            <td class="vtop tips2"><span info="goodsname">请填写商品名称</span></td>
        </tr>
        <tr><td colspan="2" class="td27">市场价</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="marketprice" value="{{$good.marketprice}}" type="text" class="txt" />
            </td>
            <td class="vtop tips2"><span info="marketprice">请填写市场价</span></td>
        </tr>
        <tr><td colspan="2" class="td27">售价</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="price" value="{{$good.price}}" type="text" class="txt" datatype="Require" msg="请填写售价" />
            </td>
            <td class="vtop tips2"><span info="price">请填写售价</span></td>
        </tr>
        <tr><td colspan="2" class="td27">请选择分类</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <select name="catid" datatype="Require" msg="请选择分类">
            	<option value="">请选择分类</option>
                {{$catList}}
            </select>
            </td>
            <td class="vtop tips2"><span info="catid">请选择分类</span></td>
        </tr>
        <tr><td colspan="2" class="td27">请选择商家</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <select name="uid" datatype="Require" msg="请选择商家">
                <option value="">请选择商家</option>
                {{foreach from=$userlist item=user}}
                <option value="{{$user.uid}}"{{if $user.uid == $good.uid}} selected{{/if}}>{{$user.realname}}</option>
                {{/foreach}}
            </select>
            </td>
            <td class="vtop tips2"><span info="uid">请选择商家</span></td>
        </tr>
        <tr><td colspan="2" class="td27">请选择类型</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <select name="kind" datatype="Require" msg="请选择类型" onchange="showAttr(this)">
                <option value="1"{{if $good.kind == 1 || !$good.kind}} selected{{/if}}>礼服</option>
                <option value="2"{{if $good.kind == 2}} selected{{/if}}>化妆</option>
                <option value="3"{{if $good.kind == 3}} selected{{/if}}>喜酒</option>
                <option value="4"{{if $good.kind == 4}} selected{{/if}}>珠宝</option>
                <option value="5"{{if $good.kind == 5}} selected{{/if}}>蜜月</option>
            </select>
            </td>
            <td class="vtop tips2"><span info="kind">请选择类型</span></td>
        </tr>
        <tbody class="hidebox hidebox1" style="display: none;">
            <tr><td colspan="2" class="td27">颜色</td></tr>
            <tr class="noborder">
                <td class="vtop rowform">
                <input name="color" value="{{$good.color}}" type="text" class="txt" />
                </td>
                <td class="vtop tips2">多个颜色用英文逗号隔开<span info="color"></span></td>
            </tr>
            <tr><td colspan="2" class="td27">尺码</td></tr>
            <tr class="noborder">
                <td class="vtop rowform">
                <input name="size" value="{{$good.size}}" type="text" class="txt" />
                </td>
                <td class="vtop tips2">多个尺码用英文逗号隔开<span info="size"></span></td>
            </tr>
        </tbody>
        <tbody class="hidebox hidebox3" style="display: none;">
            <tr><td colspan="2" class="td27">净含量</td></tr>
            <tr class="noborder">
                <td class="vtop rowform">
                <input name="ml" value="{{$good.ml}}" type="text" class="txt" />
                </td>
                <td class="vtop tips2">请填写净含量<span info="ml"></span></td>
            </tr>
            <tr><td colspan="2" class="td27">版本</td></tr>
            <tr class="noborder">
                <td class="vtop rowform" colspan="2">
                    <textarea name="attr" style=" width:300px;height:100px;" placeholder="多个版本用英文逗号隔开">{{$good.attr}}</textarea>
                </td>
            </tr>
        </tbody>
        <tr><td colspan="2" class="td27">是否显示商品</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	<input type="radio" name="useable" value="1" {{if $good.useable == 1}}checked="checked"{{/if}} />显示
                <input type="radio" name="useable" value="0" {{if $good.useable == 0}}checked="checked"{{/if}} />不显示
            </td>
            <td class="vtop tips2">是否显示商品</td>
        </tr>
        <tr>
        	<td colspan="2" class="td27" id="uptab">
            	<a href="javascript:void(0);" class="btn active">上传图片</a>
            </td>
        </tr>
        <tr class="noborder">
        	<td class="vtop" colspan="2">
            	{{if $good.goodspic}}
                <img width="100" src="{{$good.goodspic}}" /><br />
                {{/if}}
            	<input type="file" name="goodspic" />
            </td>
        </tr>
        <tr><td colspan="2" class="td27">是否热门</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	<input type="radio" name="ishot" value="1" {{if $good.ishot == 1}}checked="checked"{{/if}} />是
                <input type="radio" name="ishot" value="0" {{if $good.ishot == 0}}checked="checked"{{/if}} />否
            </td>
            <td class="vtop tips2">是否是热门商品</td>
        </tr>
        <tr><td colspan="2" class="td27">是否推荐</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	<input type="radio" name="isspecial" value="1" {{if $good.isspecial == 1}}checked="checked"{{/if}} />是
                <input type="radio" name="isspecial" value="0" {{if $good.isspecial == 0}}checked="checked"{{/if}} />否
            </td>
            <td class="vtop tips2">是否是推荐商品</td>
        </tr>
        <tr><td colspan="2" class="td27">排序</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="sort" value="{{$good.sort}}" type="text" class="txt" />
            </td>
            <td class="vtop tips2">请填写排序</td>
        </tr>
    </table>
    <table class="mtb mtb-hide" id="detail-table">
        <tr><td colspan="2" class="td27">商品简介</td></tr>
        <tr class="noborder">
            <td class="vtop rowform line-normal" colspan="2">
                <textarea name="goodsbrief" style=" width:300px;height:100px;">{{$good.goodsbrief}}</textarea>
            </td>
        </tr>
        <tr><td colspan="2" class="td27">商品详细信息</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform line-normal" colspan="2">
            {{$content}}
            </td>
        </tr>
        <tr><td colspan="2" class="td27">服务流程</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform line-normal" colspan="2">
            {{$service}}
            </td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="hidden" name="action" value="{{$_postName}}" />
        <input type="hidden" name="id" value="{{$good.id}}" />
        <input type="submit" class="btn" name="vpbtn" value="点击提交" />
    </div>
</form>
<script type="text/javascript">
$(function(){
    {{if $good.kind == 1 || !$good.kind}}
    $('.hidebox1').show();
    {{elseif $good.kind == 3 || $good.kind == 4 || $good.kind == 5}}
    $('.hidebox3').show();
    {{/if}}
})
function showAttr(obj){
    var val = $(obj).val();
    val = val >= 3 ? 3 : val;
    $('.hidebox').hide();
    $('.hidebox' + val).show();
}
</script>
{{include file='admin/footer.tpl'}}