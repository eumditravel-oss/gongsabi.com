
    <div class="classy-hero-blocks hero-blocks-3 height-300 background-overlay-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-block-content text-center">
                        <h2 class="m-bottom-30 underline-mc">Unit Price Estimating</h2>
                        <p>
                            We provide cost of the contract, procurement price and execution price for construction work, civil work, mechanical work, electrical work, etc.
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
											<?php echo ( $condition['danga_category1'] == '공통가설' ) ? 'Temporary Works' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '건축' ) ? 'Construction Works' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '토목' ) ? 'Civil Works' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '기계' ) ? 'Mechanical Works' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '전기' ) ? 'Electrical Works' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '통신' ) ? 'Telecommunication Works' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '소방' ) ? 'Fire Protection Works' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '부대' ) ? 'Incidental Works' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '조경' ) ? 'Landscaping Works' : ''; ?>
											<?php echo ( $condition['danga_category1'] == '' ) ? 'Process' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu">
									    	<div class="dropdown-menu-option" data-value="">Process</div>
											<div class="dropdown-menu-option" data-value="공통가설">Temporary Works</div>
											<div class="dropdown-menu-option" data-value="건축">Construction Works</div>
											<div class="dropdown-menu-option" data-value="토목">Civil Works</div>
											<div class="dropdown-menu-option" data-value="기계">Mechanical Works</div>
											<div class="dropdown-menu-option" data-value="전기">Electrical Works</div>
											<div class="dropdown-menu-option" data-value="통신">Telecommunication Works</div>
											<div class="dropdown-menu-option" data-value="소방">Fire Protection Works</div>
											<div class="dropdown-menu-option" data-value="부대">Incidental Works</div>
											<div class="dropdown-menu-option" data-value="조경">Landscaping Works</div>
									    </div>

									    <input type="hidden" name="danga_category1" value="<?php echo $condition['danga_category1']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="danga_category1" id="danga_category1" class="form-control select-align-center">
										<option value="" selected="true">Process</option>
										<option value="공통가설"<?php echo ( $condition['danga_category1'] == '공통가설' ) ? ' selected="true"' : ''; ?>>Temporary Works</option>
										<option value="건축"<?php echo ( $condition['danga_category1'] == '건축' ) ? ' selected="true"' : ''; ?>>Construction Works</option>
										<option value="토목"<?php echo ( $condition['danga_category1'] == '토목' ) ? ' selected="true"' : ''; ?>>Civil Works</option>
										<option value="기계"<?php echo ( $condition['danga_category1'] == '기계' ) ? ' selected="true"' : ''; ?>>Mechanical Works</option>
										<option value="전기"<?php echo ( $condition['danga_category1'] == '전기' ) ? ' selected="true"' : ''; ?>>Electrical Works</option>
										<option value="통신"<?php echo ( $condition['danga_category1'] == '통신' ) ? ' selected="true"' : ''; ?>>Telecommunication Works</option>
										<option value="소방"<?php echo ( $condition['danga_category1'] == '소방' ) ? ' selected="true"' : ''; ?>>Fire Protection Works</option>
										<option value="부대"<?php echo ( $condition['danga_category1'] == '부대' ) ? ' selected="true"' : ''; ?>>Incidental Works</option>
										<option value="조경"<?php echo ( $condition['danga_category1'] == '조경' ) ? ' selected="true"' : ''; ?>>Landscaping Works</option>
									</select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <!-- Single Input Box Area -->
                                <div class="form-group down_arrow">
                                	<div class="dropdown">
									    <div class="dropdown-title">
											<?php echo ( $condition['danga_category2'] == '가설' ) ? 'Temporary Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '공종' ) ? 'Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '공통가설' ) ? 'Temporary Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '금속' ) ? 'Construction Metal Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '기타' ) ? 'Others' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '노임' ) ? 'Labor' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '도장' ) ? 'Painting' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '목' ) ? 'Carpentry and Joinery Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '미장' ) ? 'Plastering Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '방수' ) ? 'Waterproofing Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '부대' ) ? 'Incidental Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '석' ) ? 'Stone works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '수장' ) ? 'Interior Finishing Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '운반비' ) ? 'Transportation Costs' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '유리' ) ? 'Glazing Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '장비' ) ? 'Construction Equipment' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '조경' ) ? 'Landscaping Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '조적' ) ? 'Masonry Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '지붕' ) ? 'Roofing' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '창호' ) ? 'Doors and Windows' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '철거' ) ? 'Demolition' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '철골' ) ? 'Structural Steel Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '철근콘크리트' ) ? 'RC Concrete Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '타일' ) ? 'Tiling' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '토' ) ? 'Excavation' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '토공사' ) ? 'Excavation Works' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '폐기물' ) ? 'Construction waste' : ''; ?>
											<?php echo ( $condition['danga_category2'] == '' ) ? 'Work Sector' : ''; ?>
									    </div>

									    <div class="custom-dropdown-menu">
											<div class="dropdown-menu-option" data-value="">Work Sector</div>
											<div class="dropdown-menu-option" data-value="가설">Temporary Works</div>
											<div class="dropdown-menu-option" data-value="공종">Works</div>
											<div class="dropdown-menu-option" data-value="공통가설">Temporary Works</div>
											<div class="dropdown-menu-option" data-value="금속">Construction Metal Works</div>
											<div class="dropdown-menu-option" data-value="기타">Others</div>
											<div class="dropdown-menu-option" data-value="노임">Labor</div>
											<div class="dropdown-menu-option" data-value="도장">Painting</div>
											<div class="dropdown-menu-option" data-value="목">Carpentry and Joinery Works</div>
											<div class="dropdown-menu-option" data-value="미장">Plastering Works</div>
											<div class="dropdown-menu-option" data-value="방수">Waterproofing Works</div>
											<div class="dropdown-menu-option" data-value="부대">Incidental Works</div>
											<div class="dropdown-menu-option" data-value="석">Stone works</div>
											<div class="dropdown-menu-option" data-value="수장">Interior Finishing Works</div>
											<div class="dropdown-menu-option" data-value="운반비">Transportation Costs</div>
											<div class="dropdown-menu-option" data-value="유리">Glazing Works</div>
											<div class="dropdown-menu-option" data-value="장비">Construction Equipment</div>
											<div class="dropdown-menu-option" data-value="조경">Landscaping Works</div>
											<div class="dropdown-menu-option" data-value="조적">Masonry Works</div>
											<div class="dropdown-menu-option" data-value="지붕">Roofing</div>
											<div class="dropdown-menu-option" data-value="창호">Doors and Windows</div>
											<div class="dropdown-menu-option" data-value="철거">Demolition</div>
											<div class="dropdown-menu-option" data-value="철골">Structural Steel Works</div>
											<div class="dropdown-menu-option" data-value="철근콘크리트">RC Concrete Works</div>
											<div class="dropdown-menu-option" data-value="타일">Tiling</div>
											<div class="dropdown-menu-option" data-value="토">Excavation</div>
											<div class="dropdown-menu-option" data-value="토공사">Excavation Works</div>
											<div class="dropdown-menu-option" data-value="폐기물">Construction waste</div>
									    </div>

									    <input type="hidden" name="danga_category2" value="<?php echo $condition['danga_category2']; ?>" class="dropdown-select">
									</div>
									<!-- <select name="danga_category2" id="danga_category2" class="form-control select-align-center">
										<option value="" selected="true">Work Sector</option>
										<option value="가설"<?php echo ( $condition['danga_category2'] == '가설' ) ? ' selected="true"' : ''; ?>>Temporary Works</option>
										<option value="공종"<?php echo ( $condition['danga_category2'] == '공종' ) ? ' selected="true"' : ''; ?>>Works</option>
										<option value="공통가설"<?php echo ( $condition['danga_category2'] == '공통가설' ) ? ' selected="true"' : ''; ?>>Temporary Works</option>
										<option value="금속"<?php echo ( $condition['danga_category2'] == '금속' ) ? ' selected="true"' : ''; ?>>Construction Metal Works</option>
										<option value="기타"<?php echo ( $condition['danga_category2'] == '기타' ) ? ' selected="true"' : ''; ?>>Others</option>
										<option value="노임"<?php echo ( $condition['danga_category2'] == '노임' ) ? ' selected="true"' : ''; ?>>Labor</option>
										<option value="도장"<?php echo ( $condition['danga_category2'] == '도장' ) ? ' selected="true"' : ''; ?>>Painting</option>
										<option value="목"<?php echo ( $condition['danga_category2'] == '목' ) ? ' selected="true"' : ''; ?>>Carpentry and Joinery Works</option>
										<option value="미장"<?php echo ( $condition['danga_category2'] == '미장' ) ? ' selected="true"' : ''; ?>>Plastering Works</option>
										<option value="방수"<?php echo ( $condition['danga_category2'] == '방수' ) ? ' selected="true"' : ''; ?>>Waterproofing Works</option>
										<option value="부대"<?php echo ( $condition['danga_category2'] == '부대' ) ? ' selected="true"' : ''; ?>>Incidental Works</option>
										<option value="석"<?php echo ( $condition['danga_category2'] == '석' ) ? ' selected="true"' : ''; ?>>Stone works</option>
										<option value="수장"<?php echo ( $condition['danga_category2'] == '수장' ) ? ' selected="true"' : ''; ?>>Interior Finishing Works</option>
										<option value="운반비"<?php echo ( $condition['danga_category2'] == '운반비' ) ? ' selected="true"' : ''; ?>>Transportation Costs</option>
										<option value="유리"<?php echo ( $condition['danga_category2'] == '유리' ) ? ' selected="true"' : ''; ?>>Glazing Works</option>
										<option value="장비"<?php echo ( $condition['danga_category2'] == '장비' ) ? ' selected="true"' : ''; ?>>Construction Equipment</option>
										<option value="조경"<?php echo ( $condition['danga_category2'] == '조경' ) ? ' selected="true"' : ''; ?>>Landscaping Works</option>
										<option value="조적"<?php echo ( $condition['danga_category2'] == '조적' ) ? ' selected="true"' : ''; ?>>Masonry Works</option>
										<option value="지붕"<?php echo ( $condition['danga_category2'] == '지붕' ) ? ' selected="true"' : ''; ?>>Roofing</option>
										<option value="창호"<?php echo ( $condition['danga_category2'] == '창호' ) ? ' selected="true"' : ''; ?>>Doors and Windows</option>
										<option value="철거"<?php echo ( $condition['danga_category2'] == '철거' ) ? ' selected="true"' : ''; ?>>Demolition</option>
										<option value="철골"<?php echo ( $condition['danga_category2'] == '철골' ) ? ' selected="true"' : ''; ?>>Structural Steel Works</option>
										<option value="철근콘크리트"<?php echo ( $condition['danga_category2'] == '철근콘크리트' ) ? ' selected="true"' : ''; ?>>RC Concrete Works</option>
										<option value="타일"<?php echo ( $condition['danga_category2'] == '타일' ) ? ' selected="true"' : ''; ?>>Tiling</option>
										<option value="토"<?php echo ( $condition['danga_category2'] == '토' ) ? ' selected="true"' : ''; ?>>Excavation</option>
										<option value="토공사"<?php echo ( $condition['danga_category2'] == '토공사' ) ? ' selected="true"' : ''; ?>>Excavation Works</option>
										<option value="폐기물"<?php echo ( $condition['danga_category2'] == '폐기물' ) ? ' selected="true"' : ''; ?>>Construction waste</option>
									</select> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-3 m-xs-top-15">
                                <!-- Single Input Box Area -->
                                <div class="form-group">
                                	<input type="text" name="keyword" id="keyword" value="<?php echo $condition['keyword']; ?>" class="form-control" placeholder="Search for process, work sector">
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