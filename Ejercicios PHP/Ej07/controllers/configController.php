<?php

class configController extends controller {

    public $title = "Config";

    public function actionIndex() {
        $usuario = app::instance()->getuser();

        $this->render('user/userconfig', ['usuario' => $usuario]);
    }
    
    public function actionUpdatepic() {
        $usuario = app::instance()->getuser();

        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'update-picture':
                    if (isset($_FILES['picture']) && !$_FILES['picture']['error']) {
                        $pic = $_FILES['picture'];
                        $ruta = $pic['tmp_name'];
                        $nombre = $pic['name'];
                        $ruta_dest = "images/profile-pictures/".$nombre;
                        $usuario->profile_pic_path = $ruta_dest;
                        if ($usuario->save()) {
                            move_uploaded_file($ruta, $ruta_dest);
                        }
                    }
                break;
            }
        }
        $this->render('user/userconfig', ['usuario' => $usuario]);
    }
}

?>