var express = require('express');
var router = express.Router();
//var controller = require('../controllers/clases');
var db = require('../lib/db');
var checkAuth= require('../lib/checkAuth');


/* GET devuelve las clases */
router.get('/', checkAuth, function(req, res, next) {

  db.query('select clases.id, fecha, clases.hora1, clases.hora2, salas.nombre as nombre_sala, grupos.nombre as nombre_grupo, asistentes.confirmado as confirmado ' +
      'FROM clases INNER JOIN grupos ON grupos.id = clases.grupos_id INNER JOIN salas ON salas.id = clases.salas_id  ' +
      'INNER JOIN asistentes ON asistentes.clases_id = clases.id WHERE asistentes.usuarios_id = ? ORDER BY id asc',[req.user['id']] , (err, resul, fields) => {
    if (err) res.render('error', { message: 'whoops', error: err });

    res.send(resul);
    //res.render('clases', { clases : resul });
  }); 
  
});

module.exports = router;
