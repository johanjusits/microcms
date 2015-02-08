<?php
$secret = "?";
$aMenu = array(
	array("name" => "Index", "url" => "/index.php", 
		"subpages" => array(
		  array("name" => "Subpage 1", "url" => "/index/subpage1.php"),
		  array("name" => "Subpage 2", "url" => "/index/subpage2.php"),		  
		  array("name" => "Subpage 3", "url" => "/index/subpage3.php"),
		) 				
	), 			
	array("name" => "About", "url" => "/about.php"),
	array("name" => "Portfolio", "url" => "/portfolio.php",
		"subpages" => array(
			array("name" => "Subpage 1", "url" => "/portfolio/subpage1.php"),
			array("name" => "Subpage 2", "url" => "/portfolio/subpage2.php"),
			array("name" => "Subpage 3", "url" => "/portfolio/subpage3.php",
				"subpages" => array(
					array("name" => "Subpage 1", "url" => "/portfolio/subpage3/subpage1.php"),
					array("name" => "Subpage 2", "url" => "/portfolio/subpage3/subpage2.php"),
					array("name" => "Subpage 3", "url" => "/portfolio/subpage3/subpage3.php"),
				),
			),
		),								
	),
	array("name" => "Blog", "url" => "/blog.php"),
	array("name" => "Links", "url" => "/links.php"),
); ?>

<div id="navcontainer">
		<!--MAIN MENU-->
		<ul class="top-level">
		<?php
		foreach ($aMenu as $page){ 
		if (isset($_SESSION['email'])){ ?>
			<li class="access"> <?php 
		} else { ?>
			<li class=""> <?php
		} ?>
			<a href="<?php echo $page['url']; ?>"><?php echo $page['name']; ?></a>
				<!--CHECKS IF LIST ITEM HAS SUB PAGES-->
				<?php if(isset($page['subpages'])){ ?>
					<ul class="second-level">
						<?php foreach ($page['subpages'] as $subpage){ ?>
						<?php if (isset($_SESSION['email'])){ ?>
							<li class="access"> <?php 
						} else { ?>
							<li> <?php
						} ?>
							<a href="<?php echo $subpage['url']; ?>"><?php echo $subpage['name']; ?></a>
							<!--CHECKS IF SUB-LIST ITEM HAS SUB PAGES-->
							<?php if(isset($subpage['subpages'])){ ?>
								<ul class="third-level">
									<?php foreach ($subpage['subpages'] as $subpage){ ?>
									<li>
										<a href="<?php echo $subpage['url']; ?>"><?php echo $subpage['name']; ?></a>
									</li>
									<?php } ?>
								</ul>
							<?php } ?>
						</li>
						<?php } ?>
					</ul>
				<?php } ?>
			</li>
			<?php
		} ?>
		</ul>
	</div>
