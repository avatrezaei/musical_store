{% extends "panel.php" %}
{% block title %}Home{% endblock %}

{% block main %}
<div class="main-container">
	<div class="pd-ltr-20">
				<div class="card-box pd-20 height-100-p mb-30">
					<div class="row align-items-center">
						<div class="col-md-4">
							<img src="vendors/images/banner-img.png" alt="" />
						</div>
						<div class="col-md-8">
							<h4 class="font-20 weight-500 mb-10 text-capitalize">
								Welcome back
								<div class="weight-600 font-30 text-bold">
									{{ username }}
								</div>
							</h4>
							<p class="font-18 max-width-600">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
								hic non repellendus debitis iure, doloremque assumenda. Autem
								modi, corrupti, nobis ea iure fugiat, veniam non quaerat
								mollitia animi error corporis.
							</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 mb-30">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data align-items-center">
									<span class="micon bi bi-people-fill"></span>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">
										{{ users }}
									</div>
									<div class="weight-600 font-14">
										Users
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 mb-30">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<span class="micon bi bi-bookmarks-fill"></span>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">
										{{ categories }}
									</div>
									<div class="weight-600 font-14">Categories</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 mb-30">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<span class="micon bi bi-bag-fill"></span>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">
										{{ products }}
									</div>
									<div class="weight-600 font-14">Product</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 mb-30">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
									<span class="micon bi bi-credit-card-fill"></span>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">6060</div>
									<div class="weight-600 font-14">Order</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>
{% endblock %}
	 