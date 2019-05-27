	function convertFloat2Int(f){
		return f.substring(0,f.lastIndexOf('.'));
	}
	
	/*
	 * 重复提醒
	 */
	function alertReply() {
		mui.alert("您已提交，请耐心等待！");
	}
	
	//日期格式化
    Date.prototype.Format = function(fmt) {
        var o = {
            "M+" : this.getMonth() + 1,
            "d+" : this.getDate(),
            "h+" : this.getHours(),
            "m+" : this.getMinutes(),
            "s+" : this.getSeconds(),
            "q+" : Math.floor((this.getMonth() + 3) / 3),
            "S" : this.getMilliseconds()
        };
        if (/(y+)/.test(fmt)){
            fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        }
        for (var k in o){
	        if (new RegExp("(" + k + ")").test(fmt)){
	            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
	        }
        }
        return fmt;
    }
	
	/**
	 * 时间戳按样式转年月日时分秒
	 */
	function timeStamp2String(time, pattern) {
		if(time != null && time != ''){
			var datetime = new Date();
			datetime.setTime(time);
			return datetime.Format(pattern);
		}else{
			return "--";
		}
	}
	
	function intAdd(arg1,arg2){
		return parseInt(arg1)+parseInt(arg2);
	}
	
	//js 加法计算
	//调用：accAdd(arg1,arg2)
	//返回值：arg1加arg2的精确结果
	function accAdd(arg1,arg2){
	  var r1,r2,m;
	  try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}
	  try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}
	  m=Math.pow(10,Math.max(r1,r2))
	  return ((arg1*m+arg2*m)/m).toFixed(2);
	}
	//js 减法计算
	//调用：Subtr(arg1,arg2)
	//返回值：arg1减arg2的精确结果
	function Subtr(arg1,arg2){
	     var r1,r2,m,n;
	     try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}
	     try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}
	     m=Math.pow(10,Math.max(r1,r2));
	     //last modify by deeka
	     //动态控制精度长度
	     n=(r1>=r2)?r1:r2;
	     return ((arg1*m-arg2*m)/m).toFixed(2);
	}   
	//js 除法函数
	//调用：accDiv(arg1,arg2)
	//返回值：arg1除以arg2的精确结果
	function accDiv(arg1,arg2){
	  var t1=0,t2=0,r1,r2;
	  try{t1=arg1.toString().split(".")[1].length}catch(e){}
	  try{t2=arg2.toString().split(".")[1].length}catch(e){}
	  with(Math){
	    r1=Number(arg1.toString().replace(".",""))
	    r2=Number(arg2.toString().replace(".",""))
	    return (r1/r2)*pow(10,t2-t1);
	  }
	}
	  
	//js 乘法函数
	//调用：accMul(arg1,arg2)
	//返回值：arg1乘以arg2的精确结果
	function accMul(arg1,arg2){
	  var m=0,s1=arg1.toString(),s2=arg2.toString();
	  try{m+=s1.split(".")[1].length}catch(e){}
	  try{m+=s2.split(".")[1].length}catch(e){}
	  return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m)
	}