<div class="row text-center">
  <div class="btn-group" id="foodtype" data-toggle="buttons">
    <?php if (strpos($res['Type'], '01') !== false) { ?>
    <label class="btn btn-success active"> <?php } else { ?> <label class="btn btn-success"> <?php } ?>
      <input type="checkbox">Thai
    </label>
    <?php if (strpos($res['Type'], '02') !== false) { ?>
    <label class="btn btn-warning active"> <?php } else { ?> <label class="btn btn-warning"> <?php } ?>
      <input type="checkbox">Japanese
    </label>
    <?php if (strpos($res['Type'], '03') !== false) { ?>
    <label class="btn btn-danger active"> <?php } else { ?> <label class="btn btn-danger"> <?php } ?>
      <input type="checkbox">Chinese
    </label>
    <?php if (strpos($res['Type'], '04') !== false) { ?>
    <label class="btn btn-primary active"> <?php } else { ?> <label class="btn btn-primary"> <?php } ?>
      <input type="checkbox">European
    </label>
  </div>
  <?php if (!isset($combine)) { ?>
</div>
<div class="row text-center">
  <?php } ?>
  <div class="btn-group" id="dishtype" data-toggle="buttons">
    <?php if (strpos($res['Type'], '11') !== false) { ?>
    <label class="btn btn-default active"> <?php } else { ?> <label class="btn btn-default"> <?php } ?>
      <input type="checkbox">Single Dish
    </label>
    <?php if (strpos($res['Type'], '12') !== false) { ?>
    <label class="btn btn-default active"> <?php } else { ?> <label class="btn btn-default"> <?php } ?>
      <input type="checkbox">Set Menu
    </label>
    <?php if (strpos($res['Type'], '13') !== false) { ?>
    <label class="btn btn-default active"> <?php } else { ?> <label class="btn btn-default"> <?php } ?>
      <input type="checkbox">Buffet
    </label>
  </div>
</div>
<script>
  $(function() {
    $('#foodtype').prop('disabled', true);
    $('#dishtype').prop('disabled', true);
  });
</script>
