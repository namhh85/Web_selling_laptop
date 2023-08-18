<?php
global $path_project;
?>

<div class="nav_bar">
	<div class="logo">
		<a href=<?php echo "/" . $path_project . "/" ?> style="font-weight:900; font-size:20px"> Group 11</a>
	</div>
	<div class="fs-search">
        <form action="" method="get" autocomplete="off">
            <label for="key" class="mf-vhiditem">Nhập tên điện thoại, máy tính, phụ kiện... cần tìm</label>
            <input class="fs-stxt" type="text" id="key-search" name="" placeholder="Nhập tên điện thoại, máy tính, phụ kiện... cần tìm" autocomplete="off" maxlength="50">
            <span class="icon-cancel" id="icon-cancel" style="display:none;" title="Xóa">✕</span>
            <button type="submit" aria-label="Tìm kiếm" class="search-button" title="Tìm kiếm">
            <img src="public/images/logo/iconsearch.png" alt="" style="width:100%; height:100%;">
            </button>
            <div class="fs-result suggest suggest-box" id ="pc-search-filter" >
                                   
                                    
                                        
                                    <!-- <div class="suggest-right" bis_skin_checked="1">
                                        <div class="fs-result-box fs-suggest-product" bis_skin_checked="1">
                                        <div class="suggest-title suggest-news" bis_skin_checked="1" style="">Bài viết phù hợp
                                        </div>
                                        <ul class="news-list">
                                
                            
                                    <li class="ais-Hits-item news-hits-item hits-js">
                                    <div class="pr-item news-item" queryid="f14295e94fe441aef55aec0f285a38be" objid="147791" position="2" bis_skin_checked="1">
                                        <div class="pr-item__info" bis_skin_checked="1">
                                            <h3 class="pr-item__name m-b-4"><a href="/tin-tuc/danh-gia/iphone-14-co-ra-mat-khong-147791" class="news-js">Phone Mới mini có ra mắt không? Liệu dòng <em>iPhone</em> mini có chấm dứt năm nay?</a></h3>
                                                    <a href="/tin-tuc/danh-gia" class="tag-link btn-light news-js">Đánh Giá – Tư Vấn</a>
                                                    <a href="/tin-tuc/tags/flagship" class="tag-link btn-light news-js">Flagship</a>
                                        </div>
                                    </div>
                                    </li>              
                        </div>
                     </div> -->
             </div>                                                                                                                                                            
        </form>
    </div>
	<nav id = "nav">
			<ul id = "menuitem">
				<li><a href=<?php echo "/" . $path_project . "/"?>><span>Trang chủ</span></a></li>
				<li><a href=<?php echo "/" . $path_project . "/" . "news" ?>>Tin tức</a></li>
				<li><a href=<?php echo "/" . $path_project . "/" . "products" ?>>Sản phẩm</a></li>
				<li><a href=<?php echo "/" . $path_project . "/" . "contact" ?>>Liên hệ</a></li>
				<li><a href=<?php echo "/" . $path_project . "/" . "login" ?>>
				<?php  
				   if (isset($_SESSION['username'])!=''){
					echo $_SESSION['username'];
				   }
				   else {
					echo 'Đăng nhập';
				   }

				?>
			
			</a></li>
			    <?php 
				    if (isset($_SESSION['username'])!=''){
						?>
					<li><a href="validate/logout.php">Logout</a></li>
					<?php 
					}
				?>
			</ul>

	</nav>
	<div class="cart-logo">
		<a href=<?php echo "/" . $path_project . "/" . "cart" ?>><img src=<?php echo "/" . $path_project . "/" . "images/logo1/cart.png" ?> width="30px"> &nbsp;</a>
		
		<!-- <div class="menu"> -->
		<img src=<?php echo "/" . $path_project . "/" . "images/logo/menu.png" ?> alt="" class = "menu" onclick="menuToggle()" />
		<!-- </div> -->
	</div>
</div>
<script type="text/javascript" src = <?php echo "/" . $path_project . "/" . "public/javascript/nav_bar.js" ?>></script>
