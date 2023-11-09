<?php if($query_results->max_num_pages > 1) { ?>
	<div class="qodef-pl-loading">
		<div class="qodef-dessau-loader">
			  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
			    width="106.237px" height="104.477px" viewBox="0 0 106.237 104.477" enable-background="new 0 0 106.237 104.477">
			 	   <rect x="0.125" y="1.057" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="1.317" height="103.295"/>
			 	   <rect x="0.125" y="102.988" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="105.987" height="1.363"/>
			 	   <rect x="104.795" y="0.182" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="1.317" height="104.17"/>
			 	   <rect x="0.125" y="0.125" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="105.987" height="1.363"/>
			 	   <rect x="0.125" y="0.125" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="105.987" height="1.363"/>
			 	   <rect x="65.867" y="30.111" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="39.587" height="1.363"/>
			 	   <rect x="65.867" y="30.111" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="39.587" height="1.363"/>
			 	   <rect x="65.867" y="30.111" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="39.587" height="1.363"/>
			 	   <rect x="65.072" y="1.307" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="1.317" height="103.045"/>
			  </svg>
		</div>
	</div>
	<?php
		$pages = $query_results->max_num_pages;
		$paged = $query_results->query['paged'];
		
		if($pages > 1){ ?>
			<div class="qodef-pl-standard-pagination">
				<ul>
					<li class="qodef-pl-pag-prev">
						<a href="#" data-paged="1"><span class="icon-arrows-left"></span></a>
					</li>
					<?php for ($i=1; $i <= $pages; $i++) { ?>
						<?php
							$active_class = '';
							if($paged == $i) {
								$active_class = 'qodef-pl-pag-active';
							}
						?>
						<li class="qodef-pl-pag-number <?php echo esc_attr($active_class); ?>">
							<a href="#" data-paged="<?php echo esc_attr($i); ?>"><?php echo esc_html($i); ?></a>
						</li>
					<?php } ?>
					<li class="qodef-pl-pag-next">
						<a href="#" data-paged="2"><span class="icon-arrows-right"></span></a>
					</li>
				</ul>
			</div>
		<?php }
	?>
<?php }