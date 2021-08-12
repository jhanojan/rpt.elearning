 <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#"><?php echo ucfirst($this->utama)?></a>
        </li>
    </ul>
</div>

	<div class="box col-md-12">
		<button class="btn pull-right" onClick="window.location='<?php echo base_url($this->utama)?>/form'">Create New</button>
    </div>

<div class="row"> 
    <div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2><i class="<?php echo GetValue('icon','sv_menu',array('filez'=>'where/'.$this->utama))?>"></i> <?php echo $this->title;?></h2>
			</div>
		<div class="box-content"><?php if($this->session->flashdata('message')){?>
    <div class="alert alert-info"><?php echo $this->session->flashdata('message');?></div><?php }?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
		<tr>
			<th>Username</th>
			<th>Name</th>
			<th>Role</th>
			<th>Date registered</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>
    </thead>
    <tbody><?php foreach($list->result_array() as $data){
		$al=($data['is_active']=='Active' ? 'label-success' : 'label-danger');
		?>
    <tr>    
        <td><?php echo $data['username']?></td>
        <td><?php echo $data['name']?></td>
        <td><?php echo GetValue('title','admin_grup',array('id'=>'where/'.$data['id_admin_grup']));?></td>
        <td><?php echo $data['create_date']?></td>
        <td class="center"><span class="<?php echo $al;?> label label-default"><?php echo $data['is_active']?></span></td>
        
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url($this->utama)?>/form/<?php echo $data['id']?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="javascript:void(0)" onClick="deletec(<?php echo $data['id']?>)">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <?php }?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
	<script>
	function deletec(id){
		var result = confirm("Want to delete?");
		if (result==true) {
        inFormOrLink = true;
    		window.location='<?php echo base_url($this->utama)?>/delete/'+id;
		}
	}
	</script>