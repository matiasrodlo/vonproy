<?php if($max_num_pages > 1) { ?>
	<div class="qodef-blog-pag-loading">
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
		$number_of_pages = $max_num_pages;
		$current_page    = $paged;
		
		if($number_of_pages > 1){ ?>
			<div class="qodef-bl-standard-pagination">
				<ul>
					<li class="qodef-bl-pag-prev">
						<a href="#" data-paged="1"><span class="icon-arrows-left"></span></a>
					</li>
					<?php for ($i=1; $i <= $number_of_pages; $i++) { ?>
						<?php
							$active_class = '';
							if($current_page == $i) {
								$active_class = 'qodef-bl-pag-active';
							}
						?>
						<li class="qodef-bl-pag-number <?php echo esc_attr($active_class); ?>">
							<a href="#" data-paged="<?php echo esc_attr($i); ?>"><?php echo esc_html($i); ?></a>
						</li>
					<?php } ?>
					<li class="qodef-bl-pag-next">
						<a href="#" data-paged="2"><span class="icon-arrows-right"></span></a>
					</li>
				</ul>
			</div>
		<?php }
	?>
<?php }