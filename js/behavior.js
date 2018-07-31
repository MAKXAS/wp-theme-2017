
$(function(){
'use strict';
  // Scroll
  $("a[href^='#']").click(function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href === "#" || href === "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });


  // pagetop btn
  var topBtn = $('.pagetop_btn');
  topBtn.click(function(){
    $('body,html').animate({
      scrollTop: 0
    },500);
    return false;
  });

});

$(function(){
'use strict';
if(navigator.userAgent.match(/(iPhone|Android)/)){
	$('body').css('padding-top', $('#header_mobile .header_fixed').outerHeight());
}else{
	$('body').css('padding-top', $('#header').outerHeight());
}
});

//------------------------------------------------------
//スマホメニュー
//------------------------------------------------------
if(navigator.userAgent.match(/(iPhone|Android)/)){
	$(window).on('load resize', function(){
		'use strict';
		var w = $(window).width();
		var x =768;
		if (w <= x) {
		$('body').addClass('drawer drawer--left');
		$('.drawer-nav').css('display', 'block');
		$(".drawer").drawer();
		}
	});
}

//------------------------------------------------------
//bxslider
//------------------------------------------------------ 

/*loader*/ 
window.onload = function(){
	'use strict';
    $(function() {
        $("#loading").fadeOut();
    });
};
 
$(function() {
	'use strict';
    $('.slider').css('visibility','hidden');
    $('#loader-bg ,#loader').css('display','block');
});
 
$(window).load(function () {
	'use strict';
    $('#loader-bg').delay(900).fadeOut(800);
    $('#loader').delay(600).fadeOut(300);
    $('.slider').css('visibility', 'visible');
});

/*main_slide*/ 
$(document).ready(function(){
	'use strict';
		var slide_options = {
			auto: true,
			pause:  8000,
			speed: 1200,
			pager:false,
			controls:true,
			infiniteLoop: true,
			slideMargin : 0,
			minSlides   : 3,
			maxSlides   : 3,
			moveSlides  : 1,
			startSlide: 2,
			onSlideAfter: function(){
				main_slide.startAuto();
			}
		};
		option_setup();
		var main_slide = $('#main_slide ul').bxSlider(slide_options);
		
		
	//ウィンドウリサイズ時にスライドをリセット
	var timer = false;
	$(window).resize(function() {
		option_setup();
		if (timer !== false) {
			clearTimeout(timer);
		}
		timer = setTimeout(function() {
			//console.log('resized');
			main_slide.reloadSlider();
			youtube_popup();
		}, 200);
	});	
	
	//画面サイズによってオプション変更
	function option_setup() {
		var w = $(window).width();
		var x =768;
		if (w < x) {
			slide_options.minSlides = 1;
			slide_options.maxSlides = 1;
			slide_options.startSlide = 0;
		} else {
			slide_options.minSlides = 3;
			slide_options.maxSlides = 3;
			slide_options.startSlide = 2;
		}
	}
	
});


/*sub_slide*/ 
$(document).ready(function(){
	'use strict';
		var slide_options = {
			auto: true,
			pause:  8000,
			speed: 1200,
			pager:false,
			controls:true,
			infiniteLoop: true,
			slideMargin : 15,
			minSlides   : 3,
			maxSlides   : 3,
			moveSlides  : 3,
			slideWidth : 250,
			onSlideAfter: function(){
				sub_slide.startAuto();
			}
		};
		option_setup();
		var sub_slide = $('#sub_slide ul').bxSlider(slide_options);
		
		//ウィンドウリサイズ時にスライドをリセット
	var timer = false;
	$(window).resize(function() {
		option_setup();
		if (timer !== false) {
			clearTimeout(timer);
		}
		timer = setTimeout(function() {
			//console.log('resized');
			sub_slide.reloadSlider();
		}, 200);
	});	
	
	//画面サイズによってオプション変更
	function option_setup() {
		var w = $(window).width();
		if (w < 568) {
			slide_options.slideMargin = 0;
			slide_options.minSlides = 1;
			slide_options.maxSlides = 1;
			slide_options.moveSlides = 1;
		} else if (w < 992) {
			slide_options.slideMargin = 10;
			slide_options.minSlides = 2;
			slide_options.maxSlides = 2;
			slide_options.moveSlides = 2;
		} else {
			slide_options.slideMargin = 15;
			slide_options.minSlides = 3;
			slide_options.maxSlides = 3;
			slide_options.moveSlides = 3;
		}
	}
});

//------------------------------------------------------
//youtube popup  (magnificPopup)
//------------------------------------------------------ 
$(window).load(function() {
	'use strict';
	youtube_popup();
});

function youtube_popup() {
	'use strict';
	$('.popup-iframe').magnificPopup({
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 200,
		preloader: false
	});
}


//------------------------------------------------------
//	ボックスの高さを揃える
//------------------------------------------------------  
 $(window).load(function() {
	 'use strict';
    $('.flow_list dl').flatHeights();
});

jQuery.changeLetterSize = {
	handlers : [],
	interval : 1000,
	currentSize: 0
};

(function($) {
	'use strict';
	var self = $.changeLetterSize;

	/* 文字の大きさを確認するためのins要素 */
	var ins = $('<ins>M</ins>').css({
		display: 'block',
		visibility: 'hidden',
		position: 'absolute',
		padding: '0',
		top: '0'
	});

	/* 文字の大きさが変わったか */
	var isChanged = function() {
		ins.appendTo('body');
		var size = ins[0].offsetHeight;
		ins.remove();
		if (self.currentSize === size) {return false;}
		self.currentSize = size;
		return true;
	};

	/* 文書を読み込んだ時点で
	   文字の大きさを確認しておく */
	$(isChanged);

	/* 文字の大きさが変わっていたら、
	   handlers中の関数を順に実行 */
	var observer = function() {
		if (!isChanged()) { return; }
		$.each(self.handlers, function(i, handler) {
			handler();
		});
	};

	/* ハンドラを登録し、
	   最初の登録であれば、定期処理を開始 */
	self.addHandler = function(func) {
		self.handlers.push(func);
		if (self.handlers.length === 1) {
			setInterval(observer, self.interval);
		}
	};

})(jQuery);

/*	$(expr).flatHeights()
	$(expr)で選択した複数の要素について、それぞれ高さを
	一番高いものに揃える
*/
(function($) {
	'use strict';
	/* 対象となる要素群の集合 */
	var sets = [];

	/* 高さ揃えの処理本体 */
	var flatHeights = function(set) {
		var maxHeight = 0;
		set.each(function(){
			var height = this.offsetHeight;
			if (height > maxHeight){ maxHeight = height;}
		});
		set.css('height', maxHeight + 'px');
	};

	/* 要素群の高さを揃え、setsに追加 */
	jQuery.fn.flatHeights = function() {
		if (this.length > 1) {
			flatHeights(this);
			sets.push(this);
		}
		return this;
	};

	/* 高さ揃えを再実行する処理 */
	var reflatting = function() {
		$.each(sets, function() {
			this.height('auto');
			flatHeights(this);
		});
	};

	/* 文字の大きさが変わった時に高さ揃えを再実行 */
	$.changeLetterSize.addHandler(reflatting);

	/* ウィンドウの大きさが変わった時に高さ揃えを再実行 */
	$(window).resize(reflatting);

})(jQuery);


//------------------------------------------------------
//サイドバー固定
//------------------------------------------------------ 
$(window).on("load resize", function() {
	'use strict';
		  $.fixedSidebar.main = $('#sub_contents .fixed_contents');   // サイドバーの固定するレイヤー
		  $.fixedSidebar.navi = $('#main_contents'); // メインのレイヤー
		  $.fixedSidebar.run();
		  $.fixedSidebar.refresh();
});

$.fixedSidebar = {
    run : function () {
	'use strict';
      var $this = this;
      this.setup();
      $(window).scroll(function () {
	var w = $(window).width();
	if (w >= 768) {
        var ws = $(window).scrollTop();      
        if ($this.targetH < $this.wH) {
          if(ws > $this.sub_scroll) {
            $($this.eTarget).css({position:'fixed', bottom: 'auto', top: $this.sub_scroll - ws + 'px'});
          }
          else if (ws > $this.target_top) {
            $($this.eTarget).css({position:'fixed', bottom: 'auto', top: $('#header').outerHeight()});
          }
          else {
            $($this.eTarget).css({position:'relative', bottom: 'auto', top: '0px'});
          }
        } else {
          if (ws > $this.sub_scroll) {
            $($this.eTarget).css({position:'fixed', top: 'auto', bottom: ws - $this.sub_scroll + 'px'});
          }
          else if (ws > $this.target_scroll) {
            $($this.eTarget).css({position:'fixed', top: 'auto', bottom: '0px'});
          }
          else {
            $($this.eTarget).css({position:'relative', top: '0px', bottom: 'auto'});
          }
		}
        }
      });
    },
    setup : function () {
		'use strict';
      // ウィンドウ縦幅
      this.wH = $(window).height();
      // 一番下の位置
      var navi_bottom = this.navi.offset().top + this.navi.outerHeight(true);
      var main_bottom = this.main.offset().top + this.main.outerHeight(true);

      this.eTarget = (main_bottom > navi_bottom) ? this.navi : this.main;
      this.eSub = (main_bottom> navi_bottom) ? this.main : this.navi;
      this.targetH = $(this.eTarget).outerHeight(true);

      // 固定するレイヤーの初期位置
      this.target_top = $(this.eTarget).offset().top - parseInt($(this.eTarget).css('margin-top'),10) - $('#header').outerHeight();
      // メインレイヤーの初期位置
      this.sub_top = $(this.eSub).offset().top - parseInt($(this.eSub).css('margin-top'),10) - $('#header').outerHeight();
      // ウィンドウより小さい - スクロールする上限 サブレイヤー
      if (this.targetH < this.wH) {
        this.sub_scroll = $(this.eSub).offset().top + $(this.eSub).outerHeight(true) - $(this.eTarget).outerHeight(true) - parseInt($(this.eSub).css('margin-top'),10);
      } else {
        this.sub_scroll = $(this.eSub).offset().top + $(this.eSub).outerHeight(true) - this.wH - parseInt($(this.eSub).css('margin-top'),10);
      }
      // スクロールする上限 ターゲット
      this.target_scroll = $(this.eTarget).offset().top + $(this.eTarget).outerHeight(true) - this.wH - parseInt($(this.eTarget).css('margin-top'),10);
	},
    refresh : function () {
		'use strict';
      if (this.eTarget) {
        $(this.eTarget).css({position:'relative', top: '0px'});
      }
      this.setup();
      $(window).trigger('scroll');
    }
};

//------------------------------------------------------
//movie_btn
//------------------------------------------------------ 
$(window).on('load resize',function(){
'use strict';
	var target = $('.movie_btn');
	$(window).scroll(function () {
        if($(window).scrollTop() <  $('#footer').offset().top - $(window).height() ) {
            target.fadeIn();
        } else {
           target.fadeOut();
        }
    });
 });
 
 //------------------------------------------------------
//page_top
//------------------------------------------------------ 
$(window).on('load resize',function(){
'use strict';
	var target = $('.page_top');
	$(window).scroll(function () {
        if($(window).scrollTop() < $(window).height() ) {
            target.fadeOut();
        } else {
		   target.fadeIn();
        }
    });
 });

