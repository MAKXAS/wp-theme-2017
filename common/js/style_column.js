;(function() {

    /*------------------------------------*
     * 開閉メニュー
     * メニューにマウスをのせた際にサブメニューが開閉するしよう。
     *------------------------------------*/

    //初期状態の作成
    var target = document.querySelectorAll('.js-gloablNavi ul');
    for (var i = 0; i < target.length; i++) {
        target[i].style.display = 'none';
    }

    //イベントの設定
    var trigger = document.querySelectorAll('.js-gloablNavi>li');
    for (i = 0; i < trigger.length; i++) {
        //マウスをのせた場合
        trigger[i].addEventListener('mouseover', function () {
            //サブメニュー開く
            this.querySelector('ul').style.display = 'block';
        },false);
        //マウスを外した場合
        trigger[i].addEventListener('mouseout', function () {
            //サブメニュー閉じる
            this.querySelector('ul').style.display = 'none';
            this.querySelector('ul.wpp-list').style.display = 'block';
        },false);
    }

})();
;(function() {

    /*------------------------------------*
     * 固定ヘッダー
     * ポートレート時のみページをスクロールしてもヘッダーが固定される仕様
     *------------------------------------*/

    //向きによりclassを切り替える関数
    function fixChange(){
        if(window.innerHeight < window.innerWidth){
            //横向きになった際にclassを削除
            document.querySelector('#header').classList.remove('fix-header');
        }else{
            //縦向きになった際にclassを付与
            document.querySelector('#header').classList.add('fix-header');
        }
    }

    //読み込み時のイベント
    window.addEventListener('load', fixChange,false);
    //回転時のイベント
    window.addEventListener('orientationchange', fixChange,false);

})();

(function(){

    /*------------------------------------*
     * サイドドロワー
     *------------------------------------*/

    document.querySelector('.nav-sp').addEventListener('click', function (event) {
        document.querySelector('body').classList.add('show-drawer');
        // $('.drawer-body').css({'top': -scrollpos});
        event.preventDefault();
    }, false);
    document.querySelector('.CLOSE,.sp-nav-menu a').addEventListener('click', function (event) {
        document.querySelector('body').classList.remove('show-drawer');
        $('.drawer-body').css({'top': 0});
          window.scrollTo( 0 , scrollpos );
    }, false);
})();

// $(function(){
//   var state = false;
//   var scrollpos;

//   $('.nav-sp').on('click', function(){
//     if(state == false) {
//       scrollpos = $(window).scrollTop();
//       $('body').addClass('show-drawer').css({'top': -scrollpos});
//       // $('.menu').addClass('open');
//       state = true;
//     } else {
//       $('body').removeClass('show-drawer').css({'top': 0});
//       window.scrollTo( 0 , scrollpos );
//       // $('.menu').removeClass('open');
//       state = false;
//     }
//   });

// });

(function(){

    /*------------------------------------*
     * ページトップボタン
     * 一定スクロール後に表示される仕様　
     *------------------------------------*/
    var pageTop = document.querySelector('#pagetop');
    window.addEventListener('scroll', function() {
        if(window.scrollY>300){
            pageTop.style.display = 'block';
        }else{
            pageTop.style.display = 'none';
        }
    }, false);
})();
