<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">건설장터 관리</a></li>
                            <li class="breadcrumb-item active">관리자 페이지</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Partners 수정</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

		            <form method="post" action="/admin/partners/modify_proc" enctype="multipart/form-data">

                    <input type="hidden" name="board_seq" value="<?php echo $board_data['list'][0]->board_seq; ?>">
                    <input type="hidden" name="board_type" value="<?php echo $board_data['list'][0]->board_type; ?>">

                    <div class="float-right">
                        <a href="/admin/partners" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-bars mr-1"></i> 목록</a>
			            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> 수정</button>
                    </div>

                    <h4 class="header-title">Partners 수정</h4>

                    <p class="sub-header">
                        Partners를 등록합니다.
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="p-2"><div class="form-group row">
                                    <label class="col-sm-2 col-form-label">카테고리</label>
                                    <div class="col-sm-10">
                                        <select id="board_category" name="board_category" class="form-control">
                                        <?php foreach ($this->config->item('PARTNERS_CATEGORY_LIST') as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>"<?php echo ( $board_data['list'][0]->board_category == $key ) ? ' selected="true"' : ''; ?>><?php echo $value; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_title">회사명</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_title" name="board_title" class="form-control" value="<?php echo $board_data['list'][0]->board_title; ?>" required="true" placeholder="회사명">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_link">링크</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_link" name="board_link" class="form-control" value="<?php echo $board_data['list'][0]->board_link; ?>" placeholder="링크">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">로고 이미지</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="board_image" class="form-control">
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