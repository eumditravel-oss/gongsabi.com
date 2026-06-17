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
                    <h4 class="page-title"><?php echo $board_title; ?> 등록</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

                    <form method="post" action="/admin/board/regist_proc" class="form-horizontal" role="form" enctype="multipart/form-data">

                    <input type="hidden" name="board_type" value="<?php echo $board; ?>">

                    <div class="float-right">
                        <a href="/admin/board/<?php echo $board; ?>" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-bars mr-1"></i> 목록</a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 등록</a>
                    </div>

                    <h4 class="header-title"><?php echo $board_title; ?> 등록</h4>

                    <p class="sub-header">
                        <?php echo $board_title; ?>을 등록합니다.
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <?php if ( $top_yn ) { ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">상단 공지</label>
                                    <div class="col-sm-10">
                                        <select id="board_top_yn" name="board_top_yn" class="form-control">
                                            <option value="N" selected="true">아니오</option>
                                            <option value="Y">예</option>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if ( $board == 'faq' ) { ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">카테고리</label>
                                    <div class="col-sm-10">
                                        <select id="board_category" name="board_category" class="form-control">
                                        <?php foreach ($this->config->item('FAQ_CATEGORY') as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value['name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_title"><?php echo ( $reply_yn ) ? '질문' : '제목'; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_title" name="board_title" class="form-control" value="" required="true" placeholder="<?php echo ( $reply_yn ) ? '질문' : '제목'; ?>">
                                    </div>
                                </div>
                                <?php if ( $board != 'faq' ) { ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">내용</label>
                                    <div class="col-sm-10">
                                        <textarea id="board_content" name="board_content" class="form-control" rows="15" required="true" placeholder="내용"></textarea>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if ( $reply_yn ) { ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">답변</label>
                                    <div class="col-sm-10">
                                        <textarea id="board_reply_content" name="board_reply_content" class="form-control" rows="15" placeholder="답변"></textarea>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if ( $image_yn ) { ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">썸네일</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="board_image" class="form-control">
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if ( $file_yn ) { ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">첨부파일 1</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="board_attach_1" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">첨부파일 3</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="board_attach_2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">첨부파일 3</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="board_attach_3" class="form-control">
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        
    </div>

</div>