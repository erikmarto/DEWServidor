var express = require('express');
var router = express.Router();

var db = require('../lib/db');
var checkAuth = require('../lib/checkAuth');

/* PUT asistentes */
router.put('/:id', checkAuth, function (req, res, next) {
  var clases_id = req.params.id;
  var usuarios_id = req.user['id'];
  var confirmado = req.body.confirmado;

  db.query('UPDATE asistentes SET confirmado = ? WHERE usuarios_id = ? AND clases_id = ?', [confirmado, usuarios_id, clases_id],
    (error, resultado, fields) => {
      if (error != null) {
        res.json(error);
      } else {
        res.json(resultado);
      }
    });
});

module.exports = router;
