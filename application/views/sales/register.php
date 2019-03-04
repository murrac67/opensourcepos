<?php $this->load->view("partial/header"); ?>

<?php
if(isset($error))
{
	echo "<div class='alert alert-dismissible alert-danger'>".$error."</div>";
}

if(!empty($warning))
{
	echo "<div class='alert alert-dismissible alert-warning'>".$warning."</div>";
}

if(isset($success))
{
	echo "<div class='alert alert-dismissible alert-success'>".$success."</div>";
}
?>

<div id="register_wrapper">

<!-- Top register controls -->

	<?php echo form_open($controller_name."/change_mode", array('id'=>'mode_form', 'class'=>'form-horizontal panel panel-default')); ?>
		<div class="panel-body form-group">
			<ul>
				<li class="pull-left first_li">
					<label class="control-label"><?php echo $this->lang->line('sales_mode'); ?></label>
				</li>
				<li class="pull-left">
					<?php echo form_dropdown('mode', $modes, $mode, array('onchange'=>"$('#mode_form').submit();", 'class'=>'selectpicker show-menu-arrow', 'data-style'=>'btn-default btn-sm', 'data-width'=>'fit')); ?>
				</li>
				<?php
				if($this->config->item('dinner_table_enable') == TRUE)
				{
				?>
					<li class="pull-left first_li">
						<label class="control-label"><?php echo $this->lang->line('sales_table'); ?></label>
					</li>
					<li class="pull-left">
						<?php echo form_dropdown('dinner_table', $empty_tables, $selected_table, array('onchange'=>"$('#mode_form').submit();", 'class'=>'selectpicker show-menu-arrow', 'data-style'=>'btn-default btn-sm', 'data-width'=>'fit')); ?>
					</li>
				<?php
				}
				if(count($stock_locations) > 1)
				{
				?>
					<li class="pull-left">
						<label class="control-label"><?php echo $this->lang->line('sales_stock_location'); ?></label>
					</li>
					<li class="pull-left">
						<?php echo form_dropdown('stock_location', $stock_locations, $stock_location, array('onchange'=>"$('#mode_form').submit();", 'class'=>'selectpicker show-menu-arrow', 'data-style'=>'btn-default btn-sm', 'data-width'=>'fit')); ?>
					</li>
				<?php
				}
				?>

				<li class="pull-right">
					<button class='btn btn-default btn-sm modal-dlg' id='show_suspended_sales_button' data-href="<?php echo site_url($controller_name."/suspended"); ?>"
							title="<?php echo $this->lang->line('sales_suspended_sales'); ?>">
						<span class="glyphicon glyphicon-align-justify">&nbsp</span><?php echo $this->lang->line('sales_suspended_sales'); ?>
					</button>
				</li>

				<?php
				if($this->Employee->has_grant('reports_sales', $this->session->userdata('person_id')))
				{
				?>
					<li class="pull-right">
						<?php echo anchor($controller_name."/manage", '<span class="glyphicon glyphicon-list-alt">&nbsp</span>' . $this->lang->line('sales_takings'),
									array('class'=>'btn btn-primary btn-sm', 'id'=>'sales_takings_button', 'title'=>$this->lang->line('sales_takings'))); ?>
					</li>
				<?php
				}
				?>
			</ul>
		</div>
	<?php echo form_close(); ?>

	<?php $tabindex = 0; ?>

	<?php echo form_open($controller_name."/add", array('id'=>'add_item_form', 'class'=>'form-horizontal panel panel-default')); ?>
		<div class="panel-body form-group">
			<ul>
				<li class="pull-left first_li">
					<label for="item" class='control-label'><?php echo $this->lang->line('sales_find_or_scan_item_or_receipt'); ?></label>
				</li>
				<li class="pull-left">
					<?php echo form_input(array('name'=>'item', 'id'=>'item', 'class'=>'form-control input-sm', 'size'=>'50', 'tabindex'=>++$tabindex)); ?>
					<span class="ui-helper-hidden-accessible" role="status"></span>
				</li>
				<li class="pull-right">
					<button id='new_item_button' class='btn btn-info btn-sm pull-right modal-dlg' data-btn-new="<?php echo $this->lang->line('common_new') ?>" data-btn-submit="<?php echo $this->lang->line('common_submit')?>" data-href="<?php echo site_url("items/view"); ?>"
							title="<?php echo $this->lang->line($controller_name . '_new_item'); ?>">
						<span class="glyphicon glyphicon-tag">&nbsp</span><?php echo $this->lang->line($controller_name. '_new_item'); ?>
					</button>
				</li>
			</ul>
		</div>
	<?php echo form_close(); ?>


<!-- Sale Items List -->
	<!-- This is where you closed off Conor work still needed-->
	<div class="container">
		<?php
			$category = 'Meals'
			if($category = 'Meals')
				{
		?>
			<div class="tab-content">
    				<div id=$category class="tab-pane fade in active">
		<?php
					$data['items'] = $this->Register_model->get_items($category);
					if (count($items) > 6) {
						for( $j = 6  ; $j <= count) ; $j+= 6) {
							?>
							<div class="row">
							<?php
							for( $i = $j/6 ; $i = $j ; $i++) {
							?>
      								<div class="col-xs-6 col-sm-3">
                							<input type="button" class="btn btn-info btn-block btn-lg" value= $items($i)>
            							</div>
							<?php
							}
						}
					}
			}
			?>
		

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Items</a></li>
    <li><a data-toggle="tab" href="#menu1">Meals</a></li>
    <li><a data-toggle="tab" href="#menu2">Drinks</a></li>
    <li><a data-toggle="tab" href="#menu3">Deserts</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    	<br>
    	<div class="row">
      		<div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
     </div>
     
     <br>
    	<div class="row">
      		<div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
     </div>
     
     <br>
    	<div class="row">
      		<div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
     </div>
     
     
    </div>
    <div id="menu1" class="tab-pane fade">
          	<br>
    	<div class="row">
      		<div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
     </div>
     
     <br>
    	<div class="row">
      		<div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
     </div>
     
     <br>
    	<div class="row">
      		<div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
     </div>
     
     
    </div>
    <div id="menu2" class="tab-pane fade">
          	<br>
    	<div class="row">
      		<div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
     </div>
     
     <br>
    	<div class="row">
      		<div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
     </div>
     
     <br>
    	<div class="row">
      		<div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
     </div>
     
     
    </div>
    <div id="menu3" class="tab-pane fade">
          	<br>
    	<div class="row">
      		<div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
     </div>
     
     <br>
    	<div class="row">
      		<div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
     </div>
     
     <br>
    	<div class="row">
      		<div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                	<input type="button" class="btn btn-info btn-block btn-lg" value="Test">
            </div>
     </div>
     
     
    </div>
    </div>
  </div>
</div>
</div>
	<div id="overall_sale" class="panel panel-default">
		<table class="sales_table_100" id="register">
			<thead>
				<tr>
					<th style="width: 5%;"><?php echo $this->lang->line('common_delete'); ?></th>
					<th style="width: 15%;"><?php echo $this->lang->line('sales_item_number'); ?></th>
					<th style="width: 30%;"><?php echo $this->lang->line('sales_item_name'); ?></th>
					<th style="width: 10%;"><?php echo $this->lang->line('sales_price'); ?></th>
					<th style="width: 10%;"><?php echo $this->lang->line('sales_quantity'); ?></th>
					<th style="width: 15%;"><?php echo $this->lang->line('sales_discount'); ?></th>
					<th style="width: 10%;"><?php echo $this->lang->line('sales_total'); ?></th>
					<th style="width: 5%;"><?php echo $this->lang->line('sales_update'); ?></th>
				</tr>
			</thead>

			<tbody id="cart_contents">
				<?php
				if(count($cart) == 0)
				{
				?>
					<tr>
						<td colspan='8'>
							<div class='alert alert-dismissible alert-info'><?php echo $this->lang->line('sales_no_items_in_cart'); ?></div>
						</td>
					</tr>
				<?php
				}
				else
				{
					foreach(array_reverse($cart, TRUE) as $line=>$item)
					{
				?>

						<?php echo form_open($controller_name."/edit_item/$line", array('class'=>'form-horizontal', 'id'=>'cart_'.$line)); ?>
							<tr>
								<td>
									<?php echo anchor($controller_name . "/delete_item/$line", '<span class="glyphicon glyphicon-trash"></span>'); ?>
									<?php echo form_hidden('location', $item['item_location']); ?>
									<?php echo form_input(array('type'=>'hidden', 'name'=>'item_id', 'value'=>$item['item_id'])); ?>
								</td>
								<?php
								if($item['item_type'] == ITEM_TEMP)
								{
								?>
									<td><?php echo form_input(array('name'=>'item_number', 'id'=>'item_number','class'=>'form-control input-sm', 'value'=>$item['item_number'], 'tabindex'=>++$tabindex));?></td>
									<td style="align: center;">
										<?php echo form_input(array('name'=>'name','id'=>'name', 'class'=>'form-control input-sm', 'value'=>$item['name'], 'tabindex'=>++$tabindex));?>
									</td>
								<?php
								}
								else
								{
								?>
									<td><?php echo $item['item_number']; ?></td>
									<td style="align: center;">
										<?php echo $item['name'] . ' ' . $item['attribute_values']; ?>
										<br/>
										<?php if ($item['stock_type'] == '0'): echo '[' . to_quantity_decimals($item['in_stock']) . ' in ' . $item['stock_name'] . ']'; endif; ?>
									</td>
								<?php
								}
								?>
								<?php
								if($items_module_allowed)
								{
								?>
									<td><?php echo form_input(array('name'=>'price', 'class'=>'form-control input-sm', 'value'=>to_currency_no_money($item['price']), 'tabindex'=>++$tabindex, 'onClick'=>'this.select();'));?></td>
								<?php
								}
								else
								{
								?>
									<td>
										<?php echo to_currency($item['price']); ?>
										<?php echo form_hidden('price', to_currency_no_money($item['price'])); ?>
									</td>
								<?php
								}
								?>

								<td>
									<?php
									if($item['is_serialized']==1)
									{
										echo to_quantity_decimals($item['quantity']);
										echo form_hidden('quantity', $item['quantity']);
									}
									else
									{
										echo form_input(array('name'=>'quantity', 'class'=>'form-control input-sm', 'value'=>to_quantity_decimals($item['quantity']), 'tabindex'=>++$tabindex, 'onClick'=>'this.select();'));
									}
									?>
								</td>

								<td>
									<div class="input-group">
										<?php echo form_input(array('name'=>'discount', 'class'=>'form-control input-sm', 'value'=>to_decimals($item['discount'], 0), 'tabindex'=>++$tabindex, 'onClick'=>'this.select();')); ?>
										<span class="input-group-btn">
											<?php echo form_checkbox(array('id'=>'discount_toggle', 'name'=>'discount_toggle', 'value'=>1, 'data-toggle'=>"toggle",'data-size'=>'small', 'data-onstyle'=>'success', 'data-on'=>'<b>'.$this->config->item('currency_symbol').'</b>', 'data-off'=>'<b>%</b>', 'data-line'=>$line, 'checked'=>$item['discount_type'])); ?>
										</span>
									</div> 
								</td>

								<td>
									<?php
									if($item['item_type'] == ITEM_AMOUNT_ENTRY)
									{
										echo form_input(array('name'=>'discounted_total', 'class'=>'form-control input-sm', 'value'=>to_currency_no_money($item['discounted_total']), 'tabindex'=>++$tabindex, 'onClick'=>'this.select();'));
									}
									else
									{
										echo to_currency($item['discounted_total']);
									}
									?>
								</td>
							
								<td><a href="javascript:document.getElementById('<?php echo 'cart_'.$line ?>').submit();" title=<?php echo $this->lang->line('sales_update')?> ><span class="glyphicon glyphicon-refresh"></span></a></td>
								</tr>
								<tr>
								<?php
								if($item['item_type'] == ITEM_TEMP)
								{
								?>
									<td><?php echo form_input(array('type'=>'hidden', 'name'=>'item_id', 'value'=>$item['item_id'])); ?></td>
									<td style="align: center;" colspan="6">
										<?php echo form_input(array('name'=>'item_description', 'id'=>'item_description', 'class'=>'form-control input-sm', 'value'=>$item['description'], 'tabindex'=>++$tabindex));?>
									</td>
									<td> </td>
								<?php
								}
								else
								{
								?>
									<td> </td>
									<?php
									if($item['allow_alt_description']==1)
									{
										?>
										<td style="color: #2F4F4F;"><?php echo $this->lang->line('sales_description_abbrv');?></td>
										<?php
									}
										?>

									<td colspan='2' style="text-align: left;">
										<?php
										if($item['allow_alt_description']==1)
										{
											echo form_input(array('name'=>'description', 'class'=>'form-control input-sm', 'value'=>$item['description'], 'onClick'=>'this.select();'));
										}
										else
										{
											if($item['description']!='')
											{
												echo $item['description'];
												echo form_hidden('description', $item['description']);
											}
											else
											{
												echo $this->lang->line('sales_no_description');
												echo form_hidden('description','');
											}
										}
										?>
									</td>
									<td>&nbsp;</td>
									<td style="color: #2F4F4F;">
										<?php
										if($item['is_serialized']==1)
										{
											echo $this->lang->line('sales_serial');
										}
										?>
									</td>
									<td colspan='4' style="text-align: left;">
										<?php
										if($item['is_serialized']==1)
										{
											echo form_input(array('name'=>'serialnumber', 'class'=>'form-control input-sm', 'value'=>$item['serialnumber'], 'onClick'=>'this.select();'));
										}
										else
										{
											echo form_hidden('serialnumber', '');
										}
										?>
									</td>
								<?php
								}
								?>
	
							</tr>
						<?php echo form_close(); ?>
				<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>


<script type="text/javascript">
$(document).ready(function()
{
	$("input[name='item_number']").change(function(){
		var item_id = $(this).parents("tr").find("input[name='item_id']").val();
		var item_number = $(this).val();
		$.ajax({
			url: "<?php echo site_url('sales/change_item_number');?>",
			method: 'post',
			data: {
				"item_id" : item_id,
				"item_number" : item_number,
			},
			dataType: 'json'
		});
	});

	$("input[name='name']").change(function(){
		var item_id = $(this).parents("tr").find("input[name='item_id']").val();
		var item_name = $(this).val();
		$.ajax({
			url: "<?php echo site_url('sales/change_item_name');?>",
			method: 'post',
			data: {
				"item_id" : item_id,
				"item_name" : item_name,
			},
			dataType: 'json'
		});
	});

	$("input[name='item_description']").change(function(){
		var item_id = $(this).parents("tr").find("input[name='item_id']").val();
		var item_description = $(this).val();
		$.ajax({
			url: "<?php echo site_url('sales/change_item_description');?>",
			method: 'post',
			data: {
				"item_id" : item_id,
				"item_description" : item_description,
			},
			dataType: 'json'
		});
	});

	$('#item').focus();

	$('#item').blur(function()
	{
		$(this).val("<?php echo $this->lang->line('sales_start_typing_item_name'); ?>");
	});

	$('#item').autocomplete(
	{
		source: "<?php echo site_url($controller_name . '/item_search'); ?>",
		minChars: 0,
		autoFocus: false,
		delay: 500,
		select: function (a, ui) {
			$(this).val(ui.item.value);
			$("#add_item_form").submit();
			return false;
		}
	});

	$('#item').keypress(function (e) {
		if(e.which == 13) {
			$('#add_item_form').submit();
			return false;
		}
	});

	var clear_fields = function()
	{
		if($(this).val().match("<?php echo $this->lang->line('sales_start_typing_item_name') . '|' . $this->lang->line('sales_start_typing_customer_name'); ?>"))
		{
			$(this).val('');
		}
	};

	$('#item, #customer').click(clear_fields).dblclick(function(event)
	{
		$(this).autocomplete("search");
	});

	$('#customer').blur(function()
	{
		$(this).val("<?php echo $this->lang->line('sales_start_typing_customer_name'); ?>");
	});

	$("#customer").autocomplete(
	{
		source: "<?php echo site_url("customers/suggest"); ?>",
		minChars: 0,
		delay: 10,
		select: function (a, ui) {
			$(this).val(ui.item.value);
			$("#select_customer_form").submit();
		}
	});

	$('#customer').keypress(function (e) {
		if(e.which == 13) {
			$('#select_customer_form').submit();
			return false;
		}
	});

	$(".giftcard-input").autocomplete(
	{
		source: "<?php echo site_url("giftcards/suggest"); ?>",
		minChars: 0,
		delay: 10,
		select: function (a, ui) {
			$(this).val(ui.item.value);
			$("#add_payment_form").submit();
		}
	});

	$('#comment').keyup(function()
	{
		$.post("<?php echo site_url($controller_name."/set_comment");?>", {comment: $('#comment').val()});
	});

	<?php
	if($this->config->item('invoice_enable') == TRUE)
	{
	?>
		$('#sales_invoice_number').keyup(function()
		{
			$.post("<?php echo site_url($controller_name."/set_invoice_number");?>", {sales_invoice_number: $('#sales_invoice_number').val()});
		});

		var enable_invoice_number = function()
		{
			var enabled = $("#sales_invoice_enable").is(":checked");
			$("#sales_invoice_number").prop("disabled", !enabled).parents('tr').show();
			return enabled;
		}

		enable_invoice_number();

		$("#sales_invoice_enable").change(function()
		{
			var enabled = enable_invoice_number();
			$.post("<?php echo site_url($controller_name."/set_invoice_number_enabled");?>", {sales_invoice_number_enabled: enabled});
		});
	<?php
	}
	?>

	$("#sales_print_after_sale").change(function()
	{
		$.post("<?php echo site_url($controller_name."/set_print_after_sale");?>", {sales_print_after_sale: $(this).is(":checked")});
	});

	$("#price_work_orders").change(function()
	{
		$.post("<?php echo site_url($controller_name."/set_price_work_orders");?>", {price_work_orders: $(this).is(":checked")});
	});

	$('#email_receipt').change(function()
	{
		$.post("<?php echo site_url($controller_name."/set_email_receipt");?>", {email_receipt: $(this).is(":checked")});
	});

	$("#finish_sale_button").click(function()
	{
		$('#buttons_form').attr('action', "<?php echo site_url($controller_name."/complete"); ?>");
		$('#buttons_form').submit();
	});

	$("#finish_invoice_quote_button").click(function()
	{
		$('#buttons_form').attr('action', "<?php echo site_url($controller_name."/complete"); ?>");
		$('#buttons_form').submit();
	});

	$("#suspend_sale_button").click(function()
	{
		$('#buttons_form').attr('action', "<?php echo site_url($controller_name."/suspend"); ?>");
		$('#buttons_form').submit();
	});

	$("#cancel_sale_button").click(function()
	{
		if(confirm("<?php echo $this->lang->line("sales_confirm_cancel_sale"); ?>"))
		{
			$('#buttons_form').attr('action', "<?php echo site_url($controller_name."/cancel"); ?>");
			$('#buttons_form').submit();
		}
	});

	$("#add_payment_button").click(function()
	{
		$('#add_payment_form').submit();
	});

	$("#payment_types").change(check_payment_type).ready(check_payment_type);

	$("#cart_contents input").keypress(function(event)
	{
		if(event.which == 13)
		{
			$(this).parents("tr").prevAll("form:first").submit();
		}
	});

	$("#amount_tendered").keypress(function(event)
	{
		if(event.which == 13)
		{
			$('#add_payment_form').submit();
		}
	});

	$("#finish_sale_button").keypress(function(event)
	{
		if(event.which == 13)
		{
			$('#finish_sale_form').submit();
		}
	});

	dialog_support.init("a.modal-dlg, button.modal-dlg");

	table_support.handle_submit = function(resource, response, stay_open)
	{
		$.notify(response.message, { type: response.success ? 'success' : 'danger'} );

		if(response.success)
		{
			if(resource.match(/customers$/))
			{
				$("#customer").val(response.id);
				$("#select_customer_form").submit();
			}
			else
			{
				var $stock_location = $("select[name='stock_location']").val();
				$("#item_location").val($stock_location);
				$("#item").val(response.id);
				if(stay_open)
				{
					$("#add_item_form").ajaxSubmit();
				}
				else
				{
					$("#add_item_form").submit();
				}
			}
		}
	}

	$('[name="price"],[name="quantity"],[name="discount"],[name="description"],[name="serialnumber"],[name="discounted_total"]').change(function() {
		$(this).parents("tr").prevAll("form:first").submit()
	});

	$('[name="discount_toggle"]').change(function() {
		var input = $("<input>").attr("type", "hidden").attr("name", "discount_type").val(($(this).prop('checked'))?1:0);
		$('#cart_'+ $(this).attr('data-line')).append($(input));
		$('#cart_'+ $(this).attr('data-line')).submit();
    });
});

function check_payment_type()
{
	var cash_rounding = <?php echo json_encode($cash_rounding); ?>;

	if($("#payment_types").val() == "<?php echo $this->lang->line('sales_giftcard'); ?>")
	{
		$("#sale_total").html("<?php echo to_currency($total); ?>");
		$("#sale_amount_due").html("<?php echo to_currency($amount_due); ?>");
		$("#amount_tendered_label").html("<?php echo $this->lang->line('sales_giftcard_number'); ?>");
		$("#amount_tendered:enabled").val('').focus();
		$(".giftcard-input").attr('disabled', false);
		$(".non-giftcard-input").attr('disabled', true);
		$(".giftcard-input:enabled").val('').focus();
	}
	else if($("#payment_types").val() == "<?php echo $this->lang->line('sales_cash'); ?>" && cash_rounding)
	{
		$("#sale_total").html("<?php echo to_currency($cash_total); ?>");
		$("#sale_amount_due").html("<?php echo to_currency($cash_amount_due); ?>");
		$("#amount_tendered_label").html("<?php echo $this->lang->line('sales_amount_tendered'); ?>");
		$("#amount_tendered:enabled").val("<?php echo to_currency_no_money($cash_amount_due); ?>");
		$(".giftcard-input").attr('disabled', true);
		$(".non-giftcard-input").attr('disabled', false);
	}
	else
	{
		$("#sale_total").html("<?php echo to_currency($non_cash_total); ?>");
		$("#sale_amount_due").html("<?php echo to_currency($non_cash_amount_due); ?>");
		$("#amount_tendered_label").html("<?php echo $this->lang->line('sales_amount_tendered'); ?>");
		$("#amount_tendered:enabled").val("<?php echo to_currency_no_money($non_cash_amount_due); ?>");
		$(".giftcard-input").attr('disabled', true);
		$(".non-giftcard-input").attr('disabled', false);
	}
}
</script>

<?php $this->load->view("partial/footer"); ?>
