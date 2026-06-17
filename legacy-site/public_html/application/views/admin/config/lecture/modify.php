<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">기타 관리</a></li>
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

                    <form method="post" action="/admin/config/lecture_modify_proc" class="form-horizontal" role="form">

                    <input type="hidden" name="lecture_seq" value="<?php echo $board_data['list'][0]->lecture_seq; ?>">

                    <div class="float-right">
                        <a href="/admin/config/lecture" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-bars mr-1"></i> 목록</a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 수정</a>
                    </div>

                    <h4 class="header-title"><?php echo $board_title; ?> 수정</h4>

                    <p class="sub-header">
                        <?php echo $board_title; ?>를 수정합니다.
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="lecture_title">교육 제목</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="lecture_title" name="lecture_title" class="form-control" value="<?php echo $board_data['list'][0]->lecture_title; ?>" required="true" placeholder="교육 제목">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="lecture_time">교육 시간</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="lecture_time" name="lecture_time" class="form-control" value="<?php echo $board_data['list'][0]->lecture_time; ?>" required="true" placeholder="교육 시간">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="lecture_content">교육 내용</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="lecture_content" name="lecture_content" class="form-control" value="<?php echo $board_data['list'][0]->lecture_content; ?>" required="true" placeholder="교육 내용">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="lecture_title_eng">교육 제목(영문)</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="lecture_title_eng" name="lecture_title_eng" class="form-control" value="<?php echo $board_data['list'][0]->lecture_title_eng; ?>" required="true" placeholder="교육 제목(영문)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="lecture_time_eng">교육 시간(영문)</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="lecture_time_eng" name="lecture_time_eng" class="form-control" value="<?php echo $board_data['list'][0]->lecture_time_eng; ?>" required="true" placeholder="교육 시간(영문)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="lecture_content_eng">교육 내용(영문)</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="lecture_content_eng" name="lecture_content_eng" class="form-control" value="<?php echo $board_data['list'][0]->lecture_content_eng; ?>" required="true" placeholder="교육 내용(영문)">
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