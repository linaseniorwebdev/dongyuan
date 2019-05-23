<!-- BEGIN::Sidebar -->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="main-menu-content">
		<?php if (!isset($com)) $com = 'index'; ?>
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<li class="nav-item<?php if ($com === 'index') echo ' active'; ?>">
				<a href="<?=base_url('admin')?>"><i class="la la-home"></i> 控制台</a>
			</li>
			<li class="nav-item<?php if ($com === 'role') echo ' active'; ?>">
				<a href="<?=base_url('admin/role')?>"><i class="la la-user-secret"></i> 角色管理</a>
			</li>
			<li class="nav-item<?php if ($com === 'user') echo ' active'; ?>">
				<a href="<?=base_url('admin/user')?>"><i class="la la-users"></i> 用户管理</a>
			</li>
			<li class="nav-item<?php if ($com === 'address') echo ' active'; ?>">
				<a href="<?=base_url('admin/address?type=province')?>"><i class="la la-map-marker"></i> 地址管理</a>
			</li>
			<li class="nav-item<?php if ($com === 'category') echo ' active'; ?>">
				<a href="<?=base_url('admin/category')?>"><i class="la la-tag"></i> 分类管理</a>
			</li>
			<li class="nav-item<?php if ($com === 'brand') echo ' active'; ?>">
				<a href="<?=base_url('admin/brand')?>"><i class="la la-tags"></i> 品牌管理</a>
			</li>
			<li class="nav-item<?php if ($com === 'inventory') echo ' active'; ?>">
				<a href="<?=base_url('admin/inventory')?>"><i class="la la-automobile"></i> 库存管理</a>
			</li>
			<li class="nav-item<?php if ($com === 'order') echo ' active'; ?>">
				<a href="<?=base_url('admin/order')?>"><i class="la la-cart-arrow-down"></i> 订单管理</a>
			</li>
			<li class="nav-item<?php if ($com === 'profile') echo ' active'; ?>">
				<a href="<?=base_url('admin/profile')?>"><i class="la la-user"></i> 我的账户</a>
			</li>
		</ul>
	</div>
</div>
<!-- END::Sidebar -->
