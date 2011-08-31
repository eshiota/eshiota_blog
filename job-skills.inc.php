<?php
    // This file must be used only inside The Loop
    
    $skills = get_the_tags();

    if(!empty($skills)):
		$skills_list = array();
		$count = 0;
		
		foreach($skills as $skill){
			$skills_list[$count] = $skill->name;
			$count++;
		}
    endif;
?>

<?php if(!empty($skills)): ?>
	<ul class="job-tools">
		<?php if(in_array('web', $skills_list)): ?>
			<li class="web"><span>Web</span></li>
		<?php endif; ?>
		<?php if(in_array('html', $skills_list)): ?>
			<li class="html"><span>HTML/CSS</span></li>
		<?php endif; ?>
		<?php if(in_array('rails', $skills_list)): ?>
			<li class="rails"><span>Ruby on Rails</span></li>
		<?php endif; ?>
		<?php if(in_array('php', $skills_list)): ?>
			<li class="php"><span>PHP</span></li>
		<?php endif; ?>
		<?php if(in_array('javascript', $skills_list)): ?>
			<li class="javascript"><span>JavaScript</span></li>
		<?php endif; ?>
		<?php if(in_array('flash', $skills_list)): ?>
			<li class="flash"><span>Flash</span></li>
		<?php endif; ?>
		<?php if(in_array('type', $skills_list)): ?>
			<li class="type"><span>Typography</span></li>
		<?php endif; ?>
	</ul>
<?php endif; ?>