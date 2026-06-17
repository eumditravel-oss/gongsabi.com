<header class="page-header">
    <h2><?php echo $depth2; ?> 수정</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="/">
                    관리자
                </a>
            </li>
            <li><span><?php echo $depth1; ?></span></li>
            <li><span><?php echo $depth2; ?> 수정</span></li>
        </ol>
    </div>
</header>

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title"><?php echo $depth2; ?> 수정</h2>
            </header>
            <div class="panel-body">
				<form method="post" class="form-horizontal form-bordered" enctype="multipart/form-data" action="/admin/<?php echo $parent; ?>/<?php echo $parent; ?>_modify_proc">
					<input type="hidden" name="editor_image_url" id="editor_image_url" value="/admin/<?php echo $parent; ?>/<?php echo $parent; ?>_image_proc">
					<input type="hidden" name="target" id="target" value="<?php echo $target; ?>">
					<input type="hidden" name="seq" id="seq" value="<?php echo $info->seq; ?>">

					<?php if ( $parent == 'recruit' ) { ?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="status">상태</label>
						<div class="col-md-9">
							<select name="status" id="status" class="form-control">
								<option value="1"<?php if ( $info->status == '1' ) { ?> selected="true"<?php } ?>>진행중</option>
								<option value="9"<?php if ( $info->status == '9' ) { ?> selected="true"<?php } ?>>진행완료</option>
							</select>
						</div>
					</div>
					<?php } ?>

					<div class="form-group">
						<label class="col-md-3 control-label" for="title">제목</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="title" id="title" value="<?php echo $info->title; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="image">대표 이미지</label>
						<div class="col-md-9">
							<?php if ( $info->thumb ) { ?>
							<p><img src="/upload/<?php echo $parent; ?>/thumb/<?php echo $info->thumb; ?>"></p>
							<?php } ?>
							<input type="file" class="form-control" name="image" id="image">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="image">내용</label>
						<div class="col-md-9">
							<textarea class="form-control" name="content" id="content" rows="10"><?php echo $info->content; ?></textarea>
						</div>
					</div>

					<?php if ( $is_attach ) { ?>

					<div class="form-group">
						<label class="col-md-3 control-label" for="attach1">첨부파일 1</label>
						<div class="col-md-9">
							<?php if ( $info->attach1 ) { ?>
                            <label for="attach1_delete"><input type="checkbox" name="attach1_delete" id="attach1_delete" value="1">&nbsp;첨부파일 1 삭제</label>
							<p><a href="/common/filedownload/<?php echo $parent; ?>/<?php echo $info->seq; ?>/1"><?php echo $info->attach1_org; ?></a></p>
							<?php } ?>
							<input type="file" class="form-control" name="attach1" id="attach1">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="attach2">첨부파일 2</label>
						<div class="col-md-9">
							<?php if ( $info->attach2 ) { ?>
                            <label for="attach2_delete"><input type="checkbox" name="attach2_delete" id="attach2_delete" value="1">&nbsp;첨부파일 2 삭제</label>
							<p><a href="/common/filedownload/<?php echo $parent; ?>/<?php echo $info->seq; ?>/2"><?php echo $info->attach2_org; ?></a></p>
							<?php } ?>
							<input type="file" class="form-control" name="attach2" id="attach2">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="attach3">첨부파일 3</label>
						<div class="col-md-9">
							<?php if ( $info->attach3 ) { ?>
                            <label for="attach3_delete"><input type="checkbox" name="attach3_delete" id="attach3_delete" value="1">&nbsp;첨부파일 3 삭제</label>
							<p><a href="/common/filedownload/<?php echo $parent; ?>/<?php echo $info->seq; ?>/3"><?php echo $info->attach3_org; ?></a></p>
							<?php } ?>
							<input type="file" class="form-control" name="attach3" id="attach3">
						</div>
					</div>

					<?php } ?>

					<div class="text-right">
						<a href="/admin/<?php echo $parent; ?>/list/<?php echo $target; ?>" class="btn btn-default">목록</a>
						<button type="submit" class="btn btn-success">수정</button>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>