<div id="git-box">
	<div id="branch-actions">
		<h1 class="active-branch">ACTIVE BRANCH :: <?php echo $branchList->activeBranch()->name ?></h1>
		
		<?php if($gitStatus->hasChanges) {
			?>
			<hr />
			<form id="commit-form" method="post">
				<input type="text" name="message" class="commit-input" placeholder="Commit message...">
				<input type="hidden" name="action" value="commit">
				<button type="submit" class="commit-button">Commit & Sync</button>>
			</form>
			<ul class="status-list">
			<?php
			foreach ($gitStatus->files as $key => $value) {
				$gitStatusFile = GitStatusFile::cast($value);
				?>
				
					<li class="<?php echo $gitStatusFile->fileStatus ?>"><?php echo $gitStatusFile->fileName ?> </li>
				
				<?php
			}
		?>
			</ul>
		<?php } else {
		?>
			<button type="submit" class="sync-button">Sync</button>
			<hr />
		<?php
			echo $gitStatus->status;
		} ?>
		
			
	</div>
	<div id="shell-return">
		<h1>Shell</h1>
		<hr />
		<textarea id="shell-textarea"><?php echo $shellReturn ?></textarea>
	</div>
	<div id="branches-box">
		<?php foreach ($branchList->branchList() as $key => $branch) {
			$branch = GitBranch::cast($branch);
			
			echo $branch->name;
			echo "<br>";
		}
		
		?>	
	</div>
</div>