    <section class="shortcodes_content_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>회원탈퇴</h4>
                            <p>회원탈퇴 후 재가입시 해당 아이디로 재가입이 불가능하며, 가입시의 모든 정보는 삭제 됩니다.<br>또한 신청내역도 삭제가 이루이지니 신중하게 신청해 주시기 바랍니다.</p>
                        </div>
                    </div>

                    <div class="login_area section_padding_50 bg-gray">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                                    <form action="/front/mypage/leave_proc" method="post" class="classy-form frm-leave">
                                        <div class="form-group">
                                            <label for="member_id">아이디(이메일)</label>
                                            <input type="email" class="form-control" placeholder="아이디(이메일)" value="<?php echo $member->member_id; ?>" readonly="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="member_password">현재 비밀번호 <small class="text-danger">* 필수</small></label>
                                            <input type="password" class="form-control" name="member_password" id="member_password" placeholder="현재 비밀번호">
                                        </div>
                                        <div class="form-group">
                                            <label for="leave_reason">탈퇴 사유 <small class="text-danger">* 필수</small></label>
                                            <textarea class="form-control" name="leave_reason" id="leave_reason" rows="5" placeholder="탈퇴 사유"></textarea>
                                        </div>
                                        <button type="button" class="btn default-button-green btn-leave">회원탈퇴</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    $(function() {
        $('.btn-leave').on('click', function() {
            var member_password = $('#member_password').val();
            var leave_reason = $('#leave_reason').val();

            if ( member_password == '' )
            {
                alert('현재 비밀번호를 입력해 주십시오.');
                return false;
            }
            else if ( leave_reason == '' )
            {
                alert('탈퇴 사유를 입력해 주십시오.');
                return false;
            }
            else {
                if ( confirm('회원 탈퇴 신청 하시겠습니까 ?') )
                    $('.frm-leave').submit();
                else
                    return false;
            }
        });
    });
    </script>