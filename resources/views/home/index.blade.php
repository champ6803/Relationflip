@extends('layout.main')
@section('page_title','Welcome to Relationflip')

@section('main-content')

<!--Main Slider Start-->
<section class="home-slider">
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <li data-transition="fade" data-slotamount="1" data-masterspeed="1000"
                    data-thumb="images/home-slider/Relationships.jpg" data-saveperformance="off"
                    data-title="Relationships">
                    <img src="images/home-slider/Relationships.jpg" alt="" data-bgposition="center center"
                         data-bgfit="cover" data-bgrepeat="no-repeat">

                    <div class="tp-caption lfb tp-resizeme"
                         data-x="center" data-hoffset="15"
                         data-y="center" data-voffset="-80"
                         data-speed="1500"
                         data-start="500"
                         data-easing="easeOutExpo"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.3"
                         data-endspeed="1200"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div class="big-title"><h2 class="slide-bg-theme">Flip for better Relationships</h2></div>
                    </div>

                    <div class="tp-caption lfb tp-resizeme"
                         data-x="center" data-hoffset="15"
                         data-y="center" data-voffset="-10"
                         data-speed="1500"
                         data-start="750"
                         data-easing="easeOutExpo"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.3"
                         data-endspeed="1200"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div class="big-title"><h2 class="slide-bg-theme slide-bg-black slide-psm">
                                ปรึกษาเพื่อความสัมพันธ์ที่ดีขึ้น ทั้งในเรื่องของศักยภาพการทำงานและชีวิตส่วนตัว</h2>
                        </div>
                    </div>

                    <div class="tp-caption lfb tp-resizeme"
                         data-x="center" data-hoffset="15"
                         data-y="center" data-voffset="65"
                         data-speed="1500"
                         data-start="1000"
                         data-easing="easeOutExpo"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.3"
                         data-endspeed="1200"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div id="link_1" class="link-btn">
                            <a onclick="checkScoreToPage()" href="javascript:void(0)"
                               class="btn-theme btn-round">เริ่มต้นรับบริการ&nbsp;<i
                                    class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </li>

                <li data-transition="slideup" data-slotamount="1" data-masterspeed="1000"
                    data-thumb="images/home-slider/Feelings.jpg" data-saveperformance="off"
                    data-title="With Awsome Services">
                    <img src="images/home-slider/Feelings.jpg" alt="" data-bgposition="center center" data-bgfit="cover"
                         data-bgrepeat="no-repeat">

                    <div class="tp-caption lfb tp-resizeme"
                         data-x="right" data-hoffset="-15"
                         data-y="center" data-voffset="-80"
                         data-speed="1500"
                         data-start="500"
                         data-easing="easeOutExpo"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.3"
                         data-endspeed="1200"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div class="big-title"><h2 class="slide-bg-theme">Flip for better Feelings</h2></div>
                    </div>

                    <div class="tp-caption lfb tp-resizeme"
                         data-x="right" data-hoffset="-15"
                         data-y="center" data-voffset="-10"
                         data-speed="1500"
                         data-start="1000"
                         data-easing="easeOutExpo"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.3"
                         data-endspeed="1200"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div class="big-title"><h2 class="slide-bg-theme slide-bg-black slide-psm">ปรึกษาเพื่ออารมณ์
                                ความรู้สึกที่ดีขึ้น ทั้งในเรื่องของศักยภาพการทำงานและชีวิตส่วนตัว</h2></div>
                    </div>

                    <div class="tp-caption lfb tp-resizeme"
                         data-x="right" data-hoffset="-15"
                         data-y="center" data-voffset="65"
                         data-speed="1500"
                         data-start="1500"
                         data-easing="easeOutExpo"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.3"
                         data-endspeed="1200"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div id="link_2" class="link-btn"><a onclick="checkScoreToPage()" href="javascript:void(0)"
                                                 class="btn-theme btn-round">เริ่มต้นรับบริการ&nbsp;<i
                                    class="fa fa-arrow-circle-right"></i></a></div>
                    </div>


                </li>

                <li data-transition="fade" data-slotamount="1" data-masterspeed="1000"
                    data-thumb="images/home-slider/Productivities.jpg" data-saveperformance="off" data-title="We are Awsome">
                    <img src="images/home-slider/Productivities.jpg" alt="" data-bgposition="center center" data-bgfit="cover"
                         data-bgrepeat="no-repeat">


                    <div class="tp-caption lfb tp-resizeme"
                         data-x="left" data-hoffset="15"
                         data-y="center" data-voffset="-80"
                         data-speed="1500"
                         data-start="500"
                         data-easing="easeOutExpo"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.3"
                         data-endspeed="1200"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div class="big-title"><h2 class="slide-bg-theme">FLIP FOR BETTER ENGAGEMENT</h2>
                        </div>
                    </div>

                    <div class="tp-caption lfb tp-resizeme"
                         data-x="left" data-hoffset="15"
                         data-y="center" data-voffset="-10"
                         data-speed="1500"
                         data-start="1000"
                         data-easing="easeOutExpo"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.3"
                         data-endspeed="1200"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div class="big-title"><h2 class="slide-bg-theme slide-bg-black slide-psm">
                                ปรึกษาเพื่อความผูกพันระหว่างพนักงานในองค์กร  ศักยภาพการทำงานและชีวิตส่วนตัว</h2>
                        </div>
                    </div>

                    <div class="tp-caption lfb tp-resizeme"
                         data-x="left" data-hoffset="15"
                         data-y="center" data-voffset="65"
                         data-speed="1500"
                         data-start="1500"
                         data-easing="easeOutExpo"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.3"
                         data-endspeed="1200"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div id="link_3" class="link-btn"><a onclick="checkScoreToPage()" href="javascript:void(0)"
                                                 class="btn-theme btn-round">เริ่มต้นรับบริการ&nbsp;<i
                                    class="fa fa-arrow-circle-right"></i></a></div>
                    </div>

                </li>

            </ul>

            <div class="tp-bannertimer"></div>
        </div>
    </div>
</section>
<!--Main Slider End-->

<!--Client Divider Start-->
<section class="bgcolor-theme">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="client-slider owlnav-true owl-nav3">
                    <a href="http://www.setsocialimpact.com/Company/Profile/110"><img src="images/client/1.png" alt="client-logo"></a>
                    <a href="https://www.dailynews.co.th/article/508493"><img src="images/client/2.png" alt="client-logo"></a>
                    <a href="http://www.bangkokbiznews.com/news/detail/763122"><img src="images/client/3.png" alt="client-logo"></a>
                    <a href="#"><img src="images/client/4.png" alt="client-logo"></a>
                    <a href="http://www.manager.co.th/OnlineSection/ViewNews.aspx?NewsID=9590000050483"><img src="images/client/5.png" alt="client-logo"></a>
                    <a href="#"><img src="images/client/6.png" alt="client-logo"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Client Divider End-->

<!--Feature Section Start-->
<section class="go_pt ho_pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12 section-title text-center">
                <h1 class="title">Relationflip : For The Better Version Of Yourself<br><br>
                    <span>“เพื่อคุณคนใหม่ ที่รู้สึกดีขึ้นกว่าเมื่อวาน”</span></h1>
                <p class="sub-title text-center">
                    เรามีความตั้งใจที่จะพัฒนาคุณภาพชีวิตของมนุษย์ทั้งในแง่ศักยภาพการทำงานและชีวิตส่วนตัว ในรูปแบบ
                    1:1 ผ่านกระบวนการ Relationflip Analytical Counselling(RFAC) ด้วยทีมงาน Analytical Counselor
                    ที่มีประสบการณ์ด้านจิตวิทยาที่หลากหลาย ครอบคลุมทุกมิติของชีวิต
                    ระบบของเราถูกออกแบบมาเพื่อให้ผู้รับบริการสามารถเลือกหัวข้อที่ต้องการปรึกษาได้ด้วยตนเอง<br>จากการประเมินเบื้องต้นด้วย
                    RF Index ซึ่งเป็นลิขสิทธิ์เฉพาะของ Relationflip
                    ซึ่งใช้ในการประเมินสุขภาพองค์กร<br>และเรื่องส่วนตัวแบบองค์รวม</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-lg-offset-0 section-title text-center">
                <h1 class="title">ขั้นตอนการรับบริการ กับ <span>Relationflip</span></h1>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="min-alert">
                    <div class="service-box">
                        <img src="images/service4.png">
                        <h2>แบบประเมิน RF Index</h2>
                        <h3 class="text-muted text-center">เริ่มต้นด้วยการทำแบบประเมิน<br> RF Index ของคุณ เพื่อนำข้อมูลการประเมินผล
                            เข้าสู่ระบบ<br>RF Analytical Counselling</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">

                <div class="min-alert">
                    <div class="service-box">
                        <img src="images/service3.png">
                        <h2>ตรวจสอบประวัติ</h2>
                        <h3 class="text-muted text-center">คุณสามารถเลือก Analytical Counselor ได้ด้วยตนเอง<br>
                            โดยเลือกจากประวัติการทำงาน หัวข้อในการให้คำปรึกษา <br>และความสามารถเฉพาะทาง</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="min-alert">
                    <div class="service-box">
                        <img src="images/service1.png">
                        <h2>ตอบสนองทุกรูปแบบ</h2>
                        <h3 class="text-muted text-center">คุณสามารถจองวัน-เวลานัดหมายเพื่อรับการปรึกษาผ่าน Smart Phone หรือ Tablet
                            ง่ายๆเพียงปลายนิ้ว</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="min-alert">
                    <div class="service-box">
                        <img src="images/service2.png">
                        <h2>ปรึกษาได้ทุกเรื่อง</h2>
                        <h3 class="text-muted text-center">ผ่านระบบโทรศัพท์ ไม่ว่าจะเป็นเรื่องการพัฒนาศักยภาพ<br>การทำงาน การค้นหาตนเอง
                            <br>ความสัมพันธ์</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Feature Section End-->

<!--Testimonials Section Start-->
<!--        <section id="testimonials" class="theme-overlay overlay-white bg-img img-2 io_pt fo_pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title text-center">
                    <h1 class="title">ทีมงานของ&nbsp;<span>Relationflip</span></h1>
                    <h5 class="sub-title sub-title-center">ทีมงาน RF Analytical Counselors
                        ที่มีประสบการณ์ด้านจิตวิทยา
                        ครอบคลุมทุกเรื่องราวที่ต้องการปรึกษา เช่น ความรัก ความสัมพันธ์ ความเครียดจากการทำงาน
                        ฯลฯ</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-slider">
                        <div class="item">
                            <div class="testimonial-post">
                                <div class="thumb">
                                    <img src="images/photos/Doctors/rf001.jpg" alt="">
                                </div>
                                <h5 class="testimonial-name">ชินธิดา วิจิตรโสภาพันธ์</h5>
                                <h5 class="sub-title">RF001</h5>
                                <p>" The harder you work at something, the better you will be at it. "</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-post">
                                <div class="thumb">
                                    <img src="images/photos/Doctors/rf003.jpg" alt="">
                                </div>
                                <h5 class="testimonial-name">ศศิประภา กระจ่างประทีป</h5>
                                <h5 class="sub-title">RF002</h5>
                                <p>" เพราะได้รับมามากพอ จึงเรียนรู้ที่จะให้ "</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-post">
                                <div class="thumb">
                                    <img src="images/photos/Doctors/rf004.jpg" alt="">
                                </div>
                                <h5 class="testimonial-name">ชญานภัส จิตตรัตน์</h5>
                                <h5 class="sub-title">RF003</h5>
                                <p>" เที่ยวทุกฤดู ซึ่งไม่เกี่ยวอะไรกับจิตวิทยาเลย 555 "</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-post">
                                <div class="thumb">
                                    <img src="images/photos/Doctors/rf005.jpg" alt="">
                                </div>
                                <h5 class="testimonial-name">พชลลดา ขูวณิชชานนท์</h5>
                                <h5 class="sub-title">RF004</h5>
                                <p>
                                    "
                                    ดิฉันยินดีที่รับฟังและพูดคุยด้วยมิตรภาพเป็นเพื่อนในการก้าวข้ามผ่านความท้าทายต่างๆในชีวิตของคุณ
                                    ด้วยความรู้และจรรยาบรรณของนักจิตวิทยา "</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
<!--Testimonials Section End-->

<!--Gallery Section Start-->
<section id="gallery" class="bo_pt do_pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12 section-title text-center">
                <h1 class="title">Relationflip&nbsp;<span>Topic</span></h1>
                <h5 class="sub-title sub-title-center">หัวข้อให้คำปรึกษา
                    เพื่อให้ผู้รับบริการสามารถเลือกหัวข้อได้ตรงหรือใกล้เคียงกับสิ่งที่ต้องการปรึกษามากที่สุด</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="portfolio-area">

                    <div class="isotopeFilter">

                        <a href="#" data-filter="*" class="current">All</a>
                        <a href="#" data-filter=".filter_i1">Organization</a>
                        <a href="#" data-filter=".filter_i2">Personal Life</a>

                    </div>

                    <div class="isotopeContainer isotop-colunm4 isotop-gutter">

                        <div class="isotope-item filter_i1">
                            <div class="isotop-thumb">
                                <img src="images/gallery/work1.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/work1.jpg"
                                           title="ความสัมพันธ์กับหัวหน้างาน"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">ความสัมพันธ์กับหัวหน้างาน</p>
                        </div>

                        <div class="isotope-item filter_i1">
                            <div class="isotop-thumb">
                                <img src="images/gallery/work2.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/work2.jpg"
                                           title="ความสัมพันธ์กับเพื่อนร่วมงาน"><i
                                                class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">ความสัมพันธ์กับเพื่อนร่วมงาน</p>
                        </div>

                        <div class="isotope-item filter_i1">
                            <div class="isotop-thumb">
                                <img src="images/gallery/work3.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/work3.jpg"
                                           title="การเปลี่ยนสายงาน ย้ายเเผนก"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">การเปลี่ยนสายงาน ย้ายเเผนก</p>
                        </div>

                        <div class="isotope-item filter_i1">
                            <div class="isotop-thumb">
                                <img src="images/gallery/work4.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/work4.jpg"
                                           title="พัฒนาประสิทธิภาพการทำงาน"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">พัฒนาประสิทธิภาพการทำงาน</p>
                        </div>

                        <div class="isotope-item filter_i1">
                            <div class="isotop-thumb">
                                <img src="images/gallery/work5.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/work5.jpg"
                                           title="ค้นหาศักยภาพตนเอง"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">ค้นหาศักยภาพตนเอง</p>
                        </div>

                        <div class="isotope-item filter_i1">
                            <div class="isotop-thumb">
                                <img src="images/gallery/work6.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/work6.jpg"
                                           title="ความเครียดจากการทำงาน"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">ความเครียดจากการทำงาน</p>
                        </div>

                        <div class="isotope-item filter_i1">
                            <div class="isotop-thumb">
                                <img src="images/gallery/work7.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/work7.jpg"
                                           title="การเติบโตในองค์กร"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">การเติบโตในองค์กร</p>
                        </div>

                        <div class="isotope-item filter_i1">
                            <div class="isotop-thumb">
                                <img src="images/gallery/work8.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/work8.jpg"
                                           title="เเรงจูงใจ ความท้าทายในการทำงาน"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">เเรงจูงใจ ความท้าทายในการทำงาน</p>
                        </div>


                        <div class="isotope-item filter_i2">
                            <div class="isotop-thumb">
                                <img src="images/gallery/life1.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/life1.jpg"
                                           title="ความรัก ความสัมพันธ์"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">ความรัก ความสัมพันธ์</p>
                        </div>

                        <div class="isotope-item filter_i2">
                            <div class="isotop-thumb">
                                <img src="images/gallery/life2.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/life2.jpg"
                                           title="สุขภาพกาย ออฟิศซินโรม"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">สุขภาพกาย ออฟิศซินโรม</p>
                        </div>

                        <div class="isotope-item filter_i2">
                            <div class="isotop-thumb">
                                <img src="images/gallery/life3.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/life3.jpg"
                                           title="เด็กเล็ก-วัยรุ่น"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">เด็กเล็ก-วัยรุ่น</p>
                        </div>

                        <div class="isotope-item filter_i2">
                            <div class="isotop-thumb">
                                <img src="images/gallery/life4.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/life4.jpg"
                                           title="เพศที่สาม เพศทางเลือก"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">เพศที่สาม เพศทางเลือก</p>
                        </div>

                        <div class="isotope-item filter_i2">
                            <div class="isotop-thumb">
                                <img src="images/gallery/life5.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/life5.jpg"
                                           title="ความมั่นคงทางการเงิน"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">ความมั่นคงทางการเงิน</p>
                        </div>

                        <div class="isotope-item filter_i2">
                            <div class="isotop-thumb">
                                <img src="images/gallery/life6.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/life6.jpg"
                                           title="สุขภาพจิต ความสูญเสีย ภาวะซึมเศร้า"><i
                                                class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">สุขภาพจิต ความสูญเสีย ภาวะซึมเศร้า</p>
                        </div>

                        <div class="isotope-item filter_i2">
                            <div class="isotop-thumb">
                                <img src="images/gallery/life7.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/life7.jpg"
                                           title="ครอบครัว"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">ครอบครัว</p>
                        </div>

                        <div class="isotope-item filter_i2">
                            <div class="isotop-thumb">
                                <img src="images/gallery/life8.jpg" alt="image">
                                <div class="isotop-overlay">
                                    <div class="isotop-icons">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a class="lightbox-image" href="images/gallery/life8.jpg"
                                           title="ผู้สูงอายุ"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">ผู้สูงอายุ</p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!--Gallery Section End-->
@stop