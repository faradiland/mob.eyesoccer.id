<?php 
$res = $res->data;

echo '<div class="content-profile">';
foreach($res->images as $k => $v){?>
    
    <div class="content-profile-item">
        <img src="<?php echo $v->url_img.'/medium'?>" alt="<?php echo $v->img_caption?>">
    </div>
    

<?php } 
echo '</div>';

?>
