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
												<td><a href="?act=account&nd=chitiet&id_ctbill=<?= $id?>" class="btn btn-dark btn-round">View</a></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- Single Tab Content End -->