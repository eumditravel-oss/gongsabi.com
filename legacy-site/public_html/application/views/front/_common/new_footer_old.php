    <footer class="footer_area">
        <div class="foo_top_header_one section_padding_50 text-center">
            <div class="container">
                <!-- <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="single_foo_part">
                            <h5>(주)공사비닷컴</h5>
                            <div class="foo_single_contact_info">
                                <p>대표이사 : 현동명</p>
                                <p>사업자등록번호 : 215-86-08382</p>
                                <p>통신판매업신고번호 : 2017-서울송파-2115호</p>
                                <p>주소 : (05585) 서울시 송파구 백제고분37길 6, 송원빌딩 6층</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single_foo_part">
                            <h5>고객센터</h5>
                            <div class="foo_single_contact_info">
                                <p>서비스 이용문의 : 070-4048-1315</p>
                                <p>이메일 : kaum@con-cost.com</p>
                                <p>서비스 제휴문의 : kaum@con-cost.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2">
                        <div class="single_foo_part">
                            <h5>공사비닷컴</h5>
                            <ul class="imp_links">
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>회사소개</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>이용약관</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>개인정보처리방침</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>고객센터</a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="service_links">
                            <a href="/front/company" class="mx-2">회사소개</a> | <a href="/front/company/term" class="mx-2">이용약관</a> | <a href="/front/company/privacy" class="mx-2">개인정보처리방침</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="company_info">
                            상호 : <?php echo $this->config->item('SITE_INFO')['COMPANY_NAME']; ?> | 대표 : <?php echo $this->config->item('SITE_INFO')['CEO_NAME']; ?> | 사업자등록번호 : <?php echo $this->config->item('SITE_INFO')['BUSINESS_NUMBER']; ?><br>
                            주소 : <?php echo $this->config->item('SITE_INFO')['ADDRESS']; ?><br>
                            전화 : <?php echo $this->config->item('SITE_INFO')['TEL1']; ?> | 팩스 : <?php echo $this->config->item('SITE_INFO')['FAX1']; ?><br>
                            통신판매업 신고번호 : <?php echo $this->config->item('SITE_INFO')['SALES_NUMBER']; ?><br>
                            서비스 이용문의 : <?php echo $this->config->item('SITE_INFO')['TEL2']; ?> | 이메일 : <?php echo $this->config->item('SITE_INFO')['EMAIL1']; ?> | 서비스 제휴문의 : <?php echo $this->config->item('SITE_INFO')['EMAIL2']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="foo_bottom_header_one section_padding_50 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>Copyright © 2020 <a href="<?php echo $this->config->item('site_url'); ?>" target="_blank"><?php echo $this->config->item('site_name'); ?></a>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- 공사비 상세 MODAL -->
    <div class="modal fade" id="gongsabi_info" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog custom-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gongsabi_info_title">공사비 상세</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal">닫기</button>
                    <?php if ( $this->session->userdata('MEMBER')['member_type'] == '2' ) { ?>
                    <button type="button" class="btn btn-sm btn-success" onclick="scrap_gongsabi();">스크랩</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
    <script src="/static/front/slidea-assets/js/gsap/tweenlite.js" type="text/javascript"></script>
    <script src="/static/front/slidea-assets/js/gsap/plugins/css.js" type="text/javascript"></script>
    <script src="/static/front/slidea-assets/js/gsap/easing/easepack.js" type="text/javascript"></script>
    <script src="/static/front/slidea-assets/js/animus/animus.js" type="text/javascript"></script>
    <script src="/static/front/slidea-assets/js/animus/presets/default.js" type="text/javascript"></script>
    <script src="/static/front/slidea-assets/js/hammer/hammer.js" type="text/javascript"></script>
    <script src="/static/front/slidea-assets/js/mousewheel/mousewheel.js" type="text/javascript"></script>
    <script src="/static/front/slidea-assets/js/slidea/slidea.js" type="text/javascript"></script>
    <script src="/static/front/slidea-assets/js/templates/default-slider-active.js" type="text/javascript"></script>

    <script src="/static/front/js/include-all-plugins.js"></script>
    <script src="/static/front/js/active.js"></script>
    <script src="/static/js/util.js"></script>
    <script src="/static/js/gongsabi.js"></script>

    <?php
    // 에러 메시지가 있다면
    if ( $this->session->flashdata('SESSION_MESSAGE') ) {
    ?>
    <script>
    setTimeout(function() {
        alert("<?php echo $this->session->flashdata('SESSION_MESSAGE'); ?>");
    }, 500);
    </script>
    <?php
        }
    ?>

</body>

</html>