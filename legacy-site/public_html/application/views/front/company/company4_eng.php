<div class="company_wrapper company4">
	<div class="company_title">
		LOCATION
	</div>
	<div class="company_map_wrapper mt-5">
		<div class="company_map" id="map">
		</div>
		<div class="company_info">
			<p class="title">TEL</p>
			<p class="content">+82-2- 2202-2258</p>
			<p class="title">Address</p>
			<p class="content">6F,Songwon Building, 6, Baekjegobun-ro 37-Gil,Songpa-gu, Seoul, REP. OF KOREA</p>
			<p class="title">FAX</p>
			<p class="content">+82-2-2202-2259</p>
		</div>
	</div>
	<div class="company_traffic mt-5">
		<div class="company_traffic_title">Public Transportation Information</div>
		<table class="company_traffic_table">
			<tr>
				<td class="outer">
					<img src="/static/img/traffic001.png"><br><h4>By Bus</h4>
				</td>
				<td class="outer">
					<table class="company_traffic_inner_table">
						<tr>
							<td class="label_area"><span class="traffic_label label1">지선</span></td>
							<td>2311번 / 2412번 / 3012번 / 3214번 / 3317번 / 3318번 / 3413번</td>
						</tr>
						<tr>
							<td class="label_area"><span class="traffic_label label2">마을</span></td>
							<td>강남05 / 16번 / 31번 / 32번 / 70번 / 101번 / 119번</td>
						</tr>
						<tr>
							<td class="label_area"><span class="traffic_label label3">간선</span></td>
							<td>301번 / 302번 / 303번 / 320번 / 340번 / 350번 / 360번 / 362번 / N13번</td>
						</tr>
						<tr>
							<td class="label_area"><span class="traffic_label label4">광역</span></td>
							<td>500-1번 / 500-1A번 / 1007번 / 1009번 / 1112번 / 1117번 / 1650번 / 5600번<br>5700A번 / 5700B번 / G2100번 / G6009번 / 9403번 / M5333번 / M5342번</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="outer">
					<img src="/static/img/traffic002.png"><br><h4>By Subway</h4>
				</td>
				<td class="outer">
					<table class="company_traffic_inner_table">
						<tr>
							<td class="label_area"><span class="traffic_label label5">Line 8</span></td>
							<td>Seokchon station Exit 7</td>
						</tr>
						<tr>
							<td class="label_area"><span class="traffic_label label6">Line 9</span></td>
							<td>Seokchon station Exit 6</td>
						</tr>
					</table>					
				</td>
			</tr>
		</table>
	</div>
</div>

<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=4xu1gydegr"></script>
<script>
var map = new naver.maps.Map('map', {center: new naver.maps.LatLng(<?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['LAT']; ?>, <?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['LNG']; ?>)});
var marker = new naver.maps.Marker({
    position: new naver.maps.LatLng(<?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['LAT']; ?>, <?php echo $this->config->item('SITE_INFO')[$this->config->item('SITE_LANGUAGE')]['LNG']; ?>),
    map: map
});
</script>