{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul>
        <li class="btn current"><span><a href="/admin/order/index">订单列表</a></span></li>
    </ul>
</div>
<form name="cpform" method="post" action="/admin/order/save" id="cpform">
    <table class="mtb" id="general-table">
    	<tr><td colspan="2" class="td27">用户详情</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	会员：{{$order.username}}
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tr><td colspan="2" class="td27">商品详情</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	商品名称：{{$order.goodsname}}
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	单价：{{$order.price}}
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	数量：{{$order.num}}
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	全额：{{$order.amount}}
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tr><td colspan="2" class="td27">状态</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	<select name="state">
                    <option value="">订单状态</option>
                    <option value="1" {{if $order.state == 1}} selected{{/if}}>已付款</option>
                    <option value="2" {{if $order.state == 2}} selected{{/if}}>未付款</option>
                </select>
            </td>
            <td class="vtop tips2"></td>
        </tr>
    </table>
    <div class="btnfix">
        <input type="hidden" name="id" value="{{$order.id}}" />
        <input type="submit" class="btn" name="vpbtn" value="提交" />
    </div>
</form>
{{include file="admin/footer.tpl"}}
