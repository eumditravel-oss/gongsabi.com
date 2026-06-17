    <section class="shortcodes_content_area p-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>아이디 찾기</h4>
                            <p>가입시 등록한 휴대폰 번호를 입력해 주십시오.</p>
                        </div>
                    </div>

                    <div class="login_area section_padding_50 bg-gray">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                                    <form action="/front/auth/find_proc" method="post" class="classy-form">
                                        <input type="hidden" name="find_type" value="I">
                                        <div class="form-group">
                                            <label for="member_hp">휴대폰번호</label>
                                            <input type="text" class="form-control handle-cell-phone" name="member_hp" id="member_hp" placeholder="휴대폰번호" maxlength="13">
                                        </div>
                                        <button type="submit" class="btn default-button-green">아이디 찾기</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shortcodes_content_area p-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>비밀번호 찾기</h4>
                            <p>가입시 등록한 아이디(이메일)과 휴대폰 번호를 입력해 주십시오.</p>
                        </div>
                    </div>

                    <div class="login_area section_padding_50 bg-gray">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                                    <form action="/front/auth/find_proc" method="post" class="classy-form">
                                        <input type="hidden" name="find_type" value="P">
                                        <div class="form-group">
                                            <label for="member_id">아이디(이메일)</label>
                                            <input type="email" class="form-control" name="member_id" id="member_id" placeholder="아이디(이메일)">
                                        </div>
                                        <div class="form-group">
                                            <label for="member_hp">휴대폰번호</label>
                                            <input type="text" class="form-control handle-cell-phone" name="member_hp" id="member_hp" placeholder="휴대폰번호" maxlength="13">
                                        </div>
                                        <button type="submit" class="btn default-button-green">비밀번호 찾기</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>