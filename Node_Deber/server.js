const express = require('express')
var path = require('path');
const app = express();
const port = 3000;
// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
//setup public folder


app.get('/', function (req, res) {

    var drinks = [
        { name: 'Bloody Mary', drunkness: 3 },
        { name: 'Martini', drunkness: 5 },
        { name: 'Scotch', drunkness: 10 }
    ];
    var tagline = 'Any code of your own you haven´t looked';
    res.render('pages/index', {
        drinks: drinks,
        tagline: tagline
    });

});

app.get('/about', function (req, res) {

    res.render('pages/about');

});


app.listen(port, () => console.log(`App Started on port ${port}!`));