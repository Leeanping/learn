window.dom = new (function dom(){
    var that = this;
    that.getById = function(id){
        return id ? document.getElementById(id) : '';
    };
    that.getBrowser = function(){
        var nav = navigator.userAgent.toLowerCase();
        var match = /(chrome)[ \/]([\w.]+)/.exec( nav ) ||
            /(webkit)[ \/]([\w.]+)/.exec( nav ) ||
            /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( nav ) ||
            /(msie) ([\w.]+)/.exec( nav ) ||
            nav.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( nav ) ||
            [];
    
        return {
            browser: match[ 1 ] || "",
            version: match[ 2 ] || "0"
        };
    };
    that.isIE = document.all ? true : false;
    that.isUndefined = function(val){
        return typeof val == 'undefined' ? true : false;
    };

    that.setcookie = function(c_name,value,expiredays){
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + expiredays);
        document.cookie = c_name + "=" +escape(value) + ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString()); //使设置的有效时间正确。增加toGMTString()
    };
    that.getcookie = function(c_name){
        if (document.cookie.length > 0)
        {
            c_start = document.cookie.indexOf(c_name + "=")
            if (c_start != -1)
            {
                c_start = c_start + c_name.length + 1;
                c_end   = document.cookie.indexOf(";",c_start);
                if (c_end == -1)
                {
                    c_end = document.cookie.length;
                }
                return unescape(document.cookie.substring(c_start,c_end));
            }
        }
        return null
    };
})();

function imageResize(obj, width, height){
    var hRatio;
    var wRatio;
    var Ratio = 1;
    var w = $(obj).width();
    var h = $(obj).height();
    var t = width / height;
    wRatio = width / w;
    hRatio = height / h;

    if (width ==0 && height==0){
        Ratio = 1;
    }else if (width==0){
        if (hRatio<1) Ratio = hRatio;
    }else if (height==0){
        if (wRatio<1) Ratio = wRatio;
    }else if (wRatio<1 || hRatio<1){
        Ratio = (wRatio<=hRatio?wRatio:hRatio);
    }
    if (Ratio<1){
        w = w * Ratio;
        h = h * Ratio;
    }

    if(h < height && w < width){
        $(obj).height(Math.round(w));
        $(obj).width(Math.round(h));
        $(obj).css('left', Math.round((width - $(obj).width()) / 2));
        $(obj).css('top', Math.round((height - $(obj).height()) / 2));
    }

    if(h < height){
        if($(obj).width() >= width){
            $(obj).height(Math.round(height));
            $(obj).css('left', Math.round((width - $(obj).width()) / 2));
        }
    }
    if(w < width){
        if($(obj).height() >= height){
            $(obj).width(Math.round(width));
            $(obj).css('top', Math.round((height - $(obj).height()) / 2));
        }
    }

    if(h >= height && w >= width){
        $(obj).height(Math.round(h));
        $(obj).width(Math.round(w));
        $(obj).css('left', Math.round((width - $(obj).width()) / 2));
        $(obj).css('top', Math.round((height - $(obj).height()) / 2));
    }
}