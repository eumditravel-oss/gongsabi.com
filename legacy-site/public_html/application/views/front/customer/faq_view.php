
	<section class="shortcodes_content_area section_padding_0_100">
        <div class="container">
            <div class="row">
                <div class="col-12 m-top-30">
                    <div class="single_shortcodes_are">
                        <table class="table classy-table table-bordered table-responsive gongsabi-table">
                        	<colgroup>
                                <col width="15%">
                        		<col width="*">
                        	</colgroup>
                            <thead>
                                <tr class="bg-gray">
                                    <th class="text-center"><?php echo $this->config->item('FAQ_CATEGORY')[$board_list[0]->board_category]['name']; ?></th>
                                    <th class="text-left"><?php echo $board_list[0]->board_title; ?></th>
                                </tr>
                            </thead>
							<tbody>
                                <tr>
                                    <td class="text-left" colspan="3"><?php echo nl2br($board_list[0]->board_reply_content); ?></td>
                                </tr>
							</tbody>
                        </table>
                        <div class="row m-top-15">
                            <div class="col-lg-6">
                                <a href="/front/customer/faq" class="btn btn-outline-success">목록</a>
                            </div>
                            <div class="col-lg-6 text-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>