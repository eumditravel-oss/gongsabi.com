<div class="sub_header_wrapper">
	<div class="sub_header_area">
		<span class="home"><a href="/"><i class="fa fa-home"></i></a></span>
		<span class="dep1">
			<button class="dep1_btn"><?php echo $dep1_name; ?></button>
			<ul class="dep1_list">
				<?php foreach ($dep1 as $menu) { ?>
				<li class="<?php echo ( $this->uri->segment(2) == $menu['id'] ) ? 'on' : ''; ?>"><a href="/front/<?php echo $menu['id']; ?>"><?php echo $menu['name']; ?></a></li>
				<?php } ?>
			</ul>
		</span>
		<span class="dep2">
			<button class="dep2_btn"><?php echo ( is_array($dep2_name) ) ? $dep2_name['name'] : $dep2_name; ?></button>
			<ul class="dep2_list">
				<?php foreach ($dep2['child'] as $link => $menu) { ?>
				<li class="<?php echo ( $this->uri->segment(3) == $link ) ? 'on' : ''; ?>"><a href="/front/<?php echo $this->uri->segment(2); ?>/<?php echo $link; ?>"><?php echo ( is_array($menu) ) ? $menu['name'] : $menu; ?></a></li>
				<?php } ?>
			</ul>
		</span>
	</div>
</div>
<script>
$(function() {
	$('.dep1 .dep1_btn').on('click', function() {
		if ( $('.dep1_list').is(':visible') )
			$('.dep1_list').hide();
		else {
			$('.dep1_list').show();
			$('.dep2_list').hide();
		}
	});
	$('.dep2 .dep2_btn').on('click', function() {
		if ( $('.dep2_list').is(':visible') )
			$('.dep2_list').hide();
		else {
			$('.dep2_list').show();
			$('.dep1_list').hide();
		}
	});
});
</script>