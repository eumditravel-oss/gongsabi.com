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
                    <h4 class="page-title">강사 등록</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

                    <form method="post" action="/admin/lecture/teacher_modify_proc" enctype="multipart/form-data">

                    <input type="hidden" name="teacher_seq" value="<?php echo $board_data['list'][0]->teacher_seq; ?>">

                    <div class="float-right">
                        <a href="/admin/lecture/teacher" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-bars mr-1"></i> 목록</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> 수정</button>
                    </div>

                    <h4 class="header-title">강사 등록</h4>

                    <p class="sub-header">
                        강사를 등록합니다.
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <div class="form-group">
                                    <label class="col-sm-2 col-form-label">강사 사진</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="teacher_photo" class="form-control">
                                        <?php if ( $board_data['list'][0]->teacher_photo ) { ?>
                                        <img src="/static/data/teacher/<?php echo $board_data['list'][0]->teacher_photo; ?>" class="mt-1" style="width:200px;">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-form-label" for="teacher_name">강사 이름</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="teacher_name" name="teacher_name" class="form-control" value="<?php echo $board_data['list'][0]->teacher_name; ?>" required="true" placeholder="강사 이름">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-form-label" for="teacher_desc">강사 소개</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="teacher_desc" rows="5" placeholder="강사 소개"><?php echo $board_data['list'][0]->teacher_desc; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-form-label" for="teacher_name_eng">강사 이름(영문)</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="teacher_name_eng" name="teacher_name_eng" class="form-control" value="<?php echo $board_data['list'][0]->teacher_name_eng; ?>" required="true" placeholder="강사 이름(영문)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-form-label" for="teacher_desc_eng">강사 소개(영문)</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="teacher_desc_eng" rows="5" placeholder="강사 소개(영문)"><?php echo $board_data['list'][0]->teacher_desc_eng; ?></textarea>
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