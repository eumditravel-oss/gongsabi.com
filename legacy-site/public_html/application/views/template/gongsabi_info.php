<div class="container">
	<div class="row">
		<?php
		// 무료회원
		if ( $this->session->userdata('MEMBER')['member_type'] == '1' ) { ?>
		<div class="col-6">
			<p class="mb-1">공사 개요</p>
			<table class="table table-bordered gongsabi-table mb-0">
				<colgroup>
					<col width="30%">
					<col width="*">
				</colgroup>
				<tbody>
					<tr>
						<th class="bg-gray">공사명</th>
						<td class="text-center"><?php echo $gongsabi_info->c2; ?></td>
					</tr>
					<tr>
						<th class="bg-gray">건물종류</th>
						<td class="text-center"><?php echo $gongsabi_info->c4; ?></td>
					</tr>
					<tr>
						<th class="bg-gray">면적(㎡)</th>
						<td class="text-center"><?php echo $gongsabi_info->c7; ?></td>
					</tr>
					<tr>
						<th class="bg-gray">지역</th>
						<td class="text-center"><?php echo $gongsabi_info->c9; ?></td>
					</tr>
					<tr>
						<th class="bg-gray">착공년도</th>
						<td class="text-center"><?php echo $gongsabi_info->c11; ?></td>
					</tr>
					<tr>
						<th class="bg-gray">구분</th>
						<td class="text-center"><?php echo $gongsabi_info->c13; ?></td>
					</tr>
					<tr>
						<th class="bg-gray">등급</th>
						<td class="text-center"><?php echo $gongsabi_info->c15; ?></td>
					</tr>
				</tbody>
	        </table>
	        <small>※ 유료회원의 경우 해당 공정에 대한 상세내역을 조회할 수 있습니다.</small>
		</div>
		<div class="col-6">
			<p class="mb-1">공정</p>
			<?php
				$total = 0;
				$d24_33 = explode(',', $gongsabi_info->d24_33);
			?>
			<table class="table table-bordered gongsabi-table gongsabi-hover mb-2">
				<colgroup>
					<col width="50%">
					<col width="50%">
				</colgroup>
				<thead>
					<tr class="bg-gray">
						<th>항목</th>
						<th>㎡당 공사비(원)</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					foreach ($d24_33 as $gongjeong) {
						$gongjeong = explode('|', $gongjeong);
						$_price = MAKE_PRICE($gongjeong[0]);
					?>
					<tr>
						<td class="bg-gray text-center"><?php echo $gongjeong[0]; ?></td>
						<td class="text-right"><?php echo number_format($_price); ?></td>
					</tr>
					<?php
						$total += $_price;
						$i++;
					}
					?>
				</tbody>
				<tfoot>
					<tr class="bg-gray">
						<th>계</th>
						<td class="text-right"><?php echo number_format($total); ?></td>
					</tr>
				</tfoot>
	        </table>
			<table class="table table-bordered gongsabi-table gongsabi-hover mb-0">
				<colgroup>
					<col width="50%">
					<col width="50%">
				</colgroup>
				<thead>
					<tr class="bg-gray">
						<th>항목</th>
						<th>평당 공사비(원)</th>
					</tr>
				</thead>
				<tfoot>
					<tr class="bg-gray">
						<th>계</th>
						<td class="text-right"></td>
					</tr>
				</tfoot>
	        </table>
		</div>
		<?php } ?>
		<?php
		// 유료회원
		if ( $this->session->userdata('MEMBER')['member_type'] == '2' ) { ?>
		<div class="col-4">
			<p class="mb-1">공사 개요</p>
			<table class="table table-bordered gongsabi-table">
				<colgroup>
					<col width="30%">
					<col width="*">
				</colgroup>
				<tbody>
					<tr>
						<th class="bg-gray">공사명</th>
						<td class="text-center"><?php echo $gongsabi_info->c2; ?></td>
					</tr>
					<tr>
						<th class="bg-gray">건물종류</th>
						<td class="text-center"><?php echo $gongsabi_info->c4; ?></td>
					</tr>
					<tr>
						<th class="bg-gray">면적(㎡)</th>
						<td class="text-center"><?php echo $gongsabi_info->c7; ?></td>
					</tr>
					<tr>
						<th class="bg-gray">지역</th>
						<td class="text-center"><?php echo $gongsabi_info->c9; ?></td>
					</tr>
					<tr>
						<th class="bg-gray">착공년도</th>
						<td class="text-center"><?php echo $gongsabi_info->c11; ?></td>
					</tr>
					<tr>
						<th class="bg-gray">구분</th>
						<td class="text-center"><?php echo $gongsabi_info->c13; ?></td>
					</tr>
					<tr>
						<th class="bg-gray">등급</th>
						<td class="text-center"><?php echo $gongsabi_info->c15; ?></td>
					</tr>
				</tbody>
	        </table>
		</div>
		<div class="col-4">
			<p class="mb-1">공정</p>
			<?php
				$total = 0;
				$total2 = 0;
				$d24_33 = explode(',', $gongsabi_info->d24_33);
				$e24_33 = explode(',', $gongsabi_info->e24_33);
			?>
			<table class="table table-bordered gongsabi-table gongsabi-hover mb-2">
				<colgroup>
					<col width="50%">
					<col width="50%">
				</colgroup>
				<thead>
					<tr class="bg-gray">
						<th>항목</th>
						<th>㎡당 공사비(원)</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($d24_33 as $gongjeong) {
						$temp = $i;
						// 건축 <> 공통가설 정렬 순서 변경
						if ( $temp == 0 )
							$temp = 1;
						else if ( $temp == 1 )
							$temp = 0;
						$gongjeong_name = $this->config->item('GONGSABI_GONGJEONG_LIST')[$i];
						$_price = MAKE_PRICE($d24_33[$temp]);
						$_price2 = MAKE_PRICE($e24_33[$temp]);
					?>
					<tr>
						<?php if ( $i < 9 ) { ?>
						<td class="bg-gray text-center"><a href="#" onclick="view_gongjeong(this, '<?php echo $gongsabi_info->seq; ?>', '<?php echo $temp; ?>', '<?php echo $gongjeong_name; ?>');"><?php echo $gongjeong_name; ?></a></td>
						<td class="text-right"><a href="#" onclick="view_gongjeong(this, '<?php echo $gongsabi_info->seq; ?>', '<?php echo $temp; ?>', '<?php echo $gongjeong_name; ?>');"><?php echo number_format($_price); ?></a></td>
						<?php } else { ?>
						<td class="bg-gray text-center"><?php echo $gongjeong_name; ?></td>
						<td class="text-right"><?php echo number_format($_price); ?></td>
						<?php } ?>
					</tr>
					<?php
						$total += $_price;
						$total2 += $_price2;
						$i++;
					}
					?>
				</tbody>
				<tfoot>
					<tr class="bg-gray">
						<th>계</th>
						<td class="text-right"><?php echo number_format($total); ?></td>
					</tr>
				</tfoot>
	        </table>
			<table class="table table-bordered gongsabi-table gongsabi-hover mb-0">
				<colgroup>
					<col width="50%">
					<col width="50%">
				</colgroup>
				<thead>
					<tr class="bg-gray">
						<th>항목</th>
						<th>평당 공사비(원)</th>
					</tr>
				</thead>
				<tfoot>
					<tr class="bg-gray">
						<th>계</th>
						<td class="text-right"><?php echo number_format($total2); ?></td>
					</tr>
				</tfoot>
	        </table>
	        <div class="mfc fsxs fb py-3 lhxxlg">
	        	※ 해당 공정 클릭하면 상세보기 가능합니다.<br>
	        	※ VAT는 별도입니다.<br>
	        	※ 평당공사비 = ㎡당 공사비 X 3.3058
	        </div>
		</div>
		<div class="gongjeong-info col-4">
			<p class="mb-1 mfc fb">건축</p>
			<?php
				$total = 0;

				$gongjeong_info = $gongsabi_info->d40_59;
				$area = explode(',', $gongjeong_info);
			?>
			<table class="table table-bordered gongsabi-table gongsabi-hover mb-0">
				<colgroup>
					<col width="50%">
					<col width="50%">
				</colgroup>
				<thead>
					<tr class="bg-gray">
						<th>항목</th>
						<th>㎡당 공사비(원)</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($area as $gongjeong) {
						$gongjeong_name = $this->config->item('GONGSABI_GONGJEONG_DATA')[1][$i];
						$_price = MAKE_PRICE($gongjeong);
					?>
					<tr>
						<td class="bg-gray text-center"><?php echo $gongjeong_name; ?></td>
						<td class="text-right"><?php echo number_format($_price); ?></td>
					</tr>
					<?php
						$total += $_price;
						$i++;
					}
					?>
				</tbody>
				<tfoot>
					<tr class="bg-gray">
						<th>계</th>
						<td class="text-right"><?php echo number_format($total); ?></td>
					</tr>
				</tfoot>
			</table>
		</div>
		<input type="hidden" id="modal_gongsabi_seq" value="<?php echo $gongsabi_info->seq; ?>">
		<?php } ?>
	</div>
</div>