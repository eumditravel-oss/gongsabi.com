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

					<div class="form-group">
						<label class="col-md-3 control-label" for="name">성명</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="name" id="name">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="in_day">입사일</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="in_day" id="in_day">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="license">자격종목 및 등급</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="license" id="license">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="memo">비고</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="memo" id="memo">
						</div>
					</div>

					<div class="text-right">
						<a href="/admin/<?php echo $parent; ?>/list/<?php echo $target; ?>" class="btn btn-default">목록</a>
						<button type="submit" class="btn btn-primary">등록</button>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>