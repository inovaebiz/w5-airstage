<?php $this->load->view('emails/header'); ?>
	<!-- Email Body -->
	<tr>
		<td class="email-body" width="100%" cellpadding="0" cellspacing="0">
			<table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
				<!-- Body content -->
				<tr>
					<td class="content-cell">
						<?= $content ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
<?php $this->load->view('emails/footer'); ?>