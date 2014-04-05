<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav" style="height: 500px">
				<ul>
				<li class="current"><a href="">Taxes</a></li>
				<li><?php echo $this->Html->link(__('New Tax'), array('action' => 'add')); ?></li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Taxes'); ?></h1>
				<a href="#" class="button tiny success radius right" style="margin-top: 20px" data-reveal-id="addTaxModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('New Tax'); ?></a>
				<?php //echo $this->Html->link('<i class="fi-plus"></i> ' . __('New Tax'), array('action' => 'add'), array('class' => 'button tiny success radius right', 'style' => 'margin-top: 20px', 'escape' => false)); ?>
			</header>
			<!-- Contenido -->
			<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th><?php echo $this->Paginator->sort('status'); ?></th>
					<th><?php echo $this->Paginator->sort('rate'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($taxes as $tax): ?>
			<tr>
				<td><?php echo h($tax['Tax']['description']); ?>&nbsp;</td>
				<td><?php echo $this->Fn5->drawStatus($tax['Tax']['status']); ?>&nbsp;</td>
				<td><?php echo number_format(h($tax['Tax']['rate']), 2); ?>&nbsp;</td>
				<td class="actions">
					<?php 
					$links = array(
						$this->Html->link('<i class="fi-eye"></i> ' . __('View'), array('action' => 'view', $tax['Tax']['id']), array('escape' => false)),
						$this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $tax['Tax']['id']), array('escape' => false)),
						$this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $tax['Tax']['id']), array('action' => 'delete', $tax['Tax']['id']))
					);
					echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ' . __('Options'), $links); 
					?>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
			</table>
			<!-- Paginación -->
			<?php echo $this->element('paginator'); ?>
			<!-- Fin contenido -->
			</div>
		</div>
	</div>
</div>
<!-- Modal add tax -->
<div id="addTaxModal" class="reveal-modal medium" data-reveal>
	<h2><?php echo __('Add tax'); ?></h2>
	<div class="taxes form">
	<form id="addTaxForm" method="post" action="/taxes/add" data-abide>
		<div>
			<label>Description <small>required</small>
				<input type="text" name="data[Tax][description]" required>
			</label>
			<small class="error">Description is required and must be a string.</small>
		</div>
		<div>
			<label>Status <small>required</small>
				<select name="data[Tax][status]" required>
					<option value="0"><?php echo __('Active'); ?></option>
					<option value="1"><?php echo __('Inactive'); ?></option>
				</select>
			</label>
			<small class="error">Status is required.</small>
		</div>
		<div>
			<label>Rate <small>required</small>
				<input type="number" name="data[Tax][rate]" required>
			</label>
			<small class="error">Rate is required and must be a number.</small>
		</div>
		<input type="submit" class="button tiny success radius" value="<?php echo __('Submit'); ?>">
	</form>
	</div>
	<a class="close-reveal-modal">&#215;</a> 
</div>