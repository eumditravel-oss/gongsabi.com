<p class="mb-1 mfc fb"><?php echo $gongjeong_name; ?></p>
<?php
	$total = 0;
	$area = explode(',', $gongjeong_info);
?>
<table class="table table-bordered gongsabi-table gongsabi-hover clicked mb-0">
	<colgroup>
		<col width="50%">
		<col width="50%">
	</colgroup>
	<thead>
		<tr class="bg-gray">
			<th>항목</th>
			<th>원/㎡</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 0;
		foreach ($area as $gongjeong) {
			$gongjeong_name = $this->config->item('GONGSABI_GONGJEONG_DATA')[$gongjong_idx][$i];
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