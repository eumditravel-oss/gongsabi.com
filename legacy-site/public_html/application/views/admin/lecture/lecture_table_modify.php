<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">강의 관리</a></li>
                            <li class="breadcrumb-item active">관리자 페이지</li>
                        </ol>
                    </div>
                    <h4 class="page-title">강의 표 수정</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

		            <form method="post" action="/admin/lecture/lecture_table_modify_proc" enctype="multipart/form-data">

                    <div class="float-right">
			            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> 수정</button>
                    </div>

                    <h4 class="header-title">강의 표 수정</h4>

                    <p class="sub-header">
                        강의 표를 수정합니다.
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
						        <div class="form-group">
						            <label for="lecture_table">이미지 <small class="text-warning">(가로 1080px 권장)</small></label>
						            <input type="file" class="form-control" name="lecture_table" id="lecture_table">
						        </div>
						        <div class="mt-2">
						        	<p class="">현재 이미지</p>
						        	<img src="/static/data/lecture_table/lecture_table.jpg">
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