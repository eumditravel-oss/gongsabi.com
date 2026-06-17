<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">배너 관리</a></li>
                            <li class="breadcrumb-item active">관리자 페이지</li>
                        </ol>
                    </div>
                    <h4 class="page-title">배너 수정</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

		            <form method="post" action="/admin/banner/banner_modify_proc" enctype="multipart/form-data">
		            <input type="hidden" name="return_area" value="<?php echo $this->input->get('area'); ?>">
		            <input type="hidden" name="return_page" value="<?php echo $this->input->get('page'); ?>">
		            <input type="hidden" name="area" value="<?php echo $board_data['list'][0]->area; ?>">
		            <input type="hidden" name="seq" value="<?php echo $board_data['list'][0]->seq; ?>">

                    <div class="float-right">
                        <a href="/admin/banner?area=<?php echo $this->input->get('area'); ?>&page=<?php echo $this->input->get('page'); ?>" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-bars mr-1"></i> 목록</a>
			            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> 수정</button>
                    </div>

                    <h4 class="header-title">배너 수정</h4>

                    <p class="sub-header">
                        배너를 수정합니다.
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
						        <div class="form-group">
						            <label for="status">상태 <small class="text-danger">* 필수</small></label>
						            <select name="status" class="form-control" required="true">
						                <option value="1"<?php echo ( $board_data['list'][0]->status == '1' ) ? ' selected="true"' : ''; ?>>사용안함</option>
						                <option value="9"<?php echo ( $board_data['list'][0]->status == '9' ) ? ' selected="true"' : ''; ?>>사용중</option>
						            </select>
						        </div>
						        <div class="form-group">
						            <label for="area">영역 <small class="text-danger">* 필수</small></label>
						            <select name="area" id="area" class="form-control" required="true">
						            	<?php foreach ($this->config->item('BANNER_LIST') as $key => $value) { ?>
						                <option value="<?php echo $key; ?>"<?php echo ( $board_data['list'][0]->area == $key ) ? ' selected="true"' : ''; ?>><?php echo $value['name']; ?></option>
						            	<?php } ?>
						            </select>
						        </div>
						        <div class="form-group">
						            <label for="desc">설명 <small class="text-danger">* 필수</small></label>
						            <input placeholder="설명" name="desc" id="desc" type="text" class="form-control" required="true" value="<?php echo $board_data['list'][0]->desc; ?>">
						        </div>
						        <hr>
						        <div class="form-group">
						            <label for="w_link">웹 링크 <small class="text-danger">* 필수</small></label>
						            <input placeholder="웹 링크" name="w_link" id="w_link" type="text" class="form-control" required="true" value="<?php echo $board_data['list'][0]->w_link; ?>">
						        </div>
						        <div class="form-group">
						            <label for="w_target">웹 링크 유형 <small class="text-danger">* 필수</small></label>
						            <select name="w_target" id="w_target" class="form-control" required="true">
						                <option value="_self"<?php echo ( $board_data['list'][0]->w_target == '_self' ) ? ' selected="true"' : ''; ?>>일반</option>
						                <option value="_blank"<?php echo ( $board_data['list'][0]->w_target == '_blank' ) ? ' selected="true"' : ''; ?>>새창</option>
						            </select>
						        </div>
						        <div class="form-group">
						            <label for="w_image">웹 이미지 <small class="text-danger">* 필수</small> <small class="text-warning">(가로 1110px 권장)</small></label>
						            <input type="file" class="form-control" name="w_image" id="w_image">
						        	<?php if ( $board_data['list'][0]->w_image ) { ?>
						            <a href="/static/data/banner/<?php echo $board_data['list'][0]->area; ?>/<?php echo $board_data['list'][0]->w_image; ?>" target="_blank"><img src="/static/data/banner/<?php echo $board_data['list'][0]->area; ?>/<?php echo $board_data['list'][0]->w_image; ?>" class="m-t" style="width:100%;"></a>
						        	<?php } ?>
						        </div>
						        <hr>
						        <div class="form-group">
						            <label for="m_link">모바일 링크 <small class="text-danger">* 필수</small></label>
						            <input placeholder="모바일 링크" name="m_link" id="m_link" type="text" class="form-control" required="true" value="<?php echo $board_data['list'][0]->m_link; ?>">
						        </div>
						        <div class="form-group">
						            <label for="m_target">모바일 링크 유형 <small class="text-danger">* 필수</small></label>
						            <select name="m_target" id="m_target" class="form-control" required="true">
						                <option value="_self"<?php echo ( $board_data['list'][0]->m_target == '_self' ) ? ' selected="true"' : ''; ?>>일반</option>
						                <option value="_blank"<?php echo ( $board_data['list'][0]->m_target == '_blank' ) ? ' selected="true"' : ''; ?>>새창</option>
						            </select>
						        </div>
						        <div class="form-group">
						            <label for="m_image">모바일 이미지 <small class="text-danger">* 필수</small> <small class="text-warning">(가로 450px 권장)</small></label>
						            <input type="file" class="form-control" name="m_image" id="m_image">
						        	<?php if ( $board_data['list'][0]->m_image ) { ?>
						            <a href="/static/data/banner/<?php echo $board_data['list'][0]->area; ?>/<?php echo $board_data['list'][0]->m_image; ?>" target="_blank"><img src="/static/data/banner/<?php echo $board_data['list'][0]->area; ?>/<?php echo $board_data['list'][0]->m_image; ?>" class="m-t" style="width:100%;"></a>
						        	<?php } ?>
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