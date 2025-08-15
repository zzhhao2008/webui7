<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="navbar-brand-wrapper d-flex justify-content-center">
		<div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
			<a class="navbar-brand brand-logo" href="/"><img style="width: calc(257px - 80px);" src="<?= $GLOBALS['logo_long'] ?>" alt="logo" /></a>
			<a class="navbar-brand brand-logo-mini" href="/"><img src="<?= $GLOBALS['logo'] ?>" alt="logo" /></a>
			<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
				<span class="mdi mdi-sort-variant"></span>
			</button>
		</div>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
		<ul class="navbar-nav mr-lg-4 w-100">
			<li class="nav-item nav-search d-none d-lg-block w-100">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="search">
							<i class="mdi mdi-magnify"></i>
						</span>
					</div>
					<input type="text" disabled class="form-control" placeholder="不能搜索的搜索框" aria-label="search" aria-describedby="search">
				</div>
			</li>
		</ul>
		<ul class="navbar-nav navbar-nav-right">
			<!-- 消息 Dropdown -->
			<li class="nav-item dropdown me-1">
				<a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
					<i class="mdi mdi-message-text mx-0"></i>
					<span class="count"></span>
				</a>
				<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
					<p class="mb-0 font-weight-normal float-left dropdown-header">消息</p>
					<?php
					foreach ($GLOBALS['messages'] as $message) {

					?>
						<a class="dropdown-item" src="<?php echo $message['url']; ?>">
							<div class="item-thumbnail">
							</div>
							<div class="item-content flex-grow">
								<h6 class="ellipsis font-weight-normal">
									<?php echo $message['title']; ?>
								</h6>
								<p class="font-weight-light small-text text-muted mb-0">
									<?php echo $message['content']; ?>
								</p>
							</div>
						</a>
					<?php } ?>
				</div>
			</li>


			<!-- Notification Dropdown -->
			<li class="nav-item dropdown me-4">
				<a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
					<i class="mdi mdi-bell mx-0"></i>
					<span class="count"></span>
				</a>
				<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
					<p class="mb-0 font-weight-normal float-left dropdown-header">通知</p>
					<?php
					foreach ($GLOBALS['notifications'] as $notification) {
					?>
					<a class="dropdown-item">
						<div class="item-thumbnail">
							<div class="item-icon bg-success">
								<i class="mdi mdi-<?php echo $notification['icon']; ?> mx-0"></i>
							</div>
						</div>
						<div class="item-content">
							<h6 class="font-weight-normal"><?php echo $notification['title']; ?></h6>
							<p class="font-weight-light small-text mb-0 text-muted">
								<?php echo $notification['content']; ?>
							</p>
						</div>
					</a>
					<?php }?>
				</div>
			</li>

			<!-- User Dropdown -->
			<li class="nav-item nav-profile dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
					<img src="<?= $GLOBALS['logo'] ?>" alt="profile" />
					<span class="nav-profile-name">大二比</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
					<a class="dropdown-item">
						<i class="mdi mdi-settings text-primary"></i>
						个人主页
					</a>
					<a class="dropdown-item">
						<i class="mdi mdi-logout text-primary"></i>
						退出登录
					</a>
				</div>
			</li>
		</ul>
		<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
			<span class="mdi mdi-menu"></span>
		</button>
	</div>
</nav>
<div class="container-fluid page-body-wrapper">
	<nav class="sidebar sidebar-offcanvas" id="sidebar">
		<ul class="nav">
			<li class="nav-item">
				<a class="nav-link" href="/">
					<i class="mdi mdi-home menu-icon"></i>
					<span class="menu-title">主页</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
					<i class="mdi mdi-circle-outline menu-icon"></i>
					<span class="menu-title">UI 元素</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-basic">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" href="/buttons">按钮</a></li>
						<li class="nav-item"> <a class="nav-link" href="/typography">工具</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/forms">
					<i class="mdi mdi-view-headline menu-icon"></i>
					<span class="menu-title">表单元素</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/chartjs">
					<i class="mdi mdi-chart-pie menu-icon"></i>
					<span class="menu-title">图表 Chart.js</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/table">
					<i class="mdi mdi-grid-large menu-icon"></i>
					<span class="menu-title">表格</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="mdi">
					<i class="mdi mdi-emoticon menu-icon"></i>
					<span class="menu-title">MDI 图标</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
					<i class="mdi mdi-account menu-icon"></i>
					<span class="menu-title">用户页</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="auth">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" href="/login"> 登录 </a></li>
						<li class="nav-item"> <a class="nav-link" href="/register-2"> 注册 </a></li>
						<li class="nav-item"> <a class="nav-link" href="/lock-screen"> 锁屏 </a></li>
					</ul>
				</div>
			</li>
		</ul>
	</nav>