var express = require('express');
var router = express.Router();
//var controller = require('../controllers/clases');
var db = require('../lib/db');
var checkAuth= require('../lib/checkAuth');


/* GET clases listing. */
router.get('/', /* checkAuth, */ function(req, res, next) {

  db.query('select clases.id, fecha, clases.hora1, clases.hora2, salas.nombre as nombre_sala, grupos.nombre as nombre_grupo ' +
      'FROM clases INNER JOIN grupos ON grupos.id = clases.grupos_id INNER JOIN salas ON salas.id = clases.salas_id ', (err, resul, fields) => {
    if (err) res.render('error', { message: 'whoops', error: err });

    res.json(resul);
    //res.render('clases', { clases : resul });
  }); 
  
});

router.get('/:id', /* checkAuth,*/ function(req, res, next) {
  db.query('select clases.id, fecha, clases.hora1, clases.hora2, salas.nombre as nombre_sala, grupos.nombre as nombre_grupo ' + 
  'FROM clases INNER JOIN grupos ON grupos.id = clases.grupos_id INNER JOIN salas ON salas.id = clases.salas_id ' +
  'where clases.id=?',[req.params.id],
  function(error,resul,fields){
    if(error!==null || !resul.length)
      res.send(error);
    else
      res.json(resul)
  });
});

router.put('/:id', checkAuth, function(req, res, next) {
  var clases_id = req.params.id;
  var usuarios_id; req.user.id;
  var atender = req.body.confirmado; // S/N/Q

  //modificar tabla asistentes

  //devolver nueva tabla
}); 

module.exports = router;
