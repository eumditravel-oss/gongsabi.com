<div class="mypage_top_summary">
	<div class="summary_name">
		<p><?php echo $this->session->userdata('MEMBER')['member_name']; ?>님 (<?php echo $this->config->item('MEMBER_TYPE')[$this->session->userdata('MEMBER')['member_type']]['name']; ?>)</p>
		<a href="#" onclick="view_membership_info();">회원 혜택 보기</a>
	</div>
	<div class="summary_count">
		<div class="summary_count_content">
			<p class="count_title">쿠폰</p>
			<p class="count"><b>0</b> 장</p>
		</div>
		<div class="summary_count_content">
			<p class="count_title">포인트</p>
			<p class="count"><b>0</b> 포인트</p>
		</div>
	</div>
</div>