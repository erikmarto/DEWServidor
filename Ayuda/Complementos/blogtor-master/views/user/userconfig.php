<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>
<div id="main-content" class="col-12 col-md-10 col-xl-8 content">
    <h1 class="display-4">Configuración</h1>
    <p class="lead">de usuario</p>
    <hr class="header-separator">

    <!-- Editor foto perfil https://codepen.io/siremilomir/pen/jBbQGo -->
    <form id="config-pic-change" method="post" enctype="multipart/form-data" action="?r=config/Updatepic">
        <div class="container text-center">
            <h4 class="config-header">Actualice su foto de perfil</h4>
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input name="picture" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url(<?=$usuario->profile_pic_path?>);">
                    </div>
                </div>
            </div>
            <button class="btn btn-success pic-send" name="action" value="update-picture">Cambiar foto</button>
            
        </div>
    </form>

</div>
<div class="col-12 col-md-1 col-xl-2 sidebar bg-light content">
</div>