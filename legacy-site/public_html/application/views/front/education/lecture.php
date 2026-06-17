
	<div class="search_course_area education-version section_padding_50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="course_search">
                        <form method="get" class="">
                            <div class="row">
                                <div class="col-12 col-md-9 m-xs-top-15">
                                    <div class="form-group">
                                    	<input type="text" name="keyword" id="keyword" value="<?php echo $condition['keyword']; ?>" class="form-control" placeholder="검색어를 입력해 주십시오.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 m-xs-top-15">
                                    <button type="submit" class="btn btn-default">검색</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are">
                        <div class="single_shortcodes_title m-bottom-30">
                            <h4>총 <?php echo number_format($board_data['count']); ?>건</h4>
                        </div>
                        <div class="row m-bottom-15">
                        	<div class="col-lg-6">
		                        <nav>
									<?php echo $pagination; ?>
								</nav>
							</div>
                        	<div class="col-lg-6 text-right">
                        	</div>
                        </div>
                        <table class="table classy-table table-bordered table-responsive table-hover gongsabi-table">
                        	<colgroup>
                        		<col width="7%">
                                <col width="*">
                                <col width="10%">
                                <col width="10%">
                                <col width="15%">
                                <col width="15%">
                        		<col width="10%">
                        	</colgroup>
							<thead>
								<tr class="bg-gray">
									<th>번호</th>
                                    <th>교육과정</th>
                                    <th>교육날짜</th>
                                    <th>참석인원</th>
									<th>회사</th>
                                    <th>이름</th>
									<th>등록일</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ( $board_data['list'] as $board ) { ?>
								<tr>
									<td class="text-center"><?php echo $board->rownum; ?></td>
                                    <td class="text-center"><a href="/front/education/lecture_view/<?php echo $board->board_seq; ?>"><?php echo HP_GET_LECTURE_TEXT($board->board_category); ?></a></td>
                                    <td class="text-center"><a href="/front/education/lecture_view/<?php echo $board->board_seq; ?>"><?php echo $board->board_etc_1; ?></a></td>
                                    <td class="text-center"><a href="/front/education/lecture_view/<?php echo $board->board_seq; ?>"><?php echo $board->board_etc_2; ?></a></td>
									<td class="text-center"><a href="/front/education/lecture_view/<?php echo $board->board_seq; ?>"><?php echo HP_ENC_TEXT($board->board_company, !$this->session->userdata('MEMBER_SESSION')); ?></a></td>
                                    <td class="text-center"><a href="/front/education/lecture_view/<?php echo $board->board_seq; ?>"><?php echo HP_ENC_TEXT($board->board_name, !$this->session->userdata('MEMBER_SESSION')); ?></a></td>
									<td class="text-center"><?php echo substr($board->ins_datetime, 0, 10); ?></td>
								</tr>
								<?php } ?>
							</tbody>
                        </table>
                        <div class="row m-top-15">
                        	<div class="col-lg-6">
		                        <nav>
									<?php echo $pagination; ?>
								</nav>
							</div>
                            <div class="col-lg-6 text-right">
                                <a href="/front/education/lecture_regist" class="btn btn-success">강의 신청</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>