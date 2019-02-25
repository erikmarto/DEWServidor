var express = require('express');
var router = express.Router();
//var controller = require('../controllers/clases');
var db = require('../lib/db');
var checkAuth= require('../lib/checkAuth');

router.put('/:id', checkAuth, function(req, res, next) {
  var clases_id = req.params.id;
  var usuarios_id = req.user['id'];
  var atender = req.body.confirmado;

  db.query('UPDATE asistentes SET confirmado = ? WHERE usuarios_id = ? AND clases_id = ?', [atender, usuarios_id, clases_id], 
    (error, resul, fields) => {
      if (error!=null) {
        res.json(error);
      } else {
        res.json(resul);
      }
  });
}); 

module.exports = router;
