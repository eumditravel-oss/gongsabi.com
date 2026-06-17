<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">데이터 관리</a></li>
                            <li class="breadcrumb-item active">관리자 페이지</li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?php echo $title; ?> 데이터 등록</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

                    <form method="post" action="/admin/data/goljo_regist_proc" class="form-horizontal" role="form" enctype="multipart/form-data">

                    <div class="float-right">
                        <a href="/admin/data/gongsabi" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-bars mr-1"></i> 목록</a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 등록</a>
                    </div>

                    <h4 class="header-title"><?php echo $title; ?> 데이터 등록</h4>

                    <p class="sub-header">
                        <?php echo $title; ?> 데이터를 등록합니다.
                    </p>

                    <div class="row">
                        <div class="col-8">
                            <div class="p-2">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">엑셀 파일 선택</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="attach_file" class="form-control">
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