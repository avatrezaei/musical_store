{% extends "panel.php" %}
{% block title %}Home{% endblock %}

{% block main %}
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>{{title}}</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="dashboard">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											{{title}}
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">{{subtitle}}</h4>
						</div>
						<div class="pb-20">
							<table class="data-table table stripe hover nowrap">
								<thead>
									<tr>
										<!-- for headers -->
										{% for header in headers %}
											<th class="table-plus">{{header}}</th>
										{% endfor %} 
										<th class="datatable-nosort">Action</th>
									</tr>
								</thead>
								<tbody>
									{% for row in rows %}
									<tr>
										{% for key, value in row %}
											<td class="table-plus">{{value}}</td>
										{% endfor %}
										<td>
											<div class="dropdown">
												<a
													class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
													href="#"
													role="button"
													data-toggle="dropdown"
												>
													<i class="dw dw-more"></i>
												</a>
												<div
													class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
												>
													<a class="dropdown-item" href="#"
														><i class="dw dw-eye"></i> View</a
													>
													<a class="dropdown-item" href="#"
														><i class="dw dw-edit2"></i> Edit</a
													>
													<a class="dropdown-item" href="#"
														><i class="dw dw-delete-3"></i> Delete</a
													>
												</div>
											</div>
										</td>
									</tr>
									{% endfor %} 
								</tbody>
							</table>
						</div>
			</div>
		</div>
	</div>
</div>
{% endblock %}
	 