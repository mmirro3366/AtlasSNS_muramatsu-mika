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

//モーダルを開く処理
$(function () {
  //編集ボタン(class="js-modal-open")が押されたら発火
  $(".js-modal-open").click(function () {
    //モーダルの中身の表示
    console.log("成功");
    $(".modal").fadeIn();
    //押されたボタンから投稿内容を取得し変数へ格納
    var post = $(this).attr("post");
    //押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要）
    var post_id = $(this).attr("post_id");
    //取得した投稿内容をモーダルの中身へ渡す
    $(".modal_post").text(post);
    //取得した投稿のidをモーダルの中身へ渡す
    $(".modal_id").val(post_id);
    //背景を暗くする
    // $("body").append("<div class='modal-overlay'></div>");
    return false;
  });
  //背景部分や閉じるボタン（js-modal-close）が押されたら発火
  $(".js-modal-close").on("click", function () {
    //モーダルの中身（class="js-modal"）を非表示
    $(".modal").fadeOut();
    //背景を元に戻す
    $(".modal-overlay").remove();
    return false;
  })
  //モーダル外をクリックしたときにモーダルを閉じる
  $(".modal__contents").on("click", function (e) {
    //モーダル内の要素がクリックされた場合は、モーダルを閉じない
    if (e.target !== this) {
      return;
    }
    //モーダルの中身（class="js-modal"）を非表示
    $(".modal__contents").fadeOut();
    //フォームの初期値をクリアする
    $(".modal-post").text("");
    $(".modal-id").var("");
    //背景を元に戻す
    $(".modal-overlay").remove();
  });
});
