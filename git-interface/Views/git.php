<div id="git-box">
	<div id="branch-actions">
		<h1 class="active-branch">ACTIVE BRANCH :: <?php echo $branchList->activeBranch()->name ?></h1>
		<hr />
		<br />
		<pre><?php echo $gitStatus->status ?></pre>
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