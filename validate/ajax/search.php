<?php
$path_project = 'cnw';
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . $path_project);
require_once ROOT . DS . 'application' . DS . 'products'.DS.'LaptopApplication.php';
require_once ROOT . DS . 'application' . DS . 'NewsApplication.php';
$app_lap=new LaptopApplication();
$content=isset($_POST['content']) ?addslashes($_POST['content']) :'';
$listLaptop=$app_lap->searchLaptop($content);
echo '<div class="suggest-left" bis_skin_checked="1">';
    echo '<div class="fs-result-box fs-suggest-page" style="display: none;" bis_skin_checked="1"></div>';
    echo '<div class="fs-result-box fs-suggest-product" bis_skin_checked="1">';
    if (!empty($listLaptop)){
        echo '<div class="suggest-title" bis_skin_checked="1" style="">Sản phẩm phù hợp </div>';
            echo '<ul>';
            foreach($listLaptop as $laptop){
                $model=$laptop->getModel();
                $model=str_replace(' ', '-', $model);
                $price=$laptop->getPrice();
                $price=$app_lap->processPrice($price);
                $virualPrice=$laptop->getPrice()+2000000;
                $virualPrice=$app_lap->processPrice($virualPrice);
                echo '<li class="ais-Hits-item">';
                    echo '<a href="details/'.$laptop->getProductID().'/'.$model.'" class="item-js" queryid="6f587fc1437796e4fb4cbbffce093491" objid="36692" position="1">';
                    echo '<div class="pr-item" bis_skin_checked="1">';
                       echo ' <div class="pr-item__img m-r-8" bis_skin_checked="1"> <img style="width:60px; height:60px;" src="public/img/products/'.$laptop->getProductID().'_image1.png" alt="'.$laptop->getModel().'"> </div>';
                           echo ' <div class="pr-item__info" bis_skin_checked="1">';
                            
                                echo '<h3 class="pr-item__name m-b-4">'.$laptop->getModel().' </h3>';
                                echo '<div class="pr-item__price" bis_skin_checked="1"> '.$price.' <del class="original deal"> '.$virualPrice.' </del>';
                                echo '</div>';
                            echo '</div>';
                    echo '</div>';
                                                        
                    echo '</a>';
                echo '</li>';
            }
            echo ' </ul>';
        }
        else {
            $listLaptop1=$app_lap->getAll();
            $tmp=1;
            echo '<div class="suggest-title" bis_skin_checked="1" style="height:50px; text-align:center;">Không có sản phẩm phù hợp </div>';
            echo '<ul>';
            echo '<div class="suggest-title" bis_skin_checked="1" style="">Sản phẩm mới nhất </div>';
            echo '<ul>';
            foreach($listLaptop1 as $laptop1){
                if ($tmp<=5){
                    $model=$laptop1->getModel();
                    $model=str_replace(' ', '-', $model);
                    $price=$laptop1->getPrice();
                    $price=$app_lap->processPrice($price);
                    $virualPrice=$laptop1->getPrice()+2000000;
                    $virualPrice=$app_lap->processPrice($virualPrice);
                    echo '<li class="ais-Hits-item">';
                        echo '<a href="details/'.$laptop1->getProductID().'/'.$model.'" class="item-js" queryid="6f587fc1437796e4fb4cbbffce093491" objid="36692" position="1">';
                        echo '<div class="pr-item" bis_skin_checked="1">';
                           echo ' <div class="pr-item__img m-r-8" bis_skin_checked="1"> <img style="width:60px; height:60px;" src="public/img/products/'.$laptop1->getProductID().'_image1.png" alt="'.$laptop1->getModel().'"> </div>';
                               echo ' <div class="pr-item__info" bis_skin_checked="1">';
                                
                                    echo '<h3 class="pr-item__name m-b-4">'.$laptop1->getModel().' </h3>';
                                    echo '<div class="pr-item__price" bis_skin_checked="1"> '.$price.' <del class="original deal"> '.$virualPrice.' </del>';
                                    echo '</div>';
                                echo '</div>';
                        echo '</div>';
                                                            
                        echo '</a>';
                    echo '</li>';
                }
                $tmp++;
                
            }
            echo ' </ul>';
        }
    echo '</div>';
                                                                                
echo '</div>';
$app_news=new NewsApplication();
$listNews=$app_news->searchNews($content);
echo '<div class="suggest-right" bis_skin_checked="1">';
echo '<div class="fs-result-box fs-suggest-product" bis_skin_checked="1">';
if (!empty($listNews)){
    echo '<div class="suggest-title suggest-news" bis_skin_checked="1" style="">Bài viết phù hợp';
    echo '</div>';
    echo '<ul class="news-list">';
    foreach($listNews as $news){
        $title=$news->getTitle();
        $title=str_replace(' ', '-', $title);
        echo '<li class="ais-Hits-item news-hits-item hits-js">';
            echo '<div class="pr-item news-item" queryid="f14295e94fe441aef55aec0f285a38be" objid="147791" position="2" bis_skin_checked="1">';
                echo '<div class="pr-item__info" bis_skin_checked="1">';
                    echo '<h3 class="pr-item__name m-b-4"><a href="newsdetail/'.$news->getNews_id().'/'.$title.'" class="news-js">['.$news->getCategory().']'.$news->getTitle().'</a></h3>';
                      echo '<a href="newsdetail/'.$news->getNews_id().'/'.$title.'" class="tag-link btn-light news-js">'.$news->getCategory().'</a>';
                echo '</div>';
           echo ' </div>';
        echo '</li> ';      

    }
    echo '</ul>';
}
else {
    
    $listNews1=$app_news->getAll(1,5);
    echo '<div class="suggest-title suggest-news" bis_skin_checked="1" style="height:50px; text-align:center">Không có tin tức phù hợp';
    echo '</div>';
    echo '<div class="suggest-title suggest-news" bis_skin_checked="1" style="">Bài viết mới nhất';
    echo '</div>';

    echo '<ul class="news-list">';
    foreach($listNews1 as $news1){
        $title=$news1->getTitle();
        $title=str_replace(' ', '-', $title);
        echo '<li class="ais-Hits-item news-hits-item hits-js">';
            echo '<div class="pr-item news-item" queryid="f14295e94fe441aef55aec0f285a38be" objid="147791" position="2" bis_skin_checked="1">';
                echo '<div class="pr-item__info" bis_skin_checked="1">';
                    echo '<h3 class="pr-item__name m-b-4"><a href="newsdetail/'.$news1->getNews_id().'/'.$title.'" class="news-js">['.$news1->getCategory().']'.$news1->getTitle().'</a></h3>';
                      echo '<a href="newsdetail/'.$news1->getNews_id().'/'.$title.'" class="tag-link btn-light news-js">'.$news1->getCategory().'</a>';
                echo '</div>';
           echo ' </div>';
        echo '</li> ';      

    }
    echo '</ul>';

}
echo '</div>';
echo '</div>';



