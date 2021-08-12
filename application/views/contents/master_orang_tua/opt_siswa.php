<div class="row" style="margin-top:10px;">
  <div class="col-md-12">
      <select name="rowanak[]" class="js-data-example-ajax"></select> &nbsp;&nbsp; <button class="btn btn-danger" onclick="hapusdivnew(<?php echo $ids ?>)">-</button>
  </div>
</div>
<script>
    $('.js-data-example-ajax').css('width','500px').select2({
  ajax: {
    url: '<?php echo base_url()?>master_orang_tua/searchsis',
    dataType: 'json',
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  },    
    minimumInputLength: 3
});
</script>