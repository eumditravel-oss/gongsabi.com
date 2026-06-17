<div class="content">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">게시판 관리</a></li>
                            <li class="breadcrumb-item active">관리자 페이지</li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?php echo $board_title; ?> 수정</h4>
                </div>
            </div>
        </div>     

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

                    <form method="post" action="/admin/youtube/modify_proc" class="form-horizontal" role="form">

                    <input type="hidden" name="board_seq" value="<?php echo $board_data['list'][0]->board_seq; ?>">
                    <input type="hidden" name="board_type" value="<?php echo $board_data['list'][0]->board_type; ?>">

                    <div class="float-right">
                        <a href="/admin/youtube" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-bars mr-1"></i> 목록</a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-edit mr-1"></i> 수정</a>
                    </div>

                    <h4 class="header-title"><?php echo $board_title; ?> 수정</h4>

                    <p class="sub-header">
                        <?php echo $board_title; ?>을 수정합니다.
                    </p>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="p-2">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_link">유튜브 링크</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_link" name="board_link" class="form-control" value="<?php echo $board_data['list'][0]->board_link; ?>" required="true" placeholder="유튜브 링크" onchange="setVideo(this);">
                                        <input type="hidden" id="board_etc_1" name="board_etc_1" value="<?php echo $board_data['list'][0]->board_etc_1; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="board_title">제목</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="board_title" name="board_title" class="form-control" value="<?php echo $board_data['list'][0]->board_title; ?>" required="true" placeholder="제목">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">내용</label>
                                    <div class="col-sm-10">
                                        <textarea id="board_content" name="board_content" class="form-control" rows="15" required="true" placeholder="내용"><?php echo $board_data['list'][0]->board_content; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="p-2">
                                <div id="ytplayer"></div>
                                <script>

                                  // Load the IFrame Player API code asynchronously.
                                  var tag = document.createElement('script');
                                  tag.src = "https://www.youtube.com/player_api";
                                  var firstScriptTag = document.getElementsByTagName('script')[0];
                                  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                                  // Replace the 'ytplayer' element with an <iframe> and
                                  // YouTube player after the API code downloads.
                                  var player
                                  function onYouTubePlayerAPIReady() {
                                  }

                                  function onYouTubeIframeAPIReady()
                                  {
                                    console.log('ready');
                                player = new YT.Player('ytplayer', {
                                  width: '100%',
                                  height: '400',
                                  events: {
                                    'onReady' : init
                                  }
                                });
                                  }

                                  // 4. The API will call this function when the video player is ready.
                                      function onPlayerReady(event) {
                                        // event.target.playVideo();
                                        console.log(event.target);
                                      }

                                      // 5. The API calls this function when the player's state changes.
                                      //    The function indicates that when playing a video (state=1),
                                      //    the player should play for six seconds and then stop.
                                      var done = false;
                                      function onPlayerStateChange(event) {
                                        if (event.data == YT.PlayerState.PLAYING && !done) {
                                          setTimeout(stopVideo, 6000);
                                          done = true;
                                        }
                                      }
                                      function stopVideo() {
                                        player.stopVideo();
                                      }

                                    function init(event)
                                    {
                                        console.log(event.target);

                                        setVideo(document.getElementById('board_link'));
                                    }

                                    function setVideo(url)
                                    {
                                        var s = url.value.split('/');
                                        var id = s[s.length - 1];
                                        var link = s[s.length - 2];
                                        if ( link == 'youtu.be' ) {
                                            player.loadVideoById(id, 0, 'default');
                                            $('#board_etc_1').val(id);
                                        }
                                        else
                                            alert('URL이 잘못 되었습니다.'); return false;
                                    }

                                    function getUrlParams(url) {
                                        var params = {};
                                        // window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(str, key, value) { params[key] = value; });
                                        url.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(str, key, value) { params[key] = value; });
                                        console.log(params);
                                        return params;
                                    }
                                </script>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        
    </div>

</div>