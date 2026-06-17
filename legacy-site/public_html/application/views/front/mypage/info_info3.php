    <section class="shortcodes_content_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <?php require 'mypage_left.php'; ?>
                </div>
                <div class="col-9">
                    <?php require 'mypage_top.php'; ?>

                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>회원 정보 관리</h4>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="/front/mypage/info/info1" role="tab">회원 정보 수정</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/front/mypage/info/info2" role="tab">회원 등급 관리</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/front/mypage/info/info3" role="tab">뉴스레터 수신 설정</a>
                            </li>
                        </ul>
                        <div class="tab-content gongsabi-tab">
                            <div class="tab-pane fade show active p-15" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <form action="/front/mypage/info3_proc" method="post" class="classy-form">
                                <table class="table classy-table table-bordered table-responsive gongsabi-table">
                                    <colgroup>
                                        <col width="30%">
                                        <col width="*">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <th class="text-left bg-gray">이메일 주소</th>
                                            <td class=""><?php echo $member->member_id; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-left bg-gray">마케팅 활용 수신 동의</th>
                                            <td>
                                                <label for="agree1_yn_Y"><input type="radio" name="member_agree1_yn" id="agree1_yn_Y" value="Y"<?php echo ( $member->member_agree1_yn == 'Y' ) ? ' checked="true"' : ''; ?>> 동의</label>&nbsp;&nbsp;
                                                <label for="agree1_yn_N"><input type="radio" name="member_agree1_yn" id="agree1_yn_N" value="N"<?php echo ( $member->member_agree1_yn == 'N' ) ? ' checked="true"' : ''; ?>> 거부</label>
                                                <a href="#" class="agree_link" onclick="view_agree('term4');">약관보기 ></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-left bg-gray">광고성 정보 수신 동의</th>
                                            <td>
                                                <label for="agree2_yn_Y"><input type="radio" name="member_agree2_yn" id="agree2_yn_Y" value="Y"<?php echo ( $member->member_agree2_yn == 'Y' ) ? ' checked="true"' : ''; ?>> 동의</label>&nbsp;&nbsp;
                                                <label for="agree2_yn_N"><input type="radio" name="member_agree2_yn" id="agree2_yn_N" value="N"<?php echo ( $member->member_agree2_yn == 'N' ) ? ' checked="true"' : ''; ?>> 거부</label>
                                                <a href="#" class="agree_link" onclick="view_agree('term5');">약관보기 ></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row m-top-15">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn default-button-green">저장</button>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                    </div>
                                </div>
                                </form>

                                <div class="gongsabi-comment-area">
                                    <h3>※ 안내사항</h3>
                                    <div class="comment">
- 마케팅 활용 수신 동의 (선택)<br>
수집하는 개인정보는 마케팅, 프로모션, 이벤트, 행사관련 정보 안내 및 제반 마케팅활동, 맞춤형 서비스 제공, 맞춤형 쿠폰 제공, 당사 및 제휴사 상품/서비스 안내 및 권유 등을 위해 사용되며, 회사는 해당 업무를 수행하기 위하여 수탁사를 활용할 수 있고, 이에 대해서는 개인정보 처리방침을 통해 확인 가능합니다.<br>
선택 사항에 동의하지 않으셔도 서비스 가입 및 이용이 가능하나, 동의하지 않을 경우 제공 가능한 관련 편의 사항 등 (맞춤형 쿠폰 기타 각종 혜택 등) 이 제한될 수 있습니다.<br><br>
- 광고성 정보 수신동의 (선택)<br>
회사는 귀하의 정보들을 활용하여, 문자메시지, 이메일, 쿠폰 등 다양한 채널을 통해 귀하에게 꼭 필요한 회사 혹은 제휴사의 상품, 서비스를 추천하거나 맞춤형 광고(쿠폰, 이벤트 등) 제공에 대한 알림을 합니다. 회사는 해당 업무를 수행하기 위하여 수탁사를 활용할 수 있고, 이에 대해서는 개인정보 처리방침을 통해 확인 가능합니다.<br>
선택 사항에 동의하지 않으셔도 서비스 가입 및 이용이 가능하나, 동의하지 않을 경우 제공 가능한 관련 편의 사항 등 (맞춤형 쿠폰 기타 각종 혜택 등) 이 제한될 수 있습니다.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>