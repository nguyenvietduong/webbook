<div class="banner_trangchu">
        <div class="banner_khung">
            <img id="banner_trangchu" src="./img/banner/banner_trangchu/1.jpg" alt="" width="100%" height="100%">
        </div>
        <script src="./js/banner.js"></script>
    </div>
    
    <script>
        var img = ['./img/banner/banner_trangchu/1.jpg', './img/banner/banner_trangchu/2.jpg', './img/banner/banner_trangchu/3.jpg', './img/banner/banner_trangchu/4.jpg', './img/banner/banner_trangchu/5.jpg', './img/banner/banner_trangchu/6.jpg', './img/banner/banner_trangchu/7.jpg'];
        var dauTien = 0;
        var playInterval;

        function nextImg() {
            if (dauTien < img.length - 1) {
                dauTien++;
                document.getElementById('banner_trangchu').src = img[dauTien];
            } else {
                dauTien = 0;
                document.getElementById('banner_trangchu').src = img[dauTien];
            }
        }

        setInterval(nextImg, 2000);
    </script>
</div>