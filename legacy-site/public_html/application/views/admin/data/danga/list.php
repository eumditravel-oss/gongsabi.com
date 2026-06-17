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
                        <?php echo number_format($danga_count); ?>건
                    </p>

                    <form method="get">
                    <div class="row mb-3">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="danga_category1">공정</label>
                                <select name="danga_category1" id="danga_category1" class="form-control select-align-center">
                                    <option value="" selected="true">공정 선택</option>
                                    <option value="공통가설"<?php echo ( $condition['danga_category1'] == '공통가설' ) ? ' selected="true"' : ''; ?>>공통가설</option>
                                    <option value="건축"<?php echo ( $condition['danga_category1'] == '건축' ) ? ' selected="true"' : ''; ?>>건축</option>
                                    <option value="토목"<?php echo ( $condition['danga_category1'] == '토목' ) ? ' selected="true"' : ''; ?>>토목</option>
                                    <option value="기계"<?php echo ( $condition['danga_category1'] == '기계' ) ? ' selected="true"' : ''; ?>>기계</option>
                                    <option value="전기"<?php echo ( $condition['danga_category1'] == '전기' ) ? ' selected="true"' : ''; ?>>전기</option>
                                    <option value="통신"<?php echo ( $condition['danga_category1'] == '통신' ) ? ' selected="true"' : ''; ?>>통신</option>
                                    <option value="소방"<?php echo ( $condition['danga_category1'] == '소방' ) ? ' selected="true"' : ''; ?>>소방</option>
                                    <option value="부대"<?php echo ( $condition['danga_category1'] == '부대' ) ? ' selected="true"' : ''; ?>>부대</option>
                                    <option value="조경"<?php echo ( $condition['danga_category1'] == '조경' ) ? ' selected="true"' : ''; ?>>조경</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="danga_category2">공종</label>
                                <select name="danga_category2" id="danga_category2" class="form-control select-align-center">
                                    <option value="" selected="true">공종 선택</option>
                                    <option value="가설"<?php echo ( $condition['danga_category2'] == '가설' ) ? ' selected="true"' : ''; ?>>가설</option>
                                    <option value="공종"<?php echo ( $condition['danga_category2'] == '공종' ) ? ' selected="true"' : ''; ?>>공종</option>
                                    <option value="공통가설"<?php echo ( $condition['danga_category2'] == '공통가설' ) ? ' selected="true"' : ''; ?>>공통가설</option>
                                    <option value="금속"<?php echo ( $condition['danga_category2'] == '금속' ) ? ' selected="true"' : ''; ?>>금속</option>
                                    <option value="기타"<?php echo ( $condition['danga_category2'] == '기타' ) ? ' selected="true"' : ''; ?>>기타</option>
                                    <option value="노임"<?php echo ( $condition['danga_category2'] == '노임' ) ? ' selected="true"' : ''; ?>>노임</option>
                                    <option value="도장"<?php echo ( $condition['danga_category2'] == '도장' ) ? ' selected="true"' : ''; ?>>도장</option>
                                    <option value="목"<?php echo ( $condition['danga_category2'] == '목' ) ? ' selected="true"' : ''; ?>>목</option>
                                    <option value="미장"<?php echo ( $condition['danga_category2'] == '미장' ) ? ' selected="true"' : ''; ?>>미장</option>
                                    <option value="방수"<?php echo ( $condition['danga_category2'] == '방수' ) ? ' selected="true"' : ''; ?>>방수</option>
                                    <option value="부대"<?php echo ( $condition['danga_category2'] == '부대' ) ? ' selected="true"' : ''; ?>>부대</option>
                                    <option value="석"<?php echo ( $condition['danga_category2'] == '석' ) ? ' selected="true"' : ''; ?>>석</option>
                                    <option value="수장"<?php echo ( $condition['danga_category2'] == '수장' ) ? ' selected="true"' : ''; ?>>수장</option>
                                    <option value="운반비"<?php echo ( $condition['danga_category2'] == '운반비' ) ? ' selected="true"' : ''; ?>>운반비</option>
                                    <option value="유리"<?php echo ( $condition['danga_category2'] == '유리' ) ? ' selected="true"' : ''; ?>>유리</option>
                                    <option value="장비"<?php echo ( $condition['danga_category2'] == '장비' ) ? ' selected="true"' : ''; ?>>장비</option>
                                    <option value="조경"<?php echo ( $condition['danga_category2'] == '조경' ) ? ' selected="true"' : ''; ?>>조경</option>
                                    <option value="조적"<?php echo ( $condition['danga_category2'] == '조적' ) ? ' selected="true"' : ''; ?>>조적</option>
                                    <option value="지붕"<?php echo ( $condition['danga_category2'] == '지붕' ) ? ' selected="true"' : ''; ?>>지붕</option>
                                    <option value="창호"<?php echo ( $condition['danga_category2'] == '창호' ) ? ' selected="true"' : ''; ?>>창호</option>
                                    <option value="철거"<?php echo ( $condition['danga_category2'] == '철거' ) ? ' selected="true"' : ''; ?>>철거</option>
                                    <option value="철골"<?php echo ( $condition['danga_category2'] == '철골' ) ? ' selected="true"' : ''; ?>>철골</option>
                                    <option value="철근콘크리트"<?php echo ( $condition['danga_category2'] == '철근콘크리트' ) ? ' selected="true"' : ''; ?>>철근콘크리트</option>
                                    <option value="타일"<?php echo ( $condition['danga_category2'] == '타일' ) ? ' selected="true"' : ''; ?>>타일</option>
                                    <option value="토"<?php echo ( $condition['danga_category2'] == '토' ) ? ' selected="true"' : ''; ?>>토</option>
                                    <option value="토공사"<?php echo ( $condition['danga_category2'] == '토공사' ) ? ' selected="true"' : ''; ?>>토공사</option>
                                    <option value="폐기물"<?php echo ( $condition['danga_category2'] == '폐기물' ) ? ' selected="true"' : ''; ?>>폐기물</option>
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
                        <?php echo $pagination; ?>
                        <table class="table mb-0">
                        <thead>
                            <!-- <tr>
                                <th rowspan="2" class="text-center">공정</th>
                                <th rowspan="2" class="text-center">공종</th>
                                <th rowspan="2" class="text-center">품명</th>
                                <th rowspan="2" class="text-center">규격</th>
                                <th rowspan="2" class="text-center">단위</th>
                                <th rowspan="2" class="text-center">수량</th>
                                <th rowspan="2" class="text-center">기준년도</th>
                                <th colspan="4" class="text-center bn">설계가</th>
                                <th colspan="4" class="text-center bn">도급가</th>
                                <th colspan="4" class="text-center bn">실행가</th>
                            </tr>
                            <tr>
                                <th class="text-center">재료비</th>
                                <th class="text-center">노무비</th>
                                <th class="text-center">경비</th>
                                <th class="text-center">합계</th>
                                <th class="text-center">재료비</th>
                                <th class="text-center">노무비</th>
                                <th class="text-center">경비</th>
                                <th class="text-center">합계</th>
                                <th class="text-center">재료비</th>
                                <th class="text-center">노무비</th>
                                <th class="text-center">경비</th>
                                <th class="text-center">합계</th>
                            </tr> -->
                            <tr>
                                <th class="text-center"><input type="checkbox" onclick="check_all(this);"></th>
                                <th class="text-center">공정</th>
                                <th class="text-center">공종</th>
                                <th class="text-center">품명</th>
                                <th class="text-center">규격</th>
                                <th class="text-center">단위</th>
                                <th class="text-center">수량</th>
                                <th class="text-center">기준년도</th>
                                <th class="text-center">관리</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( $danga_list as $danga ) {
                                $danga_price1_total = (int)$danga->danga_price1_1 + (int)$danga->danga_price1_2 + (int)$danga->danga_price1_3;
                                $danga_price2_total = (int)$danga->danga_price2_1 + (int)$danga->danga_price2_2 + (int)$danga->danga_price2_3;
                                $danga_price3_total = (int)$danga->danga_price3_1 + (int)$danga->danga_price3_2 + (int)$danga->danga_price3_3;
                            ?>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="chk" name="chk[]" value="<?php echo $data->seq; ?>"></td>
                                <td class="text-center"><?php echo MAKE_POINT_TEXT($condition['danga_category1'], $danga->danga_category1); ?></td>
                                <td class="text-center"><?php echo MAKE_POINT_TEXT($condition['danga_category2'], $danga->danga_category2); ?></td>
                                <td><?php echo MAKE_POINT_TEXT($condition['keyword'], $danga->danga_name); ?></td>
                                <td><?php echo MAKE_POINT_TEXT($condition['keyword'], $danga->danga_standard); ?></td>
                                <td class="text-center"><?php echo $danga->danga_unit; ?></td>
                                <td class="text-center"><?php echo $danga->danga_qty; ?></td>
                                <td class="text-center"><?php echo $danga->danga_year; ?>2019</td>
                                <td class="text-center"></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</div>