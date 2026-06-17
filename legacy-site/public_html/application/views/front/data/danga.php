
    <div class="classy-hero-blocks hero-blocks-3 height-400 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">공사 단가 검색</h2>
                        <p>
                            건축, 토목, 기계, 전기 등 각 공종별 공사 자재의<br>
                            설계가, 도급가, 실행가를 검색할 수 있습니다.<br>
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
											<?php echo ( $condition['danga_category1'] == '공통가설' ) ? '공통가설' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '건축' ) ? '건축' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '토목' ) ? '토목' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '기계' ) ? '기계' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '전기' ) ? '전기' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '통신' ) ? '통신' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '소방' ) ? '소방' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '부대' ) ? '부대' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '조경' ) ? '조경' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '' ) ? '공정' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu">
									    	<div class="dropdown-menu-option" data-value="">공정</div>
											<div class="dropdown-menu-option" data-value="공통가설">공통가설</div>
											<div class="dropdown-menu-option" data-value="건축">건축</div>
											<div class="dropdown-menu-option" data-value="토목">토목</div>
											<div class="dropdown-menu-option" data-value="기계">기계</div>
											<div class="dropdown-menu-option" data-value="전기">전기</div>
											<div class="dropdown-menu-option" data-value="통신">통신</div>
											<div class="dropdown-menu-option" data-value="소방">소방</div>
											<div class="dropdown-menu-option" data-value="부대">부대</div>
											<div class="dropdown-menu-option" data-value="조경">조경</div>
									    </div>

									    <input type="hidden" name="danga_category1" value="<?php echo $condition['danga_category1']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="danga_category1" id="danga_category1" class="form-control select-align-center">
										<option value="" selected="true">공정</option>
										<option value="공통가설"<?php echo ( $condition['danga_category1'] == '공통가설' ) ? ' selected="true"' : ''; ?>>공통가설</option>
										<option value="건축"<?php echo ( $condition['danga_category1'] == '건축' ) ? ' selected="true"' : ''; ?>>건축</option>
										<option value="토목"<?php echo ( $condition['danga_category1'] == '토목' ) ? ' selected="true"' : ''; ?>>토목</option>
										<option value="기계"<?php echo ( $condition['danga_category1'] == '기계' ) ? ' selected="true"' : ''; ?>>기계</option>
										<option value="전기"<?php echo ( $condition['danga_category1'] == '전기' ) ? ' selected="true"' : ''; ?>>전기</option>
										<option value="통신"<?php echo ( $condition['danga_category1'] == '통신' ) ? ' selected="true"' : ''; ?>>통신</option>
										<option value="소방"<?php echo ( $condition['danga_category1'] == '소방' ) ? ' selected="true"' : ''; ?>>소방</option>
										<option value="부대"<?php echo ( $condition['danga_category1'] == '부대' ) ? ' selected="true"' : ''; ?>>부대</option>
										<option value="조경"<?php echo ( $condition['danga_category1'] == '조경' ) ? ' selected="true"' : ''; ?>>조경</option>
									</select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <!-- Single Input Box Area -->
                                <div class="form-group down_arrow">
                                	<div class="dropdown">
									    <div class="dropdown-title">
											<?php echo ( $condition['danga_category2'] == '가설' ) ? '가설' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '공종' ) ? '공종' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '공통가설' ) ? '공통가설' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '금속' ) ? '금속' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '기타' ) ? '기타' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '노임' ) ? '노임' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '도장' ) ? '도장' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '목' ) ? '목' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '미장' ) ? '미장' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '방수' ) ? '방수' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '부대' ) ? '부대' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '석' ) ? '석' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '수장' ) ? '수장' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '운반비' ) ? '운반비' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '유리' ) ? '유리' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '장비' ) ? '장비' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '조경' ) ? '조경' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '조적' ) ? '조적' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '지붕' ) ? '지붕' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '창호' ) ? '창호' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '철거' ) ? '철거' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '철골' ) ? '철골' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '철근콘크리트' ) ? '철근콘크리트' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '타일' ) ? '타일' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '토' ) ? '토' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '토공사' ) ? '토공사' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '폐기물' ) ? '폐기물' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '' ) ? '공종' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu">
											<div class="dropdown-menu-option" data-value="">공종</div>
											<div class="dropdown-menu-option" data-value="가설">가설</div>
											<div class="dropdown-menu-option" data-value="공종">공종</div>
											<div class="dropdown-menu-option" data-value="공통가설">공통가설</div>
											<div class="dropdown-menu-option" data-value="금속">금속</div>
											<div class="dropdown-menu-option" data-value="기타">기타</div>
											<div class="dropdown-menu-option" data-value="노임">노임</div>
											<div class="dropdown-menu-option" data-value="도장">도장</div>
											<div class="dropdown-menu-option" data-value="목">목</div>
											<div class="dropdown-menu-option" data-value="미장">미장</div>
											<div class="dropdown-menu-option" data-value="방수">방수</div>
											<div class="dropdown-menu-option" data-value="부대">부대</div>
											<div class="dropdown-menu-option" data-value="석">석</div>
											<div class="dropdown-menu-option" data-value="수장">수장</div>
											<div class="dropdown-menu-option" data-value="운반비">운반비</div>
											<div class="dropdown-menu-option" data-value="유리">유리</div>
											<div class="dropdown-menu-option" data-value="장비">장비</div>
											<div class="dropdown-menu-option" data-value="조경">조경</div>
											<div class="dropdown-menu-option" data-value="조적">조적</div>
											<div class="dropdown-menu-option" data-value="지붕">지붕</div>
											<div class="dropdown-menu-option" data-value="창호">창호</div>
											<div class="dropdown-menu-option" data-value="철거">철거</div>
											<div class="dropdown-menu-option" data-value="철골">철골</div>
											<div class="dropdown-menu-option" data-value="철근콘크리트">철근콘크리트</div>
											<div class="dropdown-menu-option" data-value="타일">타일</div>
											<div class="dropdown-menu-option" data-value="토">토</div>
											<div class="dropdown-menu-option" data-value="토공사">토공사</div>
											<div class="dropdown-menu-option" data-value="폐기물">폐기물</div>
									    </div>

									    <input type="hidden" name="danga_category2" value="<?php echo $condition['danga_category2']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="danga_category2" id="danga_category2" class="form-control select-align-center">
										<option value="" selected="true">공종</option>
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
									</select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
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