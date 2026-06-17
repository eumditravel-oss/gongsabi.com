    <section class="breadcumb_area background-overlay section_padding_50" style="background-image: url(/static/img/customer.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb_section">
                        <div class="page_title">
                            <h4>로그인</h4>
                        </div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">공사비닷컴</a></li>
                            <li class="breadcrumb-item active">로그인</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shortcodes_content_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>회원 로그인</h4>
                        </div>
                    </div>

                    <div class="login_area section_padding_50 bg-gray">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                                    <form action="/front/auth/login_proc" method="post" class="classy-form">
                                        <input type="hidden" name="member_type" id="member_type" value="1">
                                        <div class="form-group">
                                            <label for="member_id">아이디(이메일)</label>
                                            <input type="email" class="form-control" name="member_id" id="member_id" placeholder="아이디(이메일)">
                                        </div>
                                        <div class="form-group">
                                            <label for="member_password">비밀번호</label>
                                            <input type="password" class="form-control" name="member_password" id="member_password" placeholder="비밀번호">
                                        </div>
                                        <button type="submit" class="btn default-button-green">로그인</button>
                                    </form>
                                    <div class="forget_pass one">
                                        <a href="/front/auth/find"><i class="fa fa-question-circle" aria-hidden="true"></i> 로그인 정보 찾기</a>
                                    </div>
                                    <div class="forget_pass">
                                        <a href="/front/auth/regist_form"><i class="fa fa-user-plus" aria-hidden="true"></i>아직 공사비닷컴 회원이 아니신가요 ? 회원가입</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>