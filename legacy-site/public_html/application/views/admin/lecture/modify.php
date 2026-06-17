<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">게시판 관리</a></li>
                            <li class="breadcrumb-item active">관리자 페이지</li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?php echo $board_title; ?> 수정</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

                    <form method="post" action="/admin/lecture/modify_proc" class="form-horizontal" role="form">

                    <input type="hidden" name="board_seq" value="<?php echo $board_data['list'][0]->board_seq; ?>">
                    <input type="hidden" name="board_type" value="<?php echo $board_data['list'][0]->board_type; ?>">

                    <div class="float-right">
                        <a href="/admin/lecture" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-bars mr-1"></i> 목록</a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 수정</a>
                    </div>

                    <h4 class="header-title"><?php echo $board_title; ?> 수정</h4>

                    <p class="sub-header">
                        <?php echo $board_title; ?>을 수정합니다.
                    </p>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="p-2">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_etc_3">상태 선택</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select d-block w-100" name="board_etc_3" id="board_etc_3">
                                        <?php foreach ($this->config->item('LECTURE_STATUS') as $key => $lecture_status) { ?>
                                            <option value="<?php echo $key; ?>"<?php if ( $key == $board_data['list'][0]->board_etc_3 ) { ?> selected="true"<?php } ?><?php if ( $key < $board_data['list'][0]->board_etc_3 ) { ?> disabled="true"<?php } ?>><?php echo $lecture_status['name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_category">교육과정</label>
                                    <div class="col-sm-10">
                                      <select class="custom-select d-block w-100" name="board_category" id="board_category">
                                      <?php foreach ($this->config->item('LECTURE_LIST') as $key => $lecture) { ?>
                                          <option value="<?php echo $key; ?>"<?php if ( $key == $board_data['list'][0]->board_category ) { ?> selected="true"<?php } ?>><?php echo $lecture['title']; ?></option>
                                      <?php } ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_etc_1">교육날짜</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_etc_1" name="board_etc_1" class="form-control" value="<?php echo $board_data['list'][0]->board_etc_1; ?>" required="true" placeholder="교육날짜" maxlength="10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_etc_2">참석인원</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_etc_2" name="board_etc_2" class="form-control" value="<?php echo $board_data['list'][0]->board_etc_2; ?>" required="true" placeholder="참석인원">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_company">회사</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_company" name="board_company" class="form-control" value="<?php echo $board_data['list'][0]->board_company; ?>" required="true" placeholder="회사">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_name">이름</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_name" name="board_name" class="form-control" value="<?php echo $board_data['list'][0]->board_name; ?>" required="true" placeholder="이름">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_hp">휴대폰번호</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_hp" name="board_hp" class="form-control" value="<?php echo $board_data['list'][0]->board_hp; ?>" required="true" placeholder="휴대폰번호">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_email">이메일주소</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_email" name="board_email" class="form-control" value="<?php echo $board_data['list'][0]->board_email; ?>" required="true" placeholder="이메일주소">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">요청사항</label>
                                    <div class="col-sm-10">
                                        <textarea id="board_content" name="board_content" class="form-control" rows="15" required="true" placeholder="요청사항"><?php echo $board_data['list'][0]->board_content; ?></textarea>
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