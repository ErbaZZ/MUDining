<div class="row text-center">
  <div class="btn-group" id="foodtype" data-toggle="buttons">
    <?php if (strpos($res['Type'], '01') !== false) { ?>
    <label class="btn btn-success active"> <?php } else { ?> <label class="btn btn-success"> <?php } ?>
      <input type="checkbox"><span id="long">Thai</span><span id="short">&#x1F1F9;&#x1F1ED;</span>
    </label>
    <?php if (strpos($res['Type'], '02') !== false) { ?>
    <label class="btn btn-warning active"> <?php } else { ?> <label class="btn btn-warning"> <?php } ?>
      <input type="checkbox"><span id="long">Japanese</span><span id="short">&#x1F1EF;&#x1F1F5;</span>
    </label>
    <?php if (strpos($res['Type'], '03') !== false) { ?>
    <label class="btn btn-danger active"> <?php } else { ?> <label class="btn btn-danger"> <?php } ?>
      <input type="checkbox"><span id="long">Chinese</span><span id="short">&#x1F1E8;&#x1F1F3;</span>
    </label>
    <?php if (strpos($res['Type'], '04') !== false) { ?>
    <label class="btn btn-primary active"> <?php } else { ?> <label class="btn btn-primary"> <?php } ?>
      <input type="checkbox"><span id="long">European</span><span id="short">&#x1F1EA;&#x1F1FA;</span>
    </label>
  </div>
  <?php if (!isset($combine)) { ?>
</div>
<div class="row text-center">
  <?php } ?>
  <div class="btn-group" id="dishtype" data-toggle="buttons">
    <?php if (strpos($res['Type'], '11') !== false) { ?>
    <label class="btn btn-default active"> <?php } else { ?> <label class="btn btn-default"> <?php } ?>
      <input type="checkbox"><span id="long">Single Dish</span><span id="short">&#x1F35A;</span>
    </label>
    <?php if (strpos($res['Type'], '12') !== false) { ?>
    <label class="btn btn-default active"> <?php } else { ?> <label class="btn btn-default"> <?php } ?>
      <input type="checkbox"><span id="long">Set Menu</span><span id="short">&#x1F371;</span>
    </label>
    <?php if (strpos($res['Type'], '13') !== false) { ?>
    <label class="btn btn-default active"> <?php } else { ?> <label class="btn btn-default"> <?php } ?>
      <input type="checkbox"><span id="long">Buffet</span><span id="short">&#x1F374;</span>
    </label>
  </div>
</div>
<script>
  $(function() {
    $('#foodtype').prop('disabled', true);
    $('#dishtype').prop('disabled', true);
  });
</script>
