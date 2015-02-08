<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 1){ ?>
		<h1><?php echo $pageInfo['title']; ?></h1>
		<form method="POST" action="">
			<legend>Edit title:</legend>
			<input type="text" name="title" value="<?php echo $pageInfo['title']; ?>" required ?> 
		<h2><?php echo $pageInfo['body']; ?></h2>
			<legend>Edit text:</legend>
			<textarea rows="4" cols="40" name="body" required><?php echo $pageInfo['body']; ?></textarea>
			<br><br>
			<?php if($curPage !== "index"){ ?>
			<legend>Protected page:</legend>
			<select name="access">
			  <option value="Yes" <?php if($pageInfo['locked'] === "Yes") echo "selected"; ?> >Yes</option>
			  <option value="No" <?php if($pageInfo['locked'] === "No") echo "selected"; ?> >No</option>
			</select>
			<br><br> <?php
			} ?>
			<input type="submit" value="Save"> <?php
	} else { ?>
		<h1><?php echo $pageInfo['title']; ?></h1>
		<h2><?php echo $pageInfo['body']; ?></h2> <?php
	} ?>