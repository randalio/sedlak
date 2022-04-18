<table class="row"
       style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
	<tbody>
		<tr style="padding:0;text-align:left;vertical-align:top">
			<th class="small-12 large-12 columns first last"
			    style="color:#000;font-size:18px;font-weight:400;line-height:25px;margin:0 auto;padding:0 0 15px;text-align:left;width:585px">
				<table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
					<tr style="padding:0;text-align:left;vertical-align:top">
						<th style="color:#000;font-size:18px;font-weight:400;line-height:25px;margin:0;padding:0;text-align:left">
							<h1 style="-webkit-font-smoothing:antialiased;color:#333;font-size:25px;line-height:30px;font-weight:bold;font-smoothing:antialiased;margin:0 0 30px;padding:0;text-align:left;word-wrap:normal">
								<?php printf( __( "Security recommendation report for %s", 'wpdef' ), $site_url ); ?>
							</h1>
							<p style="-webkit-font-smoothing:antialiased;color:#1a1a1a;font-size:16px;line-height:24px;font-smoothing:antialiased;font-weight:normal;margin:0 0 30px;padding:0;text-align:left">
								<?php printf( __( "Hi %s,", 'wpdef' ), $name ); ?>
							</p>
							<p style="-webkit-font-smoothing:antialiased;color:#1a1a1a;font-size:16px;line-height:24px;font-smoothing:antialiased;font-weight:normal;margin:0 0 30px;padding:0;text-align:left">
								<?php printf( __( "You have %d unresolved security recommendations for %s. We suggest addressing as many recommendations as possible to improve site security, and ignoring anything you don't want to address.", 'wpdef' ), $count, $site_url ); ?>
							</p>
						</th>
					</tr>
				</table>
			</th>
		</tr>
	</tbody>
</table>
<table class="row"
       style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
	<tbody>
		<tr style="padding:0;text-align:left;vertical-align:top">
			<th class="small-12 large-12 columns first last"
			    style="font-size:18px;font-weight:400;line-height:25px;margin:0 auto;padding:0;text-align:left;width:585px">
				<table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
					<tr style="padding:0;text-align:left;vertical-align:top">
						<th style="color:#000;font-size:18px;font-weight:400;line-height:25px;margin:0;padding:0;text-align:left">
							<table class="wpmudev-table"
							       style="border-collapse:separate;border-radius:4px;border-spacing:0;margin-bottom:10px;padding:0;text-align:left;vertical-align:top;width:100%">
								<tbody>
									<?php echo $issues; ?>
								</tbody>
							</table>
						</th>
					</tr>
				</table>
			</th>
		</tr>
	</tbody>
</table>
<table class="row"
       style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
	<tbody>
		<tr style="padding:0;text-align:left;vertical-align:top">
			<th class="small-12 large-12 columns first last"
			    style="color:#000;font-size:18px;font-weight:400;line-height:25px;margin:0 auto;padding:40px 15px 0;text-align:left;width:585px">
				<table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
					<tr style="padding:0;text-align:left;vertical-align:top">
						<th style="color:#000;font-size:18px;font-weight:400;line-height:25px;margin:0;padding:0;text-align:left">
							<table class="button btn-center"
							       style="margin:0 auto 30px;border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:auto">
								<tr style="padding:0;text-align:left;vertical-align:top">
									<td style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;color:#000;font-size:18px;font-weight:400;hyphens:auto;line-height:25px;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
										<table style="border-collapse:collapse;border-radius:4px;border-spacing:0;overflow:hidden;padding:0;text-align:left;vertical-align:top;width:100%">
											<tr style="padding:0;text-align:left;vertical-align:top">
												<td style="-moz-hyphens:auto;-webkit-hyphens:auto;background:#17ABE3;border:none;border-collapse:collapse!important;color:#fff;font-size:18px;font-weight:400;hyphens:auto;line-height:25px;margin:0;padding:0;text-align:center;vertical-align:top;word-wrap:break-word">
													<a href="<?php echo esc_url( $view_url ); ?>"
													   style="border:0 solid #17ABE3;border-radius:4px;color:#fff;display:inline-block;font-size:15px;font-weight:400;line-height:25px;margin:0;min-width:275px;padding:8px 16px 8px 16px;text-align:center;text-decoration:none;text-transform:uppercase">
														<?php _e( "View All", 'wpdef' ); ?>
													</a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</th>
					</tr>
				</table>
			</th>
		</tr>
	</tbody>
</table>