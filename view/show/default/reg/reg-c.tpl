<!doctype html>
<html>
    <head>
    <title>会员注册_{{TO->cfg key="site_name" group="basic" default="成都上班族"}}</title>
    {{include file="common/style.tpl"}}
    <link rel="stylesheet" href='/resource/min/index.php?b=css&f=common.css,thirdparty/artDialog/skins/default.css,reg.css' type="text/css" media="screen, projection">
        <script src="/resource/min/index.php?b=js&f=thirdparty/jquery/jquery.min.js,common.js,thirdparty/artDialog/jquery.artDialog.js,user.js"></script>
    </head>

    <body>
    	<!--header-->
        {{include file='common/header.tpl'}}
        <!--header-->
        <form id="pform" action="/u/doregc" enctype="multipart/form-data" method="post" onSubmit="return users.checkreg();">
        <div class="block">
        	<div class="reg-box">
            	<h4 class="h4-rec yahei">
                	新会员注册
                </h4>
                <p class="sup yahei">如果您已拥有卖点啥帐户，则可在此<a href="/u/login">点击登录</a></p>
                <div class="lr">
                	<dl class="clearfix reg">
                        <dt class="reg">账号：</dt>
                        <dd><input type="text" name="username" id="username" class="t-txt" onBlur="users.checkusername()" /><div id="usernameTip" class="onShow">请输入邮箱/手机号</div></dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">请填写密码：</dt>
                        <dd><input type="password" name="password" id="password" class="t-txt" onBlur="users.checkpwd()" /><div id="passwordTip" class="onShow">请输入密码</div></dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">重复密码：</dt>
                        <dd><input type="password" name="cpassword" id="cpassword" class="t-txt" onBlur="users.checkcpwd();" /><div id="cpasswordTip" class="onShow">请再次输入密码</div></dd>
                    </dl>
                    <input type="hidden" name="roleid" value="10" />
                </div>
                <h4 class="h4-rec yahei">
                	审核资料
                </h4>
                <div class="lr">
                	<dl class="clearfix reg">
                        <dt class="reg">工厂名称：</dt>
                        <dd>
                            <input name="storename" type="text" class="t-txt" datatype="Require" msg="工厂名称不能为空" />
                            <em info="storename" class="tipinfo">请填写工厂名称</em>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">联系人：</dt>
                        <dd>
                            <input name="ownername" class="t-txt" type="text" datatype="Require" msg="联系人不能为空" />
                            <em info="ownername" class="tipinfo">请输入联系人</em>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">身份证号：</dt>
                        <dd>
                            <input name="ownercard" class="t-txt" type="text" datatype="IdCard" msg="身份证号不正确" />
                            <em info="ownercard" class="tipinfo">请填写身份证号</em>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">分类：</dt>
                        <dd>
                            <select name="catid" datatype="Require" msg="请选择分类">
                                <option value="">分类</option>
                                {{$catList}}
                            </select>
                            <em info="catid" class="tipinfo">请选择分类</em>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">年销售额：</dt>
                        <dd>
                            <input name="yearmoney" class="t-txt" type="text" />
                            <em class="tipinfo">请填写年销售额</em>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">工厂规模：</dt>
                        <dd>
                            <input name="people" class="t-txt" type="text" />
                            <em class="tipinfo">请填写工厂规模,多少人</em>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">上传身份证：</dt>
                        <dd>
                            <input name="image_1" type="file" />
                            <em info="image_1" class="tipinfo">支持格式jpg,jpeg,png,gif，请保证图片清晰且文件大小不超过400KB</em>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">营业执照：</dt>
                        <dd>
                            <input name="image_2" type="file" />
                            <em info="image_2" class="tipinfo">支持格式jpg,jpeg,png,gif，请保证图片清晰且文件大小不超过400KB</em>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">地税务登记证：</dt>
                        <dd>
                            <input name="shuipic" type="file" />
                            <em class="tipinfo">支持格式jpg,jpeg,png,gif，请保证图片清晰且文件大小不超过400KB</em>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">机构代码证：</dt>
                        <dd>
                            <input name="jgpic" type="file" />
                            <em class="tipinfo">支持格式jpg,jpeg,png,gif，请保证图片清晰且文件大小不超过400KB</em>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">产品质检报告：</dt>
                        <dd>
                            <input name="zjpic" type="file" />
                            <em class="tipinfo">支持格式jpg,jpeg,png,gif，请保证图片清晰且文件大小不超过400KB</em>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">商标注册证：</dt>
                        <dd>
                            <input name="sbpic" type="file" />
                            <em class="tipinfo">支持格式jpg,jpeg,png,gif，请保证图片清晰且文件大小不超过400KB</em>
                        </dd>
                    </dl>
                </div>
                <h4 class="h4-rec yahei">
                	地址资料
                </h4>
                <div class="lr">
                	<dl class="clearfix reg">
                        <dt class="reg">姓名：</dt>
                        <dd><input type="text" name="realname" id="realname" class="t-txt" /></dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">地区：</dt>
                        <dd>
                        	<select id="province" class="select" name="province" onchange="changeProvince()">
                                <option value="">请选择省份</option>
                                {{foreach from=$provinces item=province}}
                                <option value="{{$province.id}}"{{if $province.id == $address.province}} selected{{/if}}>{{$province.regionname}}</option>
                                {{/foreach}}
                            </select>
                            <select id="city" class="select" name="city" onChange="changeCity()">
                                <option value="">请选择市</option>
                            </select>
                            <select id="district" class="select" name="district" datatype="Require" msg="地区不能为空">
                                <option value="">请选择区</option>
                            </select>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">详细地址：</dt>
                        <dd><input type="text" name="address" id="address" class="t-txt" /></dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">邮编：</dt>
                        <dd><input type="text" name="zipcode" id="zipcode" class="t-txt" /></dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">电话：</dt>
                        <dd><input type="text" name="telephone" id="telephone" class="t-txt" /></dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">&nbsp;</dt>
                        <dd><a href="javascript:void(0);" style="color:#08c; font-size:14px; font-weight:700;" onclick="sendsms(this)">获取验证码</a></dd>
                    </dl>
                    <dl class="gd reg clearfix">
                        <dt class="reg">验证码：</dt>
                        <dd>
                            <input type="text" id="gdkey" name="gdkey" class="t-txt" /><div id="gdkeyTip" class="onShow">请输入验证码</div>
                        </dd>
                    </dl>
                    <dl class="clearfix reg">
                        <dt class="reg">&nbsp;</dt>
                        <dd><input type="submit" name="reg" id="reg" class="reg-btn f14 yahei" value="立即注册" /></dd>
                    </dl>
                    <dl class="reg clearfix">
                    	<dt class="reg">&nbsp;</dt>
                        <dd>点击“立即注册”，即表示您同意并愿意遵守成都上班族用户协议和隐私政策</dd>
                    </dl>
                </div>
            </div>
        </div>
        <input type="hidden" name="refer" value="{{$refer}}" />
        </form>
        {{include file='common/footer.tpl'}}
    </body>
</html>
<script language="JavaScript">
$(function(){
	setCity();
	setDistrict();
});
function changeProvince(){
	setCity($("#province").val());
}
function changeCity(){
	setDistrict($("#city").val());
}
function setCity(provinceVal, cityVal){
	var city = $("#city");
	city.get(0).options.length = 0;
	provinceVal = provinceVal == null ? '' : provinceVal;
	$.getJSON(SITE_URL+"u/getprovince/pid/"+provinceVal, function(json){
		var idx = 0;
		if(json!=null){
			$.each(json, function(i, n){
				if(idx == 0 && !cityVal){
					setDistrict(i);
				}
				var option = new Option(n, i);
				if(i == cityVal){
					option.selected = true;
				}
				city.get(0).options.add(option);
				idx++;
			});
			if(city.val())
				city.show();
			else
				city.hide();
		}else{
			city.hide();
		}
	});
}
function setDistrict(cityVal, districtVal){
	var district = $("#district");
	district.get(0).options.length = 0;
	cityVal = cityVal == null ? '' : cityVal;
	$.getJSON(SITE_URL+"u/getprovince/pid/"+cityVal, function(json){
		if(json!=null){
			$.each(json, function(i, n){
				var option = new Option(n, i);
				if(i == districtVal){
					option.selected = true;
				}
				district.get(0).options.add(option);
			});
			if(district.val())
				district.show();
			else
				district.hide();
		}else{
			district.hide();
		}
	});
}
function sendsms(obj, istel){
	if($(obj).attr('data-send') == 'has'){
		return false;
	};
	var tel = $('#telephone').val(), user = $('#username').val();
	$.getJSON(SITE_URL + 'u/sms', {telephone: tel, username: user}, function(json){
		if(json.msg == 1){
			$(obj).attr('data-send', 'has');
			var idx = 60;
			var t = setInterval(function(){
				idx -= 1;
				$(obj).text(idx + '秒后再次发送');
				if(idx == 0){
					clearInterval(t);
					$(obj).attr('data-send', '');
					$(obj).text('发送验证码');
				}
			}, 1000);
		}else if(json.msg == -1){
			CD.common.dialogTip('warning', '请输入手机号');
		}else if(json.msg == -2){
			CD.common.dialogTip('warning', '请联系管理员');
		}else{
			CD.common.dialogTip('warning', json.msg);
		}
	});
}
</script>