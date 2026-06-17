
    <div class="classy-hero-blocks hero-blocks-3 height-400 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">골조 면적별 수량</h2>
                        <p>
                            해당 건축물의 골조를 면적별로 수량을 검색할 수 있습니다.<br>
                            비회원과 무료회원일 경우, 샘플만 검색이  가능하고<br>
                            <a href="<?php echo ( !$this->session->userdata('MEMBER_SESSION') ) ? '/front/auth/regist' : '/front/mypage/info/info2'; ?>"><span class="mfc fb">유료회원 가입</span></a>을 하시면 공사비의 모든 정보를 검색하실 수 있습니다.
                        </p>
                        <p class="fsxs mt-5">※ 공사비닷컴에서 제공되는 서비스 및 자료는 참고용이므로<br>손실이나 손해에 관하여 법적책임을 지지 않습니다.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search_wrapper">
                    <form method="get" class="">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <!-- Single Input Box Area -->
                                <div class="form-group down_arrow">
                                	<div class="dropdown">
									    <div class="dropdown-title">
										    <?php echo ( $condition['c4'] == '1' ) ? '아파트, 주상복합, 오피스텔, 빌라' : ''; ?>
											<?php echo ( $condition['c4'] == '2' ) ? '근생, 오피스, 연구시설, 관청' : ''; ?>
											<?php echo ( $condition['c4'] == '3' ) ? '문화, 종교, 판매, 의료, 운동' : ''; ?>
											<?php echo ( $condition['c4'] == '4' ) ? '공장, 창고' : ''; ?>
											<?php echo ( $condition['c4'] == '5' ) ? '기타' : ''; ?>
											<?php echo ( $condition['c4'] == '' ) ? '건물 종류' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu">
									    	<div class="dropdown-menu-option" data-value="">건물 종류</div>
									        <div class="dropdown-menu-option" data-value="1">아파트, 주상복합, 오피스텔, 빌라</div>
									        <div class="dropdown-menu-option" data-value="2">근생, 오피스, 연구시설, 관청</div>
									        <div class="dropdown-menu-option" data-value="3">문화, 종교, 판매, 의료, 운동</div>
									        <div class="dropdown-menu-option" data-value="4">공장, 창고</div>
									        <div class="dropdown-menu-option" data-value="5">기타</div>
									    </div>

									    <input type="hidden" name="c4" value="<?php echo $condition['c4']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="c4" id="c4" class="form-control select-align-center">
										<option value="" selected="true">건물 종류</option>
										<option value="아파트"<?php echo ( $condition['c4'] == '아파트' ) ? ' selected="true"' : ''; ?>>아파트</option>
										<option value="주상복합"<?php echo ( $condition['c4'] == '주상복합' ) ? ' selected="true"' : ''; ?>>주상복합</option>
										<option value="오피스텔"<?php echo ( $condition['c4'] == '오피스텔' ) ? ' selected="true"' : ''; ?>>오피스텔</option>
										<option value="빌라"<?php echo ( $condition['c4'] == '빌라' ) ? ' selected="true"' : ''; ?>>빌라</option>
										<option value="단독주택"<?php echo ( $condition['c4'] == '단독주택' ) ? ' selected="true"' : ''; ?>>단독주택</option>
										<option value="근생"<?php echo ( $condition['c4'] == '근생' ) ? ' selected="true"' : ''; ?>>근생</option>
										<option value="문화및집회"<?php echo ( $condition['c4'] == '문화및집회' ) ? ' selected="true"' : ''; ?>>문화및집회</option>
										<option value="종교"<?php echo ( $condition['c4'] == '종교' ) ? ' selected="true"' : ''; ?>>종교</option>
										<option value="판매"<?php echo ( $condition['c4'] == '판매' ) ? ' selected="true"' : ''; ?>>판매</option>
										<option value="의료"<?php echo ( $condition['c4'] == '의료' ) ? ' selected="true"' : ''; ?>>의료</option>
										<option value="교육연구"<?php echo ( $condition['c4'] == '교육연구' ) ? ' selected="true"' : ''; ?>>교육연구</option>
										<option value="운동"<?php echo ( $condition['c4'] == '운동' ) ? ' selected="true"' : ''; ?>>운동</option>
										<option value="업무"<?php echo ( $condition['c4'] == '업무' ) ? ' selected="true"' : ''; ?>>업무</option>
										<option value="숙박"<?php echo ( $condition['c4'] == '숙박' ) ? ' selected="true"' : ''; ?>>숙박</option>
										<option value="공장"<?php echo ( $condition['c4'] == '공장' ) ? ' selected="true"' : ''; ?>>공장</option>
										<option value="창고"<?php echo ( $condition['c4'] == '창고' ) ? ' selected="true"' : ''; ?>>창고</option>
										<option value="기타"<?php echo ( $condition['c4'] == '기타' ) ? ' selected="true"' : ''; ?>>기타</option>
									</select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <!-- Single Input Box Area -->
                                <div class="form-group down_arrow">
                                	<div class="dropdown">
									    <div class="dropdown-title">
											<?php echo ( $condition['d7'] == 'R.C조' ) ? 'R.C조' : ''; ?>
											<?php echo ( $condition['d7'] == 'S.R.C조' ) ? 'S.R.C조' : ''; ?>
											<?php echo ( $condition['d7'] == 'S.C조' ) ? 'S.C조' : ''; ?>
											<?php echo ( $condition['d7'] == '' ) ? '구조형식' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu">
									    	<div class="dropdown-menu-option" data-value="">구조형식</div>
											<div class="dropdown-menu-option" data-value="R.C조">R.C조</div>
											<div class="dropdown-menu-option" data-value="S.R.C조">S.R.C조</div>
											<div class="dropdown-menu-option" data-value="S.C조">S.C조</div>
									    </div>

									    <input type="hidden" name="d7" value="<?php echo $condition['d7']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="danga_category2" id="danga_category2" class="form-control select-align-center">
										<option value="" selected="true">구조형식</option>
										<option value="R.C조"<?php echo ( $condition['d7'] == 'R.C조' ) ? ' selected="true"' : ''; ?>>R.C조</option>
										<option value="S.R.C조"<?php echo ( $condition['d7'] == 'S.R.C조' ) ? ' selected="true"' : ''; ?>>S.R.C조</option>
										<option value="S.C조"<?php echo ( $condition['d7'] == 'S.C조' ) ? ' selected="true"' : ''; ?>>S.C조</option>
									</select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <div class="form-group down_arrow">
                                	<div class="dropdown">
									    <div class="dropdown-title">
											<?php echo ( $condition['c7'] == '1' ) ? '1,000 미만' : ''; ?>
											<?php echo ( $condition['c7'] == '2' ) ? '~ 5,000 미만' : ''; ?>
											<?php echo ( $condition['c7'] == '3' ) ? '~ 10,000 미만' : ''; ?>
											<?php echo ( $condition['c7'] == '4' ) ? '~ 20,000 미만' : ''; ?>
											<?php echo ( $condition['c7'] == '5' ) ? '~ 40,000 미만' : ''; ?>
											<?php echo ( $condition['c7'] == '6' ) ? '~ 60,000 미만' : ''; ?>
											<?php echo ( $condition['c7'] == '7' ) ? '~ 100,000 미만' : ''; ?>
											<?php echo ( $condition['c7'] == '8' ) ? '~ 150,000 초과' : ''; ?>
											<?php echo ( $condition['c7'] == '' ) ? '면적(㎡)' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu">
									    	<div class="dropdown-menu-option" data-value="">면적(㎡)</div>
											<div class="dropdown-menu-option" data-value="1">1,000 미만</div>
											<div class="dropdown-menu-option" data-value="2">~ 5,000 미만</div>
											<div class="dropdown-menu-option" data-value="3">~ 10,000 미만</div>
											<div class="dropdown-menu-option" data-value="4">~ 20,000 미만</div>
											<div class="dropdown-menu-option" data-value="5">~ 40,000 미만</div>
											<div class="dropdown-menu-option" data-value="6">~ 60,000 미만</div>
											<div class="dropdown-menu-option" data-value="7">~ 100,000 미만</div>
											<div class="dropdown-menu-option" data-value="8">~ 150,000 초과</div>
									    </div>

									    <input type="hidden" name="c7" value="<?php echo $condition['c7']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="c7" id="c7" class="form-control select-align-center">
										<option value="" selected="true">면적(㎡)</option>
										<option value="1"<?php echo ( $condition['c7'] == '1' ) ? ' selected="true"' : ''; ?>>1,000 미만</option>
										<option value="2"<?php echo ( $condition['c7'] == '2' ) ? ' selected="true"' : ''; ?>>~ 5,000 미만</option>
										<option value="3"<?php echo ( $condition['c7'] == '3' ) ? ' selected="true"' : ''; ?>>~ 10,000 미만</option>
										<option value="4"<?php echo ( $condition['c7'] == '4' ) ? ' selected="true"' : ''; ?>>~ 20,000 미만</option>
										<option value="5"<?php echo ( $condition['c7'] == '5' ) ? ' selected="true"' : ''; ?>>~ 40,000 미만</option>
										<option value="6"<?php echo ( $condition['c7'] == '6' ) ? ' selected="true"' : ''; ?>>~ 60,000 미만</option>
										<option value="7"<?php echo ( $condition['c7'] == '7' ) ? ' selected="true"' : ''; ?>>~ 100,000 미만</option>
										<option value="8"<?php echo ( $condition['c7'] == '8' ) ? ' selected="true"' : ''; ?>>~ 150,000 초과</option>
									</select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <!-- Single Input Box Area -->
                                <div class="form-group down_arrow">
                                	<div class="dropdown">
									    <div class="dropdown-title">
											<?php echo ( $condition['c11'] == '1' ) ? '지상 10층 미만' : ''; ?>
											<?php echo ( $condition['c11'] == '2' ) ? '지상 10 ~ 30층' : ''; ?>
											<?php echo ( $condition['c11'] == '3' ) ? '지상 30 ~ 50층' : ''; ?>
											<?php echo ( $condition['c11'] == '4' ) ? '지상 50층 이상' : ''; ?>
											<?php echo ( $condition['c11'] == '' ) ? '층수' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu">
									    	<div class="dropdown-menu-option" data-value="">층수</div>
									        <div class="dropdown-menu-option" data-value="1">지상 10층 미만</div>
	                                        <div class="dropdown-menu-option" data-value="2">지상 10 ~ 30층</div>
	                                        <div class="dropdown-menu-option" data-value="3">지상 30 ~ 50층</div>
	                                        <div class="dropdown-menu-option" data-value="4">지상 50층 이상</div>
									    </div>

									    <input type="hidden" name="c11" value="<?php echo $condition['c11']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="c11" id="c11" class="form-control select-align-center">
										<option value="" selected="true">층수</option>
										<option value="1"<?php echo ( $condition['c11'] == '1' ) ? ' selected="true"' : ''; ?>>지상 10층 미만</option>
                                        <option value="2"<?php echo ( $condition['c11'] == '2' ) ? ' selected="true"' : ''; ?>>지상 10 ~ 30층</option>
                                        <option value="3"<?php echo ( $condition['c11'] == '3' ) ? ' selected="true"' : ''; ?>>지상 30 ~ 50층</option>
                                        <option value="4"<?php echo ( $condition['c11'] == '4' ) ? ' selected="true"' : ''; ?>>지상 50층 이상</option>
									</select> -->
                                </div>
                            </div>
                        </div>
                       	<div class="row m-top-15">
                            <div class="col-12 col-md-9 m-xs-top-15">
                                <!-- Single Input Box Area -->
                                <div class="form-group">
                                	<input type="text" name="keyword" id="keyword" value="<?php echo $condition['keyword']; ?>" class="form-control" placeholder="검색어를 입력해 주십시오.">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-default btn-block">검색</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<section class="shortcodes_content_area section_padding_0_100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>검색결과 : <?php echo number_format($danga_count); ?>건</h4>
                        </div>
                        <div class="row m-bottom-15">
                        	<div class="col-lg-6">
							</div>
                        	<div class="col-lg-6 text-right">
                        		<!-- <button type="button" class="btn btn-mat-green">엑셀다운로드</button> -->
                        	</div>
                        </div>
                        <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
							<thead>
								<tr class="bg-gray">
									<th rowspan="2">공정</th>
									<th rowspan="2">공종</th>
									<th rowspan="2">품명</th>
									<th rowspan="2">규격</th>
									<th rowspan="2">단위</th>
									<th rowspan="2">수량</th>
									<th rowspan="2">기준년도</th>
									<th colspan="4">설계가</th>
									<th colspan="4">도급가</th>
									<th colspan="4">실행가</th>
									<th rowspan="2">상세</th>
								</tr>
								<tr class="bg-gray">
									<th>재료비</th>
									<th>노무비</th>
									<th>경비</th>
									<th>합계</th>
									<th>재료비</th>
									<th>노무비</th>
									<th>경비</th>
									<th>합계</th>
									<th>재료비</th>
									<th>노무비</th>
									<th>경비</th>
									<th>합계</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ( $danga_list as $danga ) {
									$danga_price1_total = (int)$danga->danga_price1_1 + (int)$danga->danga_price1_2 + (int)$danga->danga_price1_3;
									$danga_price2_total = (int)$danga->danga_price2_1 + (int)$danga->danga_price2_2 + (int)$danga->danga_price2_3;
									$danga_price3_total = (int)$danga->danga_price3_1 + (int)$danga->danga_price3_2 + (int)$danga->danga_price3_3;
								?>
								<tr>
									<td class="text-center"><?php echo MAKE_POINT_TEXT($condition['danga_category1'], $danga->danga_category1); ?></td>
									<td class="text-center"><?php echo MAKE_POINT_TEXT($condition['danga_category2'], $danga->danga_category2); ?></td>
									<td class="text-center"><?php echo MAKE_POINT_TEXT($condition['keyword'], $danga->danga_name); ?></td>
									<td class="text-center"><?php echo MAKE_POINT_TEXT($condition['keyword'], $danga->danga_standard); ?></td>
									<td class="text-center"><?php echo $danga->danga_unit; ?></td>
									<td class="text-center"><?php echo $danga->danga_qty; ?></td>
									<td class="text-center"><?php echo $danga->danga_year; ?>2019</td>
									<td class="text-right"><?php echo number_format((int)$danga->danga_price1_1); ?></td>
									<td class="text-right"><?php echo number_format((int)$danga->danga_price1_2); ?></td>
									<td class="text-right"><?php echo number_format((int)$danga->danga_price1_3); ?></td>
									<td class="text-right"><?php echo number_format($danga_price1_total); ?></td>
									<td class="text-right"><?php echo number_format((int)$danga->danga_price2_1); ?></td>
									<td class="text-right"><?php echo number_format((int)$danga->danga_price2_2); ?></td>
									<td class="text-right"><?php echo number_format((int)$danga->danga_price2_3); ?></td>
									<td class="text-right"><?php echo number_format($danga_price2_total); ?></td>
									<td class="text-right"><?php echo number_format((int)$danga->danga_price3_1); ?></td>
									<td class="text-right"><?php echo number_format((int)$danga->danga_price3_2); ?></td>
									<td class="text-right"><?php echo number_format((int)$danga->danga_price3_3); ?></td>
									<td class="text-right"><?php echo number_format($danga_price3_total); ?></td>
									<td class="text-center"><button type="button" class="btn btn-sm btn-success" onclick="not_grade();">보기</button></td>
								</tr>
								<?php } ?>
							</tbody>
                        </table>
						<?php if ( $this->session->userdata('MEMBER_SESSION') ) { ?>
                        <div class="row m-top-15">
                        	<div class="col-12">
		                        <nav>
									<?php echo $pagination; ?>
								</nav>
							</div>
                        </div>
                        <?php } else { ?>
                        <?php if ( count($danga_list) > 0 ) { ?>
                        <div class="row m-top-15">
                        	<div class="col-12 text-center">
								<?php if ( $this->session->userdata('MEMBER')['member_type'] == '2' ) { ?>
		                    	<button type="button" class="btn btn-sm btn-success" onclick="not_grade();">더보기</button>
                        		<?php } else { ?>
		                    	<button type="button" class="btn btn-sm btn-success" onclick="login_required();">더보기</button>
                    			<?php } ?>
							</div>
                        </div>
                    	<?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>