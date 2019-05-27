$(function(){
	/*椤靛ご骞垮憡鍏抽棴*/
    $('.top_ad').find('.close').on('click',function(){$(this).parent().slideUp(300);});	

	// 棣栭〉宸︿晶妤煎眰瀹氫綅
    $(function() {
	var cat_title='',fTop=[];
	
	  //鑾峰彇妤煎眰鏍囬
	$(".floor_title").each(function(){
		if($(this).html()!=''){cat_title+='<span>'+$(this).html()+'</span>';}
	});
	
	  //鑾峰彇姣忎竴妤煎眰鍒伴《閮ㄨ窛绂�
	$(".cn-laytit").each(function(index,item){
		fTop[index]=$(this).offset().top;
	});
	
	//灏嗘ゼ灞傛爣棰樺啓鍏ュ鑸潯
	if(cat_title!=''){cat_title+='<span class="last"><i class="top"></i></span>';$('.elevator').html(cat_title);}
	
	//鐐瑰嚮瀵艰埅婊氬姩鍒板搴旈珮搴�
	$('.elevator span').click(function() {
	var ind = $('.elevator span').index(this);
	$('body,html').animate({scrollTop: fTop[ind]}, 1000)
	})
	
	//杩斿洖椤堕儴
	$('.last').click(function() {
	$('body,html').animate({scrollTop: 0}, 1000)
	})
	
	$(window).scroll(scrolls);
	scrolls();
	
	function scrolls() {
	    if(cat_title==''){return;}
		var bck;
		var fixRight = $('.elevator span');
		var floatCtro = $('.elevator')
		var sTop = $(window).scrollTop();
		if (fTop[0]!=''&&sTop <= fTop[0] - 100) {
			floatCtro.fadeOut(300).css('display', 'none');
		}else {
			floatCtro.fadeIn(300).css('display', 'block');
		}
		for( var i=0; i<fTop.length; i++){
			if (sTop >= fTop[i]) {
			fixRight.eq(i).addClass('active').siblings().removeClass('active');
			}
		}
	
	}
})	
	// 棣栭〉宸︿晶妤煎眰瀹氫綅

	/*棣栭〉骞荤伅鐗囨晥鏋� start*/
	$(".banner").hover(function(){ 
    $(this).find(".prev,.next").stop(true,true).fadeTo("show",0.5) 
    },
    function(){ 
    $(this).find(".prev,.next").fadeOut() 
   });	
    $(".banner").slide({ 
    titCell:".hd ul", 
    mainCell:".bd ul", 
    effect:"fold",  
    autoPlay:true, 
    autoPage:true, 
    trigger:"click",			
    startFun:function(i){				
    var curLi = jQuery(".banner .bd li").eq(i); 				
    if( !!curLi.attr("src") ){					
    curLi.css("background-image",curLi.attr("src")).removeAttr("src") 				
    }			
    }		
    });	
   /*棣栭〉骞荤伅鐗囨晥鏋� end*/
	
	/*绉掓潃婊氬姩start*/
    $(".flashsalebox").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,scroll:5,vis:5,trigger:"click"});
  /*绉掓潃婊氬姩end*/   

	/*鏄庢槦鍗曞搧婊氬姩start*/
    $(".starbox").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"leftLoop",autoPlay:false,scroll:5,vis:5,trigger:"click"});
   /*鏄庢槦鍗曞搧婊氬姩end*/  

	
	/*骞垮憡鍥剧墖鐗规晥 strat*/
	$(".catgoods_ad").delegate("img","mouseenter",function(event){$(this).stop(true,true).animate({"opacity":0.85},300,function(){$(this).stop().animate({"opacity":1},500)});});
	/*骞垮憡鍥剧墖鐗规晥 end*/

	/*鍒嗙被棰戦亾椤靛够鐏墖鏁堟灉 start*/
	$(".cat_slide").slide({effect:"fold", titCell:".btnslide span" , mainCell:".s_ul", prevCell:".h_pres", nextCell:".h_nxts", autoPlay:true, delayTime:700 });
	/*鍒嗙被棰戦亾椤靛够鐏墖鏁堟灉 end*/			

	/*鍒嗙被棰戦亾椤靛够鐏墖榧犳爣绉昏繃锛屽乏鍙虫寜閽樉绀� start*/
	$(".cat_slide").hover(function(){
		$(this).find(".h_pres,.h_nxts").show();
	},function(){
		$(this).find(".h_pres,.h_nxts").hide();
	})
	/*鍒嗙被棰戦亾椤靛够鐏墖榧犳爣绉昏繃锛屽乏鍙虫寜閽樉绀� end*/

	/*鍒嗙被棰戦亾椤靛够鐏墖榧犳爣绉昏繃鏌愪釜鎸夐挳 楂樹寒鏄剧ず start*/
	$(".h_pres,.h_nxts").hover(function(){
		$(this).fadeTo("show",1);
	},function(){
		$(this).fadeTo("show",0.5);
	})
	/*鍒嗙被棰戦亾椤靛够鐏墖榧犳爣绉昏繃鏌愪釜鎸夐挳 楂樹寒鏄剧ず end*/

// 璐墿杞﹀脊鍑烘晥鏋�	
$(".topshopcart").hover(function(){
$(".header-cart").addClass('cart-hover');
$(".header-cart-popup").css("display","block");
$(".cart-info").css("display","block");
},function(){
$(".header-cart").removeClass('cart-hover');
$(".header-cart-popup").css("display","none");
$(".cart-info").css("display","none");
});

	/*璐墿杞﹀脊鍑� end*/
		
	/*寮瑰嚭鑿滃崟 start*/
	$(".submenu-item").hover(function(){
		$(this).find('.submenu-shelter,.catetwo').show();
	},function(){
		 $(".submenu-shelter,.catetwo").hide();
	});
	//瀛愰〉
    $("#menu").hover(function() {
        var o = $(this).find(".submenu");
        o.is(":animated") || o.slideDown("fast")
    }, function() {
        $(this).find(".submenu").hide()
    })
	/*寮瑰嚭鑿滃崟 end*/

	/*鍟嗗搧鍒嗙被椤佃仈鍔ㄧ瓫閫� start*/
    $(".js_searchlist_box").find(".sl_wrap:gt(3)").addClass("fc-hide");
	var dlnum = $('.js_searchlist_box').children('dl').length;
	if(dlnum>4){
		$('.fccc-control-warp').removeClass("fc-hide");
	}
    var fccchtml = $('.fccc-control').html();
    $('.fccc-control').click(function () {
        $(this).toggleClass('opened');
        $(".js_searchlist_box").find(".sl_wrap:gt(3)").toggleClass("fc-hide");
        $(this).hasClass('opened') ?
			$(this).html('鏀惰捣<i></i>') :
			$(this).html(fccchtml);
    });
	/*鍟嗗搧鍒嗙被椤佃仈鍔ㄧ瓫閫� end*/
	/*璐墿娴佺▼鏀粯鏂瑰紡榧犳爣绉昏繃 start*/
	$(".item-list li").hover(function(){
		$(this).find(".text").show();	
	},function(){
		$(this).find(".text").hide();	
	});

	//鏀粯鏂瑰紡鐐瑰嚮鐐归€夋寜閽紝鏍峰紡鍒囨崲
	$("#payment-list li label").click(function(){
		if($(this).siblings("input[name=payment]:checked")){
			$(this).parent("li").addClass("active").siblings().removeClass("active");
		}
	});
	//鍔犺浇榛樿閫変腑
	$("#payment-list input[name=payment]:checked").each(function(index, element) {
			$(this).parent("li").addClass("active");
    });
	
	/*璐墿娴佺▼閰嶉€佹柟寮忛紶鏍囩Щ杩� start*/
	$(".item-list li").hover(function(){
		$(this).find(".text").show();	
	},function(){
		$(this).find(".text").hide();	
	});

	//閰嶉€佹柟寮忕偣鍑荤偣閫夋寜閽紝鏍峰紡鍒囨崲
	$("#shipping-list li .checkout-item").click(function(){
		if($(this).siblings("input[name=shipping]:checked")){
			$(this).parent("li").addClass("active").siblings().removeClass("active");
		}
	});
	//鍔犺浇榛樿閫変腑
	$("#shipping-list input[name=shipping]:checked").each(function(index, element) {
			$(this).parent("li").addClass("active");
    });

	/*鏀惰棌澶瑰姛鑳�*/
	$("#favorite_wb").click(function() {
		var h = "http://"+location.hostname;
		var j = location.title;
		try {
			window.external.addFavorite(h, j);
		} catch (i) {
			try {
				window.sidebar.addPanel(j, h, "");
			} catch (i) {
				alert("瀵逛笉璧凤紝鎮ㄧ殑娴忚鍣ㄤ笉鏀寔姝ゆ搷浣滐紒\n璇锋偍浣跨敤鑿滃崟鏍忔垨Ctrl+D鏀惰棌鏈珯銆�");
			}
     	}
	})
	
	/*鍥炲埌椤堕儴鏁堟灉 start*/
	$("a.back2top").click(function(){	
		$("body,html").animate({
                    scrollTop: 0
		}, 500);
	})
	/*鍥炲埌椤堕儴鏁堟灉 end*/
	
	/*澶撮儴涓嬫媺鑿滃崟 start*/
	$("#userinfo-bar li.more-menu").mouseenter(function(){
		$(this).animate(300,function(){
			$(this).addClass("hover");
		})
	})
	
	$("#userinfo-bar li.more-menu").mouseleave(function(){
		$(this).animate(300,function(){
			$(this).removeClass("hover");
		})
	})
	/*澶撮儴涓嬫媺鑿滃崟 end*/
	
	/*璐墿杞﹂紶鏍囩Щ鍏ユ晥鏋� start*/
	$("#ECS_CARTINFO").on("mouseenter", function() {
		$("#ECS_CARTINFO").animate(200,function(){
			$("#ECS_CARTINFO").addClass("hd_cart_hover");
			$("p.fail").show();
		})
	}).on("mouseleave", function() {
		$("#ECS_CARTINFO").animate(200,function(){
			$("#ECS_CARTINFO").removeClass("hd_cart_hover");
			$("p.fail").hide();
		})
	});
	/*璐墿杞﹂紶鏍囩Щ鍏ユ晥鏋� end*/

	/*鍒嗙被妤煎眰鍟嗗搧榧犳爣缁忚繃鏄剧ず璐拱 start*/
	$(".goods_item").mouseenter(function(){
		$(this).addClass("brick-item-active");
	}).mouseleave(function(){
		$(this).removeClass("brick-item-active");
	})
	$(".choice-list li").mouseenter(function(){
		$(this).addClass("brick-item-active");
	}).mouseleave(function(){
		$(this).removeClass("brick-item-active");
	})
	$(".bdls dl").mouseenter(function(){
		$(this).addClass("brick-item-active");
	}).mouseleave(function(){
		$(this).removeClass("brick-item-active");
	})
	/*鍒嗙被妤煎眰鍗曞搧榧犳爣缁忚繃鏄剧ず璐拱 end*/

	/*鍒嗙被妤煎眰鍟嗗搧璐拱鍔犲噺鏁伴噺 start*/
	$(".homecat_plus").click(function(){
		var num=$(this).parent().parent().find(".cart-ipt").val();
		var num_p=parseInt(num);
		num_p=num_p+1;
		$(this).parent().parent().find(".cart-ipt").val(num_p);
	});
	$(".homecat_minus").click(function(){
		var num=$(this).parent().parent().find(".cart-ipt").val();
		var num_p=parseInt(num);
		num_p=num_p-1;
		if (num_p<=1){
			num_p=1;
		};
		$(this).parent().parent().find(".cart-ipt").val(num_p);
	});
	/*鍒嗙被妤煎眰鍟嗗搧璐拱鍔犲噺鏁伴噺 end*/

	/*棣栭〉绉垎鍏戞崲骞荤伅鐗囨晥鏋� start*/
	$(".exchange_div").slide({effect:"fold", titCell:".exchengetitCell li" , mainCell:".exchengemainCell", autoPlay:true, delayTime:700 });
	/*棣栭〉绉垎鍏戞崲骞荤伅鐗囨晥鏋� end*/			
	
	/*鍒嗙被瀵艰埅榧犳爣绉诲叆鏁堟灉 start*/	
	h = this;
	b = $("#J_mainCata");
	e = $("#J_subCata");
	i = $("#main_nav");
	l = null;
	k = null;
	d = false;
	g = false;
	f = false;
			
	i.on("mouseenter", function() {
		var m = $(this);
		if (l !== null) {
			clearTimeout(l);
		}
		if (f) {
			return;
		}
		l = setTimeout(function() {
			m.addClass("main_nav_hover");
			b.stop().show().animate({
					opacity: 1
			}, 300);
		}, 200);		
	}).on("mouseleave", function() {
		if (l !== null) {
			clearTimeout(l);
		}
		l = setTimeout(function() {
			e.css({
				opacity: 0,
				left: "100px"
			}).find(".J_subView").hide();
			b.hide();
			g = false;
			if (!f) {
				b.stop().delay(200).animate({
					opacity: 0
				}, 300, function() {
					i.removeClass("main_nav_hover");
					b.hide().find("li").removeClass("current");
				});
			} else {
				b.find("li").removeClass("current");
			}
        }, 200);
	});
			
			
	$("#J_mainCata li").mouseenter(function(){
		m = $(this);
		n = $("#J_mainCata li").index($(this));
				
		/*
		if (n > 4) {
			m.addClass("current").siblings("li").removeClass("current");
			e.find(".J_subView").hide();
			return false;
		}
		*/
		if (n > 1) {
			subView_h = (e.find(".J_subView").eq(n).height());
			b_h = b.height();
			m_h = m.height();
			m_p = m.position();
			

			x = b_h-subView_h;
			x = (x/2);
			
			v = parseInt(m_p.top)+m_h;
			
			
			if(parseInt(subView_h+x) > v)
			{
				x+=35;
				e.css({
					top: x
				});	
			}
			else
			{
				
				s = v - x - subView_h;
				x += s;
				x += 35;
				
				e.css({
					top: x
				});	
				
			}

			
		} else {
			e.css({
			top: "35px"
			});
		} 
		
		if (g) {					
			m.addClass("current").siblings("li").removeClass("current");
			e.find(".J_subView").hide().eq(n).show();
		} else {
			if (k !== null) {
				clearTimeout(k);
			}
			k = setTimeout(function() {
					m.addClass("current").siblings("li").removeClass("current");
					g = true;
					if (d) {
						e.css({
							opacity: 1,
							left: "213px"
						}).find(".J_subView").eq(n).show();
					} else {
						c(n);
                    }
			}, 200);
		}
	})
			
	function c(m) {
		e.css({
			opacity: 1,
			left: "213px"
		}).find(".J_subView").eq(m).show();
			d = true;
	}
	/*鍒嗙被瀵艰埅榧犳爣绉诲叆鏁堟灉 end*/	
	
	$("#h_box h3").click(function(){
		var i = $("#h_box h3").index($(this));
		
		if($("#h_box ul").eq(i).is(":hidden"))
		{
			$(this).addClass("h3_all");
			$("#h_box ul").eq(i).show();
		}
		else
		{
			$(this).removeClass("h3_all");
			$("#h_box ul").eq(i).hide();
		}
	})
})
$(function(){
	/*璐墿娴佺▼鏀粯鏂瑰紡榧犳爣绉昏繃 start*/
	$(".item-list li").hover(function(){
		$(this).find(".text").show();	
	},function(){
		$(this).find(".text").hide();	
	});

	//鏀粯鏂瑰紡鐐瑰嚮鐐归€夋寜閽紝鏍峰紡鍒囨崲
	$("#payment-list li label").click(function(){
		if($(this).siblings("input[name=payment]:checked")){
			$(this).parent("li").addClass("active").siblings().removeClass("active");
		}
	});
	//鍔犺浇榛樿閫変腑
	$("#payment-list input[name=payment]:checked").each(function(index, element) {
			$(this).parent("li").addClass("active");
    });
	
	/*璐墿娴佺▼閰嶉€佹柟寮忛紶鏍囩Щ杩� start*/
	$(".item-list li").hover(function(){
		$(this).find(".text").show();	
	},function(){
		$(this).find(".text").hide();	
	});

	//閰嶉€佹柟寮忕偣鍑荤偣閫夋寜閽紝鏍峰紡鍒囨崲
	$("#shipping-list li .checkout-item").click(function(){
		if($(this).siblings("input[name=shipping]:checked")){
			$(this).parent("li").addClass("active").siblings().removeClass("active");
		}
	});
	//鍔犺浇榛樿閫変腑
	$("#shipping-list input[name=shipping]:checked").each(function(index, element) {
			$(this).parent("li").addClass("active");
    });

	/*鏀惰棌澶瑰姛鑳�*/
	$("#favorite_wb").click(function() {
		var h = "http://"+location.hostname;
		var j = location.title;
		try {
			window.external.addFavorite(h, j);
		} catch (i) {
			try {
				window.sidebar.addPanel(j, h, "");
			} catch (i) {
				alert("瀵逛笉璧凤紝鎮ㄧ殑娴忚鍣ㄤ笉鏀寔姝ゆ搷浣滐紒\n璇锋偍浣跨敤鑿滃崟鏍忔垨Ctrl+D鏀惰棌鏈珯銆�");
			}
     	}
	})
	
	/*鍥炲埌椤堕儴鏁堟灉 start*/
	$("a.back2top").click(function(){	
		$("body,html").animate({
                    scrollTop: 0
		}, 500);
	})
	/*鍥炲埌椤堕儴鏁堟灉 end*/
	
	/*澶撮儴涓嬫媺鑿滃崟 start*/
	$("#userinfo-bar li.more-menu").mouseenter(function(){
		$(this).animate(300,function(){
			$(this).addClass("hover");
		})
	})
	
	$("#userinfo-bar li.more-menu").mouseleave(function(){
		$(this).animate(300,function(){
			$(this).removeClass("hover");
		})
	})
	/*澶撮儴涓嬫媺鑿滃崟 end*/
	
	/*璐墿杞﹂紶鏍囩Щ鍏ユ晥鏋� start*/
	$("#ECS_CARTINFO").on("mouseenter", function() {
		$("#ECS_CARTINFO").animate(200,function(){
			$("#ECS_CARTINFO").addClass("hd_cart_hover");
			$("p.fail").show();
		})
	}).on("mouseleave", function() {
		$("#ECS_CARTINFO").animate(200,function(){
			$("#ECS_CARTINFO").removeClass("hd_cart_hover");
			$("p.fail").hide();
		})
	});
	/*璐墿杞﹂紶鏍囩Щ鍏ユ晥鏋� end*/
	
	/*鍒嗙被瀵艰埅榧犳爣绉诲叆鏁堟灉 start*/	
	h = this;
	b = $("#J_mainCata");
	e = $("#J_subCata");
	i = $("#main_nav");
	l = null;
	k = null;
	d = false;
	g = false;
	f = false;
			
	i.on("mouseenter", function() {
		var m = $(this);
		if (l !== null) {
			clearTimeout(l);
		}
		if (f) {
			return;
		}
		l = setTimeout(function() {
			m.addClass("main_nav_hover");
			b.stop().show().animate({
					opacity: 1
			}, 300);
		}, 200);		
	}).on("mouseleave", function() {
		if (l !== null) {
			clearTimeout(l);
		}
		l = setTimeout(function() {
			e.css({
				opacity: 0,
				left: "100px"
			}).find(".J_subView").hide();
			b.hide();
			g = false;
			if (!f) {
				b.stop().delay(200).animate({
					opacity: 0
				}, 300, function() {
					i.removeClass("main_nav_hover");
					b.hide().find("li").removeClass("current");
				});
			} else {
				b.find("li").removeClass("current");
			}
        }, 200);
	});
			
			
	$("#J_mainCata li").mouseenter(function(){
		m = $(this);
		n = $("#J_mainCata li").index($(this));
				
		/*
		if (n > 4) {
			m.addClass("current").siblings("li").removeClass("current");
			e.find(".J_subView").hide();
			return false;
		}
		*/
		if (n > 1) {
			subView_h = (e.find(".J_subView").eq(n).height());
			b_h = b.height();
			m_h = m.height();
			m_p = m.position();
			

			x = b_h-subView_h;
			x = (x/2);
			
			v = parseInt(m_p.top)+m_h;
			
			
			if(parseInt(subView_h+x) > v)
			{
				x+=35;
				e.css({
					top: x
				});	
			}
			else
			{
				
				s = v - x - subView_h;
				x += s;
				x += 35;
				
				e.css({
					top: x
				});	
				
			}

			
		} else {
			e.css({
			top: "35px"
			});
		} 
		
		if (g) {					
			m.addClass("current").siblings("li").removeClass("current");
			e.find(".J_subView").hide().eq(n).show();
		} else {
			if (k !== null) {
				clearTimeout(k);
			}
			k = setTimeout(function() {
					m.addClass("current").siblings("li").removeClass("current");
					g = true;
					if (d) {
						e.css({
							opacity: 1,
							left: "213px"
						}).find(".J_subView").eq(n).show();
					} else {
						c(n);
                    }
			}, 200);
		}
	})
			
	function c(m) {
		e.css({
			opacity: 1,
			left: "213px"
		}).find(".J_subView").eq(m).show();
			d = true;
	}
	/*鍒嗙被瀵艰埅榧犳爣绉诲叆鏁堟灉 end*/	
	
	$("#h_box h3").click(function(){
		var i = $("#h_box h3").index($(this));
		
		if($("#h_box ul").eq(i).is(":hidden"))
		{
			$(this).addClass("h3_all");
			$("#h_box ul").eq(i).show();
		}
		else
		{
			$(this).removeClass("h3_all");
			$("#h_box ul").eq(i).hide();
		}
	})
})

/******鍒嗙被椤靛晢鍝佹暟閲忓姞鍑�****/
function modifyBuyNum(d, a) {
	var b;
    var c;
   if (a == -1) {
        c = $(d).parents(".shopping_num").find("input");
        b = parseInt(c.val()) || 1;
        if (b == 1) {
            return
        } else {
            if (b == 2) {
                $(d).attr("class", "p-reduce disable")
            } else {
                $(d).prev().attr("class", "add")
            }
            c.val(b + a)
        }
    } else {
        c = $(d).parents(".shopping_num").find("input");
        b = parseInt(c.val()) || 1;
        $(d).next().attr("class", "p-reduce")
      	c.val(b + a)
    }		
}

function arm_machine(){
	machine_time = setInterval(function(){
		$(".arm-txt").stop().animate({"top":"37"},300,function(){
			$(".arm-txt").animate({"top":"25"},300,function(){$(".arm-txt").animate({"top":"37"},300,function(){$(".arm-txt").animate({"top":"25"},300)})})});
	},5000);
}

function numRand() {
	var rand= [];
	for(var i = 0;i<5;i++){
		var itemId = $(".product-item .item").eq(i).attr("item-id");
		var len = $(".product-item .item").eq(i).find(".item-list").length - 1;
		var num = parseInt((Math.random() * len + 1));
		while (itemId == num) {
			num = parseInt((Math.random() * len + 1));
		}
	    $(".product-item .item").eq(i).attr("item-id",num);
		rand.push(num);
	}
	return rand;  
}

function sildeImg(num){
	$(".sider li").hover(function(){
		var src = $(this).find('img').attr("src");
		$(this).parents(".sider").prev().find("img").attr("src",src);
		$(this).addClass("curr").siblings().removeClass("curr");
	});
}
function sildeImg_catindex(num){
	$(".simg li").hover(function(){
		var src = $(this).find('img').attr("src");
		$(this).parents(".simg").prev().find("img").attr("src",src);
		$(this).addClass("curr").siblings().removeClass("curr");
	});
}
function Move(btn1,btn2,box,btnparent,shu){
	var llishu=$(box).first().children().length;
	var liwidth=$(box).children().width();
	var boxwidth=llishu*liwidth;
	var shuliang=llishu-shu;
	$(box).css('width',''+boxwidth+'px');
	var num=0;
	$(btn1).click(function(){
		num++;
		if (num>shuliang) {
			num=shuliang;
		}
		var move=-liwidth*num;
		$(this).closest(btnparent).find(box).stop().animate({'left':''+move+'px'},500);
	});
	$(btn2).click(function(){
		num--;
		if (num<0) {
			num=0;
		}
		var move=liwidth*num;
		$(this).closest(btnparent).find(box).stop().animate({'left':''+-move+'px'},500);
	})
}