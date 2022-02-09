<section class="section-slide">
		 <div class="wrap-slick1">
		 <div class="slick1">
		<?php 
					$sqll = "SELECT * FROM product ORDER BY id DESC";
					$qury = mysqli_query($conn, $sqll);
					while ($rol = mysqli_fetch_assoc($qury)) { ?>
			
				<div class="item-slick1" style="background-image: url(images/<?php echo $rol['product_image'] ?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 text-info cl2 respon2">
								<?php echo $rol['product_description']; ?>
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h3 class="ltext-201 text-info cl2 p-t-19 p-b-43 respon1">
								<?php echo $rol['product_name']; ?>
								</h3>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="farmerLogin.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									advertise your  farmer product
								</a>
							</div>
						</div>
					</div>
				</div> 
				<?php } ?>
				
			</div>
		</div>
	</section>