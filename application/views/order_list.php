<?php $oder_list_title = $this->lang->line('oder_list_title');?>
<div class="col-xl-10 col-lg-12 col-md-12">
  <div class="card mb-0">
    <div class="card-header">
      <h3 class="card-title"><?=$oder_list_title[0]?></h3>
    </div>
    <div class="card-body">
      <div class="table-responsive border-top">
        <table class="table table-bordered table-hover text-nowrap">
          <thead>
            <tr>
              <th><?=$oder_list_title[1]?></th>
              <th><?=$oder_list_title[2]?></th>
              <th><?=$oder_list_title[3]?></th>
              <th><?=$oder_list_title[4]?></th>
              <th><?=$oder_list_title[5]?></th>
              <th><?=$oder_list_title[6]?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-primary">#89345</td>
              <td>Restaurant</td>
              <td></td>
              <td class="font-weight-semibold fs-16">$893</td>
              <td>07-12-2018</td>
              <td>
                <a href="#" class="badge badge-danger">Pending</a>
              </td>
            </tr>
            <tr>
              <td class="text-primary">#39281</td>
              <td>Electorincs</td>
              <td></td>
              <td class="font-weight-semibold fs-16">$254</td>
              <td>12-11-2018</td>
              <td>
                <a href="#" class="badge badge-primary">Completed</a>
              </td>
            </tr>
            <tr>
              <td class="text-primary">#35825</td>
              <td>Clothing</td>
              <td></td>
              <td class="font-weight-semibold fs-16">$352</td>
              <td>15-11-2018</td>
              <td>
                <a href="#" class="badge badge-success">Activated</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!---AJAX로 구성해야 하는 부분--->
      <ul class="pagination">
        <li class="page-item page-prev disabled">
          <a class="page-link" href="#" tabindex="-1">Prev</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item page-next">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </div>
  </div>
</div>
