

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

						<a href="#download" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>

						<a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Payment
							Method</a>

						<a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> address</a>

						<a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>

						<a href="login-register.html"><i class="fa fa-sign-out"></i> Logout</a>
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
									<p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
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
										<tr>
											<td>1</td>
											<td>Moisturizing Oil</td>
											<td>Aug 22, 2022</td>
											<td>Pending</td>
											<td>$45</td>
											<td><a href="cart.html" class="btn btn-dark btn-round">View</a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Katopeno Altuni</td>
											<td>July 22, 2022</td>
											<td>Approved</td>
											<td>$100</td>
											<td><a href="cart.html" class="btn btn-dark btn-round">View</a></td>
										</tr>
										<tr>
											<td>3</td>
											<td>Murikhete Paris</td>
											<td>June 12, 2022</td>
											<td>On Hold</td>
											<td>$99</td>
											<td><a href="cart.html" class="btn btn-dark btn-round">View</a></td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- Single Tab Content End -->

						<!-- Single Tab Content Start -->
						<div class="tab-pane fade" id="download" role="tabpanel">
							<div class="myaccount-content">
								<h3>Downloads</h3>

								<div class="myaccount-table table-responsive text-center">
									<table class="table table-bordered">
										<thead class="thead-light">
										<tr>
											<th>Product</th>
											<th>Date</th>
											<th>Expire</th>
											<th>Download</th>
										</tr>
										</thead>

										<tbody>
										<tr>
											<td>Moisturizing Oil</td>
											<td>Aug 22, 2022</td>
											<td>Yes</td>
											<td><a href="#" class="btn btn-dark btn-round">Download File</a></td>
										</tr>
										<tr>
											<td>Katopeno Altuni</td>
											<td>Sep 12, 2022</td>
											<td>Never</td>
											<td><a href="#" class="btn btn-dark btn-round">Download File</a></td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- Single Tab Content End -->

						<!-- Single Tab Content Start -->
						<div class="tab-pane fade" id="payment-method" role="tabpanel">
							<div class="myaccount-content">
								<h3>Payment Method</h3>

								<p class="saved-message">You Can't Saved Your Payment Method yet.</p>
							</div>
						</div>
						<!-- Single Tab Content End -->

						<!-- Single Tab Content Start -->
						<div class="tab-pane fade" id="address-edit" role="tabpanel">
							<div class="myaccount-content">
								<h3>Billing Address</h3>

								<address>
									<p><strong>Alex Tuntuni</strong></p>
									<p>1355 Market St, Suite 900 <br>
										San Francisco, CA 94103</p>
									<p>Mobile: (123) 456-7890</p>
								</address>

								<a href="#" class="btn btn-dark btn-round d-inline-block"><i class="fa fa-edit"></i>Edit Address</a>
							</div>
						</div>
						<!-- Single Tab Content End -->

						<!-- Single Tab Content Start -->
						<div class="tab-pane fade" id="account-info" role="tabpanel">
							<div class="myaccount-content">
								<h3>Account Details</h3>

								<div class="account-details-form">
									<form action="#">
										<div class="row">
											<div class="col-lg-6 col-12 mb-30">
												<input id="first-name" placeholder="First Name" type="text">
											</div>

											<div class="col-lg-6 col-12 mb-30">
												<input id="last-name" placeholder="Last Name" type="text">
											</div>

											<div class="col-12 mb-30">
												<input id="display-name" placeholder="Display Name" type="text">
											</div>

											<div class="col-12 mb-30">
												<input id="email" placeholder="Email Address" type="email">
											</div>

											<div class="col-12 mb-30"><h4>Password change</h4></div>

											<div class="col-12 mb-30">
												<input id="current-pwd" placeholder="Current Password" type="password">
											</div>

											<div class="col-lg-6 col-12 mb-30">
												<input id="new-pwd" placeholder="New Password" type="password">
											</div>

											<div class="col-lg-6 col-12 mb-30">
												<input id="confirm-pwd" placeholder="Confirm Password" type="password">
											</div>

											<div class="col-12">
												<button class="btn btn-dark btn-round btn-lg">Save Changes</button>
											</div>

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

 