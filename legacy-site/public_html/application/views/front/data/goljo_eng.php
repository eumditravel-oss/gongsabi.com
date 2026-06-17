
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Analysis of Structural Frame Quantity Per Area</h2>
                        <p>
                            You are able to search the frame quantity per area.
                        </p>
                        <p class="fsxs mt-5">※ GongSaBi.com shall not in any event be liable for economic loss in any form, such as indirect or consequential loss or damage, loss of profits or earnings, punitive or special damages however caused, or for any loss to purchasers and other third parties to the other, and reliability of data.</p>
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
										    <?php echo ( $condition['c4'] == '1' ) ? 'Apartment, Mixed-use building, Studio, Small apartment building' : ''; ?>
											<?php echo ( $condition['c4'] == '2' ) ? 'Amenities, Office, Research facilities, Government office' : ''; ?>
											<?php echo ( $condition['c4'] == '3' ) ? 'Cultural, Religious facilities, Shopping facilities, Medical facilities, Sports facilities' : ''; ?>
											<?php echo ( $condition['c4'] == '4' ) ? 'Factory, Storage' : ''; ?>
											<?php echo ( $condition['c4'] == '5' ) ? 'Others' : ''; ?>
											<?php echo ( $condition['c4'] == '' ) ? 'Type of building' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu max">
									    	<div class="dropdown-menu-option" data-value="">Type of building</div>
									        <div class="dropdown-menu-option" data-value="1">Apartment, Mixed-use building, Studio, Small apartment building</div>
									        <div class="dropdown-menu-option" data-value="2">Amenities, Office, Research facilities, Government office</div>
									        <div class="dropdown-menu-option" data-value="3">Cultural, Religious facilities, Shopping facilities, Medical facilities, Sports facilities</div>
									        <div class="dropdown-menu-option" data-value="4">Factory, Storage</div>
									        <div class="dropdown-menu-option" data-value="5">Others</div>
									    </div>

									    <input type="hidden" name="c4" value="<?php echo $condition['c4']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="danga_category1" id="danga_category1" class="form-control select-align-center">
										<option value="" selected="true">Type of building</option>
										<option value="아파트"<?php echo ( $condition['danga_category1'] == '아파트' ) ? ' selected="true"' : ''; ?>>Apartment</option>
										<option value="주상복합"<?php echo ( $condition['danga_category1'] == '주상복합' ) ? ' selected="true"' : ''; ?>>Mixed-use building</option>
										<option value="오피스텔"<?php echo ( $condition['danga_category1'] == '오피스텔' ) ? ' selected="true"' : ''; ?>>Studio</option>
										<option value="빌라"<?php echo ( $condition['danga_category1'] == '빌라' ) ? ' selected="true"' : ''; ?>>Small apartment building</option>
										<option value="단독주택"<?php echo ( $condition['danga_category1'] == '단독주택' ) ? ' selected="true"' : ''; ?>>House</option>
										<option value="근생"<?php echo ( $condition['danga_category1'] == '근생' ) ? ' selected="true"' : ''; ?>>Amenities</option>
										<option value="문화및집회"<?php echo ( $condition['danga_category1'] == '문화및집회' ) ? ' selected="true"' : ''; ?>>Cultural and assembly facilities</option>
										<option value="종교"<?php echo ( $condition['danga_category1'] == '종교' ) ? ' selected="true"' : ''; ?>>Religious facilities</option>
										<option value="판매"<?php echo ( $condition['danga_category1'] == '판매' ) ? ' selected="true"' : ''; ?>>Shopping facilities</option>
										<option value="의료"<?php echo ( $condition['danga_category1'] == '의료' ) ? ' selected="true"' : ''; ?>>Medical facilities</option>
										<option value="교육연구"<?php echo ( $condition['danga_category1'] == '교육연구' ) ? ' selected="true"' : ''; ?>>Educational and research facilities</option>
										<option value="운동"<?php echo ( $condition['danga_category1'] == '운동' ) ? ' selected="true"' : ''; ?>>Sports facilities</option>
										<option value="업무"<?php echo ( $condition['danga_category1'] == '업무' ) ? ' selected="true"' : ''; ?>>Business facilities</option>
										<option value="숙박"<?php echo ( $condition['danga_category1'] == '숙박' ) ? ' selected="true"' : ''; ?>>Accommodation facilities</option>
										<option value="공장"<?php echo ( $condition['danga_category1'] == '공장' ) ? ' selected="true"' : ''; ?>>Factory</option>
										<option value="창고"<?php echo ( $condition['danga_category1'] == '창고' ) ? ' selected="true"' : ''; ?>>Storage</option>
										<option value="기타"<?php echo ( $condition['danga_category1'] == '기타' ) ? ' selected="true"' : ''; ?>>Others</option>
									</select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <!-- Single Input Box Area -->
                                <div class="form-group down_arrow">
                                	<div class="dropdown">
									    <div class="dropdown-title">
											<?php echo ( $condition['d7'] == '라멘토' ) ? 'Rahmen structure' : ''; ?>
											<?php echo ( $condition['d7'] == '벽식' ) ? 'Wall column structure' : ''; ?>
											<?php echo ( $condition['d7'] == '무량판' ) ? 'Mushroom structure' : ''; ?>
											<?php echo ( $condition['d7'] == '철골' ) ? 'Structural steel' : ''; ?>
											<?php echo ( $condition['d7'] == '' ) ? 'Type of building' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu max">
									    	<div class="dropdown-menu-option" data-value="">Steel Frame Structure Type</div>
											<div class="dropdown-menu-option" data-value="라멘토">Rahmen structure</div>
											<div class="dropdown-menu-option" data-value="벽식">Wall column structure</div>
											<div class="dropdown-menu-option" data-value="무량판">Mushroom structure</div>
											<div class="dropdown-menu-option" data-value="철골">Structural steel</div>
									    </div>

									    <input type="hidden" name="d7" value="<?php echo $condition['d7']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="d7" id="d7" class="form-control select-align-center">
										<option value="" selected="true">Steel Frame Structure Type</option>
										<option value="라멘토"<?php echo ( $condition['d7'] == '라멘토' ) ? ' selected="true"' : ''; ?>>Rahmen structure</option>
										<option value="벽식"<?php echo ( $condition['d7'] == '벽식' ) ? ' selected="true"' : ''; ?>>Wall column structure</option>
										<option value="무량판"<?php echo ( $condition['d7'] == '무량판' ) ? ' selected="true"' : ''; ?>>Mushroom structure</option>
										<option value="철골"<?php echo ( $condition['d7'] == '철골' ) ? ' selected="true"' : ''; ?>>Structural steel</option>
									</select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <!-- Single Input Box Area -->
                                <div class="form-group down_arrow">
                                	<div class="dropdown">
									    <div class="dropdown-title">
											<?php echo ( $condition['c9'] == '서울' ) ? 'Seoul' : ''; ?>
											<?php echo ( $condition['c9'] == '경기도' ) ? 'Gyeonggi Province' : ''; ?>
											<?php echo ( $condition['c9'] == '인천시' ) ? 'Incheon' : ''; ?>
											<?php echo ( $condition['c9'] == '부산시' ) ? 'Busan' : ''; ?>
											<?php echo ( $condition['c9'] == '대전시' ) ? 'Daejeon' : ''; ?>
											<?php echo ( $condition['c9'] == '대구시' ) ? 'Daegu' : ''; ?>
											<?php echo ( $condition['c9'] == '울산시' ) ? 'Ulsan' : ''; ?>
											<?php echo ( $condition['c9'] == '세종시' ) ? 'Sejong' : ''; ?>
											<?php echo ( $condition['c9'] == '광주시' ) ? 'Gwangju' : ''; ?>
											<?php echo ( $condition['c9'] == '강원도' ) ? 'Gangwon Province' : ''; ?>
											<?php echo ( $condition['c9'] == '충청도' ) ? 'Chungcheong Province' : ''; ?>
											<?php echo ( $condition['c9'] == '경상도' ) ? 'Gyeongsang Province' : ''; ?>
											<?php echo ( $condition['c9'] == '전라도' ) ? 'Jeolla Province' : ''; ?>
											<?php echo ( $condition['c9'] == '제주도' ) ? 'Jeju Province' : ''; ?>
											<?php echo ( $condition['c9'] == '' ) ? 'City' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu">
									    	<div class="dropdown-menu-option" data-value="">City</div>
											<div class="dropdown-menu-option" data-value="서울">Seoul</div>
											<div class="dropdown-menu-option" data-value="경기도">Gyeonggi Province</div>
											<div class="dropdown-menu-option" data-value="인천시">Incheon</div>
											<div class="dropdown-menu-option" data-value="부산시">Busan</div>
											<div class="dropdown-menu-option" data-value="대전시">Daejeon</div>
											<div class="dropdown-menu-option" data-value="대구시">Daegu</div>
											<div class="dropdown-menu-option" data-value="울산시">Ulsan</div>
											<div class="dropdown-menu-option" data-value="세종시">Sejong</div>
											<div class="dropdown-menu-option" data-value="광주시">Gwangju</div>
											<div class="dropdown-menu-option" data-value="강원도">Gangwon Province</div>
											<div class="dropdown-menu-option" data-value="충청도">Chungcheong Province</div>
											<div class="dropdown-menu-option" data-value="경상도">Gyeongsang Province</div>
											<div class="dropdown-menu-option" data-value="전라도">Jeolla Province</div>
											<div class="dropdown-menu-option" data-value="제주도">Jeju Province</div>
									    </div>

									    <input type="hidden" name="c9" value="<?php echo $condition['c9']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="c9" id="c9" class="form-control select-align-center">
										<option value="" selected="true">Area</option>
										<option value="서울"<?php echo ( $condition['c9'] == '서울' ) ? ' selected="true"' : ''; ?>>Seoul</option>
										<option value="경기도"<?php echo ( $condition['c9'] == '경기도' ) ? ' selected="true"' : ''; ?>>Gyeonggi Province</option>
										<option value="인천시"<?php echo ( $condition['c9'] == '인천시' ) ? ' selected="true"' : ''; ?>>Incheon</option>
										<option value="부산시"<?php echo ( $condition['c9'] == '부산시' ) ? ' selected="true"' : ''; ?>>Busan</option>
										<option value="대전시"<?php echo ( $condition['c9'] == '대전시' ) ? ' selected="true"' : ''; ?>>Daejeon</option>
										<option value="대구시"<?php echo ( $condition['c9'] == '대구시' ) ? ' selected="true"' : ''; ?>>Daegu</option>
										<option value="울산시"<?php echo ( $condition['c9'] == '울산시' ) ? ' selected="true"' : ''; ?>>Ulsan</option>
										<option value="세종시"<?php echo ( $condition['c9'] == '세종시' ) ? ' selected="true"' : ''; ?>>Sejong</option>
										<option value="광주시"<?php echo ( $condition['c9'] == '광주시' ) ? ' selected="true"' : ''; ?>>Gwangju</option>
										<option value="강원도"<?php echo ( $condition['c9'] == '강원도' ) ? ' selected="true"' : ''; ?>>Gangwon Province</option>
										<option value="충청도"<?php echo ( $condition['c9'] == '충청도' ) ? ' selected="true"' : ''; ?>>Chungcheong Province</option>
										<option value="경상도"<?php echo ( $condition['c9'] == '경상도' ) ? ' selected="true"' : ''; ?>>Gyeongsang Province</option>
										<option value="전라도"<?php echo ( $condition['c9'] == '전라도' ) ? ' selected="true"' : ''; ?>>Jeolla Province</option>
										<option value="제주도"<?php echo ( $condition['c9'] == '제주도' ) ? ' selected="true"' : ''; ?>>Jeju Province</option>
									</select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <!-- Single Input Box Area -->
                                <div class="form-group down_arrow">
                                	<div class="dropdown">
									    <div class="dropdown-title">
											<?php echo ( $condition['c11'] == '1999년' ) ? '1999' : ''; ?>
											<?php echo ( $condition['c11'] == '2000년' ) ? '2000' : ''; ?>
											<?php echo ( $condition['c11'] == '2001년' ) ? '2001' : ''; ?>
											<?php echo ( $condition['c11'] == '2002년' ) ? '2002' : ''; ?>
											<?php echo ( $condition['c11'] == '2003년' ) ? '2003' : ''; ?>
											<?php echo ( $condition['c11'] == '2004년' ) ? '2004' : ''; ?>
											<?php echo ( $condition['c11'] == '2005년' ) ? '2005' : ''; ?>
											<?php echo ( $condition['c11'] == '2006년' ) ? '2006' : ''; ?>
											<?php echo ( $condition['c11'] == '2007년' ) ? '2007' : ''; ?>
											<?php echo ( $condition['c11'] == '2008년' ) ? '2008' : ''; ?>
											<?php echo ( $condition['c11'] == '2009년' ) ? '2009' : ''; ?>
											<?php echo ( $condition['c11'] == '2010년' ) ? '2010' : ''; ?>
											<?php echo ( $condition['c11'] == '2011년' ) ? '2011' : ''; ?>
											<?php echo ( $condition['c11'] == '2012년' ) ? '2012' : ''; ?>
											<?php echo ( $condition['c11'] == '2013년' ) ? '2013' : ''; ?>
											<?php echo ( $condition['c11'] == '2014년' ) ? '2014' : ''; ?>
											<?php echo ( $condition['c11'] == '2015년' ) ? '2015' : ''; ?>
											<?php echo ( $condition['c11'] == '2016년' ) ? '2016' : ''; ?>
											<?php echo ( $condition['c11'] == '2017년' ) ? '2017' : ''; ?>
											<?php echo ( $condition['c11'] == '2018년' ) ? '2018' : ''; ?>
											<?php echo ( $condition['c11'] == '2019년' ) ? '2019' : ''; ?>
											<?php echo ( $condition['c11'] == '2020년' ) ? '2020' : ''; ?>
											<?php echo ( $condition['c11'] == '' ) ? 'Year of construction' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu">
									    	<div class="dropdown-menu-option" data-value="">Year of construction</div>
									        <div class="dropdown-menu-option" data-value="1999년">1999</div>
	                                        <div class="dropdown-menu-option" data-value="2000년">2000</div>
	                                        <div class="dropdown-menu-option" data-value="2001년">2001</div>
	                                        <div class="dropdown-menu-option" data-value="2002년">2002</div>
	                                        <div class="dropdown-menu-option" data-value="2003년">2003</div>
	                                        <div class="dropdown-menu-option" data-value="2004년">2004</div>
	                                        <div class="dropdown-menu-option" data-value="2005년">2005</div>
	                                        <div class="dropdown-menu-option" data-value="2006년">2006</div>
	                                        <div class="dropdown-menu-option" data-value="2007년">2007</div>
	                                        <div class="dropdown-menu-option" data-value="2008년">2008</div>
	                                        <div class="dropdown-menu-option" data-value="2009년">2009</div>
	                                        <div class="dropdown-menu-option" data-value="2010년">2010</div>
											<div class="dropdown-menu-option" data-value="2011년">2011</div>
											<div class="dropdown-menu-option" data-value="2012년">2012</div>
											<div class="dropdown-menu-option" data-value="2013년">2013</div>
											<div class="dropdown-menu-option" data-value="2014년">2014</div>
											<div class="dropdown-menu-option" data-value="2015년">2015</div>
											<div class="dropdown-menu-option" data-value="2016년">2016</div>
											<div class="dropdown-menu-option" data-value="2017년">2017</div>
											<div class="dropdown-menu-option" data-value="2018년">2018</div>
											<div class="dropdown-menu-option" data-value="2019년">2019</div>
											<div class="dropdown-menu-option" data-value="2020년">2020</div>
									    </div>

									    <input type="hidden" name="c11" value="<?php echo $condition['c11']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="c11" id="c11" class="form-control select-align-center">
										<option value="" selected="true">Year of construction</option>
										<option value="1999년"<?php echo ( $condition['c11'] == '1999년' ) ? ' selected="true"' : ''; ?>>1999</option>
                                        <option value="2000년"<?php echo ( $condition['c11'] == '2000년' ) ? ' selected="true"' : ''; ?>>2000</option>
                                        <option value="2001년"<?php echo ( $condition['c11'] == '2001년' ) ? ' selected="true"' : ''; ?>>2001</option>
                                        <option value="2002년"<?php echo ( $condition['c11'] == '2002년' ) ? ' selected="true"' : ''; ?>>2002</option>
                                        <option value="2003년"<?php echo ( $condition['c11'] == '2003년' ) ? ' selected="true"' : ''; ?>>2003</option>
                                        <option value="2004년"<?php echo ( $condition['c11'] == '2004년' ) ? ' selected="true"' : ''; ?>>2004</option>
                                        <option value="2005년"<?php echo ( $condition['c11'] == '2005년' ) ? ' selected="true"' : ''; ?>>2005</option>
                                        <option value="2006년"<?php echo ( $condition['c11'] == '2006년' ) ? ' selected="true"' : ''; ?>>2006</option>
                                        <option value="2007년"<?php echo ( $condition['c11'] == '2007년' ) ? ' selected="true"' : ''; ?>>2007</option>
                                        <option value="2008년"<?php echo ( $condition['c11'] == '2008년' ) ? ' selected="true"' : ''; ?>>2008</option>
                                        <option value="2009년"<?php echo ( $condition['c11'] == '2009년' ) ? ' selected="true"' : ''; ?>>2009</option>
                                        <option value="2010년"<?php echo ( $condition['c11'] == '2010년' ) ? ' selected="true"' : ''; ?>>2010</option>
										<option value="2011년"<?php echo ( $condition['c11'] == '2011년' ) ? ' selected="true"' : ''; ?>>2011</option>
										<option value="2012년"<?php echo ( $condition['c11'] == '2012년' ) ? ' selected="true"' : ''; ?>>2012</option>
										<option value="2013년"<?php echo ( $condition['c11'] == '2013년' ) ? ' selected="true"' : ''; ?>>2013</option>
										<option value="2014년"<?php echo ( $condition['c11'] == '2014년' ) ? ' selected="true"' : ''; ?>>2014</option>
										<option value="2015년"<?php echo ( $condition['c11'] == '2015년' ) ? ' selected="true"' : ''; ?>>2015</option>
										<option value="2016년"<?php echo ( $condition['c11'] == '2016년' ) ? ' selected="true"' : ''; ?>>2016</option>
										<option value="2017년"<?php echo ( $condition['c11'] == '2017년' ) ? ' selected="true"' : ''; ?>>2017</option>
										<option value="2018년"<?php echo ( $condition['c11'] == '2018년' ) ? ' selected="true"' : ''; ?>>2018</option>
										<option value="2019년"<?php echo ( $condition['c11'] == '2019년' ) ? ' selected="true"' : ''; ?>>2019</option>
										<option value="2020년"<?php echo ( $condition['c11'] == '2020년' ) ? ' selected="true"' : ''; ?>>2020</option>
									</select> -->
                                </div>
                            </div>
                        </div>
                       	<div class="row m-top-15">
                            <div class="col-12 col-md-9 m-xs-top-15">
                                <!-- Single Input Box Area -->
                                <div class="form-group">
                                	<input type="text" name="keyword" id="keyword" value="<?php echo $condition['keyword']; ?>" class="form-control" placeholder="Search for type, city, year">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-default btn-block">Search</button>
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
                            <h4>Results : Founded <?php echo number_format($danga_count); ?> Result(s)</h4>
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
									<th rowspan="2">Process</th>
									<th rowspan="2">Work</th>
									<th rowspan="2">Item</th>
									<th rowspan="2">Size</th>
									<th rowspan="2">Unit</th>
									<th rowspan="2">Qty</th>
									<th rowspan="2">Year</th>
									<th colspan="4">Potential price</th>
									<th colspan="4">Contract price</th>
									<th colspan="4">Actual price</th>
									<th rowspan="2">Details</th>
								</tr>
								<tr class="bg-gray">
									<th>Materials cost</th>
									<th>Labor cost</th>
									<th>Overhead Cost</th>
									<th>Total</th>
									<th>Materials cost</th>
									<th>Labor cost</th>
									<th>Overhead Cost</th>
									<th>Total</th>
									<th>Materials cost</th>
									<th>Labor cost</th>
									<th>Overhead Cost</th>
									<th>Total</th>
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