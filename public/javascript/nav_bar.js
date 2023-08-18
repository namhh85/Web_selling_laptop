	var menuItems = document.getElementById('menuitem');
	menuItems.style.maxHeight = "0px";
	// var nav_bar = document.getElementById
	function menuToggle() {
		if (menuItems.style.maxHeight == "0px") {
			menuItems.style.maxHeight = "220px";
			document.getElementById("nav").style.zIndex = "2";
		}
		else {
			menuItems.style.maxHeight = "0px";
		}
	}
    //     let btnClose = document.querySelector(".nav__mobile-close");
    //     btnClose.addEventListener('click', function(){
    //       document.querySelector(".nav__overlay").style.display = "none";
    //       document.querySelector(".nav-mobile").style.display = "none";
    //       // load data of news
    //     });
    let closeSearch = document.querySelector(".icon-cancel");
	let searchInput = document.querySelector(".fs-stxt");
        searchInput.addEventListener('input',(event) =>{
         if(screen.width> 1023){
            document.getElementById("pc-search-filter").style.display = "flex";
            // document.querySelector(".over-suggest").style.display ="flex";
            closeSearch.style.display = "flex";
         }
         if(screen.width <= 1023){
            document.getElementById("mobile-search-filter").style.display = "flex";
            // document.querySelector(".over-suggest").style.display ="flex";
         }

        });

       
        closeSearch.addEventListener('click',  () => {
         if(screen.width> 1023){
            document.querySelector(".fs-stxt").value = '';
            document.getElementById("pc-search-filter").style.display = "none";
            // document.querySelector(".over-suggest").style.display ="none";
            closeSearch.style.display = "none";
         }
         if(screen.width <= 1023){
            document.querySelector(".fs-stxt").value = '';
            document.getElementById("mobile-search-filter").style.display = "none";
            // document.querySelector(".over-suggest").style.display ="none";
            closeSearch.style.display = "none";
         }

        });
   // function ajax form search
   function load_ajax()
   {
                var xmlhttp;
                 
                // Nếu trình duyệt là  IE7+, Firefox, Chrome, Opera, Safari
                if (window.XMLHttpRequest)
                {
                    xmlhttp = new XMLHttpRequest();
                }
                // Nếu trình duyệt là IE6, IE5
                else
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                 var data =new FormData();
                 var search=document.getElementById('key-search').value;
                 data.append('content',search);
                // Khởi tạo một hàm gửi ajax
                xmlhttp.onreadystatechange = function()
                {
                    // Nếu đối tượng XML HTTP trả về với hai thông số bên dưới thì mọi chuyện 
                    // coi như thành công
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        // Sau khi thành công tiến hành thay đổi nội dung của thẻ div, nội dung
                        // ở đây chính là 
                        var listLaptop=new Array();
                       document.getElementById('pc-search-filter').innerHTML = xmlhttp.responseText;
                      
                       
                    }
                };
                xmlhttp.open("POST", "validate/ajax/search.php", true);
                 
                // Cuối cùng là Gửi ajax, sau khi gọi hàm send thì function vừa tạo ở
                // trên (onreadystatechange) sẽ được chạy
                xmlhttp.send(data);
   }
   var input_search=document.getElementById('key-search');
   input_search.addEventListener('keyup',load_ajax);





