var express = require('express');
var router = express.Router();
var db= require('../db');
 
/* GET devuelve actividades planficadas. */
router.get('/', function(req, res, next) {
  db.query('select * from clases',function(error,result,fields){
    if(error!==null)
      res.send(error);
    else{
        //var clases = result;
        res.render('clases', {clases: result});
        //res.send(result);  
        //
    }
          
    
  });
  
 
});
 
module.exports = router;