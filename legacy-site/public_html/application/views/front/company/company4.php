<div class="company_wrapper company4">
	<div class="company_title">
		오시는 길
	</div>
	<div class="company_map_wrapper mt-5">
		<div class="company_map" id="map">
		</div>
		<div class="company_info">
			<p class="title">전화</p>
			<p class="content">02.2202.2258</p>
			<p class="title">주소</p>
			<p class="content">05585<br>서울특별시 송파구 백제고분로 37길 6<br>송원빌딩 6층</p>
			<p class="title">안내</p>
			<p class="content">주차공간이 협소하니<br>가급적 대중교통을 이용하시기 바랍니다.</p>
		</div>
	</div>
	<div class="company_traffic mt-5">
		<div class="company_traffic_title">대중교통 이용시</div>
		<table class="company_traffic_table">
			<tr>
				<td class="outer">
					<img src="/static/img/traffic001.png"><br><h4>주변 버스 정류장</h4>
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
					<img src="/static/img/traffic002.png"><br><h4>주변 지하철</h4>
				</td>
				<td class="outer">
					<table class="company_traffic_inner_table">
						<tr>
							<td class="label_area"><span class="traffic_label label5">8호선</span></td>
							<td>석촌역 7번출구</td>
						</tr>
						<tr>
							<td class="label_area"><span class="traffic_label label6">9호선</span></td>
							<td>석촌역 6번출구</td>
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