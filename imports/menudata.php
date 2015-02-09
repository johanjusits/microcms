<?php
//Initializing the arrays
$aMenu = array();
$pageSubs = array();
$subpageSubs = array();

//Sets up the sub-subpages array
foreach($allSub_subPages as $sub_subpage){
	$subpage_id = $sub_subpage['subpage_id'];
	$name = $sub_subpage['menu_name'];
	$url = $sub_subpage['url'];
	$subpageSubs[] = array("name" => $name, "url" => $url, "subpage_id" => $subpage_id);
	}

//Sets up the subpages array
foreach($allSubPages as $subpage){
	$id = $subpage['id'];
	$page_id = $subpage['page_id'];
	$name = $subpage['menu_name'];
	$url = $subpage['url'];
	$singleSubPageSubs = array();
	//Loops through the sub-subpages array and checks if there's an ID match
	foreach ($subpageSubs as $sub_subpage){
		switch ($sub_subpage['subpage_id']){
			case $id:
				$singleSubPageSubs[] = array("name" => $sub_subpage['name'], "url" => $sub_subpage['url']);
			break;
		}
	}
	//If the subpages doesn't have any subpages, it adds the page to the menu without that element
	if(empty($singleSubPageSubs)){
	    $pageSubs[] = array("name" => $name, "url" => $url, "page_id" => $page_id);
	} else {
		$pageSubs[] = array("name" => $name, "url" => $url, "page_id" => $page_id, "subpages" => $singleSubPageSubs);
	}
}

//Sets up top pages array
foreach($allPages as $singlePage){
	$id = $singlePage['id'];
	$name = $singlePage['menu_name'];
	$url = $singlePage['url'];
	$locked = $singlePage['locked'];
	$singlePageSubs = array();
	//Loops through the subpages array and checks if there's an ID match
	foreach ($pageSubs as $subpage){
		$hasSub = FALSE;
		//Checks if the subpage has subpages and if so, if it doesn't, it adds the page to the menu without that element
		if (isset($subpage['subpages'])){
			$hasSub = TRUE;
		}
		switch ($subpage['page_id']){
			case $id:
			if($hasSub == TRUE){
				$singlePageSubs[] = array("name" => $subpage['name'], "url" => $subpage['url'], "subpages" => $subpage['subpages']);
			} else {
				$singlePageSubs[] = array("name" => $subpage['name'], "url" => $subpage['url']);
			}				
			break;
		}
	}
	//If the pages doesn't have any subpages, it adds the page to the menu without that element
	if(empty($singlePageSubs))
	{
	    $aMenu[] = array("name" => $name, "url" => $url, "locked" => $locked);
	} else {
		$aMenu[] = array("name" => $name, "url" => $url, "locked" => $locked, "subpages" => $singlePageSubs);
	}
} 

//print_r($pageSubs)?>

<div id="navcontainer">
		<!--MAIN MENU-->
		<ul class="top-level">
		<?php
		foreach ($aMenu as $page){ 
		if (isset($_SESSION['email'])){ ?>
			<li class="access"> <?php 
		} else {
			if ($page['locked'] == "Yes"){ ?>
				<li class="locked"> <?php
			} else { ?>
				<li class=""> <?php
			} 
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
