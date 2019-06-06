<!-- BEGIN::Sidebar -->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="main-menu-content">
		<?php if (!isset($com)) $com = 'index'; ?>
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<li class="nav-item<?php if ($com === 'index') echo ' active'; ?>">
				<a href="<?php echo base_url('admin'); ?>"><i class="la la-home"></i> 控制台</a>
			</li>

			<?php
			if ($permission['value']) {
				?>
				<li class="nav-item<?php if ($com === 'role') echo ' active'; ?>">
					<a href="<?php echo base_url('admin/role'); ?>"><i class="la la-user-secret"></i> 角色管理</a>
				</li>
				<?php
			}
			?>
<!-- ad, notice -->
			<?php
			if ($user['value']) {
				?>
				<li class="nav-item<?php if ($com === 'user') echo ' active'; ?>">
					<a href="<?php echo base_url('admin/user'); ?>"><i class="la la-users"></i> 用户管理</a>
				</li>
				<?php
			}
			?>

			<?php
			if ($category['value']) {
				?>
				<li class="nav-item<?php if ($com === 'category') echo ' active'; ?>">
					<a href="<?php echo base_url('admin/category'); ?>"><i class="la la-tag"></i> 分类管理</a>
				</li>
				<?php
			}
			?>

			<?php
			if ($brand['value']) {
				?>
				<li class="nav-item<?php if ($com === 'brand') echo ' active'; ?>">
					<a href="<?php echo base_url('admin/brand'); ?>"><i class="la la-tags"></i> 品牌管理</a>
				</li>
				<?php
			}
			?>

			<?php
			if ($inventory['value']) {
				?>
				<li class="nav-item<?php if ($com === 'inventory') echo ' active'; ?>">
					<a href="<?php echo base_url('admin/inventory'); ?>"><i class="la la-automobile"></i> 库存管理</a>
				</li>
				<?php
			}
			?>

			<?php
			if ($order['value']) {
				?>
				<li class="nav-item<?php if ($com === 'order') echo ' active'; ?>">
					<a href="<?php echo base_url('admin/order'); ?>"><i class="la la-cart-arrow-down"></i> 订货管理</a>
				</li>
				<?php
			}
			?>

			<li class="nav-item has-sub <?php if ($com === 'system') echo 'open'; ?>">
				<a href="javascript:void(0);">
					<i class="la la-cogs"></i>
					<span class="menu-title">系统设置</span>
				</a>
				<ul class="menu-content">
					<?php
					if ($address['value']) {
						?>
						<li class="<?php if ($com === 'system' && $sub === 'address') echo 'active'; ?>">
							<a class="menu-item" href="<?php echo base_url('admin/address?type=province'); ?>"> 地址管理</a>
						</li>
						<?php
					}
					?>
					<?php
					if ($ad['value']) {
						?>
						<li class="<?php if ($com === 'system' && $sub === 'slider') echo 'active'; ?>">
							<a class="menu-item" href="<?php echo base_url('admin/slider'); ?>"> 广告管理</a>
						</li>
						<?php
					}
					?>
					<?php
					if ($notice['value']) {
						?>
						<li class="<?php if ($com === 'system' && $sub === 'notice') echo 'active'; ?>">
							<a class="menu-item" href="<?php echo base_url('admin/notice'); ?>"> 资讯管理</a>
						</li>
						<?php
					}
					?>
					<li class="<?php if ($com === 'system' && $sub === 'profile') echo 'active'; ?>">
						<a class="menu-item" href="<?php echo base_url('admin/profile'); ?>"> 我的账户</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<!-- END::Sidebar -->
