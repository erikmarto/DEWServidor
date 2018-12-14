<div class="user-entry-container">
    <div class='entry-avatar d-inline-block'>
            <div id='avatarImg<?=$entrada->usuarios_id?>' style='background-image: url(<?=$entrada->profile_pic_path?>)'></div>
    </div>
    <h6 class="d-inline-block entry-username">    
        <a class="userblog-link" href='?r=blog/userblog&id=<?=$entrada->usuarios_id?>'><small class='color-secondary'><?=$entrada->nombre?></small></a>
    </h6>
</div>