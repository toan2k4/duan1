<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tổng Bình Luân Theo Sản Phẩm</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>STT</th>
              <th>Tên sản phảm</th>
              <th>Tổng số bình luận</th>
              <th>Chỉ Tiết</th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($ds as $key => $value): ?>
              <td>
                <?= $key + 1 ?>
              </td>
              <td>
                <?= $value['ten_sp'] ?>
              </td>
              <td> <a href="" class="text-body">Hiện Có
                  <?= $value['Tong'] ?> bình luận
                </a></td>
              <td><a href="?act=binhluan&nd=chitiet&id_sp=<?= $value['id_sp'] ?>" class="btn btn-success">Chi Tiết</a>
              </td>
              </tr>
            <?php endforeach ?>
          </tbody>


        </table>

      </div>
    </div>
  </div>

</div>