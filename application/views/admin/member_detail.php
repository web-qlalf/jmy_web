<?php $user_info_title = $this->lang->line('user_info_title');?>
<?php $user_info_contents = $this->lang->line('user_info_contents');?>
  <form action="/admin/member/update" method="post">
    <div class="card mb-0">
      <div class="card-header">
        <h3 class="card-title"><?=$user_info_title[0]?></h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
              <label class="form-label"><?=$user_info_title[1]?></label>
              <input type="hidden" class="form-control user_no" name="user_no" value="<?=$user_info[0]['no']?>">
              <input type="text" class="form-control user_name" name="user_name" placeholder="<?=$user_info_contents[1]?>" value="<?=$user_info[0]['name']?>" readonly>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
              <label class="form-label"><?=$user_info_title[2]?></label>
              <input type="email" class="form-control user_email" name="user_email" placeholder="<?=$user_info_contents[2]?>" value="<?=$user_info[0]['email']?>" readonly>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
              <label class="form-label"><?=$user_info_title[3]?></label>
              <input type="text" class="form-control user_tel1" name="user_tel1" id="user_tel1" placeholder="<?=$user_info_contents[3]?>" value="<?=$user_info[0]['tel1']?>" onblur="checkText(this.id,2)" readonly>
              <label class="user_tel1_label"></label>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
              <label class="form-label"><?=$user_info_title[4]?></label>
              <input type="text" class="form-control user_tel2" name="user_tel2" id="user_tel2" placeholder="<?=$user_info_contents[4]?>" value="<?=$user_info[0]['tel2']?>" onblur="checkText(this.id,2)" readonly>
              <label class="user_tel2_label"></label>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="form-group">
              <label class="form-label" for="zipcode"><?=$user_info_title[5]?></label>
              <div class="input-group">
                <input type="number" class="form-control" id="zipcode" name="zipcode"  placeholder="<?=$user_info_contents[5]?>" value="<?=$user_info[0]['zipcode']?>" readonly/>
                <div class="input-group-append">
                  <button type="button" onclick="openZipSearch()" class="btn btn-primary zipcode_btn" disabled>찾기</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-8">
            <div class="form-group">
              <label class="form-label"><?=$user_info_title[6]?></label>
              <input type="text" class="form-control" id="adress1" name="address1" placeholder="<?=$user_info_contents[6]?>" value="<?=$user_info[0]['address1']?>" readonly/>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label"><?=$user_info_title[7]?></label>
              <input type="text" class="form-control" id="adress2" name="address2" placeholder="<?=$user_info_contents[7]?>" value="<?=$user_info[0]['address2']?>" readonly>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label"><?=$user_info_title[8]?></label>
              <input type="text" class="form-control" id="adress3" name="address3" placeholder="<?=$user_info_contents[8]?>" value="<?=$user_info[0]['address3']?>" readonly>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <select name="user_status_select" class="form-control custom-select user_status_select">
                <option value="0" selected="">활동</option>
                <option value="1">활동중지</option>
                <option value="2">탈퇴</option>
              </select>
            </div>
          </div>

        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary btn-block update_start" onclick="readonly_remove()"><?=$user_info_title[10]?></button>
        <button type="submit" class="btn btn-primary btn-block update_btn" style="display:none">수정하기</button>
      </div>
    </div>
  </form>
  <script>
  user_status_select()
    function readonly_remove()
    {
      $('.user_tel1').attr('readonly', false);
      $('.user_tel2').attr('readonly', false);
      $('.zipcode_btn').attr('disabled', false);
      $('#adress2').attr('readonly', false);
      $('.update_btn').attr('disabled', false);
      $('.update_btn').attr('style', '');
      $('.update_start').attr('disabled', true);
      $('.update_start').attr('style', 'display:none');
    }
      function user_status_select()
    {
      var status = <?php echo $user_info[0]['status']; ?>;
      status = parseInt(status);
      switch (status) {
        case 0:
          $('.user_status_select option').eq(0).attr('selected', true);
          break;
        case 1:
        $('.user_status_select option').eq(1).attr('selected', true);
          break;
        case 2:
        $('.user_status_select option').eq(2).attr('selected', true);
          break;
      }
    }

  </script>
