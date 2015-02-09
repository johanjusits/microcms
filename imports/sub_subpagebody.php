<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 1){ ?>
		<h1><?php echo $sub_subPageInfo['title']; ?></h1>
		<form method="POST" action="">
			<legend>Edit title:</legend>
			<input type="text" name="sub_sub_title" value="<?php echo $sub_subPageInfo['title']; ?>" required ?> 
		<h2><?php echo $sub_subPageInfo['body']; ?></h2>
			<legend>Edit text:</legend>
			<textarea rows="4" cols="40" name="sub_sub_body" required><?php echo $sub_subPageInfo['body']; ?></textarea>
			<br><br>
			<?php if($curPage !== "index"){ ?>
			<legend>Protected page:</legend>
			<select name="access">
			  <option value="Yes" <?php if($sub_subPageInfo['locked'] === "Yes") echo "selected"; ?> >Yes</option>
			  <option value="No" <?php if($sub_subPageInfo['locked'] === "No") echo "selected"; ?> >No</option>
			</select>
			<br><br> <?php
			} ?>
			<input type="submit" value="Save"> <?php
	} else { ?>
		<h1><?php echo $sub_subPageInfo['title']; ?></h1>
		<h2><?php echo $sub_subPageInfo['body']; ?></h2> <?php
	} ?>