    <footer>
        <div class="footer_wrapper">
            <div class="footer_left_area">
                <ul class="footer_menu">
                    <?php foreach ($this->config->item('BOTTOM_MENU1')[$this->config->item('SITE_LANGUAGE')] as $menu) { ?>
                    <li><a href="<?php echo $menu['link']; ?>"><?php echo $menu['name']; ?></a></li>
                    <?php } ?>
                </ul>
                <table class="footer_info">
                    <tr>
                        <th><?php echo $this->config->item('BOTTOM_MENU2')[$this->config->item('SITE_LANGUAGE')]['COMPANY_NAME']['name']; ?></th>
                        <td><b><?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['COMPANY_NAME']; ?></b></td>
                    </tr>
                    <tr>
                        <th><?php echo $this->config->item('BOTTOM_MENU2')[$this->config->item('SITE_LANGUAGE')]['CEO_NAME']['name']; ?></th>
                        <td><?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['CEO_NAME']; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo $this->config->item('BOTTOM_MENU2')[$this->config->item('SITE_LANGUAGE')]['BUSINESS_NUMBER']['name']; ?></th>
                        <td><?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['BUSINESS_NUMBER']; ?>&nbsp;<!-- <a href="/static/file/gongsabi.pdf" class="biz_info" target="_blank"> --><a href="https://www.ftc.go.kr/bizCommPop.do?wrkr_no=<?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['BUSINESS_ONLY_NUMBER']; ?>" target="_blank"><?php echo $this->config->item('BOTTOM_MENU2')[$this->config->item('SITE_LANGUAGE')]['BUSINESS_INFORMATION']['name']; ?></a></td>
                    </tr>
                    <tr>
                        <th><?php echo $this->config->item('BOTTOM_MENU2')[$this->config->item('SITE_LANGUAGE')]['SALES_NUMBER']['name']; ?></th>
                        <td><?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['SALES_NUMBER']; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo $this->config->item('BOTTOM_MENU2')[$this->config->item('SITE_LANGUAGE')]['PRIVACY_NAME']['name']; ?></th>
                        <td><?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['PRIVACY_NAME']; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo $this->config->item('BOTTOM_MENU2')[$this->config->item('SITE_LANGUAGE')]['ADDRESS']['name']; ?></th>
                        <td><?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['ADDRESS']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="footer_right_area">
                <ul class="footer_sns">
                    <!-- <li><a href="https://pf.kakao.com/_sxlUZK" target="_blank"><?php echo $this->config->item('BOTTOM_MENU3')[$this->config->item('SITE_LANGUAGE')]['SNS_KAKAO']['name']; ?></a></li>
                    <li><a href="#"><?php echo $this->config->item('BOTTOM_MENU3')[$this->config->item('SITE_LANGUAGE')]['SNS_FACEBOOK']['name']; ?></a></li>
                    <li><a href="https://www.youtube.com/channel/UCiUVqgF9TAgkL36F-w4CGcg" target="_blank"><?php echo $this->config->item('BOTTOM_MENU3')[$this->config->item('SITE_LANGUAGE')]['SNS_YOUTUBE']['name']; ?></a></li>
                    <li><a href="https://www.instagram.com/gongsabi_" target="_blank"><?php echo $this->config->item('BOTTOM_MENU3')[$this->config->item('SITE_LANGUAGE')]['SNS_INSTAGRAM']['name']; ?></a></li> -->
                    <li><a href="https://pf.kakao.com/_sxlUZK" target="_blank"><span class="sns sns_kakao"></span></a></li>
                    <!-- <li><a href="#"><span class="sns sns_facebook"></span></a></li> -->
                    <li><a href="https://www.youtube.com/channel/UCiUVqgF9TAgkL36F-w4CGcg" target="_blank"><span class="sns sns_youtube"></span></a></li>
                    <li><a href="https://www.instagram.com/gongsabi_" target="_blank"><span class="sns sns_instagram"></span></a></li>
                </ul>
                <table class="footer_contact">
                    <tr>
                        <th><?php echo $this->config->item('BOTTOM_MENU4')[$this->config->item('SITE_LANGUAGE')]['CONTACT1']['name']; ?></th>
                        <td><a href="mailto:<?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['EMAIL3']; ?>"><?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['EMAIL3']; ?></a></td>
                    </tr>
                    <tr>
                        <th><?php echo $this->config->item('BOTTOM_MENU4')[$this->config->item('SITE_LANGUAGE')]['CONTACT2']['name']; ?></th>
                        <td><a href="mailto:<?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['EMAIL2']; ?>"><?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['EMAIL2']; ?></a></td>
                    </tr>
                    <tr>
                        <th><?php echo $this->config->item('BOTTOM_MENU4')[$this->config->item('SITE_LANGUAGE')]['CONTACT3']['name']; ?></th>
                        <td><a href="mailto:<?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['EMAIL1']; ?>"><?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['EMAIL1']; ?></a></td>
                    </tr>
                    <tr>
                        <th><?php echo $this->config->item('BOTTOM_MENU4')[$this->config->item('SITE_LANGUAGE')]['CONTACT4']['name']; ?></th>
                        <td><a href="tel:<?php echo str_replace('-', '.', $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['TEL1']); ?>"><?php echo str_replace('-', '.', $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['TEL1']); ?></a></td>
                    </tr>
                </table>
                <p>COPYRIGHT (C) <a href="<?php echo $this->config->item('site_url'); ?>" target="_blank"><?php echo $this->config->item('site_short_url'); ?></a>. All rights reserved.</p>
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
                    <span class="mr-auto mfc">※ 스크랩 내용은 마이페이지 > 공사비검색 > 면적당 공사비 검색 에서 보실 수 있습니다.</span>
                    <button type="button" class="btn btn-sm btn-outline-success" data-dismiss="modal">닫기</button>
                    <?php if ( $this->session->userdata('MEMBER')['member_type'] == '2' ) { ?>
                    <button type="button" class="btn btn-sm btn-success" onclick="scrap_gongsabi();">스크랩</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- 이용약관 MODAL -->
    <div class="modal fade" id="agree_info" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog custom-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">이용약관</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <pre style="white-space:pre-wrap;">
                    </pre>
                </div>
            </div>
        </div>
    </div>

    <!-- 마케팅 활용 수신 동의 MODAL -->
    <div class="modal fade" id="agree_marketing_info" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog custom-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gongsabi_info_title">마케팅 활용 수신 동의 (선택)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    수집하는 개인정보는 마케팅, 프로모션, 이벤트, 행사관련 정보 안내 및 제반 마케팅활동, 맞춤형 서비스 제공,<br>
                    맞춤형 쿠폰 제공, 당사 및 제휴사 상품/서비스 안내 및 권유 등을 위해 사용되며,<br>
                    회사는 해당 업무를 수행하기 위하여 수탁사를 활용할 수 있고, 이에 대해서는 개인정보 처리방침을 통해 확인 가능합니다.<br>
                    선택 사항에 동의하지 않으셔도 서비스 가입 및 이용이 가능하나,<br>
                    동의하지 않을 경우 제공 가능한 관련 편의 사항 등 (맞춤형 쿠폰 기타 각종 혜택 등) 이 제한될 수 있습니다.
                </div>
            </div>
        </div>
    </div>

    <!-- 광고성 정보 수신 동의 MODAL -->
    <div class="modal fade" id="agree_ad_info" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog custom-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gongsabi_info_title">광고성 정보 수신 동의 (선택)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    회사는 귀하의 정보들을 활용하여, 문자메시지, 이메일, 쿠폰 등 다양한 채널을 통해 귀하에게 꼭 필요한<br>
                    회사 혹은 제휴사의 상품, 서비스를 추천하거나 맞춤형 광고(쿠폰, 이벤트 등) 제공에 대한 알림을 합니다.<br>
                    회사는 해당 업무를 수행하기 위하여 수탁사를 활용할 수 있고, 이에 대해서는 개인정보 처리방침을 통해 확인 가능합니다.<br>
                    선택 사항에 동의하지 않으셔도 서비스 가입 및 이용이 가능하나,<br>
                    동의하지 않을 경우 제공 가능한 관련 편의 사항 등 (맞춤형 쿠폰 기타 각종 혜택 등) 이 제한될 수 있습니다.
                </div>
            </div>
        </div>
    </div>

    <!-- 회원혜택 MODAL -->
    <div class="modal fade" id="membership_info" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog custom-modal" role="document">
            <div class="modal-content">
                <div class="membership_info_wrapper">
                    <div class="membership_info type1">
                        <div class="membership_info_title">
                            <p class="title">무료 회원 가입</p>
                        </div>
                        <div class="membership_info_desc">
                            <p class="desc_lead">"공사비닷컴 <span class="point">온라인 회원</span>이 되시면"</p>
                            <ul class="desc_list">
                                <li>면적당 공사비 정보의 샘플 검색</li>
                                <li>공사 단가 검색의 샘플 검색</li>
                                <li>골조 면적별 수량 검색의 샘플 검색</li>
                            </ul>
                        </div>
                        <div class="membership_info_button">
                            <p>해당 서비스를 <span class="point">무료</span>로 제공받으실 수 있습니다.</p>
                            <a href="/front/mypage/info/info2" class="btn">가입하기</a>
                        </div>
                    </div>
                    <div class="membership_info type2">
                        <div class="membership_info_title">
                            <p class="title">유료 회원 가입</p>
                            <p class="price">연 1,000,000원</p>
                            <p class="price_small">(VAT 10% 별도)</p>
                        </div>
                        <div class="membership_info_desc">
                            <p class="desc_lead">"공사비닷컴 <span class="point">연간 회원</span>이 되시면"</p>
                            <ul class="desc_list">
                                <li>면적당 공사비 검색</li>
                                <li>공사 단가 검색</li>
                                <li>골조 면적별 수량 검색</li>
                                <li>공사기간 산정</li>
                                <li>간접 공사비 계산</li>
                            </ul>
                        </div>
                        <div class="membership_info_button">
                            <p><a href="#" class="more">+ 더보기</a></p>
                            <a href="/front/mypage/info/info2" class="btn">가입하기</a>
                        </div>
                    </div>     
                </div>   
            </div>
        </div>
    </div>

    <div class="modal_content not_pay_hp">
        <div class="modal_body">
            <span class="modal_header">안내</span>
            죄송합니다.<br>
            <strong>현재 휴대폰결제가 불가능합니다.</strong><br>
            다른 결제 방법을 선택하여<br>
            이용해주시기 바랍니다.
        </div>
        <div class="modal_footer">
            <div class="modal_agree">
                <!-- <label for="hide"><input type="checkbox" name="hide" id="hide" value="1"> 다시 보지 않기</label> -->
            </div>
            <div class="modal_close">
                <a href="#" onclick="close_modal(this);">닫기</a>
            </div>
        </div>
    </div>
    <div class="modal_content_wrapper"></div>
    
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
    
    <!-- DatePicker -->
    <script src="/static/vendor/air-datepicker/js/datepicker.min.js"></script>    
    <!-- Include English language -->
    <script src="/static/vendor/air-datepicker/js/i18n/datepicker.ko.js"></script>

    <script src="/static/front/js/active.js"></script>
    <script src="/static/js/util.js"></script>
    <script src="/static/js/gongsabi.js"></script>

    <script>
    var nowDate = new Date();
    // 오늘 이후만 선택되도록
    // nowDate.setDate(nowDate.getDate() + 1);

    var datepicker = $('.air-datepicker')
    // .prop('readonly', true)
    .datepicker({
        language: 'ko',
        navTitles: {
            days: '<strong>yyyy</strong>년 MM'
        },
        minDate: nowDate,
        autoClose: true,
        onSelect: function(fd, d, picker) {}
    });
    </script>

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