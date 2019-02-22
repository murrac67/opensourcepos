<!-- Overall Sale -->

<div id="overall_sale" class="panel panel-default">
	<div class="panel-body">
		<?php echo form_open($controller_name."/select_customer", array('id'=>'select_customer_form', 'class'=>'form-horizontal')); ?>
			<?php
			if(isset($customer))
			{
			?>
				<table class="sales_table_100">
					<tr>
						<th style='width: 55%;'><?php echo $this->lang->line("sales_customer"); ?></th>
						<th style="width: 45%; text-align: right;"><?php echo anchor('customers/view/'.$customer_id, $customer, array('class' => 'modal-dlg', 'data-btn-submit' => $this->lang->line('common_submit'), 'title' => $this->lang->line('customers_update'))); ?></th>
					</tr>
					<?php
					if(!empty($customer_email))
					{
					?>
						<tr>
							<th style='width: 55%;'><?php echo $this->lang->line("sales_customer_email"); ?></th>
							<th style="width: 45%; text-align: right;"><?php echo $customer_email; ?></th>
						</tr>
					<?php
					}
					?>
					<?php
					if(!empty($customer_address))
					{
					?>
						<tr>
							<th style='width: 55%;'><?php echo $this->lang->line("sales_customer_address"); ?></th>
							<th style="width: 45%; text-align: right;"><?php echo $customer_address; ?></th>
						</tr>
					<?php
					}
					?>
					<?php
					if(!empty($customer_location))
					{
					?>
						<tr>
							<th style='width: 55%;'><?php echo $this->lang->line("sales_customer_location"); ?></th>
							<th style="width: 45%; text-align: right;"><?php echo $customer_location; ?></th>
						</tr>
					<?php
					}
					?>
					<tr>
						<th style='width: 55%;'><?php echo $this->lang->line("sales_customer_discount"); ?></th>
						<th style="width: 45%; text-align: right;"><?php echo ($customer_discount_type == FIXED)?to_currency($customer_discount):$customer_discount . '%'; ?></th>
					</tr>
					<?php if($this->config->item('customer_reward_enable') == TRUE): ?>
					<?php
					if(!empty($customer_rewards))
					{
					?>
						<tr>
							<th style='width: 55%;'><?php echo $this->lang->line("rewards_package"); ?></th>
							<th style="width: 45%; text-align: right;"><?php echo $customer_rewards['package_name']; ?></th>
						</tr>
						<tr>
							<th style='width: 55%;'><?php echo $this->lang->line("customers_available_points"); ?></th>
							<th style="width: 45%; text-align: right;"><?php echo $customer_rewards['points']; ?></th>
						</tr>
					<?php
					}
					?>
					<?php endif; ?>
					<tr>
						<th style='width: 55%;'><?php echo $this->lang->line("sales_customer_total"); ?></th>
						<th style="width: 45%; text-align: right;"><?php echo to_currency($customer_total); ?></th>
					</tr>
					<?php
					if(!empty($mailchimp_info))
					{
					?>
						<tr>
							<th style='width: 55%;'><?php echo $this->lang->line("sales_customer_mailchimp_status"); ?></th>
							<th style="width: 45%; text-align: right;"><?php echo $mailchimp_info['status']; ?></th>
						</tr>
					<?php
					}
					?>
				</table>

				<?php echo anchor($controller_name."/remove_customer", '<span class="glyphicon glyphicon-remove">&nbsp</span>' . $this->lang->line('common_remove').' '.$this->lang->line('customers_customer'),
								array('class'=>'btn btn-danger btn-sm', 'id'=>'remove_customer_button', 'title'=>$this->lang->line('common_remove').' '.$this->lang->line('customers_customer'))); ?>
			<?php
			}
			else
			{
			?>
				<div class="form-group" id="select_customer">
					<label id="customer_label" for="customer" class="control-label" style="margin-bottom: 1em; margin-top: -1em;"><?php echo $this->lang->line('sales_select_customer') . ' ' . $customer_required; ?></label>
					<?php echo form_input(array('name'=>'customer', 'id'=>'customer', 'class'=>'form-control input-sm', 'value'=>$this->lang->line('sales_start_typing_customer_name')));?>

					<button class='btn btn-info btn-sm modal-dlg' data-btn-submit="<?php echo $this->lang->line('common_submit') ?>" data-href="<?php echo site_url("customers/view"); ?>"
							title="<?php echo $this->lang->line($controller_name. '_new_customer'); ?>">
						<span class="glyphicon glyphicon-user">&nbsp</span><?php echo $this->lang->line($controller_name. '_new_customer'); ?>
					</button>

				</div>
			<?php
			}
			?>
		<?php echo form_close(); ?>

		<table class="sales_table_100" id="sale_totals">
			<tr>
				<th style="width: 55%;"><?php echo $this->lang->line('sales_quantity_of_items',$item_count); ?></th>
				<th style="width: 45%; text-align: right;"><?php echo $total_units; ?></th>
			</tr>
			<tr>
				<th style="width: 55%;"><?php echo $this->lang->line('sales_sub_total'); ?></th>
				<th style="width: 45%; text-align: right;"><?php echo to_currency($subtotal); ?></th>
			</tr>

			<?php
			foreach($taxes as $tax_group_index=>$tax)
			{
			?>
				<tr>
					<th style='width: 55%;'><?php echo (float)$tax['tax_rate'] . '% ' . $tax['tax_group']; ?></th>
					<th style="width: 45%; text-align: right;"><?php echo to_currency_tax($tax['sale_tax_amount']); ?></th>
				</tr>
			<?php
			}
			?>

			<tr>
				<th style='width: 55%;'><?php echo $this->lang->line('sales_total'); ?></th>
				<th style="width: 45%; text-align: right;"><span id="sale_total"><?php echo to_currency($total); ?></span></th>
			</tr>
		</table>

		<?php
		// Only show this part if there are Items already in the sale.
		if(count($cart) > 0)
		{
		?>
			<table class="sales_table_100" id="payment_totals">
				<tr>
					<th style="width: 55%;"><?php echo $this->lang->line('sales_payments_total');?></th>
					<th style="width: 45%; text-align: right;"><?php echo to_currency($payments_total); ?></th>
				</tr>
				<tr>
					<th style="width: 55%;"><?php echo $this->lang->line('sales_amount_due');?></th>
					<th style="width: 45%; text-align: right;"><span id="sale_amount_due"><?php echo to_currency($amount_due); ?></span></th>
				</tr>
			</table>

			<div id="payment_details">
				<?php
				// Show Complete sale button instead of Add Payment if there is no amount due left
				if($payments_cover_total)
				{
				?>
					<?php echo form_open($controller_name."/add_payment", array('id'=>'add_payment_form', 'class'=>'form-horizontal')); ?>
						<table class="sales_table_100">
							<tr>
								<td><?php echo $this->lang->line('sales_payment');?></td>
								<td>
									<?php echo form_dropdown('payment_type', $payment_options, $selected_payment_type, array('id'=>'payment_types', 'class'=>'selectpicker show-menu-arrow', 'data-style'=>'btn-default btn-sm', 'data-width'=>'auto', 'disabled'=>'disabled')); ?>
								</td>
							</tr>
							<tr>
								<td><span id="amount_tendered_label"><?php echo $this->lang->line('sales_amount_tendered'); ?></span></td>
								<td>
									<?php echo form_input(array('name'=>'amount_tendered', 'id'=>'amount_tendered', 'class'=>'form-control input-sm disabled', 'disabled'=>'disabled', 'value'=>'0', 'size'=>'5', 'tabindex'=>++$tabindex, 'onClick'=>'this.select();')); ?>
								</td>
							</tr>
						</table>
					<?php echo form_close(); ?>
						<?php
						// Only show this part if the payment cover the total and in sale or return mode
						if($pos_mode == '1')
						{
						?>
						<div class='btn btn-sm btn-success pull-right' id='finish_sale_button' tabindex="<?php echo ++$tabindex; ?>"><span class="glyphicon glyphicon-ok">&nbsp</span><?php echo $this->lang->line('sales_complete_sale'); ?></div>
						<?php
						}
						?>
				<?php
				}
				else
				{
				?>
					<?php echo form_open($controller_name."/add_payment", array('id'=>'add_payment_form', 'class'=>'form-horizontal')); ?>
						<table class="sales_table_100">
							<tr>
								<td><?php echo $this->lang->line('sales_payment');?></td>
								<td>
									<?php echo form_dropdown('payment_type', $payment_options,  $selected_payment_type, array('id'=>'payment_types', 'class'=>'selectpicker show-menu-arrow', 'data-style'=>'btn-default btn-sm', 'data-width'=>'fit')); ?>
								</td>
							</tr>
							<tr>
								<td><span id="amount_tendered_label"><?php echo $this->lang->line('sales_amount_tendered'); ?></span></td>
								<td>
									<?php echo form_input(array('name'=>'amount_tendered', 'id'=>'amount_tendered', 'class'=>'form-control input-sm non-giftcard-input', 'value'=>to_currency_no_money($amount_due), 'size'=>'5', 'tabindex'=>++$tabindex, 'onClick'=>'this.select();')); ?>
									<?php echo form_input(array('name'=>'amount_tendered', 'id'=>'amount_tendered', 'class'=>'form-control input-sm giftcard-input', 'disabled' => true, 'value'=>to_currency_no_money($amount_due), 'size'=>'5', 'tabindex'=>++$tabindex)); ?>
								</td>
							</tr>
						</table>
					<?php echo form_close(); ?>

					<div class='btn btn-sm btn-success pull-right' id='add_payment_button' tabindex="<?php echo ++$tabindex; ?>"><span class="glyphicon glyphicon-credit-card">&nbsp</span><?php echo $this->lang->line('sales_add_payment'); ?></div>
				<?php
				}
				?>

				<?php
				// Only show this part if there is at least one payment entered.
				if(count($payments) > 0)
				{
				?>
					<table class="sales_table_100" id="register">
						<thead>
							<tr>
								<th style="width: 10%;"><?php echo $this->lang->line('common_delete'); ?></th>
								<th style="width: 60%;"><?php echo $this->lang->line('sales_payment_type'); ?></th>
								<th style="width: 20%;"><?php echo $this->lang->line('sales_payment_amount'); ?></th>
							</tr>
						</thead>

						<tbody id="payment_contents">
							<?php
							foreach($payments as $payment_id=>$payment)
							{
							?>
								<tr>
									<td><?php echo anchor($controller_name."/delete_payment/$payment_id", '<span class="glyphicon glyphicon-trash"></span>'); ?></td>
									<td><?php echo $payment['payment_type']; ?></td>
									<td style="text-align: right;"><?php echo to_currency( $payment['payment_amount'] ); ?></td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				<?php
				}
				?>
			</div>

			<?php echo form_open($controller_name."/cancel", array('id'=>'buttons_form')); ?>
				<div class="form-group" id="buttons_sale">
					<div class='btn btn-sm btn-default pull-left' id='suspend_sale_button'><span class="glyphicon glyphicon-align-justify">&nbsp</span><?php echo $this->lang->line('sales_suspend_sale'); ?></div>
					<?php
					// Only show this part if the payment covers the total
					if(!$pos_mode && isset($customer))
					{
					?>
						<div class='btn btn-sm btn-success' id='finish_invoice_quote_button'><span class="glyphicon glyphicon-ok">&nbsp</span><?php echo $mode_label; ?></div>
					<?php
					}
					?>

					<div class='btn btn-sm btn-danger pull-right' id='cancel_sale_button'><span class="glyphicon glyphicon-remove">&nbsp</span><?php echo $this->lang->line('sales_cancel_sale'); ?></div>
				</div>
			<?php echo form_close(); ?>

			<?php
			// Only show this part if the payment cover the total
			if($payments_cover_total || !$pos_mode)
			{
			?>
				<div class="container-fluid">
					<div class="no-gutter row">
						<div class="form-group form-group-sm">
							<div class="col-xs-12">
								<?php echo form_label($this->lang->line('common_comments'), 'comments', array('class'=>'control-label', 'id'=>'comment_label', 'for'=>'comment')); ?>
								<?php echo form_textarea(array('name'=>'comment', 'id'=>'comment', 'class'=>'form-control input-sm', 'value'=>$comment, 'rows'=>'2')); ?>
							</div>
						</div>
					</div>
					<div class="row">

						<div class="form-group form-group-sm">
							<div class="col-xs-6">
								<label for="sales_print_after_sale" class="control-label checkbox">
									<?php echo form_checkbox(array('name'=>'sales_print_after_sale', 'id'=>'sales_print_after_sale', 'value'=>1, 'checked'=>$print_after_sale)); ?>
									<?php echo $this->lang->line('sales_print_after_sale')?>
								</label>
							</div>

							<?php
							if(!empty($customer_email))
							{
							?>
								<div class="col-xs-6">
									<label for="email_receipt" class="control-label checkbox">
										<?php echo form_checkbox(array('name'=>'email_receipt', 'id'=>'email_receipt', 'value'=>1, 'checked'=>$email_receipt)); ?>
										<?php echo $this->lang->line('sales_email_receipt');?>
									</label>
								</div>
							<?php
							}
							?>
							<?php
							if($mode == "sale_work_order")
							{
							?>
								<div class="col-xs-6">
									<label for="price_work_orders" class="control-label checkbox">
									<?php echo form_checkbox(array('name'=>'price_work_orders', 'id'=>'price_work_orders', 'value'=>1, 'checked'=>$price_work_orders)); ?>
									<?php echo $this->lang->line('sales_include_prices');?>
									</label>
								</div>
							<?php
							}
							?>
						</div>
					</div>
				<?php
				if(($mode == "sale") && $this->config->item('invoice_enable') == TRUE)
				{
				?>
					<div class="row">
						<div class="form-group form-group-sm">
							<div class="col-xs-6">
								<label for="sales_invoice_enable" class="control-label checkbox">
									<?php echo form_checkbox(array('name'=>'sales_invoice_enable', 'id'=>'sales_invoice_enable', 'value'=>1, 'checked'=>$invoice_number_enabled)); ?>
									<?php echo $this->lang->line('sales_invoice_enable');?>
								</label>
							</div>

							<div class="col-xs-6">
								<div class="input-group input-group-sm">
									<span class="input-group-addon input-sm">#</span>
									<?php echo form_input(array('name'=>'sales_invoice_number', 'id'=>'sales_invoice_number', 'class'=>'form-control input-sm', 'value'=>$invoice_number));?>
								</div>
							</div>
						</div>
					</div>
				<?php
				}
				?>
				</div>
			<?php
			}
			?>
		<?php
		}
		?>
	</div>
</div>
