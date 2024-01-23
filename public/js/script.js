//アコーディオンメニュー機能作成
//クリック・矢印の向き変更
//next()で次の兄弟要素を対象
//toggleClassで指定したclassをつけ外しできる

$(function () {
  $(".menu-btn").on("click", function () {
    //クリックでコンテンツを開閉
    $(this).next().slideToggle(300);
    //矢印の向きを変更
    $(this).toggleClass("open", 300);
  }).next().hide();
});
