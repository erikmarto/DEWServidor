/* comentarios_cat_usuarios */
/*
CREATE VIEW `comentarios_cat_usuarios` AS SELECT `usuarios`.`nombre` as `nombre`, `usuarios`.`profile_pic_path` as `profile_pic_path`, `comentarios`.`id` as `id`, `comentarios`.`fecha_hora` as `fecha_hora`, `comentarios`.`texto` as `texto`, `comentarios`.`entradas_id` as `entradas_id`, `comentarios`.`comentarios_id` as `comentarios_id`, `comentarios`.`aceptado` as `aceptado` from (`comentarios` join `usuarios`) where (`comentarios`.`usuarios_id` = `usuarios`.`id`);
*/