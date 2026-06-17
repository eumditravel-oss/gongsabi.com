<header class="page-header">
    <h2><?php echo $depth2; ?> 등록</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="/">
                    관리자
                </a>
            </li>
            <li><span><?php echo $depth1; ?></span></li>
            <li><span><?php echo $depth2; ?> 등록</span></li>
        </ol>
    </div>
</header>

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title"><?php echo $depth2; ?> 등록</h2>
            </header>
            <div class="panel-body">
				<form method="post" class="form-horizontal form-bordered" enctype="multipart/form-data" action="/admin/<?php echo $parent; ?>/<?php echo $parent; ?>_regist_proc">
					<input type="hidden" name="editor_image_url" id="editor_image_url" value="/admin/<?php echo $parent; ?>/<?php echo $parent; ?>_image_proc">
					<input type="hidden" name="target" id="target" value="<?php echo $target; ?>">

					<?php if ( $parent == 'recruit' ) { ?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="status">상태</label>
						<div class="col-md-9">
							<select name="status" id="status" class="form-control">
								<option value="1" selected="true">진행중</option>
								<option value="9">진행완료</option>
							</select>
						</div>
					</div>
					<?php } ?>

					<div class="form-group">
						<label class="col-md-3 control-label" for="title">제목</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="title" id="title">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="image">대표 이미지</label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="image" id="image">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="image">내용</label>
						<div class="col-md-9">
							<textarea class="form-control" name="content" id="content" rows="10"></textarea>
						</div>
					</div>

					<?php if ( $is_attach ) { ?>

					<div class="form-group">
						<label class="col-md-3 control-label" for="attach1">첨부파일 1</label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="attach1" id="attach1">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="attach2">첨부파일 2</label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="attach2" id="attach2">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="attach3">첨부파일 3</label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="attach3" id="attach3">
						</div>
					</div>

					<?php } ?>

					<div class="text-right">
						<a href="/admin/<?php echo $parent; ?>/list/<?php echo $target; ?>" class="btn btn-default">목록</a>
						<button type="submit" class="btn btn-primary">등록</button>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>