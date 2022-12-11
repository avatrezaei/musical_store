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
						<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#product-modal" type="button">
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


<div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md modal-dialog-centered">

		<div class="modal-content">

			<div class="modal-box bg-white box-shadow border-radius-10">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="login-title">
					<h2 class="text-center ">
						Create new {{title}}
					</h2>

				</div>
				<form enctype="multipart/form-data">

					<div class="row">
						<div class="col-md-12">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" name="name" placeholder="name" id="name" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="input-group custom">
								<select class="custom-select form-control form-control-lg" id="category">
									<option selected value="0">Category</option>
									{% for category in categories %}
									<option value="{{category.id}}">{{category.category}}</option>
									{% endfor %}
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group custom">
								<select class="custom-select form-control form-control-lg" id="brand">
									<option selected value="0">Brand</option>
									{% for brand in brands %}
									<option value="{{brand.brand_id}}">{{brand.brand_title}}</option>
									{% endfor %}
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" name="price" placeholder="price" id="price" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" name="discount" placeholder="discount" id="discount" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="input-group custom">
								<textarea class="form-control form-control-lg" name="description" placeholder="description" id="description"></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="input-group custom">
								<input type="file" class="form-control form-control-lg" name="image1" placeholder="image1" id="image1" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group custom">
								<input type="file" class="form-control form-control-lg" name="image2" placeholder="image2" id="image2" />
							</div>
						</div>
					</div>




					<div class="row">
						<div class="col-md-3">
							<div class="input-group custom">
								<input type="checkbox" name="newarrival" id="newarrival" class="switch-btn" data-size="small" data-color="#0099ff" />
								<label for="newarrival">New Arrival</label>
							</div>
						</div>
						<div class="col-md-3">
							<div class="input-group custom">
								<input type="checkbox" name="featured" id="featured" class="switch-btn" data-size="small" data-color="#0099ff" />
								<label for="featured">Featured</label>
							</div>
						</div>
						<div class="col-md-3">
							<div class="input-group custom">
								<input type="checkbox" name="trending" id="trending" class="switch-btn" data-size="small" data-color="#0099ff" />
								<label for="trending">Trending</label>
							</div>
						</div>
						<div class="col-md-3">
							<div class="input-group custom">
								<input type="checkbox" name="dealoftheday" id="dealoftheday" class="switch-btn" data-size="small" data-color="#0099ff" />
								<label for="dealoftheday">Deal of the day</label>
							</div>
						</div>
					</div>




					<div class="row">
						<div class="col-md-6">
							<div class="input-group custom">
								<input type="number" class="form-control form-control-lg" name="sold" placeholder="sold" id="sold" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group custom">
								<input type="number" class="form-control form-control-lg" name="stock" placeholder="stock" id="stock" />
							</div>
						</div>
					</div>
 
					<div class="input-group custom">
						<input type="text" name="keywords" id="keywords" placeholder="add tags" class="form-control form-control-lg" value="guitar,combo,jaz,piano,pop" data-role="tagsinput" />
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-0">
								<button class="btn btn-primary btn-lg btn-block" id="create-product-btn">Create</button>
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
			var confirm = window.confirm('Are you sure you want to delete this product?');
			if (!confirm) {
				return false;
			}
			var id = $(this).attr('id');
			var url = "products/delete";
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

		$('#create-product-btn').click(function(event) {
			event.preventDefault();

			var fd = new FormData();
			
			var files = $('#image1')[0].files[0];
			fd.append('image1', files);

			var files = $('#image2')[0].files[0];
			fd.append('image2', files);

			fd.append('name', $('#name').val());
			fd.append('description', $('#description').val());
			fd.append('price', $('#price').val());
			fd.append('discount', $('#discount').val());
			fd.append('category', $('#category').val());
			fd.append('brand', $('#brand').val());
			fd.append('newarrival', $('#newarrival').is(':checked'));
			fd.append('featured', $('#featured').is(':checked'));
			fd.append('trending', $('#trending').is(':checked'));
			fd.append('dealoftheday', $('#dealoftheday').is(':checked'));
			fd.append('sold', $('#sold').val());
			fd.append('stock', $('#stock').val());
			fd.append('keywords', $('#keywords').val());

			var url = "products/create";

			$.ajax({
				url: url,
				type: 'POST',
				contentType: false,
                    processData: false,
				data: fd,
				success: function(data) {
					$('#product-modal').modal('hide');
					location.reload();
				}
			});
		});
	});
</script>


{% endblock %}