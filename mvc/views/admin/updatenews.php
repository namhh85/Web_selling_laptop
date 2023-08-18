<?php 
session_start();
if(!isset($_SESSION['admin'])){
  header('Location: login-admin');
  exit();
}
require_once ROOT . DS . 'application'.DS. 'NewsApplication.php';
require_once ROOT . DS . 'application'.DS.'NewsDescriptionApplication.php';
$app= new NewsApplication();
$app_news= new NewsDescriptionApplication();
$id=intval($_GET['id']);
$news=$app->getNewsdetail($id);
if (isset($_POST['btn-submit-update'])){
  $news_id=intval($_POST['btn-submit-update']);
  $title=isset($_POST['news_title'])?addslashes($_POST['news_title']):'';
  $category=isset($_POST['news_category'])? addslashes($_POST['news_category']):'';
  $overview=isset($_POST['news_overview'])? addslashes($_POST['news_overview']):'';
  $description=isset($_POST['news_description'])? addslashes($_POST['news_description']):'';
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $time =date("Y-m-d H:i:s"); 
  $des=explode("\n",$description);
  $news=new NewsDescription($news_id,$title,$category,'1a2',$time,'a12',$overview,$des[0],$des[1],$des[2],$des[3],$des[4],$des[5]);
 
  $app_news->update($news);
  header('Location: admin');
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/admin_news_index.css">
    <link rel="stylesheet" href="public/css/admin_user_index.css">
    <title>Document</title>
</head>
<body>
<form action="" method="post"> 
                    <div class="bg-modal1" style="display:flex;">
                      <div class="modal-content">
                        <span class="modal-title">Cập nhật thông tin</span>
                        <div class="class-form-update">
                        <label class="news-title">Tiêu đề</label>
                          <input name="news_title" type="text" value="<?php echo $news->getTitle(); ?>" placeholder="Tiêu đề tin tức"/>
                          <label class="news-title" for="news_category" >Thể loại</label>
                        <select class="news_category" name="news_category" id="news_category" value="<?php echo $news->getCategory(); ?>">
                            <option value="Tin tức">Tin tức</option>
                            <option value="Khuyến mãi">Khuyến mãi</option>
                            <option value="Thông tin">Thông tin</option>
                        </select>
                          <label class="news-title">Tổng quan</label>
                          <input type="text" placeholder="Thông tin tổng quan tin tức" name="news_overview" value="<?php $news->getOverview(); ?>"/>
                          <label class="news-title">Miêu tả</label>
                          <textarea rows="8" name="news_description" value="" ></textarea>

                          <div class="media-form">
                            
                            <div
                              class="image"
                              style="
                                background-image: url('http://ww1.prweb.com/prfiles/2014/04/10/11752526/gI_134971_best-image-web-hosting.png');
                                border: none;
                              "
                            >
                              <button>
                                <i class="bx bx-x"></i>
                              </button>
                            </div>
                            <div
                              class="image"
                              style="
                                background-image: url('http://ww1.prweb.com/prfiles/2014/04/10/11752526/gI_134971_best-image-web-hosting.png');
                                border: none;
                              "
                            >
                              <button>
                                <i class="bx bx-x"></i>
                              </button>
                            </div>
                            <div
                              class="image"
                              style="
                                background-image: url('http://ww1.prweb.com/prfiles/2014/04/10/11752526/gI_134971_best-image-web-hosting.png');
                                border: none;
                              "
                            >
                              <button>
                                <i class="bx bx-x"></i>
                              </button>
                            </div>
                            <div class="add-image">
                              <i class="bx bx-image-add" style="font-size: 50px"></i>
                            </div>
                          </div>

                          <div class="bottom-modal-button">
                            <button class="modal-button-close  close-add-modal1">Đóng</button>
                            <button class="modal-button-accept accept-add-modal1" type="submit" name="btn-submit-update" value="<?php echo $news->getNews_id(); ?>">Cập nhật</button>
                          </div>
                      </div>
                    </div>
                  </form>
</body>
</html>