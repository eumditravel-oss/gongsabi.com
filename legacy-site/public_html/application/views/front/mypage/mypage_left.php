<div class="mypage_left_title">
	마이페이지
</div>
<ul class="mypage_left_menu">
	<?php foreach ($this->config->item('gnb_menu')[$this->config->item('SITE_LANGUAGE')]['mypage']['child'] as $key1 => $menu) { ?>
	<li class="<?php echo ( $this->uri->segment(3) == $key1 ) ? 'on' : ''; ?>">
		<a href="#"<?php echo ( $key1 == 'report' ) ? ' onclick="alert(\'서비스 오픈 준비중 입니다.\');"' : ''; ?>><?php echo $menu['name']; ?></a>
		<?php if ( count($menu['child']) > 0 ) { ?>
		<ul class="mypage_left_child">
			<?php foreach ($menu['child'] as $key2 => $menu2) { ?>
			<li class="<?php echo ( $this->uri->segment(4) == $key2 ) ? 'on' : ''; ?>"><a href="/front/mypage/<?php echo $key1; ?>/<?php echo $key2; ?>">- <?php echo $menu2; ?></a></li>
			<?php } ?>
		</ul>
		<?php } ?>
	</li>
	<?php } ?>
</ul>