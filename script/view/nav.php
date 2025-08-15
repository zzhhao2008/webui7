<nav class="navbar fixed-top navtopc">
	<div class="container">
		<a class="navbar-brand" href="javascript:history.go(-1)" style="font-weight: 400;line-height: 1.5;">
			<img src="<?= $GLOBALS['logo'] ?>" alt="Logo" width="30" height="30" class="d-inline-block align-text-top rounded-circle">
			<?=$GLOBALS['title']?></a>
		<button class="navbar-toggler">
			<span class="navbar-toggler-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"></span>
		</button>
		<div class="offcanvas offcanvas-start navmainc" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title" id="offcanvasNavbarLabel">
					<img src="<?= $GLOBALS['logo'] ?>" alt="Logo" width="30" height="30" class="d-inline-block align-text-top rounded-circle">
					<?= $title ?>
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
					<li class="nav-item">
						<a class="nav-link" id="naver" href="/"><?= view::icon("house-fill") ?>首页</a>
					</li>
					<li class="border-top my-3"></li>
					<li class="nav-item">
						<a class="nav-link" href="/profile"><?= view::icon("person-circle") ?>"登录"</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>