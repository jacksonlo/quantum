<?php

/* Filename:    results.php
 * Location:    /application/views/search/
 */

?>

<div class="grid"><!-- content -->

    <div class="grid">
        <div class="padded10" style="min-height: 450px;">
            <h1>The Search</h1>
            <br />
            <?php echo '<p>You searched for "'.$searchterm.'"</p><br />' ?>
            
            <?php if(isset($error)){ echo '<p>Sorry but your search has no results. Please try again.</p>'; }  ?>
            
            <?php $tmp = array(); ?>

            <div class="padded20">
                <?php $i = 0; ?>
                <?php foreach ($result as $res) : ?>

                    <?php foreach($res as $r) : ?>
                    
                        <?php array_push($tmp, "<a href='".$r['link']."'><div class='raw100 resultsRow'><div class='raw50'>".$r['title']."</div><div class='raw50'>".$r['type']."</div></div></a>"); ?>
                    
                    <?php endforeach; ?>

                <?php endforeach; ?>
            </div>

            <!-- This should be able to parse through and count each occurance of the string 
            It will then list in the order of importance. It must also prioritize any that
            have a full combination of the string. This will give it an organic approach, think
            reverse evolution -->

            <?php foreach(array_unique($tmp, SORT_STRING) as $res) : ?>

            <?php echo $res; ?>

            <?php endforeach; ?>

        </div>
    </div>

</div><!--/content -->

<?php //End of file ?>