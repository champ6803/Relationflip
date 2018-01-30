@extends('layout.main')
@section('page_title','บันทึกข้อมูลหลังให้การปรึกษา')
@section('main-content')

<!--Page Title Start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-title-content">
                <h2 class="title page-text">บันทึกข้อมูลหลังการให้การปรึกษา</h2>
            </div>
        </div>
    </div>
</section>
<!--Page Title End-->

<!--Verify Form Start-->
<section class="co_pt boo_pb">
    <div class="container">
        <div class="row bo_pt validate">
            <div class="col-md-12">
                <h1 class="line-bottom fw-600 eo_mb bo_mt">บันทึกข้อมูลหลังการให้การปรึกษา</h1>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        รายละเอียดการให้การปรึกษา
                    </div>
                    <div class="panel-body counseling_disable">
                        <div class="row bo_pb counseling_details">
                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="row">
                                        <label class="col-md-4">ครั้งที่บริการให้การปรึกษา</label>
                                        <div class="col-md-2">
                                            <input disabled="" id="counseling_number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="row">
                                        <label class="col-md-4">วันที่ทำการให้การปรึกษา</label>
                                        <div class="col-md-4">
                                            <input disabled="" id="counseling_date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div id="time_app_only">
                                    <div class="form-horizontal">
                                        <div class="row">
                                            <label class="col-md-4">เวลาในการให้การปรึกษา</label>
                                            <label class="col-md-2 text-right">เริ่ม :</label>
                                            <div class="col-md-2"><input disabled="" id="start_time" type="input" class="form-control time start"></div>
                                        </div>
                                    </div>
                                    <div class="form-horizontal">
                                        <div class="row">
                                            <label class="col-md-offset-4 col-md-2 text-right">สิ้นสุด :</label>
                                            <div class="col-md-2"><input disabled="" id="end_time" type="input" class="form-control time end"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="row">
                                        <label class="col-md-5">คำปรึกษาตรง RF Index หรือไม่ <span class="color-theme">*</span></label>
                                        <label class="col-md-2 text-right">ตรง :</label>
                                        <div class="col-md-1">
                                            <input type="radio" name="rf_index" value="Y">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="row">
                                        <label class="col-md-offset-5 col-md-2 text-right">ไม่ตรง :</label>
                                        <div class="col-md-1">
                                            <input type="radio" name="rf_index" value="N">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="row">
                                        <label class="col-md-offset-5 col-md-2 text-right">โปรดระบุ :</label>
                                        <div class="col-md-5">
                                            <textarea type="input" id="other" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="row ao_pt">
                                        <label class="col-md-4">ตกลงบริการ <span class="color-theme">*</span></label>
                                        <div class="col-md-6">
                                            <textarea id="counseling_confirm" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="row">
                                        <label class="col-md-4">รหัสผู้รับการปรึกษา</label>
                                        <label id="employee_code" class="col-md-6"></label>
                                            <!--<input disabled="" id="employee_code" class="form-control">-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        สรุปสิ่งที่ผู้รับบริการกล่าวถึงใน RF Index
                    </div>
                    <div class="panel-body">
                        <div class="row bo_pb client_details">
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">สภาพแวดล้อมในการทำงาน</label>
                                                <div class="col-md-6">
                                                    <input id="environment_work" class="form-control counseling-select">
<!--                                                        <option value="0">-- กรุณาเลือก --</option>
                                                        <option value="1">ห้องพยาบาล</option>
                                                        <option value="2">ห้องสุขา</option>
                                                        <option value="3">โรงอาหาร</option>
                                                        <option value="4">อุณหภูมิในที่ทำงาน</option>
                                                        <option value="5">แสงสว่างในที่ทำงาน</option>
                                                        <option value="6">กลิ่นในที่ทำงาน</option>
                                                        <option value="7">เสียงในที่ทำงาน</option>
                                                        <option value="8">การดูแลความสะอาด</option>
                                                        <option value="9">ระบบอินเตอร์เน็ต</option>
                                                        <option value="10">อุปกรณ์สำนักงาน</option>
                                                        <option value="11">คอมพิวเตอร์</option>
                                                        <option value="12">ความปลอดภัย</option>
                                                        <option value="13">ความรุนแรงในที่ทำงาน</option>
                                                        <option value="14">มาตรการป้องกันอุบัติเหตุและการบาดเจ็บ</option>
                                                        <option value="15">การเสพยาเสพติด</option>
                                                        <option value="0">อื่นๆ</option>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">สุขภาพกาย</label>
                                                <div class="col-md-6">
                                                    <input id="physical_health" class="form-control counseling-select">
<!--                                                        <option value="0">-- กรุณาเลือก --</option>
                                                        <option value="1">ออฟฟิศซินโดรม</option>
                                                        <option value="2">นอนไม่หลับ</option>
                                                        <option value="3">ไมเกรน</option>
                                                        <option value="4">โรคร้ายแรง</option>
                                                        <option value="5">โรคเรื้อรัง/NCD</option>
                                                        <option value="6">พักผ่อนไม่เพียงพอ</option>
                                                        <option value="7">ออกกำลังกายไม่สม่ำเสนอ</option>
                                                        <option value="8">โรคอ้วน</option>
                                                        <option value="0">อื่นๆ</option>-->
                                                 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ao_pt">

                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">การบริหารองค์กร</label>
                                                <div class="col-md-6">
                                                    <input id="organ_manage" class="form-control counseling-select">
<!--                                                        <option value="0">-- กรุณาเลือก --</option>
                                                        <option value="1">การบริหารจัดการ</option>
                                                        <option value="2">การปฏิบัติต่อพนักงาน</option>
                                                        <option value="3">การเข้าถึงข้อมูลข่าวสาร</option>
                                                        <option value="4">โครงสร้างองค์กร</option>
                                                        <option value="5">การประเมินผลและการพัฒนาองค์กร</option>
                                                        <option value="6">การบริหารทรัพยากรบุคคล</option>
                                                        <option value="7">การตัดสินใจและแก้ปัญหา</option>
                                                        <option value="8">นโยบาย ขั้นตอนการปฏิบัติงาน</option>
                                                        <option value="9">ทิศทางชัดเจนโปร่งใส</option>
                                                        <option value="10">การสื่อสาร</option>
                                                        <option value="11">การบริหารความเปลี่ยนแปลง</option>
                                                        <option value="12">ความมั่นใจต่อผู้บริหาร/ภาวะผู้นำ</option>
                                                        <option value="13">ผู้บริหารสามารถเข้าถึงได้</option>
                                                        <option value="14">กฏระเบียบ/คู่มือพนักงาน</option>
                                                        <option value="0">อื่นๆ</option>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">สุขภาพจิต</label>
                                                <div class="col-md-6">
                                                    <input id="mental_health" class="form-control counseling-select">
<!--                                                        <option value="0">-- กรุณาเลือก --</option>
                                                        <option value="1">เครียด</option>
                                                        <option value="2">กังวล</option>
                                                        <option value="3">ภาวะซึมเศร้า</option>
                                                        <option value="4">ไม่มีความสุข</option>
                                                        <option value="5">พฤติกรรมทางอารมณ์</option>
                                                        <option value="6">ทำร้ายตนเอง</option>
                                                        <option value="7">ทำร้ายผู้อื่น</option>
                                                        <option value="8">ทำลายสิ่งของ</option>
                                                        <option value="9">ภาวะสูญเสียคนรัก</option>
                                                        <option value="10">ย้ำคิดย้ำทำ</option>
                                                        <option value="11">หลงลืมง่าย</option>
                                                        <option value="12">โลกส่วนตัวสูง</option>
                                                        <option value="13">อาการกลัว</option>
                                                        <option value="14">ความเชื่อ</option>
                                                        <option value="15">ภาพลักษณ์ในสังคม</option>
                                                        <option value="16">เกิดวิกฤตในชีวิต</option>
                                                        <option value="17">ติดยาเสพติด</option>
                                                        <option value="18">ติดพนัน</option>
                                                        <option value="19">ภาวะสูญเสียสัตว์เลี้ยง</option>
                                                        <option value="20">ล้มละลาย</option>
                                                        <option value="21">หลงตัวเอง</option>
                                                        <option value="22">พฤติกรรมทางบุคลิกภาพ</option>
                                                        <option value="23">ความสมดุลของชีวิต</option>
                                                        <option value="0">อื่นๆ</option>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row ao_pt">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">สัมพันธภาพในที่ทำงาน</label>
                                                <div class="col-md-6">
                                                    <input id="work_relation" class="form-control counseling-select">
<!--                                                        <option value="0">-- กรุณาเลือก --</option>
                                                        <option value="1">ความสัมพันธ์กับหัวหน้า</option>
                                                        <option value="2">ความสัมพันธ์กับลูกน้อง</option>
                                                        <option value="3">ความสัมพันธ์กับเพื่อนร่วมงาน</option>
                                                        <option value="4">ไม่มีเพือนในที่ทำงาน</option>
                                                        <option value="5">การทำงานเป็นทีม</option>
                                                        <option value="6">การเล่นพรรคเล่นพวก</option>
                                                        <option value="7">ความรู้สึกแปลกแยก</option>
                                                        <option value="0">อื่นๆ</option>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">ครอบครัว</label>
                                                <div class="col-md-6">
                                                    <input id="family" class="form-control counseling-select">
<!--                                                        <option value="0">-- กรุณาเลือก --</option>
                                                        <option value="1">ความสัมพันธ์กับพ่อแม่</option>
                                                        <option value="2">ความสัมพันธ์กับลูก</option>
                                                        <option value="3">ความสัมพันธ์กับคู่สามีภรรยา</option>
                                                        <option value="4">ความสัมพันธ์กับญาติพี่น้อง</option>
                                                        <option value="5">การอยู่กับครอบครัว</option>
                                                        <option value="6">การได้รับการสนันสนุนจากครอบครัว</option>
                                                        <option value="7">การได้รับการยอมรับจากครอบครัว</option>
                                                        <option value="8">การได้รับกำลังใจจากครอบครัว</option>
                                                        <option value="9">ไม่มีเวลาอยู่ด้วยกัน</option>
                                                        <option value="10">เด็กมีปัญหาทางพฤติกรรม</option>
                                                        <option value="11">ลูกเป็นเด็กพิเศษ</option>
                                                        <option value="12">สมาชิกในครอบครัวมีอาการทางจิตเวช</option>
                                                        <option value="13">สมาชิกในครอบครัวเป็นโรคร้ายแรง</option>
                                                        <option value="14">สมาชิกในครอบครัวเป็นโรคเรื้อรัง/NCD</option>
                                                        <option value="15">สมาชิกในครอบครัวเป็นเพศทางเลือก</option>
                                                        <option value="16">หย่าร้าง</option>
                                                        <option value="17">การนอกใจ</option>
                                                        <option value="18">สมาชิกในครอบครับติดเกมส์ อินเตอเน็ต โซเชียล เพื่อน แฟน</option>
                                                        <option value="19">คู่สามีภรรยามีปัญหาเรื่องเพศสัมพันธ์</option>
                                                        <option value="20">สมาชิกในครอบครัวมีเพศสัมพันธ์ในวัยเรียน</option>
                                                        <option value="0">อื่นๆ</option>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ao_pt">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">ความมั่นคงและความก้าวหน้าในงาน</label>
                                                <div class="col-md-6">
                                                    <input id="work_stable" class="form-control counseling-select">
<!--                                                        <option value="0">-- กรุณาเลือก --</option>
                                                        <option value="1">โอกาสในการเติบโต</option>
                                                        <option value="2">พัฒนาประสิทธิภาพการทำงาน</option>
                                                        <option value="3">ความท้าทายในการทำงาน</option>
                                                        <option value="4">งานไม่ตรงสายงาน/งานไม่ชัดเจน</option>
                                                        <option value="5">โอกาสในการพัฒนาตนเอง</option>
                                                        <option value="6">โอกาสในการลาออก</option>
                                                        <option value="7">การย้ายสายงาน</option>
                                                        <option value="8">เบื่องาน</option>
                                                        <option value="9">รู้สึกไม่มั่นคงในที่ทำงาน</option>
                                                        <option value="10">การดูแลรักษาพนักงาน</option>
                                                        <option value="11">ความผูกพันต่อองค์กร</option>
                                                        <option value="12">การสนับสนุนจากหัวหน้าและองค์กร</option>
                                                        <option value="0">อื่นๆ</option>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">เพื่อน</label>
                                                <div class="col-md-6">
                                                    <input id="friend" class="form-control counseling-select">
<!--                                                        <option value="0">-- กรุณาเลือก --</option>
                                                        <option value="1">ไม่มีเพื่อนสนิท</option>
                                                        <option value="2">ไม่มีเพื่อนรับฟังปัญหา</option>
                                                        <option value="3">ไม้ได้รับการสนันสนุนจากเพื่อน</option>
                                                        <option value="4">ไม่ได้รับการยอมรับจากเพื่อน</option>
                                                        <option value="5">ทะเลาะกับเพื่อน</option>
                                                        <option value="6">การได้รับกำลังใจจากเพื่อน</option>
                                                        <option value="7">เพื่อนชักชวนไปในทางที่เสียหาย</option>
                                                        <option value="8">ถูกเหยียดสีผิว</option>
                                                        <option value="9">ถูกเหยียดเชื้อชาติ</option>
                                                        <option value="10">ถูกเหยียดศาสนา</option>
                                                        <option value="11">ถูกเปรียบเทียบแข่งขัน</option>
                                                        <option value="0">อื่นๆ</option>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ao_pt">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">การเป็นที่ยอมรับและรู้สึกมีคุณค่าในตนเอง</label>
                                                <div class="col-md-6">
                                                    <input id="self_esteem" class="form-control counseling-select">
<!--                                                        <option value="0">-- กรุณาเลือก --</option>
                                                        <option value="1">การยอมรับในที่ทำงาน</option>
                                                        <option value="2">การเมืองในที่ทำงาน</option>
                                                        <option value="3">ความไม่ยุติธรรม</option>
                                                        <option value="4">ความไม่สามัคคีกัน</option>
                                                        <option value="5">บทบาทในที่ทำงาน</option>
                                                        <option value="6">โอกาสในการตัดสินใจ</option>
                                                        <option value="7">กำลังใจในการทำงาน</option>
                                                        <option value="8">แรงจูงใจในการทำงาน</option>
                                                        <option value="9">ความนับถือตนเอง</option>
                                                        <option value="10">ความภูมิใจในงานที่ทำ</option>
                                                        <option value="11">ทัศนคติในการทำงาน</option>
                                                        <option value="12">รับฟังและเปิดให้พนักงานมีส่วนร่วม</option>
                                                        <option value="0">อื่นๆ</option>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">ความมั่นคงทางการเงิน</label>
                                                <div class="col-md-6">
                                                    <input id="money_stable" class="form-control counseling-select">
<!--                                                        <option value="0">-- กรุณาเลือก --</option>
                                                        <option value="1">หนี้บัตรเครดิต</option>
                                                        <option value="2">หนี้ในระบบ</option>
                                                        <option value="3">หนี้นอกระบบ</option>
                                                        <option value="4">ไม่มีเงินเก็บ</option>
                                                        <option value="5">เงินไม่พอใช้</option>
                                                        <option value="6">ฟุ่มเฟือย</option>
                                                        <option value="7">ขาดความรู้ในการบริหารจัดการเงิน</option>
                                                        <option value="8">หนี้ที่ตัวเองไม่ได้ก่อ เช่น ค้ำประกัน</option>
                                                        <option value="0">อื่นๆ</option>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row ao_pt">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">ผลประโยชน์และค่าตอบแทน</label>
                                                <div class="col-md-6">
                                                    <input id="benefit" class="form-control counseling-select">
<!--                                                        <option value="0">-- กรุณาเลือก --</option>
                                                        <option value="1">เงินเดือนหรือค่าตอบแทน</option>
                                                        <option value="2">สวัสดิการ</option>
                                                        <option value="3">วันหยุดวันลาที่เหมาะสม</option>
                                                        <option value="4">ค่ารักษาพยาบาล</option>
                                                        <option value="5">โอที</option>
                                                        <option value="6">โบนัส</option>
                                                        <option value="7">ชั่วโมงการทำงาน-เวลาพักที่เหมาะสม </option>
                                                        <option value="8">ความยืดหยุ่นในการทำงาน</option>
                                                        <option value="9">ระบบการให้รางวัล</option>
                                                        <option value="10">เงินช่วยเหลืออื่นๆ เช่น ค่าเดินทาง ค่าเล่าเรียนบุตร</option>
                                                        <option value="0">อื่นๆ</option>
                                                    </select>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-success">
                    <div class="panel-heading">
                        สรุปผลหลังการปรึกษา
                    </div>
                    <div class="panel-body counseling_disable">
                        <div class="row bo_pb counseling_result">
                            <div class="col-md-12">

                                <div class="row ao_pt">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">สภาพปัญหาทั่วไป <span class="color-theme">*</span></label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="general_prob"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">แนวทางการติดตามผล <span class="color-theme">*</span></label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="follow"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ao_pt">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">การสำรวจปัญหา <span class="color-theme">*</span></label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="discover_prob"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">ข้อเสนอแนะประเด็นอื่นๆ/ข้อควรระวัง <span class="color-theme">*</span></label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="suggest"></textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ao_pt">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">ดำเนินการแก้ไขปัญหา/เข้าใจปัญหา <span class="color-theme">*</span></label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="fix_prob"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">การส่งต่อ <span class="color-theme">*</span></label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="refer"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ao_pt">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">สรุปการปรึกษา <span class="color-theme">*</span></label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="result"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-10">สรุปผลการปรึกษาและข้อเสนอแนะสำหรับ <span class="color-theme">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ao_pt">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">ประเมินผลการปรึกษา <span class="color-theme">*</span></label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="assessment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-2">Company Report <span class="color-theme">*</span></label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" id="company_result"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row ao_pt">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <label class="col-md-4">นัดหมายครั้งต่อไป</label>
                                                <label class="col-md-1">วัน</label>
                                                <div class="col-md-4">
                                                    <input class="form-control" id="next_appointment_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="row ao_pt">
                                                <label class="col-md-2">Client Report <span class="color-theme">*</span></label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" id="client_result"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="time_only">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal">
                                                <div class="row">
                                                    <label class="col-md-offset-4 col-md-1">เวลา</label>
                                                    <label class="col-md-2 text-right">เริ่ม :</label>
                                                    <div class="col-md-2">
                                                        <input class="form-control time start" id="next_appointment_start">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal">
                                                <div id="time_only" class="row">
                                                    <label class="col-md-offset-5 col-md-2 text-right">สิ้นสุด :</label>
                                                    <div class="col-md-2">
                                                        <input disabled="" class="form-control time end" id="next_appointment_end">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="status_recorded row bo_pt">
                <div class="col-md-12" align="center">
                    <button id="btn_profile" onclick="btn_profile()" class="btn btn-primary btn-lg btn-round">ดูผลการประเมิน
                    </button>
                    <button id="btn_submit" class="btn btn-success btn-lg btn-round">บันทึกผลการปรึกษา
                    </button>
                    <button id="btn_end" class="btn btn-warning btn-lg btn-round">ยุติการปรึกษา
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--Verify Form End-->

<div class="modal fade" id="saveModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style= "background-color: #1ABC9C;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" style="text-transform:uppercase; color: white">Confirm</h2>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <p class="bo_pb">คุณต้องการบันทึก ใช่หรือไม่ ?</p>
                    <button style="text-align: center;" onclick="getValueFromDisplay('save')"  id="saveBtn" type="button" class="btn btn-success btn-round" data-dismiss="modal">ตกลง</button>
                    <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="endModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style= "background-color: #1ABC9C;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" style="text-transform:uppercase; color: white">Confirm</h2>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <p class="bo_pb">คุณต้องการยุติการปรึกษา ใช่หรือไม่ ?</p>
                    <button style="text-align: center;" onclick="getValueFromDisplay('end')"  id="saveBtn" type="button" class="btn btn-success btn-round" data-dismiss="modal">ตกลง</button>
                    <button style="text-align: center;" id="cancelsaveBtn" type="button" class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/meetingRecord.js"></script>
@stop