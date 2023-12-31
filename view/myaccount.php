<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
	<div class="container">
		<div class="row">
			<div class="page-banner-content col">

				<h1>My Account</h1>
				<ul class="page-breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li><a href="my-account.html">My Account</a></li>
				</ul>

			</div>
		</div>
	</div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
	<div class="container">
		<div class="row mbn-30">

			<!-- My Account Tab Menu Start -->
			<div class="col-lg-3 col-12 mb-30">
				<div class="myaccount-tab-menu nav" role="tablist">
					<a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
						Dashboard</a>

					<a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>

					<!-- <a href="#download" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a> -->

					<a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Payment
						Method</a>

					<a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> address</a>

					<a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>

					<a href="?act=login&nd=logout"><i class="fa fa-sign-out"></i> Logout</a>
				</div>
			</div>
			<!-- My Account Tab Menu End -->

			<!-- My Account Tab Content Start -->
			<div class="col-lg-9 col-12 mb-30">
				<div class="tab-content" id="myaccountContent">
					<!-- Single Tab Content Start -->
					<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
						<div class="myaccount-content">
							<h3>Dashboard</h3>

							<div class="welcome">
								<p>Hello, <strong>
										<?= $_SESSION['user']['name_tk'] ?>
									</strong> (If Not <strong>
										<?= $_SESSION['user']['name_tk'] ?> !
									</strong><a href="?act=login&nd=logout" class="logout"> Logout</a>)</p>
							</div>

							<p class="mb-0">From your account dashboard. you can easily check &amp; view your
								recent orders, manage your shipping and billing addresses and edit your
								password and account details.</p>
						</div>
					</div>
					<!-- Single Tab Content End -->

					<!-- Single Tab Content Start -->
					<div class="tab-pane fade" id="orders" role="tabpanel">
						<div class="myaccount-content">
							<h3>Orders</h3>

							<div class="myaccount-table table-responsive text-center">
								<table class="table table-bordered">
									<thead class="thead-light">
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Date</th>
											<th>Status</th>
											<th>Total</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										<?php
										foreach ($list_detailbill as $key => $value) {
											extract($value);
											?>
											<tr>
												<td>
													<?= $key + 1 ?>
												</td>
												<td>
													<?= $full_name ?>
												</td>
												<td>
													<?= $thoi_gian ?>
												</td>
												<td>
													<?php
													if ($trang_thai == 0) {
														echo '<div class="alert alert-warning">Đang xác nhận</div>';
													} elseif ($trang_thai == 1) {
														echo '<div class="alert alert-info">Đã xác nhận</div>';
													} elseif ($trang_thai == 2) {
														echo '<div class="alert alert-primary">Đang giao hàng</div>';
													} elseif ($trang_thai == 3) {
														echo '<div class="alert alert-success">Đã nhận hàng</div>';
													} else {
														echo '<div class="alert alert-danger">Đã hủy đơn hàng</div>';
													}
													?>
												</td>
												<td>$
													<?= $thanh_tien ?>
												</td>
												<td><a href="?act=account&nd=chitiet&id_ctbill=<?= $id?>&trang_thai=<?= $trang_thai ?>"
														class="btn btn-dark btn-round">View</a></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- Single Tab Content End -->

					<!-- Single Tab Content Start -->

					<!-- Single Tab Content End -->

					<!-- Single Tab Content Start -->
					<!-- <div class="tab-pane fade" id="payment-method" role="tabpanel">
							<div class="myaccount-content">
								<h3>Payment Method</h3>

								<p class="saved-message">You Can't Saved Your Payment Method yet.</p>
							</div>
						</div> -->
					<!-- Single Tab Content End -->

					<!-- Single Tab Content Start -->
					<div class="tab-pane fade" id="address-edit" role="tabpanel">
						<div class="myaccount-content">
							<h3>Billing Address</h3>

							<address>
								<?php if (!empty($_SESSION['user']['dia_chi'])) { ?>
									<p><strong>
											<?= $_SESSION['user']['name_tk'] ?>
										</strong></p>
									<p>
										<?= $_SESSION['user']['dia_chi'] ?>
									</p>
									<p>Mobile:
										<?= $_SESSION['user']['phone'] ?>
									</p>
								<?php } else {
									echo '<div class="alert alert-dark">bạn chưa có địa chỉ nào</div>';
								} ?>
							</address>

							<!-- <a href="#" class="btn btn-dark btn-round d-inline-block"><i class="fa fa-edit"></i>Edit Address</a> -->
						</div>
					</div>
					<!-- Single Tab Content End -->

					<!-- Single Tab Content Start -->
					<div class="tab-pane fade" id="account-info" role="tabpanel">
						<div class="myaccount-content">
							<h3>Account Details</h3>

							<div class="account-details-form">
								<form action="?act=account&nd=updateTK" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6 col-12 mb-30">
											<input type="hidden" name="id_tk" value="<?= $_SESSION['user']['id_tk'] ?>">
											<input id="first-name" placeholder="Your Name" type="text"
												value="<?= $_SESSION['user']['full_name'] ?>" name="full_name">
										</div>

										<div class="col-lg-6 col-12 mb-30">
											<input id="last-name" placeholder="User Name" type="text"
												value="<?= $_SESSION['user']['name_tk'] ?>" name="name_tk">
										</div>

										<div class="col-12 mb-30">
											<input id="display-name" placeholder="Email" type="email"
												value="<?= $_SESSION['user']['email'] ?>" name="email">
										</div>

										<div class="col-12 mb-30">
											<label for="">chọn ảnh</label>
											<input type="hidden" name="image_tk"
												value="<?= $_SESSION['user']['image_tk'] ?>">
											<input id="email" type="file" name="image_tk">
											<img src="./public/uploads/<?= $_SESSION['user']['image_tk'] ?>" alt=""
												style="width: 100px;">
										</div>

										<div class="col-12 mb-30">
											<input id="email" placeholder="Address" type="text"
												value="<?= $_SESSION['user']['dia_chi'] ?>" name="dia_chi">
										</div>

										<div class="col-12 mb-30">
											<input id="email" placeholder="Phone" type="text"
												value="<?= $_SESSION['user']['phone'] ?>" name="phone">
										</div>
										<div class="col-12 mb-30">
											<h4>Password change</h4>
										</div>

										<div class="col-12 mb-30">
											<input id="current-pwd" placeholder="Current Password" type="password"
												name="passold">
										</div>

										<div class="col-lg-6 col-12 mb-30">
											<input id="new-pwd" placeholder="New Password" type="password"
												name="passnew">
										</div>

										<div class="col-lg-6 col-12 mb-30">
											<input id="confirm-pwd" placeholder="Confirm Password" type="password"
												name="repass">
										</div>

										<div class="col-12">
											<button class="btn btn-dark btn-round btn-lg">Save Changes</button>
										</div>
										<?php if (isset($errors)) {
											foreach ($errors as $error) {
												echo '<div class="alert alert-danger mt-3">' . $error . '</div>';
											}
										} ?>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- Single Tab Content End -->
				</div>
			</div>
			<!-- My Account Tab Content End -->

		</div>
	</div>
</div><!-- Page Section End -->