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
					<div class="col-md-6 col-sm-12 text-right">
						<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#login-modal" type="button">
							Create New
						</a>
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

									<a class="delete" id="{{row.id}}">
										<i class="dw dw-delete-3"></i> </a>
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


<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">

		<div class="modal-content">

			<div class="login-box bg-white box-shadow border-radius-10">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="login-title">
					<h2 class="text-center ">
						Create new {{title}}
					</h2>

				</div>
				<form>
					<div class="input-group custom">
						<input type="text" class="form-control form-control-lg" name="name" placeholder="name" id="category-name" />
					</div>
					<!-- category parent -->
					<div class="input-group">
						<select class="custom-select form-control form-control-lg" name="parent_id" id="category-parent">
							<option selected>Default</option>
							{% for row in rows %}
							<option value="{{row.id}}">{{row.name}}</option>
							{% endfor %}
						</select>

					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-0">
								<button class="btn btn-primary btn-lg btn-block" id="create-category-btn">Create</button>
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.delete').click(function() {
			// get confirmation
			var confirm = window.confirm('Are you sure you want to delete this category?');
			if (!confirm) {
				return false;
			}
			var id = $(this).attr('id');
			var url = "categories/delete";
			var tr = $(this).closest('tr');
			$.ajax({
				url: url,
				type: 'POST',
				data: {
					id: id
				},
				success: function(data) {
					tr.fadeOut(500);
				}
			});
		});

		$('#create-category-btn').click(function() {
			event.preventDefault();
			var name = $('#category-name').val();
			var parent = $('#category-parent').val();
			var url = "categories/create";
			$.ajax({
				url: url,
				type: 'POST',
				data: {
					name: name,
					parent_id: parent
				},
				success: function(data) {
					$('#login-modal').modal('hide');
					location.reload();
				}
			});
		});
	});
</script>

{% endblock %}