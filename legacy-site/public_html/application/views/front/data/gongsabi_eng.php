
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Construction Cost Analysis</h2>
                        <p>
                            Construction cost per area can be estimated based on the type of building, area, city and the year of construction.
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
									<!-- <select name="c4" id="c4" class="form-control select-align-center">
										<option value="" selected="true">Type of building</option>
										<option value="1"<?php echo ( $condition['c4'] == '1' ) ? ' selected="true"' : ''; ?>>Apartment, Mixed-use building, Studio, Small apartment building</option>
										<option value="2"<?php echo ( $condition['c4'] == '2' ) ? ' selected="true"' : ''; ?>>Amenities, Office, Research facilities, Government office</option>
										<option value="3"<?php echo ( $condition['c4'] == '3' ) ? ' selected="true"' : ''; ?>>Cultural, Religious facilities, Shopping facilities, Medical facilities, Sports facilities</option>
										<option value="4"<?php echo ( $condition['c4'] == '4' ) ? ' selected="true"' : ''; ?>>Factory, Storage</option>
										<option value="5"<?php echo ( $condition['c4'] == '5' ) ? ' selected="true"' : ''; ?>>Others</option>
									</select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <div class="form-group down_arrow">
                                	<div class="dropdown">
									    <div class="dropdown-title">
											<?php echo ( $condition['c7'] == '1' ) ? 'Under 1,000㎡' : ''; ?>
											<?php echo ( $condition['c7'] == '2' ) ? 'Under 5,000㎡' : ''; ?>
											<?php echo ( $condition['c7'] == '3' ) ? 'Under 10,000㎡' : ''; ?>
											<?php echo ( $condition['c7'] == '4' ) ? 'Under 20,000㎡' : ''; ?>
											<?php echo ( $condition['c7'] == '5' ) ? 'Under 40,000㎡' : ''; ?>
											<?php echo ( $condition['c7'] == '6' ) ? 'Under 60,000㎡' : ''; ?>
											<?php echo ( $condition['c7'] == '7' ) ? 'Under 100,000㎡' : ''; ?>
											<?php echo ( $condition['c7'] == '8' ) ? 'Over 150,000㎡' : ''; ?>
											<?php echo ( $condition['c7'] == '' ) ? 'Area' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu">
									    	<div class="dropdown-menu-option" data-value="">Area</div>
											<div class="dropdown-menu-option" data-value="1">Under 1,000㎡</div>
											<div class="dropdown-menu-option" data-value="2">Under 5,000㎡</div>
											<div class="dropdown-menu-option" data-value="3">Under 10,000㎡</div>
											<div class="dropdown-menu-option" data-value="4">Under 20,000㎡</div>
											<div class="dropdown-menu-option" data-value="5">Under 40,000㎡</div>
											<div class="dropdown-menu-option" data-value="6">Under 60,000㎡</div>
											<div class="dropdown-menu-option" data-value="7">Under 100,000㎡</div>
											<div class="dropdown-menu-option" data-value="8">Over 150,000㎡</div>
									    </div>

									    <input type="hidden" name="c7" value="<?php echo $condition['c7']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="c7" id="c7" class="form-control select-align-center">
										<option value="" selected="true">Area</option>
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
                                <div class="form-group down_arrow">
                                	<div class="dropdown">
									    <div class="dropdown-title">
											<?php echo ( $condition['c9'] == '서울시' ) ? 'Seoul' : ''; ?>
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
											<div class="dropdown-menu-option" data-value="서울시">Seoul</div>
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
										<option value="" selected="true">City</option>
										<option value="서울시"<?php echo ( $condition['c9'] == '서울시' ) ? ' selected="true"' : ''; ?>>서울시</option>
										<option value="경기도"<?php echo ( $condition['c9'] == '경기도' ) ? ' selected="true"' : ''; ?>>경기도</option>
										<option value="인천시"<?php echo ( $condition['c9'] == '인천시' ) ? ' selected="true"' : ''; ?>>인천시</option>
										<option value="부산시"<?php echo ( $condition['c9'] == '부산시' ) ? ' selected="true"' : ''; ?>>부산시</option>
										<option value="대전시"<?php echo ( $condition['c9'] == '대전시' ) ? ' selected="true"' : ''; ?>>대전시</option>
										<option value="대구시"<?php echo ( $condition['c9'] == '대구시' ) ? ' selected="true"' : ''; ?>>대구시</option>
										<option value="울산시"<?php echo ( $condition['c9'] == '울산시' ) ? ' selected="true"' : ''; ?>>울산시</option>
										<option value="세종시"<?php echo ( $condition['c9'] == '세종시' ) ? ' selected="true"' : ''; ?>>세종시</option>
										<option value="광주시"<?php echo ( $condition['c9'] == '광주시' ) ? ' selected="true"' : ''; ?>>광주시</option>
										<option value="강원도"<?php echo ( $condition['c9'] == '강원도' ) ? ' selected="true"' : ''; ?>>강원도</option>
										<option value="충청도"<?php echo ( $condition['c9'] == '충청도' ) ? ' selected="true"' : ''; ?>>충청도</option>
										<option value="경상도"<?php echo ( $condition['c9'] == '경상도' ) ? ' selected="true"' : ''; ?>>경상도</option>
										<option value="전라도"<?php echo ( $condition['c9'] == '전라도' ) ? ' selected="true"' : ''; ?>>전라도</option>
										<option value="제주도"<?php echo ( $condition['c9'] == '제주도' ) ? ' selected="true"' : ''; ?>>제주도</option>
									</select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <div class="form-group down_arrow">
                                	<div class="dropdown">
									    <div class="dropdown-title">
											<?php echo ( $condition['c11'] == '1999' ) ? '1999' : ''; ?>
											<?php echo ( $condition['c11'] == '2000' ) ? '2000' : ''; ?>
											<?php echo ( $condition['c11'] == '2001' ) ? '2001' : ''; ?>
											<?php echo ( $condition['c11'] == '2002' ) ? '2002' : ''; ?>
											<?php echo ( $condition['c11'] == '2003' ) ? '2003' : ''; ?>
											<?php echo ( $condition['c11'] == '2004' ) ? '2004' : ''; ?>
											<?php echo ( $condition['c11'] == '2005' ) ? '2005' : ''; ?>
											<?php echo ( $condition['c11'] == '2006' ) ? '2006' : ''; ?>
											<?php echo ( $condition['c11'] == '2007' ) ? '2007' : ''; ?>
											<?php echo ( $condition['c11'] == '2008' ) ? '2008' : ''; ?>
											<?php echo ( $condition['c11'] == '2009' ) ? '2009' : ''; ?>
											<?php echo ( $condition['c11'] == '2010' ) ? '2010' : ''; ?>
											<?php echo ( $condition['c11'] == '2011' ) ? '2011' : ''; ?>
											<?php echo ( $condition['c11'] == '2012' ) ? '2012' : ''; ?>
											<?php echo ( $condition['c11'] == '2013' ) ? '2013' : ''; ?>
											<?php echo ( $condition['c11'] == '2014' ) ? '2014' : ''; ?>
											<?php echo ( $condition['c11'] == '2015' ) ? '2015' : ''; ?>
											<?php echo ( $condition['c11'] == '2016' ) ? '2016' : ''; ?>
											<?php echo ( $condition['c11'] == '2017' ) ? '2017' : ''; ?>
											<?php echo ( $condition['c11'] == '2018' ) ? '2018' : ''; ?>
											<?php echo ( $condition['c11'] == '2019' ) ? '2019' : ''; ?>
											<?php echo ( $condition['c11'] == '2020' ) ? '2020' : ''; ?>
											<?php echo ( $condition['c11'] == '' ) ? 'Year of construction' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu">
									    	<div class="dropdown-menu-option" data-value="">Year of construction</div>
									        <div class="dropdown-menu-option" data-value="1999">1999</div>
	                                        <div class="dropdown-menu-option" data-value="2000">2000</div>
	                                        <div class="dropdown-menu-option" data-value="2001">2001</div>
	                                        <div class="dropdown-menu-option" data-value="2002">2002</div>
	                                        <div class="dropdown-menu-option" data-value="2003">2003</div>
	                                        <div class="dropdown-menu-option" data-value="2004">2004</div>
	                                        <div class="dropdown-menu-option" data-value="2005">2005</div>
	                                        <div class="dropdown-menu-option" data-value="2006">2006</div>
	                                        <div class="dropdown-menu-option" data-value="2007">2007</div>
	                                        <div class="dropdown-menu-option" data-value="2008">2008</div>
	                                        <div class="dropdown-menu-option" data-value="2009">2009</div>
	                                        <div class="dropdown-menu-option" data-value="2010">2010</div>
											<div class="dropdown-menu-option" data-value="2011">2011</div>
											<div class="dropdown-menu-option" data-value="2012">2012</div>
											<div class="dropdown-menu-option" data-value="2013">2013</div>
											<div class="dropdown-menu-option" data-value="2014">2014</div>
											<div class="dropdown-menu-option" data-value="2015">2015</div>
											<div class="dropdown-menu-option" data-value="2016">2016</div>
											<div class="dropdown-menu-option" data-value="2017">2017</div>
											<div class="dropdown-menu-option" data-value="2018">2018</div>
											<div class="dropdown-menu-option" data-value="2019">2019</div>
											<div class="dropdown-menu-option" data-value="2020">2020</div>
									    </div>

									    <input type="hidden" name="c11" value="<?php echo $condition['c11']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="c11" id="c11" class="form-control select-align-center">
										<option value="" selected="true">Year of construction</option>
										<option value="1999년"<?php echo ( $condition['c11'] == '1999년' ) ? ' selected="true"' : ''; ?>>1999년</option>
                                        <option value="2000년"<?php echo ( $condition['c11'] == '2000년' ) ? ' selected="true"' : ''; ?>>2000년</option>
                                        <option value="2001년"<?php echo ( $condition['c11'] == '2001년' ) ? ' selected="true"' : ''; ?>>2001년</option>
                                        <option value="2002년"<?php echo ( $condition['c11'] == '2002년' ) ? ' selected="true"' : ''; ?>>2002년</option>
                                        <option value="2003년"<?php echo ( $condition['c11'] == '2003년' ) ? ' selected="true"' : ''; ?>>2003년</option>
                                        <option value="2004년"<?php echo ( $condition['c11'] == '2004년' ) ? ' selected="true"' : ''; ?>>2004년</option>
                                        <option value="2005년"<?php echo ( $condition['c11'] == '2005년' ) ? ' selected="true"' : ''; ?>>2005년</option>
                                        <option value="2006년"<?php echo ( $condition['c11'] == '2006년' ) ? ' selected="true"' : ''; ?>>2006년</option>
                                        <option value="2007년"<?php echo ( $condition['c11'] == '2007년' ) ? ' selected="true"' : ''; ?>>2007년</option>
                                        <option value="2008년"<?php echo ( $condition['c11'] == '2008년' ) ? ' selected="true"' : ''; ?>>2008년</option>
                                        <option value="2009년"<?php echo ( $condition['c11'] == '2009년' ) ? ' selected="true"' : ''; ?>>2009년</option>
                                        <option value="2010년"<?php echo ( $condition['c11'] == '2010년' ) ? ' selected="true"' : ''; ?>>2010년</option>
										<option value="2011년"<?php echo ( $condition['c11'] == '2011년' ) ? ' selected="true"' : ''; ?>>2011년</option>
										<option value="2012년"<?php echo ( $condition['c11'] == '2012년' ) ? ' selected="true"' : ''; ?>>2012년</option>
										<option value="2013년"<?php echo ( $condition['c11'] == '2013년' ) ? ' selected="true"' : ''; ?>>2013년</option>
										<option value="2014년"<?php echo ( $condition['c11'] == '2014년' ) ? ' selected="true"' : ''; ?>>2014년</option>
										<option value="2015년"<?php echo ( $condition['c11'] == '2015년' ) ? ' selected="true"' : ''; ?>>2015년</option>
										<option value="2016년"<?php echo ( $condition['c11'] == '2016년' ) ? ' selected="true"' : ''; ?>>2016년</option>
										<option value="2017년"<?php echo ( $condition['c11'] == '2017년' ) ? ' selected="true"' : ''; ?>>2017년</option>
										<option value="2018년"<?php echo ( $condition['c11'] == '2018년' ) ? ' selected="true"' : ''; ?>>2018년</option>
										<option value="2019년"<?php echo ( $condition['c11'] == '2019년' ) ? ' selected="true"' : ''; ?>>2019년</option>
										<option value="2020년"<?php echo ( $condition['c11'] == '2020년' ) ? ' selected="true"' : ''; ?>>2020년</option>
									</select> -->
                                </div>
                            </div>
                        </div>
                       	<div class="row m-top-15">
                            <div class="col-12 col-md-9 m-xs-top-15">
                                <!-- Single Input Box Area -->
                                <div class="form-group">
                                	<input type="text" name="keyword" id="keyword" value="<?php echo $condition['keyword']; ?>" class="form-control" placeholder="Search for type, area, city, year">
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
                            <h4>Results : Founded <?php echo number_format($gongsabi_count); ?> Result(s)</h4>
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
									<!-- <th>번호</th> -->
									<th>Project</th>
									<th>Type of building</th>
									<th>Area(㎡)</th>
									<th>Construction cost(㎡)</th>
									<th>City</th>
									<th>Year of construction</th>
									<th>Types of Cost</th>
									<th>Level</th>
									<th>Details</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$index = 0;
								foreach ( $gongsabi_list as $gongsabi ) {
                                    $_d34 = explode(',', $gongsabi->d24_33);
                                    $d34 = 0;
                                    foreach ($_d34 as $price) {
                                        $d34 += (int)$price;
                                    }
								?>
								<?php if ( $this->session->userdata('MEMBER_SESSION') ) { ?>
								<tr>
									<?php if ( $this->session->userdata('MEMBER')['member_type'] == '2' ) { ?>
									<!-- <td class="text-center"><?php echo $gongsabi->seq; ?></td> -->
									<td class="text-center"><a href="#" onclick="view_detail('<?php echo $gongsabi->seq; ?>');"><?php echo $gongsabi->c2; ?></a></td>
									<td class="text-center"><a href="#" onclick="view_detail('<?php echo $gongsabi->seq; ?>');"><?php echo $gongsabi->c4; ?></a></td>
									<td class="text-center"><a href="#" onclick="view_detail('<?php echo $gongsabi->seq; ?>');"><?php echo $gongsabi->c7; ?></a></td>
									<td class="text-center"><a href="#" onclick="view_detail('<?php echo $gongsabi->seq; ?>');"><?php echo number_format($d34); ?></a></td>
									<td class="text-center"><a href="#" onclick="view_detail('<?php echo $gongsabi->seq; ?>');"><?php echo $gongsabi->c9; ?></a></td>
									<td class="text-center"><a href="#" onclick="view_detail('<?php echo $gongsabi->seq; ?>');"><?php echo $gongsabi->c11; ?></a></td>
									<td class="text-center"><a href="#" onclick="view_detail('<?php echo $gongsabi->seq; ?>');"><?php echo $gongsabi->c13; ?></a></td>
									<td class="text-center"><a href="#" onclick="view_detail('<?php echo $gongsabi->seq; ?>');"><?php echo $gongsabi->c15; ?></a></td>
									<td class="text-center"><button type="button" class="btn btn-sm btn-success" onclick="view_detail('<?php echo $gongsabi->seq; ?>');">보기</button></td>
									<?php } else if ( $this->session->userdata('MEMBER')['member_type'] == '1' ) { ?>
									<!-- <td class="text-center"><?php echo $gongsabi->seq; ?></td> -->
									<td class="text-center"><a href="#" onclick="not_grade();"><?php echo $gongsabi->c2; ?></a></td>
									<td class="text-center"><a href="#" onclick="not_grade();"><?php echo $gongsabi->c4; ?></a></td>
									<td class="text-center"><a href="#" onclick="not_grade();"><?php echo $gongsabi->c7; ?></a></td>
									<td class="text-center"><a href="#" onclick="not_grade();">*,***,***</a></td>
									<td class="text-center"><a href="#" onclick="not_grade();"><?php echo $gongsabi->c9; ?></a></td>
									<td class="text-center"><a href="#" onclick="not_grade();"><?php echo $gongsabi->c11; ?></a></td>
									<td class="text-center"><a href="#" onclick="not_grade();"><?php echo $gongsabi->c13; ?></a></td>
									<td class="text-center"><a href="#" onclick="not_grade();"><?php echo $gongsabi->c15; ?></a></td>
									<td class="text-center"><button type="button" class="btn btn-sm btn-success" onclick="not_grade();">보기</button></td>
									<?php } ?>
								</tr>
								<?php } else { ?>
								<tr>
									<!-- <td class="text-center"><?php echo $gongsabi->seq; ?></td> -->
									<td class="text-center"><?php echo $gongsabi->c2; ?></td>
									<td class="text-center"><?php echo $gongsabi->c4; ?></td>
									<td class="text-center"><?php echo $gongsabi->c7; ?></td>
									<td class="text-center">*,***,***</td>
									<td class="text-center"><?php echo $gongsabi->c9; ?></td>
									<td class="text-center"><?php echo $gongsabi->c11; ?></td>
									<td class="text-center"><?php echo $gongsabi->c13; ?></td>
									<td class="text-center"><?php echo $gongsabi->c15; ?></td>
									<td class="text-center"><button type="button" class="btn btn-sm btn-success" onclick="login_required();">보기</button></td>
								</tr>
								<?php } ?>
								<?php
									$index++;
								}
								?>
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
                        <?php if ( count($gongsabi_list) > 0 ) { ?>
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