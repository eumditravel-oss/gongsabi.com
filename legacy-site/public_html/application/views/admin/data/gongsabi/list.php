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
                    <h4 class="page-title"><?php echo $title; ?> 데이터</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="/admin/data/gongsabi_regist" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 등록</a>
                    </div>

                    <h4 class="header-title"><?php echo $title; ?> 데이터</h4>

                    <p class="sub-header">
                        총 <?php echo number_format($data_count); ?>개
                    </p>

                    <form method="get">
                    <div class="row mb-3">
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label for="_c4">건물종류</label>
                                <input type="text" class="form-control" name="c4" id="_c4" value="<?php echo $condition['c4']; ?>" placeholder="건물종류">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label for="_c9">지역</label>
                                <input type="text" class="form-control" name="c9" id="_c9" value="<?php echo $condition['c9']; ?>" placeholder="지역">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label for="_c11">착공년도</label>
                                <input type="text" class="form-control" name="c11" id="_c11" value="<?php echo $condition['c11']; ?>" placeholder="착공년도">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label for="_c13">구분</label>
                                <select name="c13" id="_c13" class="form-control">
                                    <option value="">구분</option>
                                    <option value="설계가"<?php echo ( $condition['c13'] == '설계가' ) ? ' selected="true"' : ''; ?>>설계가</option>
                                    <option value="도급가"<?php echo ( $condition['c13'] == '도급가' ) ? ' selected="true"' : ''; ?>>도급가</option>
                                    <option value="실행가"<?php echo ( $condition['c13'] == '실행가' ) ? ' selected="true"' : ''; ?>>실행가</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="_keyword">검색어</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" id="_keyword" value="<?php echo $condition['keyword']; ?>" placeholder="검색어">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">검색</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                    <form method="post" action="/admin/data/gongsabi_delete">

                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <?php echo $pagination; ?>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button type="button" class="btn btn-danger" onclick="delete_all_gongsabi(this);">일괄삭제</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th class="text-center"><input type="checkbox" onclick="check_all(this);"></th>
                                <th class="text-center">공사명</th>
                                <th class="text-center">건물종류</th>
                                <th class="text-center">지역</th>
                                <th class="text-center">착공년도</th>
                                <th class="text-center">구분</th>
                                <th class="text-center">등급</th>
                                <th class="text-center">등록일</th>
                                <!-- <th class="text-center">관리</th> -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ( $data_list as $data ) {
                            ?>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="chk" name="chk[]" value="<?php echo $data->seq; ?>"></td>
                                <td class="text-center"><?php echo $data->c2; ?></td>
                                <td class="text-center"><?php echo $data->c4; ?></td>
                                <td class="text-center"><?php echo $data->c9; ?></td>
                                <td class="text-center"><?php echo $data->c11; ?></td>
                                <td class="text-center"><?php echo $data->c13; ?></td>
                                <td class="text-center"><?php echo $data->c15; ?></td>
                                <td class="text-center"><?php echo $data->ins_datetime; ?></td>
                                <!-- <td class="text-center"><a href="/admin/data/gongsabi_modify/<?php echo $data->seq; ?>" class="btn btn-primary btn-xs">수정</a></td> -->
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-6">
                            <?php echo $pagination; ?>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button type="button" class="btn btn-danger" onclick="delete_all_gongsabi(this);">일괄삭제</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        
    </div>

</div>