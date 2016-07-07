var compiler;
try {
    compiler = require('livescript');
} catch(e) {
    process.stdout.write('error ' + e.message);
    return;
}

var args = process.argv,
    result;
try {
    result = compiler.compile(args[2])
} catch(e) {
    process.stdout.write('error ' + e.message);
    return;
}

process.stdout.write('output ' + result);
