{{include file='admin/header.tpl'}}
<script language="javascript">
function _onFormSubmit(){
	if($("#pform > input[name='goodsname']").val() == '请输入关键字') {
   		$("#pform > input[name='goodsname']").val('');
	}
}
</script>
<div class="floattop">
    <ul>
        <li class="btn"><a href="/admin/order/index"><span>订单管理</span></a></li>
    </ul>
</div>
<div class="input-append">
	<form method="post" action="/admin/order/index" id="pform">
        <input type="text" name="goodsname" id="goodsname" value="{{if $goodsname}}{{$goodsname}}{{else}}请输入关键字{{/if}}" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="submit" onclick="_onFormSubmit()"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/order/more" name="lpform" id="lpform">
    <table class="tb">
        <tr class="header">
            <th>选择</th>
            <th class="tdl">会员</th>
            <th>类型</th>
            <th>订单号</th>
            <th>总额</th>
            <th>状态</th>
            <th>下单时间</th>
            <th>详细</th>
        </tr>
        {{foreach from=$orders item=order}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="{{$order.id}}" />
                <input type="hidden" name="id[{{$order.id}}]" value="{{$order.id}}" />
            </td>
            <td class="tdl">
                {{$order.username}}
            </td>
            <td class="td25">
                {{if $order.type == 1}}礼服{{/if}}
                {{if $order.type == 3}}喜酒{{/if}}
                {{if $order.type == 2}}化妆{{/if}}
                {{if $order.type == 4}}珠宝{{/if}}
                {{if $order.type == 5}}蜜月{{/if}}
            </td>
            <td class="td25">
                {{$order.ordersn}}
            </td>
            <td class="td25">
                {{$order.amount}}
            </td>
            <td class="td25">
                <select name="status[{{$order.id}}]" style="width:100px;">
                	<option value="-1"{{if $order.status == -1}} selected{{/if}}>订单取消</option>
                    <option value="1"{{if $order.status == 1}} selected{{/if}}>等待买家付款</option>
                    <option value="2"{{if $order.status == 2}} selected{{/if}}>买家已付款</option>
                    <option value="3"{{if $order.status == 3}} selected{{/if}}>等待卖家发货</option>
                    <option value="4"{{if $order.status == 4}} selected{{/if}}>交易成功</option>
                    <option value="5"{{if $order.status == 5}} selected{{/if}}>买家已收货</option>
                    <option value="6"{{if $order.status == 6}} selected{{/if}}>退款订单</option>
                </select>
            </td>
            <td class="td25">
                {{$order.addtime|date_format:'%Y-%m-%d'}}
            </td>
            <td class="td25">
                <a href="javascript:void(0);" onclick="show('{{$order.id}}')">查看</a>
            </td>
        </tr>
        <tbody id="tr{{$order.id}}" style="display:none">
        	<tr>
            	<th colspan="{{if $order.type == 1}}3{{/if}}{{if $order.type == 3}}4{{/if}}">商品名称</th>
                <th>单价</th>
                {{if $order.type == 1}}
                <th>颜色</th>
                <th>尺码</th>
                {{/if}}
                {{if $order.type == 3}}
                <th>版本</th>
                {{/if}}
                <th>数量</th>
                <th>小计</th>
            </tr>
        	{{foreach from=$order.goods item=good}}
        	<tr>
            	<td colspan="{{if $order.type == 1}}3{{/if}}{{if $order.type == 3}}4{{/if}}"><a href="/{{if $order.type == 1}}cloth{{/if}}/show/id/{{$good.goodsid}}" target="_blank">{{$good.goodsname}}</a></td>
                <td>{{$good.price}}</td>
                {{if $order.type == 1}}
                <td>{{$good.color}}</td>
                <td>{{$good.size}}</td>
                {{/if}}
                {{if $order.type == 3}}
                <td>{{$good.attr}}</td>
                {{/if}}
                <td>{{$good.num}}</td>
                <td>{{$good.amount}}</td>
            </tr>
            {{/foreach}}
        </tbody>
        {{/foreach}}
        <tr>
            <td>
                <button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button>
            </td>
            <td class="tdl"><button id="submit" class="btn" type="submit">提交</button></td>
            <td colspan="10" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}
<script type="text/javascript">
function show(id){
	if($('#tr' + id).css('display') == 'none'){
		$('#tr' + id).show();
	}else{
		$('#tr' + id).hide();
	}
}
</script>