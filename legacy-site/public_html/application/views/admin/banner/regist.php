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
                    <h4 class="page-title">배너 등록</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

		            <form method="post" action="/admin/banner/banner_regist_proc" enctype="multipart/form-data">

                    <div class="float-right">
                        <a href="/admin/banner" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-bars mr-1"></i> 목록</a>
			            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> 등록</button>
                    </div>

                    <h4 class="header-title">배너 등록</h4>

                    <p class="sub-header">
                        배너를 등록합니다.
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
						        <div class="form-group">
						            <label for="area">영역 <small class="text-danger">* 필수</small></label>
						            <select name="area" id="area" class="form-control" required="true">
						            	<?php foreach ($this->config->item('BANNER_LIST') as $key => $value) { ?>
						                <option value="<?php echo $key; ?>"><?php echo $value['name']; ?></option>
						            	<?php } ?>
						            </select>
						        </div>
						        <div class="form-group">
						            <label for="desc">설명 <small class="text-danger">* 필수</small></label>
						            <input placeholder="설명" name="desc" id="desc" type="text" class="form-control" required="true">
						        </div>
						        <hr>
						        <div class="form-group">
						            <label for="w_link">웹 링크 <small class="text-danger">* 필수</small></label>
						            <input placeholder="웹 링크" name="w_link" id="w_link" type="text" class="form-control" value="" required="true">
						        </div>
						        <div class="form-group">
						            <label for="w_target">웹 링크 유형 <small class="text-danger">* 필수</small></label>
						            <select name="w_target" id="w_target" class="form-control" required="true">
						                <option value="_self">일반</option>
						                <option value="_blank" selected="true">새창</option>
						            </select>
						        </div>
						        <div class="form-group">
						            <label for="w_image">웹 이미지 <small class="text-danger">* 필수</small> <small class="text-warning">(가로 1110px 권장)</small></label>
						            <input type="file" class="form-control" name="w_image" id="w_image">
						        </div>
						        <hr>
						        <div class="form-group">
						            <label for="m_link">모바일 링크 <small class="text-danger">* 필수</small></label>
						            <input placeholder="모바일 링크" name="m_link" id="m_link" type="text" class="form-control" value="" required="true">
						        </div>
						        <div class="form-group">
						            <label for="m_target">모바일 링크 유형 <small class="text-danger">* 필수</small></label>
						            <select name="m_target" id="m_target" class="form-control" required="true">
						                <option value="_self">일반</option>
						                <option value="_blank" selected="true">새창</option>
						            </select>
						        </div>
						        <div class="form-group">
						            <label for="m_image">모바일 이미지 <small class="text-danger">* 필수</small> <small class="text-warning">(가로 450px 권장)</small></label>
						            <input type="file" class="form-control" name="m_image" id="m_image">
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