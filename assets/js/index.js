 $(document).ready(function() {
    // 1. جلب بيانات الموقع
    $.ajax({
        type: "POST",
        url: "dashbord/proccess.php",
        data: { action: "getData" },
        dataType: "json",
        success: function(siteData) {
            // تحديث معلومات الموقع
            $(".navbar-brand h2").text(siteData.title);
            $("#facebook").attr("href", siteData.facebook);
            $("#twitter").attr("href", siteData.twitter);
            $("#instagram").attr("href", siteData.instagram);
            
            // 2. جلب بيانات السلايدر
            loadSliderData();
        },
        error: function(xhr, status, error) {
            console.error("فشل جلب بيانات الموقع:", error);
        }
    });

    // دالة منفصلة لجلب بيانات السلايدر
    function loadSliderData() {
        $.ajax({
            type: "POST",
            url: "dashbord/proccess.php?table=slid",
            data: { action: "getData" },
            dataType: "json",
            success: function(sliderData) {
                renderSlider(sliderData);
            },
            error: function(xhr, status, error) {
                console.error("فشل جلب بيانات السلايدر:", error);
                // استخدم بيانات افتراضية في حالة الفشل
                const defaultData = [
                    {
                        imageUpload: "banner-item-01.jpg",
                        subTitle: "LIFESTYLE",
                        blogTitle: "Default Slide 1",
                        bloggerName: "Admin",
                        publishDate: "May 31, 2023",
                        commentsCount: 10
                    },
                    {
                        imageUpload: "banner-item-02.jpg",
                        subTitle: "FASHION",
                        blogTitle: "Default Slide 2",
                        bloggerName: "Admin",
                        publishDate: "May 31, 2023",
                        commentsCount: 15
                    }
                ];
                renderSlider(defaultData);
            }
        });
    }

    // دالة لعرض السلايدر
    function renderSlider(data) {
        const $slider = $("#dynamic-banner");
        $slider.html(''); // امسح المحتوى الحالي
        
        // أضف العناصر الجديدة
        data.forEach(item => {
            const slide = `
            <div class="item">
                <img src="assets/images/${item.imageUpload || 'banner-item-01.jpg'}" alt="${item.blogTitle}">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>${item.subTitle || 'CATEGORY'}</span>
                        </div>
                        <a href="post-details.html"><h4>${item.blogTitle}</h4></a>
                        <ul class="post-info">
                            <li><a href="#">${item.bloggerName || 'Admin'}</a></li>
                            <li><a href="#">${item.publishDate || new Date().toLocaleDateString()}</a></li>
                            <li><a href="#">${item.commentsCount || 0} تعليقات</a></li>
                        </ul>
                    </div>
                </div>
            </div>`;
            $slider.append(slide);
        });

        // تأكد من تدمير أي نسخة سابقة من السلايدر
        if ($slider.hasClass('owl-loaded')) {
            $slider.trigger('destroy.owl.carousel');
        }
        
        // أعد تهيئة السلايدر مع الخيارات
        $slider.owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1000,
            responsive: {
                0: { items: 1 },
                600: { items: 1 },
                1000: { items: 1 }
            }
        });
    }
});