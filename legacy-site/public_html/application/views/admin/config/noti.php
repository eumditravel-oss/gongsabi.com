<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">알림 설정</a></li>
                            <li class="breadcrumb-item active">관리자 페이지</li>
                        </ol>
                    </div>
                    <h4 class="page-title">알림 설정</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

                    <form method="post" action="/admin/config/noti_modify_proc" class="form-horizontal" role="form">

                    <div class="float-right">
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 수정</a>
                    </div>

                    <h4 class="header-title">알림 설정</h4>

                    <p class="sub-header">
                        알림을 설정 합니다.
                    </p>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="p-2">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="noti_qna_phone1">고객센터 - Q&A 글 등록시</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="noti_qna_phone1" name="noti_qna_phone1" class="form-control handle-cell-phone" value="<?php echo $this->session->userdata('SITE_CONFIG')->noti_qna_phone1; ?>" placeholder="휴대폰번호 입력" maxlength="13">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="noti_contact_phone1">업무제휴 글 등록시</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="noti_contact_phone1" name="noti_contact_phone1" class="form-control handle-cell-phone" value="<?php echo $this->session->userdata('SITE_CONFIG')->noti_contact_phone1; ?>" placeholder="휴대폰번호 입력" maxlength="13">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="noti_gongsabi_phone1">건설장터 - 공사비 작성 의뢰시</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="noti_gongsabi_phone1" name="noti_gongsabi_phone1" class="form-control handle-cell-phone" value="<?php echo $this->session->userdata('SITE_CONFIG')->noti_gongsabi_phone1; ?>" placeholder="휴대폰번호 입력" maxlength="13">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="noti_book_phone1">교육- 책 구매요청시</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="noti_book_phone1" name="noti_book_phone1" class="form-control handle-cell-phone" value="<?php echo $this->session->userdata('SITE_CONFIG')->noti_book_phone1; ?>" placeholder="휴대폰번호 입력" maxlength="13">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="noti_lecture_phone1">교육- 강의 요청시</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="noti_lecture_phone1" name="noti_lecture_phone1" class="form-control handle-cell-phone" value="<?php echo $this->session->userdata('SITE_CONFIG')->noti_lecture_phone1; ?>" placeholder="휴대폰번호 입력" maxlength="13">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        
    </div>

</div>