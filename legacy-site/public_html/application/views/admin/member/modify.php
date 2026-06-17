<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">회원 관리</a></li>
                            <li class="breadcrumb-item active">관리자 페이지</li>
                        </ol>
                    </div>
                    <h4 class="page-title">회원 정보 수정</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-6">
                <div class="card-box">

                    <form method="post" action="/admin/member/modify_proc" class="form-horizontal" role="form">

                    <?php foreach ($return_condition as $key => $value) { ?>
                    <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
                    <?php } ?>

                    <input type="hidden" name="member_seq" value="<?php echo $board_data['list'][0]->member_seq; ?>">

                    <div class="float-right">
                        <a href="/admin/member?member_type=<?php echo $return_condition['return_member_type']; ?>&member_use=<?php echo $return_condition['return_member_use']; ?>&keyword=<?php echo $return_condition['return_keyword']; ?>&page=<?php echo $return_condition['return_page']; ?>" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-bars mr-1"></i> 목록</a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 수정</a>
                    </div>

                    <h4 class="header-title">회원 정보 수정</h4>

                    <p class="sub-header">
                        회원 정보를 수정합니다.
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="member_id">아이디(이메일) <small class="text-danger">* 수정 불가</small></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $board_data['list'][0]->member_id; ?>" readonly="true" placeholder="아이디(이메일)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="member_password">비밀번호 <small class="text-danger">* 수정시에만 입력</small></label>
                                    <div class="col-sm-8">
                                        <input type="text" id="member_password" name="member_password" class="form-control" value="" placeholder="비밀번호">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">회원유형</label>
                                    <div class="col-sm-8">
                                        <select id="member_type" name="member_type" class="form-control">
                                        <?php foreach ($this->config->item('MEMBER_TYPE') as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>"<?php echo ( $board_data['list'][0]->member_type == $key ) ? ' selected="true"' : ''; ?>><?php echo $value['name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="member_name">이름</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="member_name" name="member_name" class="form-control" value="<?php echo $board_data['list'][0]->member_name; ?>" required="true" placeholder="이름">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="member_hp">휴대폰번호</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="member_hp" name="member_hp" class="form-control handle-cell-phone" value="<?php echo $board_data['list'][0]->member_hp; ?>" required="true" placeholder="휴대폰번호" maxlength="13">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="member_company">회사</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="member_company" name="member_company" class="form-control" value="<?php echo $board_data['list'][0]->member_company; ?>" placeholder="회사">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="member_position">직책</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="member_position" name="member_position" class="form-control" value="<?php echo $board_data['list'][0]->member_position; ?>" placeholder="직책">
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