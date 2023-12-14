<!-- Page Banner Section Start -->
<div class="page-banner-section section" style="background-image: url(assets/images/hero/hero-1.jpg)">
	<div class="container">
		<div class="row">
			<div class="page-banner-content col">

				<h1>Checkout</h1>
				<ul class="page-breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li><a href="checkout.html">Checkout</a></li>
				</ul>

			</div>
		</div>
	</div>
</div><!-- Page Banner Section End -->

<!-- Page Section Start -->
<div class="page-section section section-padding">
	<div class="container">

		<!-- Checkout Form s-->
		<form action="?act=bill" method="post" class="checkout-form">
			<div class="row row-50 mbn-40">

				<div class="col-lg-7">

					<!-- Billing Address -->
					<div id="billing-form" class="mb-20">
						<h4 class="checkout-title">Billing Address</h4>
						<?php
						if (isset($_SESSION['user'])) { ?>
							<div class="row">

								<div class=" col-12 mb-5">
									<label>Full Name*</label>
									<input type="text" placeholder="Full Name" name="full_name"
										value="<?= $_SESSION['user']['full_name'] ?>">
								</div>

								<div class="col-md-6 col-12 mb-5">
									<label>Email Address*</label>
									<input type="email" placeholder="Email Address" name="email"
										value="<?= $_SESSION['user']['email'] ?>">
								</div>

								<div class="col-md-6 col-12 mb-5">
									<label>Phone no*</label>
									<input type="text" placeholder="Phone number" name="phone" value="<?= $_SESSION['user']['phone'] ?>">
								</div>

								<div class="col-12 mb-5">
									<label>Address*</label>
									<input type="text" placeholder="Address" name="dia_chi" value="<?= $_SESSION['user']['dia_chi'] ?>">
								</div>


							</div>
						<?php } else { ?>
							<div class="row">

								<div class=" col-12 mb-5">
									<label>Full Name*</label>
									<input type="text" placeholder="Full Name" name="full_name" required><?= isset($nameErr)? $nameErr: '';?>
								</div>

								<div class="col-md-6 col-12 mb-5">
									<label>Email Address*</label>
									<input type="email" placeholder="Email Address" name="email" required>
								</div>

								<div class="col-md-6 col-12 mb-5">
									<label>Phone no*</label>
									<input type="text" placeholder="Phone number" name="phone" required>
								</div>

								<div class="col-12 mb-5">
									<label>Address*</label>
									<input type="text" placeholder="Address" name="dia_chi" required>
								</div>

							</div>

						<?php } ?>
					</div>


				</div>

				<div class="col-lg-5">
					<div class="row">

						<!-- Cart Total -->
						<div class="col-12 mb-40">

							<h4 class="checkout-title">Cart Total</h4>

							<div class="checkout-cart-total">

								<h4>Product <span>Total</span></h4>

								<ul>
									<?php 
									foreach ($_SESSION['cart'] as $item) { 
										if (!empty($item['color'])) {
											$size = load_one_bt($item['size']);
											$color = load_one_bt($item['color']);
											echo '<li>'.$item['name'].'  X  '.$item['quantity'].'(color: '.$color['name'].', size:  '.$size['name'].') <span>$'.$item['price'].'</span></li>';
										}else
										echo '<li>'.$item['name'].'  X  '.$item['quantity'].' <span>$'.$item['price'].'</span></li>';
									 } ?>
								</ul>

								<p>Sub Total <span>$<?= !empty($_SESSION['cart'])? $_SESSION['resultTotal']: 0 ?></span></p>
								<p>Shipping Fee <span>$00.00</span></p>

								<h4>Grand Total <span>$<?=  !empty($_SESSION['cart'])?number_format( $_SESSION['resultTotal'], 2, ',', '.') : 0 ?></span></h4>
									 <input type="hidden" name="thanh_tien" value="<?= !empty($_SESSION['cart'])?$_SESSION['resultTotal']: 0 ?>">
							</div>

						</div>

						<!-- Payment Method -->
						<div class="col-12 mb-40">

							<h4 class="checkout-title">Payment Method</h4>

							<div class="checkout-payment-method">
							<?php if(isset($payErr)){
									echo '<div class="alert alert-danger">'.$payErr.'</div>';
								}?>
								<div class="single-method">
									<input type="radio" id="payment_check" name="payUrl" value="Tiền mặt">
									<label for="payment_check">Pay cash</label>
									<p data-method="check">Please send a Check to Store name with Store Street, Store
										Town, Store State, Store Postcode, Store Country.</p>
								</div>

								<div class="single-method">
									<input type="radio" id="payment_bank" name="payUrl" value="Chuyển khoản">
									<label for="payment_bank">Direct Bank Transfer</label>
									<p data-method="bank">Please send a Check to Store name with Store Street, Store
										Town, Store State, Store Postcode, Store Country.</p>
								</div>

								<div class="single-method">
									<input type="radio" id="payment_cash" name="payUrl" value="thanh toán khi nhận hàng">
									<label for="payment_cash">Cash on Delivery</label>
									<p data-method="cash">Please send a Check to Store name with Store Street, Store
										Town, Store State, Store Postcode, Store Country.</p>
								</div>
							</div>

							<button type="submit" class="place-order">Place order</button>

						</div>

					</div>
				</div>

			</div>
		</form>

	</div>
</div><!-- Page Section End -->