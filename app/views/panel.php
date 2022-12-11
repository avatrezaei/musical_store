<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Guitar - Admin panel</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="vendors/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="vendors/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="vendors/images/favicon-16x16.png"
		/>

		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
		/>

		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/plugins/switchery/switchery.min.css"
		/>

		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css"
		/>
		
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

		<!-- jquery -->
		<script src="vendors/scripts/jquery-3.6.1.min.js"></script>

		
		
	</head>
	<body>	

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
					<form>
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								type="text"
								class="form-control search-input"
								placeholder="Search Here"
							/>
						</div>
					</form>
				</div>
			</div>
			<div class="header-right">
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img  src="vendors/images/profile-photo.jpg" alt="" />
							</span>
							<span class="user-name">
								{{ session.admin['name'] }}
							</span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="profile.html"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="profile.html"
								><i class="dw dw-settings2"></i> Setting</a
							>
							<a class="dropdown-item" href="faq.html"
								><i class="dw dw-help"></i> Help</a
							>
							<a class="dropdown-item" href="logout"
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div>
					</div>
				</div>
			</div>
		</div>		

		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="dashboard">
					<img
						src="vendors/images/logo.png"
						alt=""
						width="180"
						height="39"
						class="light-logo"
					/> 
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
                        <li>
							<a href="dashboard" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-speedometer2"></span>
                                <span class="mtext">Dashboard</span>
							</a>
						</li>

                        <li>
							<a href="categories" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-bookmarks-fill"></span>
                                <span class="mtext">Categories</span>
							</a>
						</li>

                        <li>

				    <li>
							<a href="brands" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-apple"></span>
                                <span class="mtext">Brands</span>
							</a>
						</li>

                        <li>
							<a href="products" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-bag-fill"></span>
                                <span class="mtext">Products</span>
							</a>
						</li>

                        <li>
							<a href="orders" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-credit-card-fill"></span>
                                <span class="mtext">Orders</span>
							</a>
						</li>

                        <li>
							<a href="users" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-people-fill"></span>
                                <span class="mtext">Users</span>
							</a>
						</li>

                        <li>
							<a href="settings" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-gear-fill"></span>
                                <span class="mtext">Settings</span>
							</a>
						</li>


					</ul>
				</div>
			</div>
		</div>
		{% block main %}
        {% endblock %}
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="vendors/plugins/switchery/switchery.min.js"></script>
		<script src="vendors/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="vendors/scripts/advanced-components.js"></script>
	</body>
</html>
