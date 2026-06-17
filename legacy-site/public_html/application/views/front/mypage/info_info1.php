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
                                <a class="nav-link active" href="/front/mypage/info/info1" role="tab">회원 정보 수정</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/front/mypage/info/info2" role="tab">회원 등급 관리</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/front/mypage/info/info3" role="tab">뉴스레터 수신 설정</a>
                            </li>
                        </ul>
                        <div class="tab-content gongsabi-tab">
                            <div class="tab-pane fade show active p-15" id="tab1-1" role="tabpanel" aria-labelledby="tab1-1-tab">
                                <form action="/front/mypage/info_modify_proc" method="post" class="classy-form">
                                    <div class="form-group">
                                        <label for="member_id">아이디(이메일)</label>
                                        <input type="email" class="form-control" placeholder="아이디(이메일)" value="<?php echo $member->member_id; ?>" readonly="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="member_password">현재 비밀번호 <small class="text-danger">* 비밀번호 변경시 입력</small></label>
                                        <input type="password" class="form-control" name="member_password" id="member_password" placeholder="현재 비밀번호">
                                    </div>
                                    <div class="form-group">
                                        <label for="member_new_password">새 비밀번호 <small class="text-danger">* 비밀번호 변경시 입력</small></label>
                                        <input type="password" class="form-control" name="member_new_password" id="member_new_password" placeholder="비밀번호 확인">
                                    </div>
                                    <div class="form-group">
                                        <label for="member_new_password_re">새 비밀번호 확인 <small class="text-danger">* 비밀번호 변경시 입력</small></label>
                                        <input type="password" class="form-control" name="member_new_password_re" id="member_new_password_re" placeholder="비밀번호 확인">
                                    </div>
                                    <div class="form-group">
                                        <label for="member_name">이름 <small class="text-danger">* 필수</small></label>
                                        <input type="text" class="form-control" name="member_name" id="member_name" value="<?php echo $member->member_name; ?>" placeholder="이름" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="member_hp">휴대폰번호 <small class="text-danger">* 필수</small></label>
                                        <input type="text" class="form-control handle-cell-phone" name="member_hp" value="<?php echo $member->member_hp; ?>" id="member_hp" placeholder="휴대폰번호" maxlength="13" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="member_company">회사</label>
                                        <input type="text" class="form-control" name="member_company" id="member_company" value="<?php echo $member->member_company; ?>" placeholder="회사">
                                    </div>
                                    <div class="form-group">
                                        <label for="member_phone">전화번호</label>
                                        <input type="text" class="form-control handle-phone" name="member_phone" value="<?php echo $member->member_phone; ?>" id="member_phone" placeholder="전화번호" maxlength="13">
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn default-button-green">정보수정</button>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <a href="/front/mypage/leave" class="btn btn-pill btn-light btn-outline member-leave-link">회원 탈퇴하기</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>