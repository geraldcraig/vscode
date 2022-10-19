const { PythonShell } = require('python-shell')
function get_weather() {
    var data = "Cool Weather"
    let pyshell = new PythonShell('weather.py')
    pyshell.send(data)
    pyshell.on('message', function (message) {
        console.log(message+" HI")
    })
    pyshell.end(function (err, code, signal) {
        if (err) throw err;
        console.log(code + ' ' + signal);
    })
}