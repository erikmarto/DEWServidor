var express = require('express');
var router = express.Router();
var db= require('../db');
var checkAuth= require('../checkAuth');

/* GET devuelve actividades planficadas. */
router.get('/', checkAuth,function(req, res, next) {
  db.query('select * from ac_planificaciones',function(error,result,fields){
    if(error)
      res.send(error);
    else
      res.json(result)
  });
 
});

router.get('/:id',checkAuth, function(req, res, next) {
  
  db.query('select * from ac_planificaciones where id=?',[req.params.id],
  function(error,result,fields){
    if(error || !result.length)
      res.send(error);
    else
      res.json(result[0])
  });
});

module.exports = router;